<?php

namespace Tests\Reference;

use PHPUnit\Framework\TestCase;

class ReasonCodeTest extends TestCase
{
    public function test_it_can_get_details_for_a_reason_code()
    {
        $reasonCode = clientFactory()->getReasonCode(501);

        $this->assertObjectHasAttribute('GetReasonCodeResult', $reasonCode);
        $this->assertObjectHasAttribute('code', $reasonCode->GetReasonCodeResult);
        $this->assertObjectHasAttribute('lateReason', $reasonCode->GetReasonCodeResult);
        $this->assertObjectHasAttribute('cancReason', $reasonCode->GetReasonCodeResult);

        $this->assertEquals(501, $reasonCode->GetReasonCodeResult->code);
    }

    function test_it_will_throw_soapFault_when_reason_code_not_found()
    {
        $this->expectException(\SoapFault::class);

        clientFactory()->getReasonCode(1234567890);
    }
}