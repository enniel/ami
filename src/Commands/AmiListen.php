<?php

namespace Enniel\Ami\Commands;

use Enniel\Ami\Ami;
use Illuminate\Console\Command;
use Clue\React\Ami\Client;
use Clue\React\Ami\Protocol\Event;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Closure;

class AmiListen extends AmiAbstract
{
    use DispatchesJobs;
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

    protected $events = true;

    public function listeners(Event $event)
    {
        $event = $event->getName();
        $listeners = array_get($this->config, 'listeners', []);

        return isset($listeners[$event]) ? $listeners[$event] : [];
    }

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

    public function eventListener(Event $event)
    {
        foreach ($this->listeners($event) as $listener) {
            $handler = $listener;
            $delay = 0;
            if (is_array($listener)) {
                $handler = array_get($listener, 'handler', false);
                $delay = (int) array_get($listener, 'arguments.delay', 0);
            }
            if ($handler) {
                if (is_callable($handler) && $handler instanceof Closure) {
                    call_user_func_array($handler, [$event]);
                } elseif (is_callable($handler, 'handle')) {
                    $handler = app()->make($handler, [$event]);
                    if ($handler instanceof ShouldQueue) {
                        $this->dispatch($handler->delay($delay));
                    } else {
                        event($handler);
                    }
                } elseif (is_callable($handler, '__construct')) {
                    event(new $handler($event));
                }
            }
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
        $client->on('event', [$this, 'eventListener']);
    }
}
