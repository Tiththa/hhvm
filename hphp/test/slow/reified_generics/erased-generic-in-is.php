<?hh

class A<T> {}
class B<T> {}

function f<T>($x) {
  return $x is A<B<T>>;
}

var_dump(f<int>(1));


/*
function f<reify Ta, reify Tb>(Ta $x): Tb {
  echo "yep\n";
  return 1;
}

f<string, int>("hi"); // pass
f<int, int>("hi"); // param fail
 */
