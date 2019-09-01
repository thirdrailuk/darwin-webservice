<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Response;

class ReasonCode
{
    /**
     * @var \stdClass
     */
    private $GetReasonCodeResult;

    public function __construct(\stdClass $GetReasonCodeResult)
    {
        $this->GetReasonCodeResult = $GetReasonCodeResult;
    }

    public function code()
    {
        return $this->GetReasonCodeResult->code;
    }

    public function cancelledReason()
    {
        return $this->GetReasonCodeResult->cancReason;
    }

    public function lateReason()
    {
        return $this->GetReasonCodeResult->lateReason;
    }
}
