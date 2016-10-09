<?php

namespace Enniel\Ami\Tests;

use Illuminate\Config\Repository;
use Illuminate\Console\Application as Console;
use Illuminate\Container\Container;
use Illuminate\Events\EventServiceProvider;
use React\EventLoop\LoopInterface;
use React\Stream\Stream;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \React\EventLoop\LoopInterface
     */
    protected $loop;

    /**
     * @var \React\Stream\Stream
     */
    protected $stream;

    /**
     * @var bool
     */
    protected $running;

    /**
     * @var \Illuminate\Events\Dispatcher
     */
    protected $events;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $app = new Container();
        $app->instance('config', new Repository());
        (new EventServiceProvider($app))->register();
        (new AmiServiceProvider($app))->register();
        $this->loop = $app[LoopInterface::class];
        $this->loop->nextTick(function () {
            if (!$this->running) {
                $this->loop->stop();
            }
        });
        $this->stream = $app[Stream::class];
        $this->events = $app['events'];
        $this->app = $app;
    }

    /**
     * Call console command.
     *
     * @param string $command
     */
    protected function console($command)
    {
        return (new Console($this->app, $this->events, '5.3'))->call($command);
    }
}
