<?php

namespace Ext;

class AMQP
{
    // connection
    public $host = null;
    public $port = null;
    public $vhost = null;
    public $login = null;
    public $password = null;

    // exchange
    public $flags = null;
    public $exchange_name = null;
    public $exchange_type = null;
    public $message = null;
    public $attributes = [];

    // queue
    public $queue_name = null;
    public $routing_key = null;

    // object
    public $connection = null;
    public $channel = null;
    public $exchange = null;
    public $queue = null;

    public function __construct($properties = [])
    {
        if ($properties) {
            $this->init($properties);
        }
    }

    public function init($properties = [])
    {
        foreach ($properties as $key => $value) {
            $this->${$key} = $value;
        }
    }

    public function connect()
    {
        $credentials = [];
        $keys = ['host', 'port', 'vhost', 'login', 'password'];
        foreach ($keys as $key) {
            $value = $this->${$key};
            if (null !== $value) {
                $credentials[$key] = $value;
            }
        }
        $this->connection = new AMQPConnection($credentials);
        return $this->connection->connect();
    }

    public function channel()
    {
        return $this->channel = new AMQPChannel($this->connection);
    }

    public function exchange()
    {
        $ex = new AMQPExchange($this->channel);
        $ex->setName($this->exchange_name);
        $ex->declareExchange();
        return $this->exchange = $ex;
    }

    public function queue()
    {
        $qu = new AMQPQueue($this->channel);
        $qu->setName($this->queue_name);
        $qu->declareQueue();
        return $this->queue = $qu;
    }

    public function bind()
    {
        return $this->queue->bind($this->exchange_name, $this->routing_key);
    }

    public function publish($message)
    {
        return $this->exchange->publish($message, $this->routing_key);
    }

    public function messages()
    {
        $msg = [];
        while ($message = $this->queue->get()) {
            $tag = $message->getDeliveryTag();
            $msg[$tag] = $message->getBody();
        }
        return $msg;
    }

    public function start()
    {
        $this->connect();
        $this->channel();
        $this->exchange();
        $this->queue();
        $this->bind();
    }
}
