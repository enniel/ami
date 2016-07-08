<?php namespace Enniel\Ami\Events;

use Clue\React\Ami\Protocol\Event;

abstract class AbstractEvent {

    public $instance;

    public $options;

    public function __construct(Event $event, array $options = [])
    {
        //
        $this->instance = $event;
        $this->options = $options;
    }
}
