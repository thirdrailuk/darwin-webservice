<?php

include __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('UTC');

function openldbs_token()
{
    return getenv('OPENLDBS_TOKEN');
}

function soap_header($token)
{
    return new \SoapHeader(
        "http://thalesgroup.com/RTTI/2010-11-01/ldb/commontypes",
        "AccessToken",
        new \SoapVar(
            [
                "ns2:TokenValue" => $token
            ],
            SOAP_ENC_OBJECT
        ),
        false
    );
}

function openldbs_client($client = 'default')
{
    $client = new \TrainjunkiesPackages\DarwinWebservice\Soap\CommonClient(
        null,
        []
    );

    if($client !== 'default') {
        $client = new \TrainjunkiesPackages\DarwinWebservice\Soap\ZendClient(
            null,
            []
        );
    }

    return $client
        ->addHeader(
            soap_header(openldbs_token())
        )
        ->setOptions(
            [
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
                'cache_wsdl'  => WSDL_CACHE_MEMORY
            ]
        );
}
