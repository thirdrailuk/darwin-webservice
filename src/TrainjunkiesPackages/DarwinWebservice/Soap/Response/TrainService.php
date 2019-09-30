<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Response;

class TrainService
{
    /**
     * @var \stdClass
     */
    private $trainService;

    private function __construct(\stdClass $trainService)
    {
        $this->trainService = $trainService;
    }

    public static function fromStdClass(\stdClass $trainService)
    {
        return new self($trainService);
    }

    public function rid()
    {
        return $this->trainService->rid;
    }

    public function uid()
    {
        return $this->trainService->uid;
    }

    public function trainId()
    {
        return $this->trainService->trainid;
    }

    public function rsid()
    {
        return $this->trainService->rsid;
    }

    public function sdd()
    {
        return $this->trainService->sdd;
    }

    public function operator()
    {
        return $this->trainService->operator;
    }

    public function operatorCode()
    {
        return $this->trainService->operatorCode;
    }

    public function sta()
    {
        return $this->trainService->sta;
    }

    public function ata()
    {
        return $this->trainService->ata;
    }

    public function arrivalType()
    {
        return $this->trainService->arrivalType;
    }

    public function std()
    {
        return $this->trainService->std;
    }

    public function etd()
    {
        return $this->trainService->etd;
    }

    public function departureType()
    {
        return $this->trainService->departureType;
    }

    public function departureSource()
    {
        return $this->trainService->departureSource;
    }

    public function platform()
    {
        return $this->trainService->platform;
    }

    public function category()
    {
        return $this->trainService->category;
    }

    public function activities()
    {
        return $this->trainService->activities;
    }

    public function length()
    {
        return $this->trainService->length ?? null;
    }

    public function originName()
    {
        return $this->trainService->origin->location->locationName;
    }

    public function originCrs()
    {
        return $this->trainService->origin->location->crs;
    }

    public function originTiploc()
    {
        return $this->trainService->origin->location->tiploc;
    }

    public function destinationName()
    {
        return $this->trainService->destination->location->locationName;
    }

    public function destinationCrs()
    {
        return $this->trainService->destination->location->crs;
    }

    public function destinationTiploc()
    {
        return $this->trainService->destination->location->tiploc;
    }

    public function cancelReason()
    {
        return $this->trainService->cancelReason->_ ?? null;
    }
}
