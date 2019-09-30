<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Response;

use TrainjunkiesPackages\DarwinWebservice\Collection;

class GetBoardWithDetailsResult
{
    protected $GetBoardWithDetailsResult;

    public function __construct(\stdClass $GetBoardWithDetailsResult)
    {
        $this->GetBoardWithDetailsResult = $GetBoardWithDetailsResult;
    }

    public function locationName()
    {
        return $this->GetBoardWithDetailsResult->locationName;
    }

    public function crs()
    {
        return $this->GetBoardWithDetailsResult->crs;
    }

    public function stationManager()
    {
        return $this->GetBoardWithDetailsResult->stationManager;
    }

    public function stationManagerCode()
    {
        return $this->GetBoardWithDetailsResult->stationManagerCode;
    }

    public function trainServices()
    {
        $trainServices = $this->GetBoardWithDetailsResult->trainServices->service;

        return Collection::make($trainServices)
            ->map(function ($service) {
                return TrainService::fromStdClass($service);
            });
    }
}
