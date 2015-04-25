<?php

namespace NG\Log;

abstract class AbstractWriter {
    /**
     * @param string $line
     */
    abstract public function write($line);

    /**
     * @param string $level
     * @param string $message
     * @param ...$params
     */
    public function log($level, $message, ...$params) {
        $message = sprintf($message, ...$params);
        $line = sprintf(
            '%s - %s - %s',
            date('Y-m-d H:i:s'),
            $level,
            $message
        );
        $this->write($line . "\n");
    }

    /**
     * @param string $message
     * @param mixed ...$params
     */
    public function debug($message, ...$params) {
        $this->log('DEBUG', $message, ...$params);
    }

    /**
     * @param string $message
     * @param mixed ...$params
     */
    public function info($message, ...$params) {
        $this->log('INFO', $message, ...$params);
    }

    /**
     * @param string $message
     * @param mixed ...$params
     */
    public function warning($message, ...$params) {
        $this->log('WARNING', $message, ...$params);
    }

    /**
     * @param string $message
     * @param mixed ...$params
     */
    public function error($message, ...$params) {
        $this->log('ERROR', $message, ...$params);
    }
}
