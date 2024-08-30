<?php

declare(strict_types=1);


namespace logger;

use Exception;

final class UnsupportedLoggerTypeException extends Exception
{
    protected $message = 'This logger type is not supported.';
}