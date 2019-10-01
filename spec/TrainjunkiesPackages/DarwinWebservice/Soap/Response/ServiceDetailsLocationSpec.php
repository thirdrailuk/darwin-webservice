<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ServiceDetailsLocation;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceDetailsLocationSpec extends ObjectBehavior
{
    const PLATFORM = '4';
    const STD = '2019-10-01T13:05:00';
    const ATD = '2019-10-01T13:05:47';
    const DEPARTURETYPE = 'Actual';
    const DEPARTURESOURCE = '';
    const LATENESS = '47';
    const LOCATIONNAME = 'Manchester Piccadilly';
    const TIPLOC = 'MNCRPIC ';
    const CRS = 'MAN';
    const ACTIVITIES = 'TB          ';

    function let()
    {
        $location = new \stdClass;
        $location->platform = self::PLATFORM;
        $location->std = self::STD;
        $location->atd = self::ATD;
        $location->departureType = self::DEPARTURETYPE;
        $location->departureSource = self::DEPARTURESOURCE;
        $location->lateness = self::LATENESS;
        $location->locationName = self::LOCATIONNAME;
        $location->tiploc = self::TIPLOC;
        $location->crs = self::CRS;
//            $location->associations    = array;
//                'association' => array(
//                    'category'     => 'next',
//                    'rid'          => '201910018038264',
//                    'uid'          => 'P38264',
//                    'trainid'      => '1M30',
//                    'sdd'          => '2019-10-01',
//                    'origin'       => 'Bournemouth',
//                    'originCRS'    => 'BMH',
//                    'originTiploc' => 'BOMO    ',
//                    'destination'  => 'Manchester Piccadilly',
//                    'destCRS'      => 'MAN',
//                    'destTiploc'   => 'MNCRPIC '
//                ),
//            ),
        $location->activities = self::ACTIVITIES;

        $this->beConstructedFromStdClass($location);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceDetailsLocation::class);
    }

    function it_has_location_attributes()
    {
        $this->platform()->shouldBe(self::PLATFORM);
        $this->std()->shouldBe(self::STD);
        $this->atd()->shouldBe(self::ATD);
        $this->departureType()->shouldBe(self::DEPARTURETYPE);
        $this->departureSource()->shouldBe(self::DEPARTURESOURCE);
        $this->lateness()->shouldBe(self::LATENESS);
        $this->locationName()->shouldBe(self::LOCATIONNAME);
        $this->tiploc()->shouldBe(self::TIPLOC);
        $this->crs()->shouldBe(self::CRS);
        $this->activities()->shouldBe(self::ACTIVITIES);
    }
}
