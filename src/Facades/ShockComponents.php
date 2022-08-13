<?php

namespace Titonova\ShockComponents\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Titonova\ShockComponents\ShockComponents
 */
class ShockComponents extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Titonova\ShockComponents\ShockComponents::class;
    }
}
