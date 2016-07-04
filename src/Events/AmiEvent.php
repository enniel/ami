<?php

namespace Enniel\Ami\Events;

use Clue\React\Ami\Protocol\Event;

class AmiEvent
{
    public $event;

    public function __construct(Event $event)
    {
        //
        $this->event = $event;
    }
}
