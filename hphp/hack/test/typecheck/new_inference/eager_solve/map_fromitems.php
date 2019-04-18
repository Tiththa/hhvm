<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.


class MyMap<Tk, Tv> {
  public function at(Tk $key):Tv {
    //UNSAFE
  }
  public static function fromItems(?Traversable<Pair<Tk, Tv>> $items)
    : MyMap<Tk, Tv> {
  //UNSAFE
  }
}

function my_fromItems<Tk,Tv>(?Traversable<Pair<Tk, Tv>> $items)
  : MyMap<Tk, Tv> {
//UNSAFE
}

class C {
  public function foo():void { }
}
function testit1(Vector<Pair<string, ?C>> $v):void {
  $v = Vector{Pair{"a", new C()}};
  $m = my_fromItems($v);
  $x = $m->at("a");
  $x->foo();
}

function testit2(Vector<Pair<string, ?C>> $v):void {
  $v = Vector{Pair{"a", new C()}};
  $m = MyMap::fromItems($v);
  $x = $m->at("a");
  $x->foo();
}
