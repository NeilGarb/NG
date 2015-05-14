<?php

namespace NG\Http\Server\Route;

use NG\Http\Server\Handler\Request;
use NG\Http\Server\Response\Response;

class RouteMatch {
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Route
     */
    private $route;

    /**
     * @var array
     */
    private $matches;

    /**
     * @param Request $request
     * @param Route $route
     * @param array $matches
     */
    public function __construct(
        Request $request,
        Route $route,
        array $matches
    ) {
        $this->request = $request;
        $this->route = $route;
        $this->matches = $matches;
    }

    /**
     * @return Request
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * @return Route
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * @return array
     */
    public function getMatches() {
        return $this->matches;
    }

    /**
     * @return Response
     */
    public function handle() {
        return $this->getRoute()->getHandler()->handle($this->getRequest());
    }
}
