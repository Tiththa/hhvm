<?php

error_reporting(E_ALL);

function foo($arg) {
}

function bar() {
	throw new Exception("test");
}
	
try {
	@foo(@bar());
} catch (Exception $e) {
}

var_dump(error_reporting());

echo "Done\n";
