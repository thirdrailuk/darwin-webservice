<?php

use TrainjunkiesPackages\DarwinWebservice\ClientFactory;

require __DIR__ . '/../include.php';

try {
    $result = ClientFactory::create(openldbs_token())->getReasonCodeList();

    foreach ($result->GetReasonCodeListResult->reason as $reason) {
        var_dump($reason);
    }
}
catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    die(1);
}
