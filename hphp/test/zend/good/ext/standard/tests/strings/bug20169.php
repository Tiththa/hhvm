<?php
	@set_time_limit(5);
	$delimiter = "|";

	echo "delimiter: $delimiter\n";
	implode($delimiter, array("foo", "bar"));
	echo "delimiter: $delimiter\n";
