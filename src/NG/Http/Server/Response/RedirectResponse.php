<?php

namespace NG\Http\Server\Response;

class RedirectResponse extends Response {
    /**
     * @var int
     */
    protected $status = 302;

    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     */
    public function __construct($url) {
        $this->url = $url;
    }

    public function send() {
        http_response_code($this->status);
        header('Location: ' . $this->url);
        exit;
    }
}
