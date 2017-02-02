<?php

namespace Enniel\Ami\Tests;

use Clue\React\Ami\Protocol\Response;

class ActionTest extends TestCase
{
    public function testActions()
    {
        $messages = [
            [
                'Response' => 'Success',
                'ActionID' => '1',
                'Message' => 'Channel status will follow',
            ],
        ];
        $this->events->listen('ami.action.sended', function () use ($messages) {
            $this->assertTrue(true);
            $this->stream->emit('data', ["Asterisk Call Manager/1.3\r\n"]);
            foreach ($messages as $lines) {
                $message = '';
                foreach ($lines as $key => $value) {
                    $message .= "{$key}: {$value}\r\n";
                }
                $this->stream->emit('data', ["{$message}\r\n"]);
            }
        });
        $this->events->listen('ami.action.responsed', function ($console, $action, Response $response) {
            $this->assertEquals('Status', $action);
            $this->assertEquals($response->getFields(), [
                'Response' => 'Success',
                'ActionID' => '1',
                'Message' => 'Channel status will follow',
            ]);
        });
        $this->console('ami:action', [
            'action' => 'Status',
        ]);
    }
}
