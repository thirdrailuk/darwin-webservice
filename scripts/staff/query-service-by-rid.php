<?php

use TrainjunkiesPackages\DarwinWebservice\ClientFactory;

require __DIR__ . '/../include.php';

try {
    $rid = $argv[1] ?? null;

    $result = ClientFactory::create(openldbs_token())->queryServiceByRid($rid);

    var_dump($result);
}
catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    die(1);
}
