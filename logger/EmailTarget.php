<?php

declare(strict_types=1);


namespace logger;


final class EmailTarget implements LoggerTargetInterface
{
    public function __construct(
        private readonly string $from,
        private readonly string $to,
    )
    {
    }


    public function export(string $message): void
    {
        echo $this->from . '- ' . $this->to . PHP_EOL;
        echo "$message - was sent via mail" . PHP_EOL;
    }
}