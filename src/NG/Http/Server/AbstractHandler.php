<?php

namespace NG\Http\Server;

abstract class AbstractHandler {
    /**
     * @param Request $request
     * @return AbstractResponse
     */
    abstract public function handle(Request $request);
}
