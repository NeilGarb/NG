<?php

namespace NG\Validate;

class Email extends AbstractValidator {
    const REGEX = '/^[^ @]+@([^ \.]+)(\.[^ \.]+)+$/';

    /**
     * @param string $value
     * @return bool
     */
    public function isValid($value) {
        return boolval(preg_match(self::REGEX, $value));
    }
}
