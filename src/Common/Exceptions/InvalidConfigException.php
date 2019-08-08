<?php

namespace src\Common\Exceptions;

class InvalidConfigException extends Exception
{
    /**
     * InvalidConfigException constructor.
     * @param $message
     * @param array $raw
     * @param int $code
     */
    public function __construct($message, $raw = [], $code = 1)
    {
        parent::__construct($message, $raw, $code);
    }
}
