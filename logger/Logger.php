<?php

declare(strict_types=1);


namespace logger;

final class Logger implements LoggerInterface
{

    public function __construct(
        private string $loggerType,
    ) {
    }

    public function send(string $message): void
    {
        $loggerType = LoggerTypeEnum::tryFrom($this->loggerType);
        $logger = LoggerFactory::create($loggerType);

        $logger->export($message);
    }


    /**
     * @throws UnsupportedLoggerTypeException
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $loggerType = LoggerTypeEnum::tryFrom($loggerType);

        if (!$loggerType) {
            throw new UnsupportedLoggerTypeException();
        }

        $logger = LoggerFactory::create($loggerType);
        $logger->export($message);
    }

    public function getType(): string
    {
        return $this->loggerType;
    }

    /**
     * @throws UnsupportedLoggerTypeException
     */
    public function setType(string $type): void
    {
        if (!$this->isValidType($type)) {
            throw new UnsupportedLoggerTypeException();
        }

        $this->loggerType = $type;
    }

    private function isValidType(string $type): bool
    {
        return (bool)LoggerTypeEnum::tryFrom($type);
    }
}