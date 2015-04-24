<?php

namespace NG\Soap;

class Client {
    /**
     * @var \SoapClient
     */
    private $soap;

    /**
     * @param string $wsdl
     */
    public function __construct($wsdl) {
        $this->soap = new \SoapClient($wsdl);
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args = []) {
        return call_user_func_array([$this->soap, $method], $args);
    }
}
