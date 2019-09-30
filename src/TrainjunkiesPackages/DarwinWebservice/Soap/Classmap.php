<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCode;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCodeList;
use TrainjunkiesPackages\DarwinWebservice\Soap\Response\GetBoardWithDetailsResult;

class Classmap
{
    private $items = [];

    public function __construct()
    {
        $this->items = $this->mappings();
    }

    public function classmap($key)
    {
        return array_key_exists($key, $this->items)
            ? [$key => $this->items[$key]]
            : [];
    }

    public function mappings()
    {
        return [
            'GetReasonCodeResponseType'              => ReasonCode::class,
            'GetReasonCodeListResponseType'          => ReasonCodeList::class,
            'GetStationBoardWithDetailsResponseType' => GetBoardWithDetailsResult::class
        ];
    }
}
