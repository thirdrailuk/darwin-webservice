<?php

use TrainjunkiesPackages\DarwinWebservice\ClientFactory;

require __DIR__ . '/../include.php';

try {
    $result = ClientFactory::create(openldbs_token())->getReasonCode(501);
}
catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    die(1);
}
