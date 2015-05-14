<?php

namespace NG\Http\Server\Response;

class Response {
    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $body;

    /**
     * @param int $status
     * @param string $type
     * @param string $body
     */
    public function __construct(
        $status = 200,
        $type = 'text/html',
        $body = ''
    ) {
        $this->status = $status;
        $this->type = $type;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    public function send() {
        http_response_code($this->getStatus());
        header('Content-Type: ' . $this->getType());
        echo $this->getBody();
        exit;
    }
}
