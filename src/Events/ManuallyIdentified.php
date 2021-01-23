<?php

namespace ArlonWIP\Tenancy\Recorder\Events;

use Tenancy\Tenant\Events\Event;

class ManuallyIdentified
{
    public $tenant;

    public $validTenantClass = false;

    public function __construct($tenant)
    {
        $this->tenant = $tenant;

        if ($this->tenant instanceof \Tenancy\Identification\Contracts\Tenant) {
            $this->validTenantClass = true;
        }
    }
}
