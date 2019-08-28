<?php

namespace TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl\Source;

class Client
{
    /**
     * @var RequestAdapter
     */
    private $requestAdapter;
    /**
     * @var Source
     */
    private $wsdlSource;

    public function __construct(
        RequestAdapter $requestAdapter,
        Source $wsdlSource
    ) {
        $this->requestAdapter = $requestAdapter;
        $this->wsdlSource = $wsdlSource;
    }

    public function getTOCList()
    {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->referenceWSDL(),
                'GetTOCList'
            );
    }

    public function getStationList()
    {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->referenceWSDL(),
                'GetStationList'
            );
    }

    public function getReasonCode($reasonCode)
    {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->referenceWSDL(),
                'GetReasonCode',
                [
                    'reasonCode' => $reasonCode
                ]
            );
    }

    public function getReasonCodeList()
    {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->referenceWSDL(),
                'GetReasonCodeList'
            );
    }

    public function getSourceInstanceNames()
    {
        return $this->requestAdapter
            ->dispatch(
                $this->wsdlSource->referenceWSDL(),
                'GetSourceInstanceNames'
            );
    }

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
}
