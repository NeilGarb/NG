<?php

namespace NG\Http\Server;

use NG\Http\Server\Exception\MethodNotAllowed;

abstract class AbstractHandler {
    /**
     * @param Request $request
     * @return Response
     * @throws MethodNotAllowed
     */
    public function handle(Request $request) {
        switch ($request->getRequestMethod()) {
            case 'GET':
                return $this->get($request);
            case 'POST':
                return $this->post($request);
            case 'PUT':
                return $this->put($request);
            case 'DELETE':
                return $this->delete($request);
            default:
                throw new MethodNotAllowed();
        }
    }

    /**
     * @param Request $request
     * @return Response
     * @throws MethodNotAllowed
     */
    public function get(Request $request) {
        throw new MethodNotAllowed();
    }

    /**
     * @param Request $request
     * @return Response
     * @throws MethodNotAllowed
     */
    public function post(Request $request) {
        throw new MethodNotAllowed();
    }

    /**
     * @param Request $request
     * @return Response
     * @throws MethodNotAllowed
     */
    public function put(Request $request) {
        throw new MethodNotAllowed();
    }

    /**
     * @param Request $request
     * @return Response
     * @throws MethodNotAllowed
     */
    public function delete(Request $request) {
        throw new MethodNotAllowed();
    }
}
