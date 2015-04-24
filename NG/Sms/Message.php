<?php

namespace NG\Sms;

class Message {
    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $body;

    /**
     * @param string $to
     * @param string $body
     */
    public function __construct($to, $body) {
        $this->to = $to;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }
}
