<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

class AuthHeaderFactory
{
    public static function create($token)
    {
        return new \SoapHeader(
            "http://thalesgroup.com/RTTI/2010-11-01/ldb/commontypes",
            "AccessToken",
            new \SoapVar(
                [
                    "ns2:TokenValue" => $token
                ],
                SOAP_ENC_OBJECT
            ),
            false
        );
    }
}
