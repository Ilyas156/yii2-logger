<?php

declare(strict_types=1);


namespace logger;

final class LoggerFactory
{
    public static function create(LoggerTypeEnum $loggerType): LoggerTargetInterface
    {
        return match ($loggerType) {
            LoggerTypeEnum::ALL => new AllTarget(),
            LoggerTypeEnum::DB => new DbTarget(),
            LoggerTypeEnum::EMAIL => \Yii::$container->get(EmailTarget::class),
            LoggerTypeEnum::FILE => new FileTarget(),
        };
    }
}