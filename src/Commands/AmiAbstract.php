<?php

namespace Enniel\Ami\Commands;

use Clue\React\Ami\Client;
use Clue\React\Ami\Protocol\Response;
use Enniel\Ami\Factory;
use Exception;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Arr;
use React\EventLoop\LoopInterface;

abstract class AmiAbstract extends Command
{
    protected $loop;

    protected $connector;

    protected $client;

    protected $config;

    protected $events;

    protected $dispatcher;

    public function __construct(Dispatcher $dispatcher, LoopInterface $loop, Factory $connector, array $config = [])
    {
        parent::__construct();
        $this->loop = $loop;
        $this->connector = $connector;
        $events = [];
        foreach (Arr::get($config, 'events', []) as $key => $value) {
            $key = mb_strtolower($key);
            $events[$key] = $value;
        }
        $this->events = $events;
        $this->config = $config;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = $this->connector->create($this->config);
        $client->then([$this, 'client'], [$this, 'writeException']);
        $this->loop->run();
    }

    public function client(Client $client)
    {
        $this->client = $client;
        $this->client->on('error', [$this, 'writeException']);
    }

    public function writeException(Exception $e)
    {
        $this->warn($e->getMessage());
        $this->stop();
    }

    public function writeResponse(Response $response)
    {
        $message = Arr::get($response->getFields(), 'Message', null);
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
}
