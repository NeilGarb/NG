<?php

namespace NG\Db;

class Select {
    /**
     * @var array
     */
    private $_select = [];

    /**
     * @var array
     */
    private $_from = [];

    /**
     * @var array
     */
    private $_join = [];

    /**
     * @var array
     */
    private $_where = [];

    /**
     * @var array
     */
    private $_group = [];

    /**
     * @var array
     */
    private $_order = [];

    /**
     * @var int
     */
    private $_offset = 0;

    /**
     * @var int
     */
    private $_limit = 0;

    /**
     * @return string
     */
    public function __toString() {
        ob_start();

        echo 'SELECT ';
        if ($this->_select) {
            echo join(', ', $this->_select);
        } else {
            echo '*';
        }

        echo ' ';
        echo 'FROM ';
        echo join(', ', $this->_from);

        if ($this->_join) {
            echo ' ';
            echo join(' ', $this->_join);
        }

        if ($this->_where) {
            echo ' ';
            echo 'WHERE ';
            echo join(', ', $this->_where);
        }

        if ($this->_group) {
            echo ' ';
            echo 'GROUP BY ';
            echo join(', ', $this->_group);
        }

        if ($this->_order) {
            echo ' ';
            echo 'ORDER BY ';
            echo join(', ', $this->_order);
        }

        if ($this->_limit) {
            echo ' ';
            if ($this->_offset) {
                echo 'LIMIT ' . $this->_offset . ', ' . $this->_limit;
            } else {
                echo 'LIMIT ' . $this->_limit;
            }
        }

        return ob_get_clean();
    }

    /**
     * @param string $clause
     * @return Select
     */
    public function select($clause) {
        $this->_select[] = $clause;
        return $this;
    }

    /**
     * @param string $clause
     * @return Select
     */
    public function from($clause) {
        $this->_from[] = $clause;
        return $this;
    }

    /**
     * @param string $clause
     * @return Select
     */
    public function join($clause) {
        $this->_join[] = $clause;
        return $this;
    }

    /**
     * @param string $clause
     * @return Select
     */
    public function where($clause) {
        $this->_where[] = $clause;
        return $this;
    }

    /**
     * @param string $clause
     * @return Select
     */
    public function group($clause) {
        $this->_group[] = $clause;
        return $this;
    }

    /**
     * @param string $clause
     * @return Select
     */
    public function order($clause) {
        $this->_order[] = $clause;
        return $this;
    }

    /**
     * @param int $offset
     * @return Select
     */
    public function offset($offset) {
        $this->_offset = intval($offset);
        return $this;
    }

    /**
     * @param int $limit
     * @return Select
     */
    public function limit($limit) {
        $this->_limit = intval($limit);
        return $this;
    }
}
