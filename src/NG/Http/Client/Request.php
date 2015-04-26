<?php

namespace NG\Http\Client;

use NG\Http\Response;

class Request {
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $url;

    /**
     * @var mixed
     */
    private $data;

    /**
     * @param string $method
     * @param string $url
     * @param mixed $data
     */
    public function __construct($method, $url, $data = null) {
        $this->method = $method;
        $this->url = $url;
        $this->data = $data;
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function execute() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $body = curl_exec($curl);
        if (!$body) {
            throw new Exception(sprintf(
                'curl error (%d): %s',
                curl_errno($curl),
                curl_error($curl)
            ));
        }
        $response = new Response();
        $response
            ->setStatus(curl_getinfo($curl, CURLINFO_HTTP_CODE))
            ->setType(curl_getinfo($curl, CURLINFO_CONTENT_TYPE))
            ->setBody($body);
        return $response;
    }
}
