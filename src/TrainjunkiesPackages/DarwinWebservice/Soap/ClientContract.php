<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

interface ClientContract
{
    /**
     * @param string    $wsdl
     *
     * @return $this
     */
    public function setWSDL($wsdl);

    public function getWSDL();

    /**
     * @param array     $options
     *
     * @return $this
     */
    public function setOptions($options);

    public function getOptions();

    /**
     * @param string    $token
     *
     * @return $this
     */
    public function setAuthHeader($token);

    /**
     * @param \SoapHeader   $header
     *
     * @return $this
     */
    public function addHeader($header);

    public function getHeaders();

    public function getSoapClient();

    public function call($functionName, $arguments);
}
