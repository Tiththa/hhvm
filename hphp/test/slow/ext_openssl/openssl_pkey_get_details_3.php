<?php

$key = <<<EOF
-----BEGIN PUBLIC KEY-----
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
UtKU+GNOjOgR2xYv12w=
-----END PUBLIC KEY-----
EOF;

print $key;
$res = openssl_pkey_get_public($key);
include __DIR__.'/recursive.inc';
var_dump(openssl_pkey_get_bin2hex_details($res));
