<?php

namespace NG\Sms;

abstract class AbstractTransport {
    /**
     * @param Message $message
     */
    abstract public function send(Message $message);
}
