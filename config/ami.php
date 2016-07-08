<?php

return [
    'host' => '127.0.0.1',
    'port' => 5038,
    'username' => null,
    'secret' => null,
    'classes' => [
        'event' => \Enniel\Ami\Events\AmiEvent::class,
    ],
    'events' => [
        //agent
        'Agentcallbacklogin'        => [
            'handler' => 'agent.callback.login',
            'options' => [

            ],
        ],
        'Agentcallbacklogoff'       => [
            'handler' => 'agent.callback.logoff',
            'options' => [

            ],
        ],
        'AgentCalled'               => [
            'handler' => 'agent.called',
            'options' => [

            ],
        ],
        'AgentComplete'             => [
            'handler' => 'agent.complete',
            'options' => [

            ],
        ],
        'AgentConnect'              => [
            'handler' => 'agent.connect',
            'options' => [

            ],
        ],
        'AgentDump'                 => [
            'handler' => 'agent.dump',
            'options' => [

            ],
        ],
        'Agentlogin'                => [
            'handler' => 'agent.login',
            'options' => [

            ],
        ],
        'Agentlogoff'               => [
            'handler' => 'agent.logoff',
            'options' => [

            ],
        ],
        //dongle
        'DongleDeviceEntry'         => [
            'handler' => 'dongle.device.entry',
            'options' => [

            ]
        ],
        'DongleShowDevicesComplete' => [
            'handler' => 'dongle.devices.show.complete',
            'options' => [

            ]
        ],
        'DongleUSSDStatus'          => [
            'handler' => 'dongle.ussd.status',
            'options' => [

            ]
        ],
        'DongleSMSStatus'           => [
            'handler' => 'dongle.sms.status',
            'options' => [

            ]
        ],
        'DongleNewCUSD'             => [
            'handler' => 'dongle.cusd.new',
            'options' => [

            ]
        ],
        'DongleNewUSSD'             => [
            'handler' => 'dongle.ussd.new',
            'options' => [

            ]
        ],
        'DongleNewUSSDBase64'       => [
            'handler' => 'dongle.ussd.base64.new',
            'options' => [

            ]
        ],
        'DongleCEND'                => [
            'handler' => 'dongle.cend',
            'options' => [

            ]
        ],
        'DongleCallStateChange'     => [
            'handler' => 'dongle.call.state.change',
            'options' => [

            ]
        ],
        'DongleStatus'              => [
            'handler' => 'dongle.status',
            'options' => [

            ]
        ],
        'DongleNewCMGR'             => [
            'handler' => 'dongle.cmgr.new',
            'options' => [

            ]
        ],
        'DongleNewSMS'              => [
            'handler' => 'dongle.sms.new',
            'options' => [

            ]
        ],
        'DongleNewSMSBase64'        => [
            'handler' => 'dongle.sms.base64.new',
            'options' => [

            ]
        ],
        'DonglePortFail'            => [
            'handler' => 'dongle.port.fail',
            'options' => [

            ]
        ],
        //queue
        'QueueMemberAdded'          => [
            'handler' => 'queue.member.added',
            'options' => [

            ],
        ],
        'QueueMemberPaused'         => [
            'handler' => 'queue.member.paused',
            'options' => [

            ],
        ],
        'QueueMemberStatus'         => [
            'handler' => 'queue.member.status',
            'options' => [

            ],
        ],
        'QueueParams'               => [
            'handler' => 'queue.params',
            'options' => [

            ],
        ],
        'QueueMember'               => [
            'handler' => 'queue.member',
            'options' => [

            ],
        ],
        'QueueStatus'               => [
            'handler' => 'queue.status',
            'options' => [

            ],
        ],
        //meetme
        'MeetmeJoin'                => [
            'handler' => 'meetme.join',
            'options' => [

            ],
        ],
        'MeetmeLeave'               => [
            'handler' => 'meetme.leave',
            'options' => [

            ],
        ],
        'MeetmeStopTalking'         => [
            'handler' => 'meetme.talking.stop',
            'options' => [

            ],
        ],
        'MeetmeTalking'             => [
            'handler' => 'meetme.talking',
            'options' => [

            ],
        ],
        //hangup
        'SoftHangupRequest'         => [
            'handler' => 'hangup.request.soft',
            'options' => [

            ],
        ],
        'HangupRequest'             => [
            'handler' => 'hangup.request',
            'options' => [

            ],
        ],
        'Hangup'                    => [
            'handler' => 'hangup',
            'options' => [

            ],
        ],
        //call
        'UnParkedCall'              => [
            'handler' => 'call.unparked',
            'options' => [

            ],
        ],
        'ParkedCall'                => [
            'handler' => 'call.parked',
            'options' => [

            ],
        ],
        //channel
        'ChannelUpdate'             => [
            'handler' => 'channel.update',
            'options' => [

            ],
        ],
        'ChannelReload'             => [
            'handler' => 'channel.reload',
            'options' => [

            ],
        ],
        'LogChannel'                => [
            'handler' => 'channel.log',
            'options' => [

            ],
        ],
        'Newchannel'                => [
            'handler' => 'channel.new',
            'options' => [

            ],
        ],
        //extension
        'ExtensionStatus'           => [
            'handler' => 'extension.status',
            'options' => [

            ],
        ],
        'Newexten'                  => [
            'handler' => 'extension.new',
            'options' => [

            ],
        ],
        //bridge
        'Bridge'                    => [
            'handler' => 'bridge',
            'options' => [

            ],
        ],
        'LocalBridge'               => [
            'handler' => 'bridge.local',
            'options' => [

            ],
        ],
        //alarm
        'Alarm'                     => [
            'handler' => 'alarm',
            'options' => [

            ],
        ],
        'AlarmClear'                => [
            'handler' => 'alarm.clear',
            'options' => [

            ],
        ],
        //status
        'Status'                    => [
            'handler' => 'status',
            'options' => [

            ],
        ],
        'StatusComplete'            => [
            'handler' => 'status.complete',
            'options' => [

            ],
        ],
        //zap channel
        'ZapShowChannels'           => [
            'handler' => 'zap.channel.show',
            'options' => [

            ],
        ],
        'ZapShowChannelsComplete'   => [
            'handler' => 'zap.channel.show.complete',
            'options' => [

            ],
        ],
        //cdr
        'Cdr'                       => [
            'handler' => 'cdr',
            'options' => [

            ],
        ],
        'SetCDRUserField'           => [
            'handler' => 'cdr.set.field.user',
            'options' => [

            ],
        ],
        //others
        'Dial'                      => [
            'handler' => 'dial',
            'options' => [

            ],
        ],
        'Masquerade'                => [
            'handler' => 'masquerade',
            'options' => [

            ],
        ],
        'SkypeBuddyStatus'          => [
            'handler' => 'skype.buddy.status',
            'options' => [

            ],
        ],
        'DNDState'                  => [
            'handler' => 'dnd.state',
            'options' => [

            ],
        ],
        'PeerStatus'                => [
            'handler' => 'peer.status',
            'options' => [

            ],
        ],
        'Registry'                  => [
            'handler' => 'registry',
            'options' => [

            ],
        ],
        'Reload'                    => [
            'handler' => 'reload',
            'options' => [

            ],
        ],
        'Shutdown'                  => [
            'handler' => 'shutdown',
            'options' => [

            ],
        ],
        'UserEvent'                 => [
            'handler' => 'user',
            'options' => [

            ],
        ],
        'DTMF'                      => [
            'handler' => 'dtmf',
            'options' => [

            ],
        ],
        'VarSet'                    => [
            'handler' => 'var.set',
            'options' => [

            ],
        ],
        'NewAccountCode'            => [
            'handler' => 'account.code.new',
            'options' => [

            ],
        ],
        'MusicOnHold'               => [
            'handler' => 'music.on.hold',
            'options' => [

            ],
        ],
        'Join'                      => [
            'handler' => 'join',
            'options' => [

            ],
        ],
        'Leave'                     => [
            'handler' => 'leave',
            'options' => [

            ],
        ],
        'Link'                      => [
            'handler' => 'link',
            'options' => [

            ],
        ],
        'MessageWaiting'            => [
            'handler' => 'message.waiting',
            'options' => [

            ],
        ],
        'Newcallerid'               => [
            'handler' => 'caller.id.new',
            'options' => [

            ],
        ],
        'Rename'                    => [
            'handler' => 'rename',
            'options' => [

            ],
        ],
        'Unlink'                    => [
            'handler' => 'unlink',
            'options' => [

            ],
        ],
        'RTPReceiverStat'           => [
            'handler' => 'rtp.receiver.stat',
            'options' => [

            ],
        ],
        'RTCPSent'                  => [
            'handler' => 'rtcp.sent',
            'options' => [

            ],
        ],
        'RTCPReceived'              => [
            'handler' => 'rtcp.received',
            'options' => [

            ],
        ],
        'Newstate'                  => [
            'handler' => 'state.new',
            'options' => [

            ],
        ],
        'ParkedCallsComplete'       => [
            'handler' => 'calls.parked.complete',
            'options' => [

            ],
        ],
    ]
];
