<?php

namespace NG\Http\Server\Exception;

use Exception;

class BadRequest extends AbstractException {
    /**
     * @var array
     */
    private $errors;

    /**
     * @param array $errors
     */
    public function __construct(array $errors) {
        parent::__construct();
        $this->errors = $errors;
    }

    /**
     * @return int
     */
    public function getStatus() {
        return 400;
    }

    /**
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }
}
