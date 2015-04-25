<?php

namespace NG\Log;

class Multi extends AbstractWriter {
    /**
     * @var array
     */
    private $writers = [];

    /**
     * @param AbstractWriter $writer
     * @return Multi
     */
    public function addWriter(AbstractWriter $writer) {
        $this->writers[] = $writer;
        return $this;
    }

    /**
     * @param string $line
     */
    public function write($line) {
        /** @var AbstractWriter $writer */
        foreach ($this->writers as $writer) {
            $writer->write($line);
        }
    }
}
