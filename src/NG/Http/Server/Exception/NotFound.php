<?php

namespace NG\Http\Server\Exception;

class NotFound extends AbstractException {
    /**
     * @return int
     */
    public function getStatus() {
        return 404;
    }
}
