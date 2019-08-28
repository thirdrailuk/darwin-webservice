<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

class Factory
{
    /**
     * @param       $token
     * @param array $soapOptions
     *
     * @return ClientContract
     */
    public static function create($token, $soapOptions = [])
    {
        $soapOptions = array_merge([
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
            'cache_wsdl'  => WSDL_CACHE_MEMORY
        ], $soapOptions);

        return (new CommonClient(null, $soapOptions))
            ->setAuthHeader($token);
    }
}