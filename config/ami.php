<?php

return [
    'host' => '127.0.0.1',
    'port' => 5038,
    'username' => null,
    'secret' => null,
    'dongle' => [
        'sms' => [
            'device' => null,
        ],
    ],
    'events' => [
        'AGIExec' => [
            'handler' => 'agi_exec',
            'options' => [
                
            ]
        ],
        'AgentConnect' => [
            'handler' => 'agent_connect',
            'options' => [

            ]
        ],
        'AgentComplete' => [
            'handler' => 'agent_complete',
            'options' => [

            ]
        ],
        'Agentlogin' => [
            'handler' => 'agent_login',
            'options' => [

            ]
        ],
        'Agentlogoff' => [
            'handler' => 'agent_logoff',
            'options' => [

            ]
        ],
        'Agents' => [
            'handler' => 'agents',
            'options' => [

            ]
        ],
        'AsyncAGI' => [
            'handler' => 'async_agi',
            'options' => [

            ]
        ],
        'Bridge' => [
            'handler' => 'bridge',
            'options' => [

            ]
        ],
        'CEL' => [
            'handler' => 'cel',
            'options' => [

            ]
        ],
        'ChannelUpdate' => [
            'handler' => 'channel_update',
            'options' => [

            ]
        ],
        'CoreShowChannel' => [
            'handler' => 'core_show_channel',
            'options' => [

            ]
        ],
        'CoreShowChannelsComplete' => [
            'handler' => 'core_show_channels_complete',
            'options' => [

            ]
        ],
        'DAHDIShowChannelsComplete' => [
            'handler' => 'dahdi_show_channels_complete',
            'options' => [

            ]
        ],
        'DAHDIShowChannels' => [
            'handler' => 'dahdi_show_channels',
            'options' => [

            ]
        ],
        'DBGetResponse' => [
            'handler' => 'db_get_response',
            'options' => [

            ]
        ],
        'DTMF' => [
            'handler' => 'dtmf',
            'options' => [

            ]
        ],
        'Dial' => [
            'handler' => 'dial',
            'options' => [

            ]
        ],
        'DongleDeviceEntry' => [
            'handler' => 'dongle_device_entry',
            'options' => [

            ]
        ],
        'DongleNewCUSD' => [
            'handler' => 'dongle_new_cusd',
            'options' => [

            ]
        ],
        'DongleNewUSSDBase64' => [
            'handler' => 'dongle_new_ussd_base64',
            'options' => [

            ]
        ],
        'DongleNewUSSD' => [
            'handler' => 'dongle_new_ussd',
            'options' => [

            ]
        ],
        'DongleSMSStatus' => [
            'handler' => 'dongle_sms_status',
            'options' => [

            ]
        ],
        'DongleShowDevicesComplete' => [
            'handler' => 'dongle_show_devices_complete',
            'options' => [

            ]
        ],
        'DongleStatus' => [
            'handler' => 'dongle_status',
            'options' => [

            ]
        ],
        'DongleUSSDStatus' => [
            'handler' => 'dongle_ussd_status',
            'options' => [

            ]
        ],
        'ExtensionStatus' => [
            'handler' => 'extension_status',
            'options' => [

            ]
        ],
        'FullyBooted' => [
            'handler' => 'fully_booted',
            'options' => [

            ]
        ],
        'Hangup' => [
            'handler' => 'hangup',
            'options' => [

            ]
        ],
        'Hold' => [
            'handler' => 'hold',
            'options' => [

            ]
        ],
        'JabberEvent' => [
            'handler' => 'jabber',
            'options' => [

            ]
        ],
        'Join' => [
            'handler' => 'join',
            'options' => [

            ]
        ],
        'Leave' => [
            'handler' => 'leave',
            'options' => [

            ]
        ],
        'Link' => [
            'handler' => 'link',
            'options' => [

            ]
        ],
        'ListDialPlan' => [
            'handler' => 'list_dial_plan',
            'options' => [

            ]
        ],
        'Masquerade' => [
            'handler' => 'masquerade',
            'options' => [

            ]
        ],
        'MessageWaiting' => [
            'handler' => 'message_waiting',
            'options' => [

            ]
        ],
        'MusicOnHold' => [
            'handler' => 'music_on_hold',
            'options' => [

            ]
        ],
        'NewAccountCode' => [
            'handler' => 'new_account_code',
            'options' => [

            ]
        ],
        'NewCallerid' => [
            'handler' => 'new_caller_id',
            'options' => [

            ]
        ],
        'Newchannel' => [
            'handler' => 'new_channel',
            'options' => [

            ]
        ],
        'Newexten' => [
            'handler' => 'new_extension',
            'options' => [

            ]
        ],
        'Newstate' => [
            'handler' => 'new_state',
            'options' => [

            ]
        ],
        'OriginateResponse' => [
            'handler' => 'originate_response',
            'options' => [

            ]
        ],
        'ParkedCall' => [
            'handler' => 'parked_call',
            'options' => [

            ]
        ],
        'ParkedCallsComplete' => [
            'handler' => 'parked_calls_complete',
            'options' => [

            ]
        ],
        'PeerEntry' => [
            'handler' => 'peer_entry',
            'options' => [

            ]
        ],
        'PeerStatus' => [
            'handler' => 'peer_status',
            'options' => [

            ]
        ],
        'PeerlistComplete' => [
            'handler' => 'peer_list_complete',
            'options' => [

            ]
        ],
        'QueueMemberAdded' => [
            'handler' => 'queue_member_added',
            'options' => [

            ]
        ],
        'QueueMember' => [
            'handler' => 'queue_member',
            'options' => [

            ]
        ],
        'QueueMemberPaused' => [
            'handler' => 'queue_member_paused',
            'options' => [

            ]
        ],
        'QueueMemberRemoved' => [
            'handler' => 'queue_member_removed',
            'options' => [

            ]
        ],
        'QueueMemberStatus' => [
            'handler' => 'queue_member_status',
            'options' => [

            ]
        ],
        'QueueParams' => [
            'handler' => 'queue_params',
            'options' => [

            ]
        ],
        'QueueStatusComplete' => [
            'handler' => 'queue_status_complete',
            'options' => [

            ]
        ],
        'QueueSummaryComplete' => [
            'handler' => 'queue_summary_complete',
            'options' => [

            ]
        ],
        'QueueSummary' => [
            'handler' => 'queue_summary',
            'options' => [

            ]
        ],
        'RTCPReceived' => [
            'handler' => 'rtcp_received',
            'options' => [

            ]
        ],
        'RTCPReceiverStat' => [
            'handler' => 'rtcp_receiver_stat',
            'options' => [

            ]
        ],
        'RTCPSent' => [
            'handler' => 'rtcp_sent',
            'options' => [

            ]
        ],
        'RTPReceiverStat' => [
            'handler' => 'rtp_receiver_stat',
            'options' => [

            ]
        ],
        'RTPSenderStat' => [
            'handler' => 'rtp_sender_stat',
            'options' => [

            ]
        ],
        'RegistrationsComplete' => [
            'handler' => 'registrations_complete',
            'options' => [

            ]
        ],
        'Registry' => [
            'handler' => 'registry',
            'options' => [

            ]
        ],
        'Rename' => [
            'handler' => 'rename',
            'options' => [

            ]
        ],
        'ShowDialPlanComplete' => [
            'handler' => 'show_dial_plan_complete',
            'options' => [

            ]
        ],
        'StatusComplete' => [
            'handler' => 'status_complete',
            'options' => [

            ]
        ],
        'Status' => [
            'handler' => 'status',
            'options' => [

            ]
        ],
        'Transfer' => [
            'handler' => 'transfer',
            'options' => [

            ]
        ],
        'UnParkedCall' => [
            'handler' => 'unparked_call',
            'options' => [

            ]
        ],
        'Unlink' => [
            'handler' => 'unlink',
            'options' => [

            ]
        ],
        'UserEvent' => [
            'handler' => 'user_event',
            'options' => [

            ]
        ],
        'VarSet' => [
            'handler' => 'var_set',
            'options' => [

            ]
        ]
    ]
];
