<?php

namespace Tests\Reference;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use TrainjunkiesPackages\DarwinWebservice\ClientFactory;
use TrainjunkiesPackages\DarwinWebservice\Collection;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\GetBoardWithDetailsResult;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\TrainService;

class GetArrivalBoardWithDetailsTest extends TestCase
{
    public function test_it_can_get_arrivals_for_location()
    {
        /** @var GetBoardWithDetailsResult $result */
        $result = clientFactory()->getArrivalBoardWithDetails(
            10,
            'MAC',
            (new DateTimeImmutable('now'))
        );

        /** @var Collection $trainServices */
        $trainServices = $result->trainServices();

        $this->assertEquals($result->crs(), 'MAC');
        $this->assertEquals($result->locationName(), 'Macclesfield');
        $this->assertInstanceOf(Collection::class, $result->trainServices());

        if ($trainServices->count() > 0) {
            /** @var TrainService $service */
            $service = $trainServices[0];

            $this->assertNotEmpty($service->rid());
            $this->assertNotEmpty($service->uid());
            $this->assertNotEmpty($service->originCrs());
            $this->assertNotEmpty($service->destinationCrs());
        }
    }
}