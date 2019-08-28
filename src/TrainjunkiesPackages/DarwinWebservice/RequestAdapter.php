<?php

namespace TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Soap\ClientContract;
use TrainjunkiesPackages\DarwinWebservice\Soap\Exception\Delegator;

class RequestAdapter
{
    /**
     * @var ClientContract
     */
    private $soapClient;

    public function __construct(ClientContract $soapClient)
    {
        $this->soapClient = $soapClient;
    }

    public function dispatch($wsdl, $functionName, $arguments = [])
    {
        try {
            return $this->soapClient
                ->setWSDL($wsdl)
                ->call($functionName, $arguments);
        } catch (\SoapFault $e) {
            Delegator::fromSoapFault($e)->throws();
        }
    }
}
