<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl;

use TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl\Source;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceSpec extends ObjectBehavior
{
    const PUBLIC_WSDL = 'https://lite.realtime.nationalrail.co.uk/OpenLDBWS/wsdl.aspx';
    const REFERENCE_WSDL = 'wsdl/reference.wsdl';
    const STAFF_WSDL = 'wsdl/staff.wsdl';

    public function __let()
    {
        $baseDir = __DIR__;

        $this->beConstructedWith($baseDir);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Source::class);
    }

    function it_has_wsdl_sources()
    {
        $this->publicWSDL()->shouldBe(self::PUBLIC_WSDL);
        $this->referenceWSDL()->shouldBe(self::REFERENCE_WSDL);
        $this->staffWSDL()->shouldBe(self::STAFF_WSDL);
    }
}
