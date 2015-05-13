<?php

namespace NG\Model;

class AbstractBean {
    /**
     * @var \stdClass
     */
    private $data;

    /**
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data) {
        $this->data = $data;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        return isset($this->data->$name) ? $this->data->$name : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @throws Exception
     */
    public function __set($name, $value) {
        throw new Exception('Beans are immutable.');
    }
}
