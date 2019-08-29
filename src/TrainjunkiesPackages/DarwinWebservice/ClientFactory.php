<?php

namespace TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Soap\Factory as SoapFactory;
use TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl\Source;

class ClientFactory
{
    /**
     * @param string    $token
     * @param array     $soapOptions
     *
     * @return Client
     */
    public static function create($token, $soapOptions = [])
    {
        return new Client(
            new RequestAdapter(
                SoapFactory::create($token, $soapOptions)
            ),
            new Source
        );
    }
}
