<?php

namespace NG\Http\Server;

use NG\Http\Response;

abstract class AbstractHandler {
    /**
     * @param Request $request
     * @return Response
     */
    abstract public function handle(Request $request);
}
