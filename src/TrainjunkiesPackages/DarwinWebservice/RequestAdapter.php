<?php

namespace TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Soap\ClientContract;

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
        return $this->soapClient
            ->setWSDL($wsdl)
            ->call($functionName, $arguments);
    }
}