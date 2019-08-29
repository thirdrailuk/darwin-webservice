<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap;

class CommonClient extends ClientAbstract implements ClientContract
{
    /**
     * @throws \SoapFault
     */
    protected function initSoapClient()
    {
        $this->soapClient = new \SoapClient(
            $this->getWSDL(),
            $this->getOptions()
        );
    }

    public function call($functionName, $arguments)
    {
        $client = $this->getSoapClient();

        return $client->__soapCall(
            $functionName,
            [$arguments],
            [],
            $this->getHeaders()
        );
    }
}
