<?php


namespace Experteam\CisBase\Facades;


use Illuminate\Support\Facades\Log;

class ESLog
{

    public function error(string $message, array $context = [])
    {

        Log::channel('elk')
            ->error(
                $message,
                array_merge(
                    $this->defaultContext(),
                    $context
                )
            );

    }

    public function defaultContext(): array
    {

        return [
            'timestamp' => date_create(),
        ];

    }

    public function info(string $message, array $context = [])
    {

        Log::channel('elk')
            ->info(
                $message,
                array_merge(
                    $this->defaultContext(),
                    $context
                )
            );

    }

    public function notice(string $message, array $context = [])
    {

        Log::channel('elk')
            ->notice(
                $message,
                array_merge(
                    $this->defaultContext(),
                    $context
                )
            );

    }

}
