<?php

namespace Enniel\Ami\Commands;

use Clue\React\Ami\Client;
use Illuminate\Support\Arr;
use Clue\React\Ami\Protocol\Event;

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
        $name = $event->getName();
        $options = Arr::get($this->events, $name, []);
        $params = [$event, $options];
        $this->dispatcher->fire('ami.events.*', $params);
        $this->dispatcher->fire('ami.events.'.$name, $params);
    }

    public function client(Client $client)
    {
        parent::client($client);
        $this->info('starting listen ami');
        if ($this->option('monitor') && $this->runningInConsole()) {
            $client->on('event', [$this, 'eventMonitor']);
        }
        $client->on('close', function () {
            // the connection to the AMI just closed
            $this->info('closed listen ami');
        });
        $client->on('event', [$this, 'eventEmitter']);
        $this->dispatcher->fire('ami.listen.started', [$this, $client]);
    }
}
