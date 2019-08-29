<?php

namespace TrainjunkiesPackages\DarwinWebservice;

trait Staff
{
    public function getArrivalBoardWithDetails(
        $numberOfRows,
        $crs,
        \DateTimeImmutable $time,
        $filterCrs = '',
        $filterType = 'to',
        $timeOffset = 0,
        $timeWindow = 120
    ) {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->staffWSDL(),
                'GetArrBoardWithDetails',
                [
                    'numRows'    => $numberOfRows,
                    'crs'        => $crs,
                    'time'       => $time->format(\DateTime::ATOM),
                    'filterCrs'  => $filterCrs,
                    'filterType' => $filterType,
                    'timeOffset' => $timeOffset,
                    'timeWindow' => $timeWindow,
                ]
            );
    }

    public function getDepartureBoardWithDetails(
        $numberOfRows,
        $crs,
        \DateTimeImmutable $time,
        $filterCrs = '',
        $filterType = 'to',
        $timeOffset = 0,
        $timeWindow = 120
    ) {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->staffWSDL(),
                'GetDepBoardWithDetails',
                [
                    'numRows'    => $numberOfRows,
                    'crs'        => $crs,
                    'time'       => $time->format(\DateTime::ATOM),
                    'filterCrs'  => $filterCrs,
                    'filterType' => $filterType,
                    'timeOffset' => $timeOffset,
                    'timeWindow' => $timeWindow,
                ]
            );
    }
}
