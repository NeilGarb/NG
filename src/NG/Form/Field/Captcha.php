<?php

namespace NG\Form\Field;

class Captcha extends AbstractField {
    /**
     * @var string
     */
    private $key;

    /**
     * @param string $name
     * @param string $key
     */
    public function __construct($name, $key) {
        parent::__construct($name);
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * @param string $secret
     * @param string $response
     * @return bool
     */
    static public function validate($secret, $response) {
        $data = [
            'secret' => $secret,
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
        return $json->success;
    }
}
