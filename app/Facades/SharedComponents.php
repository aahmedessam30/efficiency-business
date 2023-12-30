<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static carouselSection()
 */
class SharedComponents extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shared-components';
    }
}
