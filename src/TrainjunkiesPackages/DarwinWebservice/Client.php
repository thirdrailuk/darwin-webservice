<?php

namespace TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl\Source;

class Client
{
    /**
     * @var RequestAdapter
     */
    private $requestAdapter;
    /**
     * @var Source
     */
    private $wsdlSource;

    public function __construct(
        RequestAdapter $requestAdapter,
        Source $wsdlSource
)
    {
        $this->requestAdapter = $requestAdapter;
        $this->wsdlSource = $wsdlSource;
    }

    public function getTOCList()
    {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->referenceWSDL(),
                'GetTOCList'
            );
    }
}
