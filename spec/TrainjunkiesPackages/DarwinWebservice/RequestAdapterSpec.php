<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\RequestAdapter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TrainjunkiesPackages\DarwinWebservice\Soap\ClientContract;

class RequestAdapterSpec extends ObjectBehavior
{
    const SOAP_FUNCTION = 'soapFunction';
    const SOAP_ARGS = [];
    const ANY_WSDL = 'any.wsdl';

    function let(ClientContract $soapClient)
    {
        $soapClient->setWSDL(Argument::any())->willReturn($soapClient);
        $soapClient->call(Argument::any(), Argument::any())->willReturn($soapClient);

        $this->beConstructedWith($soapClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RequestAdapter::class);
    }

    function it_can_dispatch_requests(
        ClientContract $soapClient
    )
    {
        $this->dispatch(self::ANY_WSDL, self::SOAP_FUNCTION, self::SOAP_ARGS);

        $soapClient->setWSDL(self::ANY_WSDL)->shouldHaveBeenCalled();
        $soapClient->call(self::SOAP_FUNCTION, self::SOAP_ARGS)->shouldHaveBeenCalled();

    }
}
