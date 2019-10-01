<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Response;

class ServiceDetailsLocation
{
    private $location;

    public function __construct(\stdClass $location)
    {
        $this->location = $location;
    }

    public static function fromStdClass(\stdClass $location)
    {
        return new self($location);
    }

    public function platform()
    {
        return $this->location->platform ?? null;
    }

    public function std()
    {
        return $this->location->std;
    }

    public function atd()
    {
        return $this->location->atd;
    }

    public function departureType()
    {
        return $this->location->departureType;
    }

    public function departureSource()
    {
        return $this->location->departureSource ?? null;
    }

    public function lateness()
    {
        return $this->location->lateness ?? null;
    }

    public function locationName()
    {
        return $this->location->locationName;
    }

    public function tiploc()
    {
        return $this->location->tiploc;
    }

    public function crs()
    {
        return $this->location->crs;
    }

    public function activities()
    {
        return $this->location->activities;
    }
}
