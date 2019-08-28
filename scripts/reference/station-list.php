<?php

use TrainjunkiesPackages\DarwinWebservice\ClientFactory;

require __DIR__ . '/../include.php';

try {
    $result = ClientFactory::create(openldbs_token())->getStationList();

    foreach ($result->GetStationListResult->StationList->Station as $station) {
        echo $station->_ . PHP_EOL;
    }

}
catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    die(1);
}
