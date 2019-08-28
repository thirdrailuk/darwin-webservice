<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

interface ClientContract
{
    /**
     * @param $wsdl
     *
     * @return $this
     */
    public function setWSDL($wsdl);

    public function getWSDL();

    /**
     * @param $options
     *
     * @return $this
     */
    public function setOptions($options);

    public function getOptions();

    /**
     * @param $token
     *
     * @return $this
     */
    public function setAuthHeader($token);

    /**
     * @param $header
     *
     * @return $this
     */
    public function addHeader($header);

    public function getHeaders();

    public function getSoapClient();

    public function call($functionName, $arguments);
}
