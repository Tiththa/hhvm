<?php

class stringer {
  public function __toString() { throw new Exception("nope\n"); }
}
class dtor {}

function ignore() {}
function foo() {
  $x = new stringer();
  ignore(new dtor(),  "foo" . $x);
}

try {
  foo();
} catch (Exception $e) {
}

print "all ok\n";
