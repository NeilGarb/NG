<?php

namespace NG\Form\Field;

class Captcha extends AbstractField {
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $secret;

    /**
     * @param string $name
     * @param string $key
     */
    public function __construct($name, $key, $secret) {
        parent::__construct($name);
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * @return string
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * @param string $response
     * @return bool
     */
    public function validate($response) {
        $data = [
            'secret' => $this->secret,
            'response' => $response,
        ];
        $streamContext = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data),
            ],
        ]);
        $res = file_get_contents('https://www.google.com/recaptcha/api/siteverify', null, $streamContext);
        $json = json_decode($res);
        if (!$json || !isset($json->success)) {
            return false;
        }
        return boolval($json->success);
    }
}
