<?php
declare(strict_types=1);
namespace Joe\HelloModule\Logger\CustomLog\Handler;

use Magento\Framework\Logger\Handler\Base as BaseHandler;
use Monolog\Logger as MonologLogger;

class MyHandler extends BaseHandler
{
    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = MonologLogger::DEBUG;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/my_customlog/mydebug.log';
}
