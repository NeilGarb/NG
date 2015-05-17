<?php

namespace NG\Db;

class Db {
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @var int
     */
    private $commitDepth;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
        $this->commitDepth = 0;
    }

    /**
     * @param string $sql
     * @param array $args
     * @return \PDOStatement
     * @throws Exception
     */
    public function query($sql, array $args = []) {
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($args);
        if (!$res) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception($errorInfo[2]);
        }
        return $stmt;
    }

    /**
     * @return int
     */
    public function lastInsertId() {
        return intval($this->pdo->lastInsertId());
    }

    /**
     * @return Db
     */
    public function beginTransaction() {
        if ($this->commitDepth == 0) {
            $this->pdo->beginTransaction();
        }
        $this->commitDepth ++;
        return $this;
    }

    /**
     * @return Db
     */
    public function commit() {
        if ($this->commitDepth == 1) {
            $this->pdo->commit();
        }
        $this->commitDepth --;
        return $this;
    }

    /**
     * @return Db
     */
    public function rollBack() {
        $this->pdo->rollBack();
        $this->commitDepth = 0;
        return $this;
    }
}
