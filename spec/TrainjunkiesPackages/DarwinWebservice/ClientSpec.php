<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TrainjunkiesPackages\DarwinWebservice\RequestAdapter;
use TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl\Source;

class ClientSpec extends ObjectBehavior
{
    const PUBLIC_WSDL = 'public.wsdl';
    const REFERENCE_WSDL = 'reference.wsdl';
    const STAFF_WSDL = 'staff.wsdl';

    function let(
        RequestAdapter $requestAdapter,
        Source $wsdlSource
    ) {
        $wsdlSource->publicWSDL()->willReturn(self::PUBLIC_WSDL);
        $wsdlSource->referenceWSDL()->willReturn(self::REFERENCE_WSDL);
        $wsdlSource->staffWSDL()->willReturn(self::STAFF_WSDL);

        $this->beConstructedWith($requestAdapter, $wsdlSource);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);
    }

    function it_has_reference_toc_list(
        RequestAdapter $requestAdapter
    ) {

        $this->getTOCList();

        $requestAdapter->dispatch(
            self::REFERENCE_WSDL,
            'GetTOCList'
        )->shouldHaveBeenCalled();
    }

    function it_has_reference_station_list(
        RequestAdapter $requestAdapter
    ) {

        $this->getStationList();

        $requestAdapter->dispatch(
            self::REFERENCE_WSDL,
            'GetStationList'
        )->shouldHaveBeenCalled();
    }

    function it_has_reason_code(
        RequestAdapter $requestAdapter
    ) {

        $this->getReasonCode(124);

        $requestAdapter->dispatch(
            self::REFERENCE_WSDL,
            'GetReasonCode',
            [
                'reasonCode' => 124
            ]
        )->shouldHaveBeenCalled();
    }

    function it_has_reason_code_list(
        RequestAdapter $requestAdapter
    ) {

        $this->getReasonCodeList();

        $requestAdapter->dispatch(
            self::REFERENCE_WSDL,
            'GetReasonCodeList'
        )->shouldHaveBeenCalled();
    }

    function it_has_source_instance_names(
        RequestAdapter $requestAdapter
    ) {

        $this->getSourceInstanceNames();

        $requestAdapter->dispatch(
            self::REFERENCE_WSDL,
            'GetSourceInstanceNames'
        )->shouldHaveBeenCalled();
    }

    function it_has_an_arrival_board_with_details(
        RequestAdapter $requestAdapter
    ) {
        $time = new \DateTimeImmutable('now');

        $this->getArrivalBoardWithDetails(
            $numRows = 10,
            $crs = 'MAN',
            $time
        );

        $requestAdapter->dispatch(
            self::STAFF_WSDL,
            'GetArrBoardWithDetails',
            [
                'numRows'    => 10,
                'crs'        => 'MAN',
                'time'       => $time->format(\DateTimeInterface::ATOM),
                'filterCrs'  => '',
                'filterType' => 'to',
                'timeOffset' => 0,
                'timeWindow' => 120,
            ]
        )->shouldHaveBeenCalled();
    }

    function it_has_an_departure_board_with_details(
        RequestAdapter $requestAdapter
    ) {
        $time = new \DateTimeImmutable('now');

        $this->getDepartureBoardWithDetails(
            $numRows = 10,
            $crs = 'MAN',
            $time
        );

        $requestAdapter->dispatch(
            self::STAFF_WSDL,
            'GetDepBoardWithDetails',
            [
                'numRows'    => 10,
                'crs'        => 'MAN',
                'time'       => $time->format(\DateTimeInterface::ATOM),
                'filterCrs'  => '',
                'filterType' => 'to',
                'timeOffset' => 0,
                'timeWindow' => 120,
            ]
        )->shouldHaveBeenCalled();
    }

    function it_can_query_service_by_rid(
        RequestAdapter $requestAdapter
    )
    {
        $this->queryServiceByRid('12345');

        $requestAdapter->dispatch(
            self::STAFF_WSDL,
            'GetServiceDetailsByRID',
            ['rid' => '12345']
        )->shouldHaveBeenCalled();
    }
}
