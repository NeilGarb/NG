<?php

namespace NG\Cache;

abstract class AbstractCache {
    /**
     * @param string $key
     * @param mixed $value
     * @param int $ttl
     */
    abstract public function set($key, $value, $ttl = 0);

    /**
     * @param string $key
     * @return mixed
     */
    abstract public function get($key);

    /**
     * @param string $key
     */
    abstract public function delete($key);
}
