<?php

namespace NG;

class Util {
    /**
     * @param array $data
     * @param string $key
     * @return mixed
     */
    static public function getKey(array &$data, $key) {
        return array_key_exists($key, $data) ? $data[$key] : null;
    }
}
