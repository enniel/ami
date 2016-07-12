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

    protected $config;

    public function __construct(LoopInterface $loop, Factory $connector, array $config = [])
    {
        parent::__construct();
        $this->loop = $loop;
        $this->connector = $connector;
        $events = [];
        foreach (array_get($config, 'events', []) as $key => $value) {
            $key = mb_strtolower($key);
            $events[$key] = $value;
        }
        $config['events'] = $events;
        $this->config = $config;
    }

    public function uri()
    {
        $options = $this->option();
        $options = is_array($options) ? $options : [];
        foreach ($options as $key => $value) {
            if(!in_array($key, ['host', 'port', 'username', 'secret']) || empty($value)) {
                unset($options[$key]);
            }
        }
        $options = array_merge($this->config, $options);
        extract($options);
        $host = isset($host) ? $host : '127.0.0.1';
        $port = isset($port) ? $port : 5038;
        $username = isset($username) ? $username : null;
        $secret = isset($secret) ? $secret : null;
        $auth = '';
        if($username && $secret) {
            $auth = "{$username}:{$secret}@";
        }
        return "tcp://{$auth}{$host}:{$port}";
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
}
