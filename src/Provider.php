<?php

namespace ArlonWIP\Tenancy\Recorder;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Events\Identified;
use Tenancy\Identification\Events\NothingIdentified;
use Tenancy\Identification\Events\Switched;

class Provider extends ServiceProvider
{
    public function register()
    {
        Event::listen(Identified::class, Recorder::class);
        Event::listen(NothingIdentified::class, Recorder::class);
        Event::listen(Switched::class, Recorder::class);
    }
}
