<?php

namespace NG\Db;

abstract class AbstractDb {
    /**
     * @param string $sql
     * @param array $args
     * @return AbstractResult
     */
    abstract public function query($sql, $args = []);

    /**
     * @param string $sql
     * @param $args
     * @return int
     */
    abstract public function execute($sql, $args = []);

    /**
     * @param string $sql
     * @param array $args
     * @return int
     */
    abstract public function insert($sql, $args = []);
}
