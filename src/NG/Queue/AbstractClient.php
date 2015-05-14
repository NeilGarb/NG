<?php

namespace NG\Queue;

abstract class AbstractClient {
    /**
     * @param string $queue
     * @param array $data
     */
    abstract public function add($queue, array $data = []);

    /**
     * @param string $queue
     * @param callable $callable
     */
    abstract public function consume($queue, callable $callable);
}
