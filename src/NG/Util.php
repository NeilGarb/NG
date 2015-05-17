<?php

namespace NG;

class Util {
    /**
     * @param array $data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    static public function getKey(array &$data, $key, $default = null) {
        return array_key_exists($key, $data) ? $data[$key] : $default;
    }
}
