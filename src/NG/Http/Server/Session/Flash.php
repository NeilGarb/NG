<?php

namespace NG\Http\Server\Session;

class Flash {
    /**
     * @param Session $session
     */
    public function __construct(Session &$session) {
        $this->session = $session;
    }

    /**
     * @param string $message
     * @param string $class
     * @return Flash
     */
    public function add($message, $class = '') {
        $messages = $this->session->get('flash');
        if ($messages) {
            $messages[] = [$class, $message];
        } else {
            $messages = [[$class, $message]];
        }
        $this->session->set('flash', $messages);
        return $this;
    }

    /**
     * @return array
     */
    public function read() {
        $messages = $this->session->get('flash');
        $this->session->set('flash', []);
        return $messages ?: [];
    }
}
