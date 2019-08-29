<?php

namespace Tests\Reference;

use PHPUnit\Framework\TestCase;

class ReasonCodeListTest extends TestCase
{
    public function test_it_can_get_a_list_of_reason_codes_and_their_messages()
    {
        $reasonCodeList = clientFactory()->getReasonCodeList();

        $this->assertObjectHasAttribute('GetReasonCodeListResult', $reasonCodeList);
        $this->assertObjectHasAttribute('reason', $reasonCodeList->GetReasonCodeListResult);

        $reasonCodes = $reasonCodeList->GetReasonCodeListResult->reason;

        $this->assertGreaterThan(0, count($reasonCodes));

        foreach ($reasonCodes as $reasonCode) {
            $this->assertObjectHasAttribute('code', $reasonCode);
            $this->assertObjectHasAttribute('lateReason', $reasonCode);
            $this->assertObjectHasAttribute('cancReason', $reasonCode);
        }
    }
}