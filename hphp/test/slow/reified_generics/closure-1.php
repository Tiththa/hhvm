<?hh

class C {
  public function f() {
    var_dump("yep!");
  }
}

function f<reify T1>() {
  $x = () ==> {
    $c = new T1();
    $c->f();
  };
  $x();
}

f<C>();
