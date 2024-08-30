<?php

declare(strict_types=1);


namespace logger;

final class FileTarget implements LoggerTargetInterface
{

    public function export(string $message): void
    {
        echo "$message - was sent via file" . PHP_EOL;
    }
}