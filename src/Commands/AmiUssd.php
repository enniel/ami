<?php

namespace Enniel\Ami\Commands;

class AmiUssd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ami:dongle:ussd
                                {--host= : Asterisk ami host}
                                {--port= : Asterisk ami port}
                                {--username= : Asterisk ami username}
                                {--secret= : Asterisk ami secret key}
                                {device : Device}
                                {ussd : Ussd command}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send ussd from asterisk ami using chan dongle';

    public function handle()
    {
        $this->call('ami:action', [
            'action' => 'DongleSendUSSD',
            '--arguments' => [
                "Device:{$this->argument('device')}",
                "USSD:{$this->argument('ussd')}",
            ],
        ]);
    }
}
