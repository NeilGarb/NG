<?php

namespace NG\Db;

class Exception extends \Exception {
    /**
     * @var string
     */
    private $query;

    /**
     * @param string $message
     * @param string $query
     */
    public function __construct($message, $query)
    {
        $this->message = $message;
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }
}