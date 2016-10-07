<?php

namespace Enniel\Ami\Tests;

use Illuminate\Support\Facades\Event as Emitter;
use Clue\React\Ami\Protocol\Event;
use React\Stream\Stream;

class EventTest extends TestCase
{
    public function testEvents()
    {
        $messages = [
            [
                'Event'          => 'AgentConnect',
                'Privilege'      => 'agent,all',
                'Queue'          => 'taxi-operators',
                'Uniqueid'       => '1321511811.113',
                'Channe'         => ' SIP/100-00000072',
                'Member'         => 'SIP/100',
                'MemberName'     => 'SIP/100',
                'Holdtime'       => '10',
                'BridgedChannel' => '1321511815.114',
                'Ringtime'       => '9',
            ],
            [
                'Event'      => 'AgentComplete',
                'Privilege'  => 'agent,all',
                'Queue'      => 'taxi-operators',
                'Uniqueid'   => '1321511811.113',
                'Channel'    => 'SIP/100-00000072',
                'Member'     => 'SIP/100',
                'MemberName' => 'SIP/100',
                'HoldTime'   => '10',
                'TalkTime'   => '7',
                'Reason'     => 'caller',
            ],
            [
                'Event'       => 'Bridge',
                'Privilege'   => 'call,all',
                'Bridgestate' => 'Link',
                'Bridgetype'  => 'core',
                'Channel1'    => 'SIP/mangotrunk-0000016c',
                'Channel2'    => 'SIP/261-0000016d',
                'Uniqueid1'   => '1324068645.605',
                'Uniqueid2'   => '1324068650.606',
                'Callerid1'   => '74997623634',
                'Callerid2'   => '261',
            ],
            [
                'Event'        => 'Dial',
                'Privilege'    => 'call,all',
                'Subevent'     => 'Begin',
                'Channel'      => 'SIP/mangotrunk-0000016c',
                'Destination'  => 'SIP/261-0000016d',
                'Calleridnum'  => '74997623634',
                'Calleridname' => '74997623634',
                'Uniqueid'     => '1324068645.605',
                'Destuniqueid' => '1324068650.606',
                'Dialstring'   => '261',
            ],
            [
                'Event'     => 'FullyBooted',
                'Privilege' => 'system,all',
                'Status'    => 'Fully Booted',
            ],
            [
                'Event'             => 'Join',
                'Privilege'         => 'call,all',
                'Channel'           => 'SIP/multifon-out-00000071',
                'CallerIDNum'       => '79265224173',
                'CallerIDName'      => 'unknown',
                'ConnectedLineNum'  => 'unknown',
                'ConnectedLineName' => 'unknown',
                'Queue'             => 'taxi-operators',
                'Position'          => '1',
                'Count'             => '1',
                'Uniqueid'          => '1321511811.113',
            ],
            [
                'Event'     => 'Link',
                'Channel1'  => 'SIP/101-3f3f',
                'Channel2'  => 'Zap/2-1',
                'Uniqueid1' => '1094154427.10',
                'Uniqueid2' => '1094154427.11',
            ],
        ];
        Emitter::listen('ami.listen.started', function () use ($messages) {
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
        Emitter::listen('ami.events.agent_connect', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'          => 'AgentConnect',
                'Privilege'      => 'agent,all',
                'Queue'          => 'taxi-operators',
                'Uniqueid'       => '1321511811.113',
                'Channe'         => ' SIP/100-00000072',
                'Member'         => 'SIP/100',
                'MemberName'     => 'SIP/100',
                'Holdtime'       => '10',
                'BridgedChannel' => '1321511815.114',
                'Ringtime'       => '9',
            ]);
            $this->assertEquals($event->getName(), 'AgentConnect');
        });
        Emitter::listen('ami.events.agent_complete', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'      => 'AgentComplete',
                'Privilege'  => 'agent,all',
                'Queue'      => 'taxi-operators',
                'Uniqueid'   => '1321511811.113',
                'Channel'    => 'SIP/100-00000072',
                'Member'     => 'SIP/100',
                'MemberName' => 'SIP/100',
                'HoldTime'   => '10',
                'TalkTime'   => '7',
                'Reason'     => 'caller',
            ]);
            $this->assertEquals($event->getName(), 'AgentComplete');
        });
        Emitter::listen('ami.events.bridge', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'       => 'Bridge',
                'Privilege'   => 'call,all',
                'Bridgestate' => 'Link',
                'Bridgetype'  => 'core',
                'Channel1'    => 'SIP/mangotrunk-0000016c',
                'Channel2'    => 'SIP/261-0000016d',
                'Uniqueid1'   => '1324068645.605',
                'Uniqueid2'   => '1324068650.606',
                'Callerid1'   => '74997623634',
                'Callerid2'   => '261',
            ]);
            $this->assertEquals($event->getName(), 'Bridge');
        });
        Emitter::listen('ami.events.dial', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'        => 'Dial',
                'Privilege'    => 'call,all',
                'Subevent'     => 'Begin',
                'Channel'      => 'SIP/mangotrunk-0000016c',
                'Destination'  => 'SIP/261-0000016d',
                'Calleridnum'  => '74997623634',
                'Calleridname' => '74997623634',
                'Uniqueid'     => '1324068645.605',
                'Destuniqueid' => '1324068650.606',
                'Dialstring'   => '261',
            ]);
            $this->assertEquals($event->getName(), 'Dial');
        });
        Emitter::listen('ami.events.fully_booted', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'     => 'FullyBooted',
                'Privilege' => 'system,all',
                'Status'    => 'Fully Booted',
            ]);
            $this->assertEquals($event->getName(), 'FullyBooted');
        });
        Emitter::listen('ami.events.join', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'             => 'Join',
                'Privilege'         => 'call,all',
                'Channel'           => 'SIP/multifon-out-00000071',
                'CallerIDNum'       => '79265224173',
                'CallerIDName'      => 'unknown',
                'ConnectedLineNum'  => 'unknown',
                'ConnectedLineName' => 'unknown',
                'Queue'             => 'taxi-operators',
                'Position'          => '1',
                'Count'             => '1',
                'Uniqueid'          => '1321511811.113',
            ]);
            $this->assertEquals($event->getName(), 'Join');
        });
        Emitter::listen('ami.events.link', function (Event $event) {
            $this->assertEquals($event->getFields(), [
                'Event'     => 'Link',
                'Channel1'  => 'SIP/101-3f3f',
                'Channel2'  => 'Zap/2-1',
                'Uniqueid1' => '1094154427.10',
                'Uniqueid2' => '1094154427.11',
            ]);
            $this->assertEquals($event->getName(), 'Link');
            $this->running = false;
        });
        $this->running = true;
        $this->artisan('ami:listen');
    }
}
