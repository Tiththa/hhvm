<?hh

class C<reify Ta, <<__Soft>> reify Tb> {
  public function f() {
    return 1 is Tb;
  }
}

$c = new C<int, string>();
$c->f<int, string>();
