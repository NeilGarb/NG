<?php

namespace NG\Sms;

use Clickatell\Api\ClickatellHttp;

class Clickatell extends AbstractTransport {
    /**
     * @var ClickatellHttp
     */
    private $client;

    /**
     * @param string $username
     * @param string $password
     * @param string $apiid
     */
    public function __construct($username, $password, $apiid) {
        $this->client = new ClickatellHttp($username, $password, $apiid);
    }

    /**
     * @return ClickatellHttp
     */
    private function getClient() {
        return $this->client;
    }

    /**
     * @param Message $message
     * @return Clickatell
     * @throws Exception
     */
    public function send(Message $message) {
        $results = $this->getClient()->sendMessage(
            $message->getTo(),
            $message->getBody()
        );
        /** @var \stdClass $result */
        foreach ($results as $result) {
            if ($result['error']) {
                throw new Exception(sprintf(
                    '%s: %s',
                    $result->errorCode,
                    $result->error
                ));
            }
        }
        return $this;
    }
}
