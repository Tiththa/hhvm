<?php



<<__EntryPoint>>
function main_1019() {
$i = 0;
 print ++$i;
 print "\t";
 print (array('a')<=true) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=true) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = true;
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= true	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=false) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=false) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = false;
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= false	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=1) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=1) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = 1;
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= 1	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=0) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=0) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = 0;
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= 0	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=-1) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=-1) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = -1;
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= -1	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<='1') ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <='1') ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = '1';
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= '1'	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<='0') ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <='0') ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = '0';
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= '0'	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<='-1') ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <='-1') ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = '-1';
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= '-1'	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=null) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=null) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = null;
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= null	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array()) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array()) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array();
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array()	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array(1)) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array(1)) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array(1);
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array(1)	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array(2)) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array(2)) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array(2);
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array(2)	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array('1')) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array('1')) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array('1');
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array('1')	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array('0' => '1')) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array('0' => '1')) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array('0' => '1');
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array('0' => '1')	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array('a')) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array('a')) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array('a');
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array('a')	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array('a' => 1)) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array('a' => 1)) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array('a' => 1);
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array('a' => 1)	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array('b' => 1)) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array('b' => 1)) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array('b' => 1);
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array('b' => 1)	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array('a' => 1, 'b' => 2)) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array('a' => 1, 'b' => 2)) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array('a' => 1, 'b' => 2);
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array('a' => 1, 'b' => 2)	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array(array('a' => 1))) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array(array('a' => 1))) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array(array('a' => 1));
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array(array('a' => 1))	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<=array(array('b' => 1))) ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <=array(array('b' => 1))) ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = array(array('b' => 1));
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= array(array('b' => 1))	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<='php') ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <='php') ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = 'php';
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= 'php'	";
 print "\n";
 print ++$i;
 print "\t";
 print (array('a')<='') ? 'Y' : 'N';
 $a = 1;
 $a = 't';
 $a = array('a');
 print ($a <='') ? 'Y' : 'N';
 $b = 1;
 $b = 't';
 $b = '';
 print (array('a')<=$b) ? 'Y' : 'N';
 print ($a <=$b) ? 'Y' : 'N';
 print "\t";
 print "array('a') <= ''	";
 print "\n";
}
