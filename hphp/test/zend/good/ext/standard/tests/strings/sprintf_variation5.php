<?php
/* Prototype  : string sprintf(string $format [, mixed $arg1 [, mixed ...]])
 * Description: Return a formatted string 
 * Source code: ext/standard/formatted_print.c
*/

echo "*** Testing sprintf() : integer formats with resource values ***\n";

// resource type variable
$fp = fopen (__FILE__, "r");
$dfp = opendir ( dirname(__FILE__) );

$fp_copy = $fp;
$dfp_copy = $dfp;
  
// array of resource types
$resource_types = array (
  $fp_copy,
  $dfp_copy
);

// various integer formats
$int_formats = array(
  "%d", "%Ld", " %d",
  "\t%d", "\n%d", "%4d",
  "%[0-9]", "%*d"
);
 
$count = 1;
foreach($resource_types as $res) {
  echo "\n-- Iteration $count --\n";
  
  foreach($int_formats as $format) {
    var_dump( sprintf($format, $res) );
  }
  $count++;
};

// closing the resources
fclose($fp);
closedir($dfp);


echo "Done";
