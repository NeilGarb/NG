<?php

namespace NG\Http\Server;

use NG\Http\Server\Exception\NotFound;

class Router {
    /**
     * @var array
     */
    private $routes = [];

    /**
     * @param Route $route
     * @return Router
     */
    public function addRoute(Route $route) {
        $this->routes[] = $route;
        return $this;
    }

    /**
     * @param Request $request
     * @return RouteMatch
     * @throws NotFound
     */
    public function match(Request $request) {
        /** @var Route $route */
        foreach ($this->routes as $route) {
            if ($match = $route->match($request)) {
                return $match;
            }
        }
        throw new NotFound();
    }
}
