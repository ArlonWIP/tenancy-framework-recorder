<?php

namespace ArlonWIP\Tenancy\Recorder;

use ArlonWIP\Tenancy\Recorder\Events\ManuallyIdentified;
use Illuminate\Support\Facades\Event;
use Tenancy\Identification\Events\Identified;
use Tenancy\Identification\Events\NothingIdentified;
use Tenancy\Identification\Events\Switched;

class Recorder
{
    protected static $recording = true;

    protected static $events = [];

    public function handle($event)
    {
        $this->registerEvent($event);

        if ($event instanceof Switched) {
            $this->handleSwitched($event);
        }

        if ($event instanceof Identified) {
            $this->handleIdentified($event);
        }

        if ($event instanceof NothingIdentified) {
            $this->handleNothingIdentified($event);
        }
    }

    protected function registerEvent($event)
    {
        self::$events[] = $event;
    }

    protected function handleSwitched(Switched $event)
    {
        if (self::$recording) {
            Event::dispatch(new ManuallyIdentified($event->tenant));
        }

        self::$recording = true;
    }
    
    protected function handleIdentified(Identified $event)
    {
        self::$recording = false;
    }

    protected function handleNothingIdentified(NothingIdentified $event)
    {
        self::$recording = false;
    }
}
