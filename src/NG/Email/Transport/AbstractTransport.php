<?php

namespace NG\Email\Transport;

use NG\Email\Message;

abstract class AbstractTransport {
    /**
     * @param Message $message
     */
    abstract public function send(Message $message);
}
