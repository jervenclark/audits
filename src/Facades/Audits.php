<?php

namespace Jervenclark\Audits\Facades;

use Illuminate\Support\Facades\Facade;

class Audits extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'audits';
    }
}
