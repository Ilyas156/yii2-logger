<?php

declare(strict_types=1);


namespace logger;

interface LoggerTargetInterface
{
    public function export(string $message): void;
}