<?php

namespace Tests\Reference;

use PHPUnit\Framework\TestCase;

class StationListTest extends TestCase
{
    function test_it_can_get_a_list_of_station_names_and_crs_codes()
    {
        $stationList = clientFactory()->getStationList();

        $this->assertObjectHasAttribute('GetStationListResult', $stationList);
        $this->assertObjectHasAttribute('StationList', $stationList->GetStationListResult);
        $this->assertObjectHasAttribute('Station', $stationList->GetStationListResult->StationList);

        $stations = $stationList->GetStationListResult->StationList->Station;

        $this->assertGreaterThan(0, count($stations));

        foreach ($stations as $station) {
            $this->assertObjectHasAttribute('_', $station, 'Station is missing Name Property "_"');
            $this->assertObjectHasAttribute('crs', $station, 'Station is missing CRS code property "crs"');

            $this->assertRegExp(
                '/^[A-Z]{3}$/',
                $station->crs,
                sprintf("Odd CRS code %s in feed", $station->crs)
            );
        }
    }
}
