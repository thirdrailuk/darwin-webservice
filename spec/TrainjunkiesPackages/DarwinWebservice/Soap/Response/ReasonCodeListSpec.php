<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Collection;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCodeList;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReasonCodeListSpec extends ObjectBehavior
{
    function let()
    {
        $reason1 = new \stdClass();
        $reason1->code = 501;
        $reason1->cancReason = 'Cancelled';
        $reason1->lateReason = 'Late';

        $reason2 = new \stdClass();
        $reason2->code = 502;
        $reason2->cancReason = 'Cancelled';
        $reason2->lateReason = 'Late';

        $actual = new \stdClass;
        $actual->reason = [
            $reason1,
            $reason2
        ];

        $this->beConstructedWith($actual);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ReasonCodeList::class);
    }

    function it_has_list_of_reason_codes()
    {
        $result = $this->reasonCodes();
        $result->shouldBeAnInstanceOf(Collection::class);
        $result->shouldHaveCount(2);

        $result[0]->code()->shouldBe(501);
        $result[1]->code()->shouldBe(502);
    }
}
