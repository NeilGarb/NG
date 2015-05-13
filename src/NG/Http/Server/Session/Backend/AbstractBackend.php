<?php

namespace NG\Http\Server\Session\Backend;

abstract class AbstractBackend {
    /**
     * @param string $id
     * @return bool
     */
    abstract public function read($id);

    /**
     * @param string $id
     * @return bool
     */
    abstract public function write($id);

    /**
     * @param string $id
     * @return bool
     */
    abstract public function destroy($id);

    /**
     * @param string $name
     * @return mixed
     */
    abstract public function get($name);

    /**
     * @param string  $name
     * @param mixed $value
     * @return bool
     */
    abstract public function set($name, $value);

    /**
     * @param string $name
     * @return bool
     */
    abstract public function delete($name);
}
