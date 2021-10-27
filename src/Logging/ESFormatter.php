<?php

namespace Experteam\CisBase\Logging;

use Illuminate\Log\Logger;
use Monolog\Formatter\LineFormatter;

class ESFormatter
{

    /**
     * Customize the given logger instance.
     *
     * @param Logger $logger
     * @return void
     */
    public function __invoke(Logger $logger)
    {

        foreach ($logger->getHandlers() as $handler)
            $handler->setFormatter(
                new LineFormatter(
                    "[%datetime%] app.%level_name%: %message% %context%\n"
                )
            );

    }

}
