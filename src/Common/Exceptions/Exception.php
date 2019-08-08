<?php

namespace src\Common\Exceptions;

class Exception extends \Exception
{
    /**
     * Raw error info.
     *
     * @var array
     */
    public $raw;

    /**
     * Exception constructor.
     * @param $message
     * @param array $raw
     * @param int $code
     */
    public function __construct($message, $raw = [], $code = 9999)
    {
        $this->raw = is_array($raw) ? $raw : [$raw];

        parent::__construct($message, intval($code));
    }
}
