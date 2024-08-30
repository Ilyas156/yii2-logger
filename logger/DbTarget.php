<?php

declare(strict_types=1);


namespace logger;

final class DbTarget implements LoggerTargetInterface
{
    public function export(string $message): void
    {
        echo "$message - was sent via db" . PHP_EOL;
    }
}