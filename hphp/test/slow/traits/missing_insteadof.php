<?php
trait T1 {
  function foo() {echo "T1\n";}
}
trait T2x {
  function foo() {echo "T2\n";}
}
class C {
  use T1 {
    T1::foo insteadof T2;
  }
}
