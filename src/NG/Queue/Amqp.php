<?php

namespace NG\Queue;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Amqp extends AbstractClient {
    /**
     * @var AMQPChannel
     */
    private $channel;

    /**
     * @param string $host
     * @param int $port
     * @param string $user
     * @param string $pass
     */
    public function __construct($host, $port, $user, $pass) {
        $connection = new AMQPConnection($host, $port, $user, $pass);
        $this->channel = $connection->channel();
    }

    /**
     * @return AMQPChannel
     */
    private function getChannel() {
        return $this->channel;
    }

    /**
     * @param string $queue
     * @param array $data
     */
    public function add($queue, array $data = []) {
        $channel = $this->getChannel();
        $channel->queue_declare($queue);
        $msg = new AMQPMessage(json_encode($data));
        $channel->basic_publish($msg, '', $queue);
    }

    /**
     * @param string $queue
     * @param callable $callable
     */
    public function consume($queue, callable $callable) {
        // Example callback:
        //
        // <code>
        // function(AMQPMessage $msg) {
        //     $tag = $msg->delivery_info['consumer_tag'];
        //     $msg->delivery_info['channel']->basic_ack($tag);
        // }
        // </code>
        $channel = $this->getChannel();
        $channel->queue_declare($queue);
        $channel->basic_consume(
            $queue,
            '',
            false,
            false,
            false,
            false,
            $callable
        );
    }
}
