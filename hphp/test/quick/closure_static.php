<?hh

class A {
  private $c = 1;

  function b() {
    $a = function () {
      var_dump($this);
    };
    $a();

    $a = static function () {
      var_dump($this);
    };
    $a();
  }

  static function c() {
    $a = function () {
      echo "c::\$a\n";
    };
    $a();

    $a = static function () {
      echo "static c::\$a\n";
    };
    $a();
  }
  static function d() {
    var_dump(array_map(function($a) { return $a; }, array(1,2,3)));
  }
}

(new A)->b();
A::b();
(new A)->c();
A::c();
(new A)->d();
A::d();
