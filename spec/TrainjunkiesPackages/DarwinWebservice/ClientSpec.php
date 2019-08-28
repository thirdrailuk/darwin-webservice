<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TrainjunkiesPackages\DarwinWebservice\RequestAdapter;
use TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl\Source;

class ClientSpec extends ObjectBehavior
{
    const PUBLIC_WSDL = 'public.wsdl';
    const REFERENCE_WSDL = 'reference.wsdl';
    const STAFF_WSDL = 'staff.wsdl';

    function let(
        RequestAdapter $requestAdapter,
        Source $wsdlSource
    ) {
        $wsdlSource->publicWSDL()->willReturn(self::PUBLIC_WSDL);
        $wsdlSource->referenceWSDL()->willReturn(self::REFERENCE_WSDL);
        $wsdlSource->staffWSDL()->willReturn(self::STAFF_WSDL);

        $this->beConstructedWith($requestAdapter, $wsdlSource);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);
    }

    function it_has_reference_toc_list(
        RequestAdapter $requestAdapter
    ) {

        $this->getTOCList();

        $requestAdapter->dispatch(
            self::REFERENCE_WSDL,
            'GetTOCList'
        )->shouldHaveBeenCalled();
    }
}