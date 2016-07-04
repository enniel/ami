<?php

namespace Enniel\Ami\Commands;

use Illuminate\Console\Command;
use React\EventLoop\LoopInterface;
use Clue\React\Ami\Client;
use Clue\React\Ami\Factory;
use Clue\React\Ami\Protocol\Response;
use Clue\React\Ami\Protocol\UnexpectedValueException;
use Exception;

abstract class AmiAbstract extends Command
{
    protected $loop;

    protected $connector;

    protected $client;

    protected $events;

    public function __construct(LoopInterface $loop, Factory $connector)
    {
        parent::__construct();
        $this->loop = $loop;
        $this->connector = $connector;
    }

    public function uri()
    {
        extract($this->option());
        $host = isset($host) ? $host : config('ami.host');
        $port = isset($port) ? $port : config('ami.port');
        $username = isset($username) ? $username : config('ami.username');
        $secret = isset($secret) ? $secret : config('ami.secret');

        return "tcp://{$username}:{$secret}@{$host}:{$port}";
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = $this->connector->createClient($this->uri());
        $client->then([$this, 'client'], [$this, 'writeException']);
        $this->loop->run();
    }

    public function client(Client $client)
    {
        $this->client = $client;
        $this->events();
        $this->client->on('error', [$this, 'writeException']);
    }

    public function writeException(Exception $e)
    {
        $this->warn($e->getMessage());
        if (!($e instanceof UnexpectedValueException)) {
            $this->stop();
        }
    }

    public function writeResponse(Response $response)
    {
        $message = array_get($response->getFields(), 'Message', null);
        $this->line($message);
        $this->stop();
    }

    public function request($action, array $options = [])
    {
        return $this->client->request($this->client->createAction($action, $options));
    }

    public function stop()
    {
        $this->loop->stop();

        return false;
    }

    public function events()
    {
        $events = $this->events || false;
        $mask = 'off';
        if ($events === false) {
            $mask = 'off';
        } elseif ($events === true) {
            $mask = 'on';
        } else {
            $mask = implode(',', $events);
        }

        return $this->request('Events', [
            'EventMask' => $mask,
        ]);
    }
}
