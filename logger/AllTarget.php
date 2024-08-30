<?php

declare(strict_types=1);


namespace logger;

final class AllTarget implements LoggerTargetInterface
{

    public function export(string $message): void
    {
        foreach (LoggerTypeEnum::cases() as $type) {
            $logger = LoggerFactory::create($type);
            $logger->export($message);
        }
    }
}