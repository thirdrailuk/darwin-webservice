<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Collection;

class ServiceDetails
{
    public $GetServiceDetailsResult;

    public function __construct(\stdClass $GetServiceDetailsResult)
    {
        $this->GetServiceDetailsResult = $GetServiceDetailsResult;
    }

    public function rid()
    {
        return $this->GetServiceDetailsResult->rid;
    }

    public function uid()
    {
        return $this->GetServiceDetailsResult->uid;
    }

    public function trainId()
    {
        return $this->GetServiceDetailsResult->trainid;
    }

    public function sdd()
    {
        return $this->GetServiceDetailsResult->sdd;
    }

    public function operator()
    {
        return $this->GetServiceDetailsResult->operator;
    }

    public function operatorCode()
    {
        return $this->GetServiceDetailsResult->operatorCode;
    }

    public function serviceType()
    {
        return $this->GetServiceDetailsResult->serviceType;
    }

    public function category()
    {
        return $this->GetServiceDetailsResult->category;
    }

    public function serviceLocations()
    {
        return Collection::make($this->GetServiceDetailsResult->locations->location)
            ->map(function ($location) {
                return ServiceDetailsLocation::fromStdClass($location);
            });
    }
}
