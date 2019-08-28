<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

class ZendClient extends ClientAbstract implements ClientContract
{
    protected function initSoapClient()
    {
        $this->soapClient = new \Zend\Soap\Client(
            $this->getWSDL(),
            $this->getOptions()
        );
    }

    public function call($functionName, $arguments)
    {
        $client = $this->getSoapClient();

        foreach ($this->getHeaders() as $header) {
            $client->addSoapInputHeader($header);
        }

        return $client->call($functionName, [$arguments]);
    }
}
