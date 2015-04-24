<?php

namespace NG\Crypto;

use Nbobtc\Bitcoind\Bitcoind;
use Nbobtc\Bitcoind\Client;

class Currency {
    /**
     * @var Bitcoind
     */
    private $client;

    /**
     * @param string $host
     * @param int $port
     * @param string $user
     * @param string $pass
     */
    public function __construct($host, $port, $user, $pass) {
        $dsn = sprintf('http://%s:%s@%s:%d', $user, $pass, $host, $port);
        $this->client = new Bitcoind(new Client($dsn));
    }

    /**
     * @return Bitcoind
     */
    private function getClient() {
        return $this->client;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args = []) {
        return call_user_func_array([$this->getClient(), $method], $args);
    }
}
