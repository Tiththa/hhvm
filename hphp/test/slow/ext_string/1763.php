<?php


<<__EntryPoint>>
function main_1763() {
error_reporting(0);
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', array(0)));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', array(0), 3));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', array(0), 1.0));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', array(0), null));
$obj = new stdClass();
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', 0, $obj));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', '0', '1.0'));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', '0.0', 1.0));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', '0.0', 1));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob', 0.0, '1'));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', 'bob',                        array(0), array(1)));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', array('bob'),                        array(0), array(3,4)));
var_dump(substr_replace('ABCDEFGH:/MNRPQR/', array('bob'),                        array(0), array(3)));
var_dump(substr_replace(array('ABCDEFGH:/MNRPQR/'), array(),                        array(0,1), array(3, 4)));
var_dump(substr_replace(array('ABCDEFGH:/MNRPQR/'), array('bob'),                        array(0,1), array(3)));
var_dump(substr_replace(array('ABCDEFGH:/MNRPQR/'),                        array('bob', 'cat'), 0));
var_dump(substr_replace(array('ABCDEFGH:/MNRPQR/'),                        array('bob'), array(0,1)));
var_dump(substr_replace('abc', 'xyz', 3, 0));
var_dump(sscanf("SN/2350001", "SN/%d"));
var_dump(sscanf("SN/2350001", "SN/%d", &$out));
var_dump($out);
var_dump(sscanf("SN/abc", "SN/%d", &$out));
var_dump($out);
var_dump(sscanf("30", "%da", &$out));
var_dump($out);
var_dump(sscanf("-", "%da", &$out));
var_dump($out);
}
