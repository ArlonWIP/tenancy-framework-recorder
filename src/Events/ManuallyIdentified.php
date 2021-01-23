<?php

namespace ArlonWIP\Tenancy\Recorder\Events;

use Tenancy\Tenant\Events\Event;

class ManuallyIdentified
{
    /**
     * @var Tenant
     */
    public $tenant;

    public $valid_tenant_class = false;

    public function __construct($tenant)
    {
        $this->tenant = $tenant;

        if ($this->tenant instanceof \Tenancy\Identification\Contracts\Tenant) {
            $this->valid_tenant_class = true;
        }
    }
}
