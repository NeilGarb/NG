<?php

namespace NG\Http\Server;

class Route {
    /**
     * @var string
     */
    protected $path;

    /**
     * @var Handler
     */
    protected $handler;

    /**
     * @var array
     */
    protected $methods;

    /**
     * @param $path
     * @param $handler
     */
    public function __construct($path, Handler $handler) {
        $this->path = $path;
        $this->handler = $handler;
    }

    /**
     * @return Handler
     */
    public function getHandler() {
        return $this->handler;
    }

    /**
     * @param Request $request
     * @return RouteMatch
     */
    public function match(Request $request) {
        $matches = [];
        $res = preg_match(
            '#^' . $this->path . '$#',
            $request->getRequestPath(),
            $matches
        );
        if ($res) {
            return new RouteMatch($request, $this, $matches);
        } else {
            return null;
        }
    }
}
