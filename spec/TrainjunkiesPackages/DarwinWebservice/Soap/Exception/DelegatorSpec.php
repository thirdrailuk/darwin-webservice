<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Exception;

use TrainjunkiesPackages\DarwinWebservice\Soap\Exception\Delegator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TrainjunkiesPackages\DarwinWebservice\Soap\Exception\RateLimit;
use TrainjunkiesPackages\DarwinWebservice\Soap\Exception\Unauthorized;

class DelegatorSpec extends ObjectBehavior
{
    const FAULT_CODE = 'HTTP';
    const UNAUTHORIZED = 'Unauthorized';
    const FORBIDDEN = 'Forbidden';

    function it_can_handle_unauthorized_requests(
        \SoapFault $soapFault
    ) {
        $soapFault->faultstring = self::UNAUTHORIZED;
        $soapFault->faultcode = self::FAULT_CODE;

        $this->beConstructedFromSoapFault($soapFault);
        $this->shouldThrow(Unauthorized::class)->duringThrows();

    }

    function it_can_handle_rate_limited_requests(
        \SoapFault $soapFault
    ) {
        $soapFault->faultstring = self::FORBIDDEN;
        $soapFault->faultcode = self::FAULT_CODE;

        $this->beConstructedFromSoapFault($soapFault);
        $this->shouldThrow(RateLimit::class)->duringThrows();
    }

    function it_can_rethrow_generic_soap_faults(
        \SoapFault $soapFault
    ) {
        $this->beConstructedFromSoapFault($soapFault);
        $this->shouldThrow(\SoapFault::class)->duringThrows();
    }

}
