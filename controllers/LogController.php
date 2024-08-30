<?php

declare(strict_types=1);


namespace app\controllers;

use logger\Logger;
use logger\LoggerTypeEnum;
use logger\UnsupportedLoggerTypeException;
use yii\web\Controller;

final class LogController extends Controller
{

    public function __construct(
        $id,
        $module,
        $config = [],
        private readonly Logger $logger
    ) {
        parent::__construct($id, $module, $config);
    }

    /**
     * Sends a log message to the default logger.
     * */
    public function log(): void
    {
        $this->logger->send('test');
    }

    /**
     * Sends a log message to a special logger.
     * @param string $type
     * @throws UnsupportedLoggerTypeException
     */
    public function logTo(string $type): void
    {
        $this->logger->sendByLogger('test', $type);
    }

    /**
     * Sends a log message to all loggers.
     *
     * @throws UnsupportedLoggerTypeException
     */
    public function logToAll(): void
    {
        $this->logger->sendByLogger('test', LoggerTypeEnum::ALL->value);
    }
}