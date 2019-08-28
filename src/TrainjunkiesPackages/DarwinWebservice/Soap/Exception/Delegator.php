<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Exception;

class Delegator
{
    const HTTP_FAULT_CODE = 'HTTP';
    const UNAUTHORIZED_FAULT_STRING = 'Unauthorized';
    const FORBIDDEN_FAULT_STRING = 'Forbidden';

    /** @var \SoapFault */
    private $soapFault;
    /** @var bool|string */
    private $faultCode;
    /** @var bool|string */
    private $faultString;

    private function __construct(\SoapFault $soapFault)
    {
        $this->soapFault = $soapFault;

        $this->faultCode = (isset($soapFault->faultcode)
            ? $soapFault->faultcode
            : false
        );
        $this->faultString = (isset($soapFault->faultstring)
            ? $soapFault->faultstring
            : false
        );
    }

    public static function fromSoapFault(\SoapFault $soapFault)
    {
        return new self($soapFault);
    }

    public function throws()
    {
        if ($this->isUnauthorized()) {
            throw Unauthorized::tokenIsUnauthorized();
        } elseif ($this->isRateLimitReached()) {
            throw RateLimit::requestLimitReached();
        } else {
            throw $this->soapFault;
        }
    }

    private function isUnauthorized()
    {
        return (
            $this->faultString === self::UNAUTHORIZED_FAULT_STRING
            && $this->faultCode === self::HTTP_FAULT_CODE
        );
    }

    private function isRateLimitReached()
    {
        return (
            $this->faultString === self::FORBIDDEN_FAULT_STRING
            && $this->faultCode === self::HTTP_FAULT_CODE
        );
    }
}
