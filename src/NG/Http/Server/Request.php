<?php

namespace NG\Http\Server;

use NG\Util;

class Request {
    /**
     * @var array
     */
    private $get;

    /**
     * @var array
     */
    private $post;

    /**
     * @var array
     */
    private $files;

    /**
     * @var array
     */
    private $server;

    /**
     * @var array
     */
    private $env;

    /**
     * @param array $get
     * @param array $post
     * @param array $files
     * @param array $server
     * @param array $env
     */
    public function __construct(
        array $get,
        array $post,
        array $files,
        array $server,
        array $env
    ) {
        $this->get = $get;
        $this->post = $post;
        $this->files = $files;
        $this->server = $server;
        $this->env = $env;
    }

    /**
     * @param string $var
     * @return mixed
     */
    public function getPostVar($var) {
        return array_key_exists($var, $this->post) ? $this->post[$var] : null;
    }

    /**
     * @return array
     */
    public function getPostVars() {
        return $this->post;
    }

    /**
     * @return string
     */
    public function getRequestMethod() {
        return strval(Util::getKey($this->server, 'REQUEST_METHOD'));
    }

    /**
     * @return string
     */
    public function getRequestUri() {
        return strval(Util::getKey($this->server, 'REQUEST_URI'));
    }

    /**
     * @return string
     */
    public function getRequestPath() {
        return explode('?', $this->getrequestUri())[0];
    }

    /**
     * @return Request
     */
    static public function make() {
        return new self($_GET, $_POST, $_FILES, $_SERVER, $_ENV);
    }
}
