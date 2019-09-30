<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Soap\Response\GetBoardWithDetailsResult;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GetBoardWithDetailsResultSpec extends ObjectBehavior
{
    const LOCATIONNAME = 'Macclesfield';
    const CRS = 'MAC';
    const STATION_MANAGER = 'Virgin Trains';
    const STATION_MANAGER_CODE = 'VT';

    function let()
    {
        $data = json_decode(json_encode([
            'locationName'       => self::LOCATIONNAME,
            'crs'                => self::CRS,
            'stationManager'     => self::STATION_MANAGER,
            'stationManagerCode' => self::STATION_MANAGER_CODE,
            'nrccMessages' => [
                'message' => [
                    'category'     => 'Station',
                    'severity'     => 'Normal',
                    'xhtmlMessage' => '<P>The Ticket Vending Machines are currently out of order at this station.</P>',
                ]
            ]
        ]));

        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GetBoardWithDetailsResult::class);
    }

    function it_has_location_attributes()
    {
        $this->locationName()->shouldBe(self::LOCATIONNAME);
        $this->crs()->shouldBe(self::CRS);
        $this->stationManager()->shouldBe(self::STATION_MANAGER);
        $this->stationManagerCode()->shouldBe(self::STATION_MANAGER_CODE);
    }
}
