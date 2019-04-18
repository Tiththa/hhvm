<?php
/* Prototype  : array class_implements(mixed what [, bool autoload ])
 * Description: Return all classes and interfaces implemented by SPL 
 * Source code: ext/spl/php_spl.c
 * Alias to functions: 
 */

echo "*** Testing class_implements() : basic ***\n";


interface foo { }
class bar implements foo {}

var_dump(class_implements(new bar));
var_dump(class_implements('bar'));


echo "===DONE===\n";
