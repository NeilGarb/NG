<?php

namespace NG\Http;

class Client {
    /**
     * @param string $url
     * @return Result
     */
    public function get($url) {
        return $this->request('GET', $url, null);
    }

    /**
     * @param string $url
     * @param array|string|null $data
     * @return Result
     */
    public function post($url, $data) {
        return $this->request('POST', $url, $data);
    }

    /**
     * @param string $url
     * @param array|string|null $data
     * @return Result
     */
    public function put($url, $data) {
        return $this->request('PUT', $url, $data);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array|string|null $data
     * @return Result
     * @throws Exception
     */
    private function request($method, $url, $data) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        $res = curl_exec($curl);
        if (!$res) {
            $errno = curl_errno($curl);
            $error = curl_error($curl);
            throw new Exception(sprintf('%d: %s', $errno, $error));
        }
        $info = curl_getinfo($curl);
        curl_close($curl);
        return new Result([
            'body' => $res,
            'type' => $info['content_type'],
            'code' => $info['http_code'],
        ]);
    }
}
