<?php

namespace TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Soap\Classmap;
use TrainjunkiesPackages\DarwinWebservice\Soap\Wsdl\Source;

/**
 * @property Source             $wsdlSource
 * @property RequestAdapter     $requestAdapter
 * @property Classmap           $classmap
 */
trait Reference
{
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
}
