<?php

namespace NG\Db;

class Mysql extends AbstractDb {
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @param string $host
     * @param string $dbname
     * @param string $user
     * @param string $password
     */
    public function __construct($host, $dbname, $user, $password)
    {
        $dsn = sprintf('mysql:host=%s;dbname=%s', $host, $dbname);
        $this->pdo = new \PDO($dsn, $user, $password);
    }

    /**
     * @return \PDO
     */
    private function getPdo() {
        return $this->pdo;
    }

    /**
     * @param string $sql
     * @param array $args
     * @return MysqlResult
     */
    public function query($sql, $args = []) {
        $stmt = $this->getPdo()->prepare(strval($sql));
        $stmt->execute($args);
        return new MysqlResult($stmt);
    }

    /**
     * @param string $sql
     * @param $args
     * @return int
     */
    public function execute($sql, $args = []) {
        $stmt = $this->getPdo()->prepare(strval($sql));
        $stmt->execute($args);
        return $stmt->rowCount();
    }

    /**
     * @param string $sql
     * @param array $args
     * @return int
     */
    public function insert($sql, $args = []) {
        $stmt = $this->getPdo()->prepare(strval($sql));
        $stmt->execute($args);
        return self::getPdo()->lastInsertId();
    }
}
