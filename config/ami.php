<?php

return [
    'host' => '127.0.0.1',
    'port' => 5038,
    'username' => null,
    'secret' => null,
    'listeners' => [
        'AgentCalled' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AgentComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AgentConnect' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AgentDump' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AgentLogin' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AgentLogoff' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AgentRingNoAnswer' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Agents' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AgentsComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AGIExecEnd' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AGIExecStart' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Alarm' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AlarmClear' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AOC-D' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AOC-E' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AOC-S' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AorDetail' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AsyncAGIEnd' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AsyncAGIExec' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AsyncAGIStart' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AttendedTransfer' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AuthDetail' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'AuthMethodNotAllowed' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BlindTransfer' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Bridge' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeAction' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeCreate' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeDestroy' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeEnter' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeExec' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeInfoChannel' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeInfoComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeLeave' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'BridgeMerge' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Cdr' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'CEL' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ChallengeResponseFailed' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ChallengeSent' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ChannelTalkingStart' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ChannelTalkingStop' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ChanSpyStart' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ChanSpyStop' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeEnd' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeJoin' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeLeave' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeMute' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeRecord' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeStart' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeStopRecord' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeTalking' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ConfbridgeUnmute' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ContactStatus' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ContactStatusDetail' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'CoreShowChannel' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'CoreShowChannelsComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DAHDIChannel' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DeviceStateChange' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DeviceStateListComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Dial' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DialBegin' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DialEnd' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DNDState' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DTMF' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DTMFBegin' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'DTMFEnd' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'EndpointDetail' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'EndpointDetailComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'EndpointList' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'EndpointListComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ExtensionStateListComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ExtensionStatus' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'FailedACL' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'FAXSession' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'FAXSessionsComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'FAXSessionsEntry' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'FAXStats' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'FAXStatus' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'FullyBooted' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Hangup' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'HangupHandlerPop' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'HangupHandlerPush' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'HangupHandlerRun' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'HangupRequest' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Hold' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'IdentifyDetail' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'InvalidAccountID' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'InvalidPassword' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'InvalidTransport' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Join' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Leave' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'LoadAverageLimit' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'LocalBridge' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'LocalOptimizationBegin' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'LocalOptimizationEnd' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'LogChannel' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Masquerade' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MCID' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MeetmeEnd' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MeetmeJoin' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MeetmeLeave' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MeetmeMute' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MeetmeTalking' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MeetmeTalkRequest' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MemoryLimit' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MessageWaiting' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MiniVoiceMail' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ModuleLoadReport' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MonitorStart' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MonitorStop' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MusicOnHoldStart' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MusicOnHoldStop' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MWIGet' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'MWIGetComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'NewAccountCode' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'NewCallerid' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Newchannel' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'NewExten' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'NewPeerAccount' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Newstate' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'OriginateResponse' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ParkedCall' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ParkedCallGiveUp' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ParkedCallSwap' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ParkedCallTimeOut' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'PeerStatus' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Pickup' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'PresenceStateChange' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'PresenceStateListComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'PresenceStatus' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueCallerAbandon' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueCallerJoin' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueCallerLeave' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueMemberAdded' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueMemberPause' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueMemberPaused' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueMemberPenalty' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueMemberRemoved' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueMemberRinginuse' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'QueueMemberStatus' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'ReceiveFAX' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Registry' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Reload' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Rename' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'RequestBadFormat' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'RequestNotAllowed' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'RequestNotSupported' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'RTCPReceived' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'RTCPSent' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SendFAX' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SessionLimit' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SessionTimeout' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Shutdown' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SIPQualifyPeerDone' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SoftHangupRequest' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SpanAlarm' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SpanAlarmClear' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Status' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'StatusComplete' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'SuccessfulAuth' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'TransportDetail' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'UnexpectedAddress' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'Unhold' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'UnParkedCall' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'UserEvent' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
        'VarSet' => [
            \Enniel\Ami\Events\AmiEvent::class,
        ],
    ],
];
