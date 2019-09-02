<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap;

use TrainjunkiesPackages\DarwinWebservice\Soap\Classmap;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCode;

class ClassmapSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Classmap::class);
    }

    function it_has_individual_mappings()
    {
        $this->classmap('GetReasonCodeResponseType')->shouldBe(
            $this->expectedMappings('GetReasonCodeResponseType')
        );
    }

    function it_has_complete_mappings()
    {
        $this->mappings()->shouldBe($this->expectedMappings());
    }

    private function expectedMappings($key = null)
    {
        $mappings = [
            'GetReasonCodeResponseType' => ReasonCode::class
        ];

        if($key !== null) {
            return [$key => $mappings[$key]];
        }

        return $mappings;
    }
}
