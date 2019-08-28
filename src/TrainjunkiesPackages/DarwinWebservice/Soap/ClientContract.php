<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

interface ClientContract
{
    public function setWSDL($wsdl);

    public function getWSDL();

    public function setOptions($options);

    public function getOptions();

    public function addHeader($header);

    public function getHeaders();

    public function getSoapClient();

    public function call($functionName, $arguments);
}
