<?php

namespace NG\Http\Server;

use NG\Http\Server\Session\Session;

class Request {
    /**
     * @var array
     */
    private $queryVars = [];

    /**
     * @var array
     */
    private $postVars = [];

    /**
     * @var array
     */
    private $fileVars = [];

    /**
     * @var array
     */
    private $serverVars = [];

    /**
     * @var Session
     */
    private $session;

    /**
     * @param array $queryVars
     * @return Request
     */
    public function setQueryVars(array &$queryVars) {
        $this->queryVars = $queryVars;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getQueryVar($name) {
        return array_key_exists($name, $this->queryVars) ?
            $this->queryVars[$name] : null;
    }

    /**
     * @param array $postVars
     * @return Request
     */
    public function setPostVars(array &$postVars) {
        $this->postVars = $postVars;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getPostVar($name) {
        return array_key_exists($name, $this->postVars) ?
            $this->postVars[$name] : null;
    }

    /**
     * @return array
     */
    public function getPostVars() {
        return $this->postVars;
    }

    /**
     * @param array $fileVars
     * @return Request
     */
    public function setFileVars(array &$fileVars) {
        $this->fileVars = $fileVars;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getFileVar($name) {
        return array_key_exists($name, $this->fileVars) ?
            $this->fileVars[$name] : null;
    }

    /**
     * @return array
     */
    public function getFileVars() {
        return $this->fileVars;
    }

    /**
     * @param array $serverVars
     * @return Request
     */
    public function setServerVars(array &$serverVars) {
        $this->serverVars = $serverVars;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getServerVar($name) {
        return array_key_exists($name, $this->serverVars) ?
            $this->serverVars[$name] : null;
    }

    /**
     * @param Session $session
     * @return Request
     */
    public function setSession(Session &$session) {
        $this->session = $session;
        return $this;
    }

    /**
     * @return Session
     */
    public function getSession() {
        return $this->session;
    }

    /**
     * @return string
     */
    public function getRequestMethod() {
        if (!array_key_exists('REQUEST_METHOD', $this->serverVars)) {
            return '';
        }
        return $this->serverVars['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    public function getRequestPath() {
        if (!array_key_exists('REQUEST_URI', $this->serverVars)) {
            return '';
        }
        return $this->serverVars['REQUEST_URI'];
    }
}
