<?php

namespace Enniel\Ami\Commands;

use Clue\React\Ami\Client;
use Clue\React\Ami\Protocol\Event;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event as Emitter;

class AmiListen extends AmiAbstract
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ami:listen
                                {--host= : Asterisk ami host}
                                {--port= : Asterisk ami port}
                                {--username= : Asterisk ami username}
                                {--secret= : Asterisk ami secret key}
                                {--monitor : Using monitor mode}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start client for asterisk ami';

    protected $headers = [
        'Field',
        'Value',
    ];

    public function eventMonitor(Event $event)
    {
        $this->info($event->getName());
        $fields = [];
        foreach ($event->getFields() as $key => $value) {
            $fields[] = [
                $key,
                $value,
            ];
        }
        $this->table($this->headers, $fields);
    }

    public function eventEmitter(Event $event)
    {
        $name = mb_strtolower($event->getName());
        $handler = Arr::get($this->events, $name.'.handler');
        $options = Arr::get($this->events, $name.'.options', []);
        $params = [$event, $options];
        Emitter::fire('ami.events.*', $params);
        if ($handler) {
            Emitter::fire('ami.events.'.$handler, $params);
        }
    }

    public function client(Client $client)
    {
        parent::client($client);
        $this->info('starting listen ami');
        if ($this->option('monitor')) {
            $client->on('event', [$this, 'eventMonitor']);
        }
        $client->on('close', function () {
            // the connection to the AMI just closed
            $this->info('closed listen ami');
        });
        $client->on('event', [$this, 'eventEmitter']);
        Emitter::fire('ami.listen.started', [$this, $client]);
    }
}
