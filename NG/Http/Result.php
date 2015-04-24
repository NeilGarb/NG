<?php

namespace NG\Http;

class Result {
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data = []) {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getBody() {
        return isset($this->data['body']) ? $this->data['body'] : '';
    }

    /**
     * @return int
     */
    public function getCode() {
        return isset($this->data['code']) ? $this->data['code'] : 0;
    }

    /**
     * @return string
     */
    public function getType() {
        return isset($this->data['type']) ? $this->data['type'] : '';
    }
}
