<?php

namespace Enniel\Ami\Tests;

use Illuminate\Support\Facades\Event as Emitter;
use Clue\React\Ami\Protocol\Event;
use React\Stream\Stream;

class EventTest extends TestCase
{
    public function testListenEvent()
    {
        $stream = $this->app[Stream::class];
        Emitter::listen('ami.listen.started', function () use ($stream) {
            $stream->emit('data', ["Asterisk Call Manager/1.3\r\n"]);
            $stream->emit('data', ["Event: FullyBooted\r\nPrivilege: system,all\r\nStatus: Fully Booted\r\n\r\n"]);
        });
        Emitter::listen('ami.events.fully_booted', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'     => 'FullyBooted',
                'Privilege' => 'system,all',
                'Status'    => 'Fully Booted',
            ]);
        });
        $loop = $this->app['ami.eventloop'];
        //stop after first tick
        $loop->nextTick(function () use ($loop) {
            $loop->stop();
        });
        $this->artisan('ami:listen');
    }
}
