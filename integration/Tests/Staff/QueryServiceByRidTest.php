<?php

namespace Tests\Reference;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use TrainjunkiesPackages\DarwinWebservice\ClientFactory;
use TrainjunkiesPackages\DarwinWebservice\Collection;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\GetBoardWithDetailsResult;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ServiceDetails;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\TrainService;

class QueryServiceByRidTest extends TestCase
{
    /**
     * @dataProvider getRidValue
     */
    public function test_it_can_query_service_by_rid($rid)
    {
        /** @var ServiceDetails $result */
        $result = clientFactory()->queryServiceByRid($rid);

        $this->assertEquals($rid, $result->rid());
    }

    public function getRidValue()
    {
        return clientFactory()->getDepartureBoardWithDetails(
            2,
            'MAN',
            (new DateTimeImmutable('now'))
        )->trainServices()->map(function ($service) {
            return [$service->rid()];
        })->toArray();
    }
}