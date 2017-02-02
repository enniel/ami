<?php

namespace Enniel\Ami\Commands;

use Exception;
use Clue\React\Ami\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Clue\React\Ami\Protocol\Response;

class AmiAction extends AmiAbstract
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ami:action
                                {--host= : Asterisk ami host}
                                {--port= : Asterisk ami port}
                                {--username= : Asterisk ami username}
                                {--secret= : Asterisk ami secret key}
                                {action : Action name}
                                {--arguments=* : Arguments for ami action}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send action from asterisk ami';

    protected $headers = [
        'Field',
        'Value',
    ];

    public function client(Client $client)
    {
        parent::client($client);
        $arguments = $this->option('arguments');
        $arguments = is_array($arguments) ? $arguments : [];
        $options = [];
        $isAssoc = Arr::isAssoc($arguments);
        foreach ($arguments as $key => $value) {
            if (Str::contains($value, ':') && !$isAssoc) {
                $array = explode(':', $value);
                if ($key = Arr::get($array, 0)) {
                    $value = Arr::get($array, 1, '');
                    $options[$key] = $value;
                }
            } else {
                $options[$key] = $value;
            }
        }

        $action = $this->argument('action');
        $request = $this->request($action, $options);

        $this->dispatcher->fire('ami.action.sended', [$this, $action, $request]);

        $request->then(
            function (Response $response) use ($action) {
                $this->dispatcher->fire('ami.action.responsed', [$this, $action, $response]);
                if ($this->runningInConsole()) {
                    $this->responseMonitor($response);
                }
                $this->stop();
            },
            function (Exception $exception) {
                throw $exception;
            });
    }

    public function responseMonitor(Response $response)
    {
        $fields = [];
        foreach ($response->getFields() as $key => $value) {
            $fields[] = [
                $key,
                $value,
            ];
        }
        $this->table($this->headers, $fields);
    }
}
