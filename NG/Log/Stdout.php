<?php

namespace NG\Log;

class Stdout extends AbstractWriter {
    /**
     * @param string $line
     */
    public function write($line) {
        echo $line;
    }
}
