<?php

namespace Tests\Reference;

use PHPUnit\Framework\TestCase;
use TrainjunkiesPackages\DarwinWebservice\Collection;

class ReasonCodeListTest extends TestCase
{
    public function test_it_can_get_a_list_of_reason_codes_and_their_messages()
    {
        $reasonCodeList = clientFactory()->getReasonCodeList();

        $this->assertInstanceOf(Collection::class, $reasonCodeList->reasonCodes());
    }
}