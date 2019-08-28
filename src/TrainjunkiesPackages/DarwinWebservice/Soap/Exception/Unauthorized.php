<?php

namespace TrainjunkiesPackages\DarwinWebservice\Soap\Exception;

class Unauthorized extends \Exception
{
    public static function tokenIsUnauthorized()
    {
        return new self('Unauthorized user token, is the token correct?');
    }
}
