<?php

declare(strict_types=1);


namespace logger;

enum LoggerTypeEnum: string
{
    case ALL = 'all';
    case DB = 'db';
    case FILE = 'file';
    case EMAIL = 'email';
}