<?php


namespace Experteam\CisBase\Facades;


use Illuminate\Support\Facades\Log;

class ESLog
{

    /**
     * Log an emergency message to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function emergency($message, array $context = [])
    {
        Log::channel('ElasticSearch')->emergency($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

    public function defaultContext()
    {

        return array(
            'id' => uniqid(),
            'timestamp' => date_create()
        );

    }

    /**
     * Log an alert message to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function alert($message, array $context = [])
    {
        Log::channel('ElasticSearch')->alert($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

    /**
     * Log a critical message to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function critical($message, array $context = [])
    {
        Log::channel('ElasticSearch')->critical($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

    /**
     * Log an error message to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function error($message, array $context = [])
    {
        Log::channel('ElasticSearch')->error($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

    /**
     * Log a warning message to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function warning($message, array $context = [])
    {
        Log::channel('ElasticSearch')->warning($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

    /**
     * Log a notice to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function notice($message, array $context = [])
    {
        Log::channel('ElasticSearch')->notice($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

    /**
     * Log an informational message to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function info($message, array $context = [])
    {
        Log::channel('ElasticSearch')->info($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

    /**
     * Log a debug message to the logs.
     *
     * @param string $message
     * @param array $context
     * @return void
     */
    public function debug($message, array $context = [])
    {
        Log::channel('ElasticSearch')->debug($message, array_merge(
            $this->defaultContext(),
            $context
        ));
    }

}
