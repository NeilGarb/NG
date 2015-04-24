<?php

namespace NG\Email;

class Message {
    /**
     * @var string
     */
    private $from;

    /**
     * @var array
     */
    private $to = [];

    /**
     * @var array
     */
    private $cc = [];

    /**
     * @var array
     */
    private $bcc = [];

    /**
     * @var string
     */
    private $subject;

    /**
     * @var array
     */
    private $parts = [];

    /**
     * @param string $from
     * @return Message
     */
    public function setFrom($from) {
        $this->from = $from;
        return $this;
    }

    /**
     * @param string $to
     * @return Message
     */
    public function addTo($to) {
        $this->to[] = $to;
        return $this;
    }

    /**
     * @param string $cc
     * @return Message
     */
    public function addCc($cc) {
        $this->cc[] = $cc;
        return $this;
    }

    /**
     * @param string $bcc
     * @return Message
     */
    public function addBcc($bcc) {
        $this->bcc[] = $bcc;
        return $this;
    }

    /**
     * @param string $subject
     * @return Message
     */
    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param MessagePart $part
     * @return Message
     */
    public function addPart(MessagePart $part) {
        $this->parts[] = $part;
        return $this;
    }
}
