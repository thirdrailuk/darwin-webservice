<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Exception;

class RateLimit extends \Exception
{
    public static function requestLimitReached()
    {
        return new self('NRE WebService rate limit has been reached');
    }
}
