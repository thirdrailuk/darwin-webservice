<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Collection;

class ReasonCodeList
{
    private $GetReasonCodeListResult;

    public function __construct($GetReasonCodeListResult)
    {
        $this->GetReasonCodeListResult = $GetReasonCodeListResult;
    }

    public function reasonCodes()
    {
        return Collection::make($this->GetReasonCodeListResult->reason)
            ->map(function ($item) {
                return new ReasonCode($item);
            });
    }
}
