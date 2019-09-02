<?php

namespace Tests\Reference;

use PHPUnit\Framework\TestCase;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCode;

class ReasonCodeTest extends TestCase
{
    public function test_it_can_get_details_for_a_reason_code()
    {
        /** @var ReasonCode $reasonCode */
        $reasonCode = clientFactory()->getReasonCode(501);

        $this->assertEquals(501, $reasonCode->code());
        $this->assertNotEmpty($reasonCode->cancelledReason());
        $this->assertNotEmpty($reasonCode->lateReason());
    }

    function test_it_will_throw_soapFault_when_reason_code_not_found()
    {
        $this->expectException(\SoapFault::class);

        clientFactory()->getReasonCode(1234567890);
    }
}