<?hh

// Copyright 2004-present Facebook. All Rights Reserved.

<<__EntryPoint>>
function main_parse_str() {
parse_str('123=value&456[]=foo+bar&789[]=baz', &$output);
var_dump($output);
}
