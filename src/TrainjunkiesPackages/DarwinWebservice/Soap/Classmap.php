<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

use TrainjunkiesPackages\DarwinWebservice\Soap\Response\ReasonCode;

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
            'GetReasonCodeResponseType' => ReasonCode::class
        ];
    }
}
