<?php

namespace NG\Http\Server\Exception;

abstract class AbstractException extends \Exception {
    /**
     * @return int
     */
    abstract public function getStatus();
}
