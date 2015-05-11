<?php

namespace NG\Http\Server\Exception;

class MethodNotAllowed extends AbstractException {
    /**
     * @return int
     */
    public function getStatus() {
        return 405;
    }
}
