<?php // 1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ

$fp = fopen(__FILE__, 'r'); // Open self

DoTest($fp, 'ZZZ');  // test multi-char delimiter
DoTest($fp, "Z");  // test single-char delimiter

function DoTest($fp, $delim) {
	echo "Delimiter:  " . $delim . "\n";
	rewind($fp);
	echo "\t" . stream_get_line($fp, 10, $delim) . "\n";
	echo "\t" . stream_get_line($fp, 10, $delim) . "\n";
}

