<?php

namespace Enniel\Ami\Commands;

use Clue\React\Ami\Client;
use jackkum\PHPPDU\Submit;
use Clue\React\Ami\Protocol\Response;

class AmiSms extends AmiAbstract
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ami:dongle:sms
                                {--host= : Asterisk ami host}
                                {--port= : Asterisk ami port}
                                {--username= : Asterisk ami username}
                                {--secret= : Asterisk ami secret key}
                                {device : Device}
                                {number : Phone number}
                                {message? : Message text}
                                {--pdu : Use pdu mode}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms from asterisk ami using chan dongle';

    public function sendSms()
    {
        $this->request('DongleSendSms', [
            'Device' => $this->argument('device'),
            'Number' => $this->argument('number'),
            'Message' => $this->argument('message'),
        ])->then([$this, 'writeResponse'], [$this, 'writeException']);
    }

    public function sendPdu()
    {
        $pdu = new Submit();
        $pdu->setAddress($this->argument('number'));
        $pdu->setData($this->argument('message'));
        $promises = [];
        foreach ($pdu->getParts() as $part) {
            $promises[] = $this->request('DongleSendPdu', [
                'Device' => $this->argument('device'),
                'PDU' => (string) $part,
            ]);
        }
        $promise = \React\Promise\map($promises, function (Response $response) {
            $message = array_get($response->getFields(), 'Message', null);
            $this->line($message);
        });
        $promise->then([$this, 'stop'], [$this, 'writeException']);
    }

    public function client(Client $client)
    {
        parent::client($client);
        $func = 'sendSms';
        if ($this->option('pdu')) {
            $func = 'sendPdu';
        }
        call_user_func([$this, $func]);
    }
}