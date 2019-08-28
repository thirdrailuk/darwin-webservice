<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl;

class Source
{
    public function __construct($baseDirectory = null)
    {
        $this->baseDirectory = ($baseDirectory)
            ? $baseDirectory
            : realpath(__DIR__ . '/../../../../../');
    }

    public function publicWSDL()
    {
        return 'https://lite.realtime.nationalrail.co.uk/OpenLDBWS/wsdl.aspx';
    }

    public function referenceWSDL()
    {
        return 'wsdl/reference.wsdl';
    }

    public function staffWSDL()
    {
        return 'wsdl/staff.wsdl';
    }
}
