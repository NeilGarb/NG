<?php

namespace NG\Http\Server\Exception;

use Exception;

abstract class AbstractException extends \Exception {
    /**
     * @param string $message
     */
    public function __construct($message = '') {
        parent::__construct($message);
    }

    /**
     * @return int
     */
    abstract public function getStatus();
}
