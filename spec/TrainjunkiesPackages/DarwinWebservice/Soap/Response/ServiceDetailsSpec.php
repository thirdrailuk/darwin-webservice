<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Collection;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ServiceDetails;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceDetailsSpec extends ObjectBehavior
{
    const RID = '201910018038689';
    const UID = 'P38689';
    const TRAINID = '1V57';
    const SDD = '2019-10-01';
    const OPERATOR = 'CrossCountry';
    const OPERATORCODE = 'XC';
    const SERVICETYPE = 'train';
    const CATEGORY = 'XX';

    function let()
    {
        $data = array(
            'generatedAt'  => '2019-10-01T13:26:07.242431+01:00',
            'rid'          => self::RID,
            'uid'          => self::UID,
            'trainid'      => self::TRAINID,
            'sdd'          => self::SDD,
            'operator'     => self::OPERATOR,
            'operatorCode' => self::OPERATORCODE,
            'serviceType'  => self::SERVICETYPE,
            'category'     => self::CATEGORY,
            'locations'    => array(
                'location' => []
            ),
            'formation'    => array(
                'fmloc' => array(
                    0  => array(
                        'coaches' => array(),
                        'tiploc'  => 'MNCRPIC ',
                    ),
                    1  => array(
                        'coaches' => array(),
                        'tiploc'  => 'STKP    ',
                    ),
                    2  => array(
                        'coaches' => array(),
                        'tiploc'  => 'MACLSFD ',
                    ),
                    12 => array(
                        'coaches' => array(),
                        'tiploc'  => 'EXETRSD '
                    )
                )
            )
        );

        $data = json_decode(json_encode($data));

        $data->locations->location = array(
            0  => (object) array(
                'platform'        => '4',
                'std'             => '2019-10-01T13:05:00',
                'atd'             => '2019-10-01T13:05:47',
                'departureType'   => 'Actual',
                'departureSource' => '',
                'lateness'        => '47',
                'locationName'    => 'Manchester Piccadilly',
                'tiploc'          => 'MNCRPIC ',
                'crs'             => 'MAN',
                'associations'    => array(
                    'association' => array(
                        'category'     => 'next',
                        'rid'          => '201910018038264',
                        'uid'          => 'P38264',
                        'trainid'      => '1M30',
                        'sdd'          => '2019-10-01',
                        'origin'       => 'Bournemouth',
                        'originCRS'    => 'BMH',
                        'originTiploc' => 'BOMO    ',
                        'destination'  => 'Manchester Piccadilly',
                        'destCRS'      => 'MAN',
                        'destTiploc'   => 'MNCRPIC '
                    ),
                ),
                'activities'      => 'TB          ',
            ),
            1  => (object)array(
                'isPass'           => true,
                'platformIsHidden' => true,
                'std'              => '2019-10-01T13:07:00',
                'atd'              => '2019-10-01T13:08:05',
                'departureType'    => 'Actual',
                'departureSource'  => '',
                'lateness'         => '60',
                'locationName'     => 'ARDWCKJ',
                'tiploc'           => 'ARDWCKJ ',
                'activities'       => '            ',
            ),
            2  => (object)array(
                'isPass'           => true,
                'platformIsHidden' => true,
                'std'              => '2019-10-01T13:08:30',
                'atd'              => '2019-10-01T13:09:44',
                'departureType'    => 'Actual',
                'departureSource'  => '',
                'lateness'         => '60',
                'locationName'     => 'SLDLJN',
                'tiploc'           => 'SLDLJN  ',
                'activities'       => '            ',
            ),
            3  => (object)array(
                'isPass'           => true,
                'platformIsHidden' => true,
                'std'              => '2019-10-01T13:09:00',
                'departureType'    => 'NoLog',
                'locationName'     => 'Levenshulme',
                'tiploc'           => 'LVHM    ',
                'crs'              => 'LVM',
                'activities'       => '            ',
            ),
            4  => (object)array(
                'isPass'           => true,
                'platformIsHidden' => true,
                'std'              => '2019-10-01T13:09:30',
                'departureType'    => 'NoLog',
                'locationName'     => 'Heaton Chapel',
                'tiploc'           => 'HTCP    ',
                'crs'              => 'HTC',
                'activities'       => '            ',
            ),
            5  => (object)array(
                'isPass'           => true,
                'platformIsHidden' => true,
                'std'              => '2019-10-01T13:10:30',
                'atd'              => '2019-10-01T13:11:57',
                'departureType'    => 'Actual',
                'departureSource'  => '',
                'lateness'         => '60',
                'locationName'     => 'HTNOJN',
                'tiploc'           => 'HTNOJN  ',
                'activities'       => '            ',
            ),
            6  => (object)array(
                'platform'        => '2',
                'sta'             => '2019-10-01T13:12:00',
                'ata'             => '2019-10-01T13:13:19',
                'arrivalType'     => 'Actual',
                'arrivalSource'   => '',
                'std'             => '2019-10-01T13:13:00',
                'atd'             => '2019-10-01T13:14:16',
                'departureType'   => 'Actual',
                'departureSource' => '',
                'lateness'        => '60',
                'locationName'    => 'Stockport',
                'tiploc'          => 'STKP    ',
                'crs'             => 'SPT',
                'activities'      => 'T           ',
            ),
            7  => (object)array(
                'isPass'           => true,
                'platformIsHidden' => true,
                'std'              => '2019-10-01T13:14:30',
                'atd'              => '2019-10-01T13:15:42',
                'departureType'    => 'Actual',
                'departureSource'  => '',
                'lateness'         => '60',
                'locationName'     => 'STKPE1',
                'tiploc'           => 'STKPE1  ',
                'activities'       => '            ',
            ),
            14 => (object)array(
                'platform'        => '2',
                'sta'             => '2019-10-01T13:25:00',
                'ata'             => '2019-10-01T13:25:53',
                'arrivalType'     => 'Actual',
                'arrivalSource'   => '',
                'std'             => '2019-10-01T13:26:00',
                'etd'             => '2019-10-01T13:26:53',
                'departureType'   => 'Forecast',
                'departureSource' => '',
                'lateness'        => '53',
                'locationName'    => 'Macclesfield',
                'tiploc'          => 'MACLSFD ',
                'crs'             => 'MAC',
                'activities'      => 'T           ',
            ),
            83 => (object)array(
                'isPass'           => true,
                'platformIsHidden' => true,
                'std'              => '2019-10-01T17:08:00',
                'etd'              => '2019-10-01T17:06:30',
                'departureType'    => 'Forecast',
                'departureSource'  => '',
                'locationName'     => 'CWLYBDG',
                'tiploc'           => 'CWLYBDG ',
                'activities'       => '            ',
            ),
            84 => (object)array(
                'platform'      => '6',
                'sta'           => '2019-10-01T17:10:00',
                'eta'           => '2019-10-01T17:10:00',
                'arrivalType'   => 'Forecast',
                'arrivalSource' => '',
                'locationName'  => 'Exeter St Davids',
                'tiploc'        => 'EXETRSD ',
                'crs'           => 'EXD',
                'associations'  => array(
                    'association' => array(
                        'category'     => 'next',
                        'rid'          => '201910018038328',
                        'uid'          => 'P38328',
                        'trainid'      => '1M69',
                        'sdd'          => '2019-10-01',
                        'origin'       => 'Exeter St Davids',
                        'originCRS'    => 'EXD',
                        'originTiploc' => 'EXETRSD ',
                        'destination'  => 'Manchester Piccadilly',
                        'destCRS'      => 'MAN',
                        'destTiploc'   => 'MNCRPIC ',
                    )
                ),
                'activities'    => 'TF          '
            )
        );

        $this->beConstructedWith($data);

    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceDetails::class);
    }

    function it_has_service_attributes()
    {
        $this->rid()->shouldBe(self::RID);
        $this->uid()->shouldBe(self::UID);
        $this->trainId()->shouldBe(self::TRAINID);
        $this->sdd()->shouldBe(self::SDD);
        $this->operator()->shouldBe(self::OPERATOR);
        $this->operatorCode()->shouldBe(self::OPERATORCODE);
        $this->serviceType()->shouldBe(self::SERVICETYPE);
        $this->category()->shouldBe(self::CATEGORY);
    }

    function it_has_locations()
    {
        $result = $this->serviceLocations();
        $result->shouldBeAnInstanceOf(Collection::class);

        $origin = $result[0];
        $origin->crs()->shouldBe('MAN');
    }
}
