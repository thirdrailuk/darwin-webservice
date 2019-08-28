<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice\Soap;

use TrainjunkiesPackages\DarwinWebservice\Soap\ClientContract;
use TrainjunkiesPackages\DarwinWebservice\Soap\ZendClient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ZendClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ZendClient::class);
        $this->shouldImplement(ClientContract::class);
    }

    function it_can_interact_with_wsdls()
    {
        $this->getWSDL()->shouldBe(null);
        $this->setWSDL('file.wsdl');
        $this->getWSDL()->shouldBe('file.wsdl');
    }

    function it_can_interact_with_soap_options()
    {
        $options = [
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
            'cache_wsdl'  => WSDL_CACHE_MEMORY
        ];

        $this->getOptions()->shouldBe([]);
        $this->setOptions($options);
        $this->getOptions()->shouldBe($options);
    }

    function it_can_interact_with_soap_headers()
    {
        $this->getHeaders()->shouldBe([]);
        $this->addHeader('EXAMPLE HEADER');
        $this->getHeaders()->shouldBe(['EXAMPLE HEADER']);
    }

//    function it_has_correct_soap_adapter()
//    {
//        $this->setWSDL('example.wsdl');
//        $this->call('example', [])->shouldBeAnInstanceOf(\SoapClient::class);
//    }
}
