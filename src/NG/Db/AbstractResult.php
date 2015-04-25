<?php

namespace NG\Db;

abstract class AbstractResult {
    /**
     * @return int
     */
    abstract public function getCount();

    /**
     * @return \stdClass
     */
    abstract public function fetchObject();
}
