<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap;

use TrainjunkiesPackages\DarwinWebservice\Soap\Classmap;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\GetBoardWithDetailsResult;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCode;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCodeList;

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
            'GetReasonCodeResponseType'              => ReasonCode::class,
            'GetReasonCodeListResponseType'          => ReasonCodeList::class,
            'GetStationBoardWithDetailsResponseType' => GetBoardWithDetailsResult::class
        ];

        if($key !== null) {
            return [$key => $mappings[$key]];
        }

        return $mappings;
    }
}
