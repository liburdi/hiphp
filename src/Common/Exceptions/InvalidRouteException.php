<?php

namespace src\Common\Exceptions;

class InvalidRouteException extends Exception
{
    /**
     * InvalidRouteException constructor.
     * @param $message
     * @param array $raw
     * @param int $code
     */
    public function __construct($message, $raw = [], $code = 2)
    {
        parent::__construct($message, $raw, $code);
    }
}
