<?php

use TrainjunkiesPackages\DarwinWebservice\ClientFactory;

include __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('UTC');

function openldbs_token()
{
    return getenv('OPENLDBS_TOKEN');
}

function clientFactory()
{
    return ClientFactory::create(openldbs_token());
}
