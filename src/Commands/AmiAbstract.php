<?php

namespace Enniel\Ami\Commands;

use Exception;
use Enniel\Ami\Factory;
use Clue\React\Ami\Client;
use Illuminate\Support\Arr;
use Illuminate\Events\Dispatcher;
use React\EventLoop\LoopInterface;
use Clue\React\Ami\Protocol\Response;

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
        $this->events = Arr::get($config, 'events', []);
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
        $options = $this->options();
        foreach (['host', 'port', 'username', 'secret'] as $key) {
            $value = Arr::get($options, $key, null);
            $value = is_null($value) ? Arr::get($this->config, $key, null) : $value;
            $options[$key] = $value;
        }
        $client = $this->connector->create($options);
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
