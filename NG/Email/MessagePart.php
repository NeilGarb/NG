<?php

namespace NG\Email;

class MessagePart {
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $body;

    /**
     * @param string $type
     * @param string $body
     */
    public function __construct($type, $body) {
        $this->type = $type;
        $this->body = $body;
    }
}
