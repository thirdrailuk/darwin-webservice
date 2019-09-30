<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Soap\Response\TrainService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TrainServiceSpec extends ObjectBehavior
{
    const RID = '201909298038476';
    const UID = 'P38476';
    const TRAINID = '1026';
    const RSID = 'XC374100';
    const SDD = '2019-09-29';
    const OPERATOR = 'CrossCountry';
    const OPERATORCODE = 'XC';
    const STA = '2019-09-29T16:48:00';
    const ATA = '2019-09-29T16:47:12';
    const ARRIVALTYPE = 'Actual';
    const STD = '2019-09-29T16:49:00';
    const ETD = '2019-09-29T16:49:00';
    const DEPARTURETYPE = 'Forecast';
    const DEPATURESOURCE = '';
    const PLATFORM = '2';
    const CATEGORY = 'XX';
    const ACTIVITIES = 'T           ';
    const ORIGIN_NAME = 'Manchester Piccadilly';
    const ORIGIN_CRS = 'MAN';
    const ORIGIN_TIPLOC = 'MNCRPIC';
    const DEST_NAME = 'London Euston';
    const DEST_CRS = 'EUS';
    const DEST_TIPLOC = 'EUSTON';
    const CANCEL_REASON = 574;

    function let()
    {
        $service = new \stdClass;
        $service->rid = self::RID;
        $service->uid = self::UID;
        $service->trainid = self::TRAINID;
        $service->rsid = self::RSID;
        $service->sdd = self::SDD;
        $service->operator = self::OPERATOR;
        $service->operatorCode = self::OPERATORCODE;
        $service->sta = self::STA;
        $service->ata  = self::ATA;
        $service->arrivalType = self::ARRIVALTYPE;
        $service->std = self::STD;
        $service->etd = self::ETD;
        $service->departureType = self::DEPARTURETYPE;
        $service->departureSource = self::DEPATURESOURCE;
        $service->platform = self::PLATFORM;
        $service->category = self::CATEGORY;
        $service->activities = self::ACTIVITIES;

        $service->origin = json_decode(json_encode([
            'location' => [
                'locationName' => self::ORIGIN_NAME,
                'crs'          => self::ORIGIN_CRS,
                'tiploc'       => self::ORIGIN_TIPLOC
            ]
        ]));

        $service->destination = json_decode(json_encode([
            'location' => [
                'locationName' => self::DEST_NAME,
                'crs'          => self::DEST_CRS,
                'tiploc'       => self::DEST_TIPLOC
            ]
        ]));

        $service->cancelReason = json_decode(json_encode(
           ['_' => self::CANCEL_REASON]
        ));

        $this->beConstructedFromStdClass($service);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TrainService::class);
    }

    function it_has_service_attributes()
    {
        $this->rid()->shouldBe(self::RID);
        $this->uid()->shouldBe(self::UID);
        $this->trainId()->shouldBe(self::TRAINID);
        $this->rsid()->shouldBe(self::RSID);
        $this->sdd()->shouldBe(self::SDD);
        $this->operator()->shouldBe(self::OPERATOR);
        $this->operatorCode()->shouldBe(self::OPERATORCODE);
        $this->sta()->shouldBe(self::STA);
        $this->ata()->shouldBe(self::ATA);
        $this->arrivalType()->shouldBe(self::ARRIVALTYPE);
        $this->std()->shouldBe(self::STD);
        $this->etd()->shouldBe(self::ETD);
        $this->departureType()->shouldBe(self::DEPARTURETYPE);
        $this->departureSource()->shouldBe(self::DEPATURESOURCE);
        $this->platform()->shouldBe(self::PLATFORM);
        $this->category()->shouldBe(self::CATEGORY);
        $this->activities()->shouldBe(self::ACTIVITIES);
        $this->length()->shouldBe(null);
        $this->originName()->shouldBe(self::ORIGIN_NAME);
        $this->originCrs()->shouldBe(self::ORIGIN_CRS);
        $this->originTiploc()->shouldBe(self::ORIGIN_TIPLOC);
        $this->destinationName()->shouldBe(self::DEST_NAME);
        $this->destinationCrs()->shouldBe(self::DEST_CRS);
        $this->destinationTiploc()->shouldBe(self::DEST_TIPLOC);
        $this->cancelReason()->shouldBe(self::CANCEL_REASON);
    }
}
