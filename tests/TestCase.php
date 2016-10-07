<?php

namespace Enniel\Ami\Tests;

use React\EventLoop\LoopInterface;
use React\Stream\Stream;

abstract class TestCase extends \Orchestra\Testbench\TestCase
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
     * @var boolean
     */
    protected $running;

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            \Enniel\Ami\Tests\AmiServiceProvider::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->loop   = $this->app[LoopInterface::class];
        $this->loop->nextTick(function () {
            if (! $this->running) {
                $this->loop->stop();
            }
        });
        $this->stream = $this->app[Stream::class];
    }
}
