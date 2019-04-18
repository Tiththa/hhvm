<?php
/* Prototype  : array class_implements(mixed what [, bool autoload ])
 * Description: Return all classes and interfaces implemented by SPL 
 * Source code: ext/spl/php_spl.c
 * Alias to functions: 
 */

echo "*** Testing class_implements() : basic ***\n";


interface foo { }
class fooImpl implements foo {}

interface bar { }
class barImpl implements bar {}

class foobarImpl implements foo, bar {}

class fooViaBarImpl extends barImpl implements foo {}

class fooExtended extends fooImpl {}

s_var_dump(class_implements(new foobarImpl));
s_var_dump(class_implements('foobarImpl'));
s_var_dump(class_implements(new fooViaBarImpl));
s_var_dump(class_implements('fooViaBarImpl'));
s_var_dump(class_implements(new fooExtended));
s_var_dump(class_implements('fooExtended'));


function s_var_dump($arr) {
   krsort(&$arr);
   var_dump($arr);
}
echo "===DONE===\n";
