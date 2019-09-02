<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

class Factory
{
    /**
     * @param string    $token
     * @param array     $soapOptions
     *
     * @return ClientContract
     */
    public static function create($token, $soapOptions = [])
    {
        $soapOptions = array_merge([
            'cache_wsdl'  => WSDL_CACHE_MEMORY,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
            'trace'       => false,
            'classmap'    => (new Classmap())->mappings()
        ], $soapOptions);

        return (new CommonClient(null, $soapOptions))
            ->setAuthHeader($token);
    }
}
