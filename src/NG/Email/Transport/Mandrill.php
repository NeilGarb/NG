<?php

namespace NG\Email\Transport;

use NG\Email\Message;

class Mandrill extends AbstractTransport {
    /**
     * @var \Mandrill
     */
    private $client;

    /**
     * @param string $key
     */
    public function __construct($key) {
        $this->client = new \Mandrill($key);
    }

    /**
     * @return \Mandrill
     */
    private function getClient() {
        return $this->client;
    }

    /**
     * @param Message $message
     */
    public function send(Message $message) {
        // TODO: Implement send() method.
    }
}
