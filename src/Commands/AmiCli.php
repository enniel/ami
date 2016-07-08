<?php

namespace Enniel\Ami\Commands;

use Clue\React\Ami\Client;
use Clue\React\Ami\Protocol\Response;

class AmiCli extends AmiAbstract
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ami:cli
                                {--host= : Asterisk ami host}
                                {--port= : Asterisk ami port}
                                {--username= : Asterisk ami username}
                                {--secret= : Asterisk ami secret key}
                                {cli? : Command}
                                {--autoclose : Close after call command}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send command from asterisk ami cli';

    protected $exit = [
        'quit', 'exit',
    ];

    public function client(Client $client)
    {
        parent::client($client);
        // client connected and authenticated
        $this->info('starting ami cli interface');
        $command = $this->argument('cli');
        if (!empty($command)) {
            $this->sendCommand($command);
        } else {
            $this->writeInterface();
        }
        $client->on('close', function () {
            // the connection to the AMI just closed
            $this->info('closed ami cli');
        });
    }

    public function sendCommand($command)
    {
        $this->request('Command', [
            'Command' => $command,
        ])->then([$this, 'writeResponse'], [$this, 'writeException']);
    }

    public function writeInterface()
    {
        $command = $this->ask('Write command');
        if (in_array(mb_strtolower($command), $this->exit)) {
            $this->stop();
        }
        $this->sendCommand($command);
    }

    public function writeResponse(Response $response)
    {
        $this->line($response->getCommandOutput());
        $autoclose = $this->option('autoclose');
        if ($autoclose) {
            $this->stop();
        }
        $this->writeInterface();
    }
}
