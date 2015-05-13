<?php

namespace NG\Http\Server\Session\Backend;

use NG\Cache\Memcached as MemcachedCache;

class Memcached extends AbstractBackend {
    /**
     * @var MemcachedCache
     */
    private $memcached;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @param MemcachedCache $memcached
     */
    public function __construct(MemcachedCache $memcached) {
        $this->memcached = $memcached;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function read($id) {
        $key = $this->getKey($id);
        $data = json_decode($this->memcached->get($key), $assoc = true);
        if ($data) {
            $this->data = $data;
        }
        return true;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function write($id) {
        $key = $this->getKey($id);
        $this->memcached->set($key, json_encode($this->data));
        return true;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function destroy($id) {
        $key = $this->getKey($id);
        $this->memcached->delete($key);
        return true;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name) {
        return array_key_exists($name, $this->data) ?
            $this->data[$name] : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return bool
     */
    public function set($name, $value) {
        $this->data[$name] = $value;
        return true;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function delete($name) {
        unset($this->data[$name]);
        return true;
    }

    /**
     * @param string $id
     * @return string
     */
    private function getKey($id) {
        return 'session' . $id;
    }
}
