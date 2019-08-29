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

    use Reference;
    use Staff;

    public function __construct(
        RequestAdapter $requestAdapter,
        Source $wsdlSource
    ) {
        $this->requestAdapter = $requestAdapter;
        $this->wsdlSource = $wsdlSource;
    }
}
