<?php

namespace Enniel\Ami;

use React\Stream\Stream;
use Clue\React\Ami\Client;
use Illuminate\Support\Arr;
use Clue\React\Ami\ActionSender;
use React\EventLoop\LoopInterface;
use React\SocketClient\ConnectorInterface;

class Factory
{
    /**
     * @var \React\EventLoop\LoopInterface
     */
    protected $loop;

    /**
     * @var \React\SocketClient\ConnectorInterface
     */
    protected $connector;

    /**
     * @param \React\EventLoop\LoopInterface         $loop
     * @param \React\SocketClient\ConnectorInterface $connector
     */
    public function __construct(LoopInterface $loop, ConnectorInterface $connector)
    {
        $this->connector = $connector;
        $this->loop = $loop;
    }

    /**
     * Create client.
     *
     * @param array $options
     *
     * @return \React\Promise\Promise
     */
    public function create(array $options = [])
    {
        foreach (['host', 'port', 'username', 'secret'] as $key) {
            $options[$key] = Arr::get($options, $key, null);
        }
        $promise = $this->connector->create($options['host'], $options['port'])->then(function (Stream $stream) {
            return new Client($stream, new Parser());
        });
        if (!is_null($options['username'])) {
            $promise = $promise->then(function (Client $client) use ($options) {
                $sender = new ActionSender($client);

                return $sender->login($options['username'], $options['secret'])->then(
                    function () use ($client) {
                        return $client;
                    },
                    function ($error) use ($client) {
                        $client->close();
                        throw $error;
                    }
                );
            }, function ($error) {
                throw $error;
            });
        }

        return $promise;
    }
}
