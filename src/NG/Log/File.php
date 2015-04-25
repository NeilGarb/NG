<?php

namespace NG\Log;

class File extends AbstractWriter {
    /**
     * @var resource
     */
    private $handle;

    /**
     * @param string $file
     * @throws Exception
     */
    public function __construct($file) {
        $this->handle = fopen($file, 'w');
        if (!$this->handle) {
            throw new Exception('Could not open "%s" for writing.', $file);
        }
    }

    public function __destruct() {
        fclose($this->handle);
    }

    /**
     * @param string $line
     */
    public function write($line) {
        fwrite($this->handle, $line);
    }
}
