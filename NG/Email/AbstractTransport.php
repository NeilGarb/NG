<?php

namespace NG\Email;

abstract class AbstractTransport {
    /**
     * @param Message $message
     */
    abstract public function send(Message $message);
}
