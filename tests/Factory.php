<?php

namespace Enniel\Ami\Tests;

use React\SocketClient\ConnectorInterface;
use React\Promise\FulfilledPromise;
use React\EventLoop\LoopInterface;
use React\Stream\Stream;
use Clue\React\Ami\Client;
use Enniel\Ami\Parser;

class Factory extends \Enniel\Ami\Factory
{
    /**
     * @param \React\EventLoop\LoopInterface         $loop
     * @param \React\SocketClient\ConnectorInterface $connector
     * @param \React\Stream\Stream                   $stream
     */
    public function __construct(LoopInterface $loop, ConnectorInterface $connector, Stream $stream)
    {
        parent::__construct($loop, $connector);
        $this->stream = $stream;
    }

    /**
     * Create client
     *
     * @param  array $options
     * @return \React\Promise\Promise
     */
    public function create(array $options = [])
    {
        return new FulfilledPromise(new Client($this->stream, new Parser()));
    }
}
