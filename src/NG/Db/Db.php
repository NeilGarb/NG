<?php

namespace NG\Db;

class Db {
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
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
}
