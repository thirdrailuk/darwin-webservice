<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCode;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReasonCodeSpec extends ObjectBehavior
{
    const CODE = 501;
    const CANCELLED = 'Cancelled';
    const LATE = 'Late';

    function let()
    {
        $response = new \stdClass;
        $response->code = self::CODE;
        $response->cancReason = self::CANCELLED;
        $response->lateReason = self::LATE;

        $this->beConstructedWith($response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ReasonCode::class);
    }

    function it_has_a_reason_code()
    {
        $this->code()->shouldBe(self::CODE);
    }

    function it_has_a_cancelled_message()
    {
        $this->cancelledReason()->shouldBe(self::CANCELLED);
    }

    function it_has_a_late_message()
    {
        $this->lateReason()->shouldBe(self::LATE);
    }
}
