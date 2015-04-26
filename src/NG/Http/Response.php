<?php

namespace NG\Http;

class Response {
    /**
     * @var int
     */
    private $status = 200;

    /**
     * @var string
     */
    private $type = 'text/html';

    /**
     * @var string
     */
    private $body = '';

    /**
     * @param int $status
     * @return Response
     */
    public function setStatus($status) {
        $this->status = intval($status);
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param string $type
     * @return Response
     */
    public function setType($type) {
        $this->type = strval($type);
        return $this;
    }

    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param string $body
     * @return Response
     */
    public function setBody($body) {
        $this->body = strval($body);
        return $this;
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }
}
