<?php

namespace NG\Sms\Transport;

use NG\Sms\Message;

abstract class AbstractTransport {
    /**
     * @param Message $message
     */
    abstract public function send(Message $message);
}
