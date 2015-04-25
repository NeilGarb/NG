<?php

namespace NG\Db;

class MysqlResult extends AbstractResult {
    /**
     * @var \PDOStatement
     */
    private $stmt;

    /**
     * @param \PDOStatement $stmt
     */
    public function __construct(\PDOStatement $stmt) {
        $this->stmt = $stmt;
    }

    /**
     * @return int
     */
    public function getCount() {
        return $this->stmt->rowCount();
    }

    /**
     * @return \stdClass
     */
    public function fetchObject() {
        return $this->stmt->fetchObject();
    }
}
