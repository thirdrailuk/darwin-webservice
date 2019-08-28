<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

abstract class ClientAbstract
{
    /** @var null|\Zend\Soap\Client */
    protected $soapClient = null;
    private $wsdl = null;
    private $options = [];
    private $headers = [];

    public function __construct($wsdl = null, $options = [])
    {
        $this->wsdl = $wsdl;
        $this->options = $options;
    }

    public function setWSDL($wsdl)
    {
        $this->wsdl = $wsdl;
        $this->soapClient = null;

        return $this;
    }

    public function getWSDL()
    {
        return $this->wsdl;
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setAuthHeader($token)
    {
        $this->addHeader(
            AuthHeaderFactory::create($token)
        );
        return $this;
    }

    public function addHeader($header)
    {
        $this->headers[] = $header;
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getSoapClient()
    {
        if ($this->soapClient === null) {
            $this->initSoapClient();
        }

        return $this->soapClient;
    }
}
