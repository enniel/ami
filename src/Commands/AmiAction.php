<?php

namespace Enniel\Ami\Commands;

use Enniel\Ami\Ami;
use Illuminate\Console\Command;
use Clue\React\Ami\Client;

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

    public function client(Client $client)
    {
        parent::client($client);
        $arguments = $this->option('arguments');
        $arguments = is_array($arguments) ? $arguments : [];
        $options = [];
        foreach ($arguments as $value) {
            $array = explode(':', $value);
            if ($key = array_get($array, 0, null)) {
                $value = array_get($array, 1, '');
                $options[$key] = $value;
            }
        }

        $this->request($this->argument('action'), $options)->then([$this, 'writeResponse'], [$this, 'writeException']);
    }
}
