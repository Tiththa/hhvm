<?php

require_once 'nowdoc.inc';
                     
print <<<'ENDOFNOWDOC'
This is nowdoc test #s $a, {$b}, {$c['c']}, and {$d->d}.

ENDOFNOWDOC;

$x = <<<'ENDOFNOWDOC'
This is nowdoc test #s $a, {$b}, {$c['c']}, and {$d->d}.

ENDOFNOWDOC;

print "{$x}";

