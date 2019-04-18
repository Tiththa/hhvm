<?hh
include(__DIR__ . '/base.php');

// see hphp/runtime/vm/bytecode.h:kMaxBuiltinArgs
const MAX_BUILTIN_ARGS = 5;

function generateDocComment(string $doccomment, ?array $func = null,
                            string $indent = ''): string {
  if ($func === null) {
    $func = [];
  }
  $str = $doccomment . "\n";
  if (!empty($func['args'])) {
    $str .= "\n";
    foreach ($func['args'] as $arg) {
      $desc = isset($arg['desc']) ? $arg['desc'] : '';
      $v = "@param {$arg['type']} \${$arg['name']} - " .
           str_replace("\n", " ", $desc);
      $str .= implode("\n  ", explode("\n",
                      wordwrap($v, 70 - strlen($indent)))) . "\n";
    }
  }
  if (!empty($func['return'])) {
    $str .= "\n";
    $v = "@return {$func['return']['type']} - ";
    $v .= isset($func['return']['desc'])
       ? str_replace("\n", " ", $func['return']['desc']) . "\n"
       : '';
    $str .= implode("\n  ", explode("\n",
                    wordwrap($v, 70 - strlen($indent)))) . "\n";
  }
  $str = trim($str);
  if (empty($str)) return '';

  $block = wordwrap(trim($str), 75 - strlen($indent));
  return "$indent/**\n".
         "$indent * ".
         str_replace(["\n"," \n"], ["\n$indent * ","\n"], $block).
         "\n$indent */\n";
}

function generateFunctionSignature(array $func, string $indent = ''): string {
  $modifiers = empty($func['modifiers'])
             ? '' : (implode(' ', $func['modifiers']) . ' ');
  $ret = "$indent{$modifiers}function {$func['name']}(";
  $argspace = ",\n" . str_repeat(' ', strlen($ret));
  $notfirst = false;
  foreach ($func['args'] as $arg) {
    if ($notfirst) $ret .= $argspace;
    $notfirst = true;
    if (empty($arg['type'])) {
      $ret .= "mixed";
    } else {
      $ret .= $arg['type'];
    }
    $ret .= ' ';
    if ($arg['reference']) {
      $ret .= '&';
    }
    $ret .= "\${$arg['name']}";
    if (!empty($arg['default'])) {
      $ret .= " = {$arg['default']}";
    }
  }
  $ret .= '): ' . (empty($func['return']['type']) ? 'void'
                                                  : $func['return']['type']);
  $annotation = count($func['args']) > MAX_BUILTIN_ARGS
              ? '<<__Native("ActRec")>>' : '<<__Native>>';
  return "$indent$annotation\n$ret;\n\n";
}

function outputSystemlib(string $dest, array $funcs, array $classes):void {
  $fp = fopen($dest, 'w');
  fwrite($fp, "<?hh\n");
  fwrite($fp, "// @"."generated by docskel.php\n\n");
  foreach($classes as $class) {
    if (!empty($class['intro'])) {
      fwrite($fp, generateDocComment($class['intro']));
    }
    fwrite($fp, "class {$class['name']}");
    if (!empty($class['extends'])) {
      fwrite($fp, " extends {$class['extends']}");
    }
    if (!empty($class['implements'])) {
      fwrite($fp, " implements " . implode(', ', $class['implements']));
    }
    fwrite($fp, " {\n");
    if (!empty($class['functions'])) {
      foreach($class['functions'] as $func) {
        fwrite($fp, generateDocComment($func['desc'], $func, '  '));
        fwrite($fp, generateFunctionSignature($func, '  '));
      }
    }
    fwrite($fp, "}\n\n");
  }

  foreach($funcs as $func) {
    fwrite($fp, generateDocComment($func['desc'], $func));
    fwrite($fp, generateFunctionSignature($func));
  }
}

function getMethod(string $name, array $classes): array {
  $colon = strpos($name, '::');
  if ($colon ===  false) {
    return array();
  }

  $cname = strtolower(substr($name, 0, $colon));
  $mname = strtolower(substr($name, $colon + 2));
  if (isset($classes[$cname]['functions'][$mname])) {
    return $classes[$cname]['functions'][$mname];
  }
  return array();
}

function generateCPPStub(array $func, array $classes): string {
  $typemap = [
    // type =>     [return,     param,              actrec]
    'bool' =>      ['bool',     'bool',             'KindOfBoolean'],
    'int' =>       ['int64_t',  'int64_t',          'KindOfInt64'],
    'float' =>     ['double',   'double',           'KindOfDouble'],
    'string' =>    ['String',   'const String&',    'KindOfString'],
    'array' =>     ['Array',    'const Array&',     'KindOfArray'],
    'object' =>    ['Object',   'const Object&',    'KindOfObject'],
    'resource' =>  ['Resource', 'const Resource&',  'KindOfResource'],
    'mixed' =>     ['Variant',  'const Variant&',   'KindOfAny'],
    'void' =>      ['void'],
    'reference' => ['Variant',  'VRefParam',        'KindOfRef'],
  ];

  $actrec = count($func['args']) > MAX_BUILTIN_ARGS;
  $alias = !empty($func['class']) || empty($func['alias'])
         ? null : getMethod($func['alias'], $classes);

  // return type
  $ret = 'static ';
  if ($actrec) {
    $ret .= 'TypedValue*';
  } else if (empty($func['return']['type'])) {
    $ret .= 'void';
  } else if (isset($typemap[$func['return']['type']])) {
    $ret .= $typemap[$func['return']['type']][0];
  } else {
    $ret .= 'Object';
  }

  // function name
  if (empty($func['class'])) {
    $type = $actrec ? 'HHVM_FN' : 'HHVM_FUNCTION';
    $ret .= " $type({$func['name']}";
  } else {
    if ($actrec) {
      $type = in_array('static', $func['modifiers'])
            ? 'HHVM_STATIC_MN' : 'HHVM_MN';
    } else {
      $type = in_array('static', $func['modifiers'])
            ? 'HHVM_STATIC_METHOD' : 'HHVM_METHOD';
    }
    $ret .= " $type({$func['class']}, {$func['name']}";
  }

  // arguments
  $args = $actrec ? "  auto this_ = ar_->m_this;\n" : '';
  foreach(array_values($func['args']) as $index => $arg) {
    if ($arg['reference']) {
      $type = $typemap['reference'];
    } else {
      $type = idx($typemap, $arg['type'], $typemap['object']);
    }
    if ($actrec) {
      $args .= "  auto {$arg['name']} = getArg<{$type[2]}>(ar_, $index);\n";
    } else {
      $args .= ", {$type[1]} {$arg['name']}";
    }
  }

  if (!$actrec) {
    $ret .= "$args) {\n";
  } else if (!$alias) {
    $ret .= ')(ActRec* ar_) {'."\n$args\n";
  } else {
    $type = in_array('static', $alias['modifiers'])
          ? 'HHVM_STATIC_MN' : 'HHVM_MN';
    $ret .= <<<CPP
)(ActRec* ar_) {
  return $type({$alias['class']}, {$alias['name']})(ar_);
}


CPP;
    return $ret;
  }

  // body
  if (!$alias) {
    $qualified_name = empty($func['class']) ? '' : "{$func['class']}::";
    $qualified_name .= $func['name'];
    $ret .= <<<CPP
  throw_not_implemented("$qualified_name");
}


CPP;
    return $ret;
  }

  // alias
  $ret .= "  ";
  if (!empty($func['return']['type']) &&
      ($func['return']['type'] != 'void')) {
    $ret .= 'return ';
  }
  $comma = false;
  if (in_array('static', $alias['modifiers'])) {
    $ret .= "HHVM_STATIC_MN({$alias['class']}, {$alias['name']})".
            "(Unit::lookupClass(s_{$alias['class']}.get())";
    $comma = true;
  } else {
    $ret .= "HHVM_MN({$alias['class']}, {$alias['name']})(";
  }

  foreach($func['args'] as $arg) {
    if ($comma) $ret .= ', ';
    $comma = true;
    $ret .= $arg['name'];
  }

  return "$ret);\n}\n\n";
}

function outputExtensionCPP(string $dest, string $extname,
                            array $funcs, array $classes): void {
  $fp = fopen($dest, 'w');
  fwrite($fp, "#include \"hphp/runtime/ext/extension.h\"\n");
  fwrite($fp, "namespace HPHP {\n");

  foreach($classes as $class) {
    fwrite($fp, "const StaticString s_{$class['name']}".
                "(\"{$class['name']}\");\n");
    if (empty($class['functions'])) continue;
    fwrite($fp, str_repeat('/', 78) . "\n// class {$class['name']}\n\n");
    foreach($class['functions'] as $func) {
      fwrite($fp, generateCPPStub($func, $classes));
    }
  }

  if (!empty($funcs)) {
    fwrite($fp, str_repeat('/', 78) . "\n// functions\n\n");
    foreach($funcs as $func) {
      fwrite($fp, generateCPPStub($func, $classes));
    }
  }

  fwrite($fp, str_repeat('/', 78) . "\n\n");
  fwrite($fp, "static class {$extname}Extension final : public Extension {\n");
  fwrite($fp, " public:\n");
  fwrite($fp, "  {$extname}Extension() : Extension(\"{$extname}\") {}\n");
  fwrite($fp, "  void moduleInit() override {\n");

  foreach($classes as $class) {
    if (empty($class['functions'])) continue;
    foreach($class['functions'] as $func) {
      $type = in_array('static', $func['modifiers'])
            ? 'HHVM_STATIC_ME' : 'HHVM_ME';
      fwrite($fp, "    $type({$func['class']}, {$func['name']});\n");
    }
  }

  foreach($funcs as $func) {
    if (empty($func['name'])) continue;
    fwrite($fp, "    HHVM_FE({$func['name']});\n");
  }

  fwrite($fp, "    loadSystemlib();\n");
  fwrite($fp, "  }\n");
  fwrite($fp, "} s_{$extname}_extension;\n\n");
  fwrite($fp, "// Uncomment for non-bundled module\n");
  fwrite($fp, "//HHVM_GET_MODULE(${extname});\n\n");
  fwrite($fp, str_repeat('/', 78) . "\n");
  fwrite($fp, "} // namespace HPHP\n");
}

if (empty($_SERVER['argv'][2])) {
  fwrite(STDERR, "Usage: {$_SERVER['argv'][0]} <phpdoc-root> <extname> ".
                 "[ exname.cpp [ extname.php ] ]\n");
  exit;
}

$extname = $_SERVER['argv'][2];
$ext = new HHVMDocExtension($extname, $_SERVER['argv'][1]);
$cppfile = empty($_SERVER['argv'][3])
         ? "$extname.cpp" : $_SERVER['argv'][3];
$phpfile = empty($_SERVER['argv'][4])
         ? "$extname.php" : $_SERVER['argv'][4];

if (!preg_match('@^[a-zA-Z0-9_\.-]+$@', $extname)) {
  die("Invalid extension name: $extname\n");
}
$ext->setVerbose(true);

outputSystemlib($phpfile,
                $ext->getFunctions(),
                $ext->getClasses());
outputExtensionCPP($cppfile, $extname,
                   $ext->getFunctions(),
                   $ext->getClasses());
