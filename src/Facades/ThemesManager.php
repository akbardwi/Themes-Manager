<?php

declare(strict_types=1);

namespace Akbardwi\ThemesManager\Facades;

use Illuminate\Support\Facades\Facade;

class ThemesManager extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'themes-manager';
    }
}
