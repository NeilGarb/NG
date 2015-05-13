<?php

namespace NG\Validate;

abstract class AbstractValidator {
    /**
     * @param mixed $value
     * @return bool
     */
    abstract public function isValid($value);
}
