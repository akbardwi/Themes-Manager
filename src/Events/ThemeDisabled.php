<?php

declare(strict_types=1);

namespace Akbardwi\ThemesManager\Events;

use Akbardwi\ThemesManager\Theme;

class ThemeDisabled
{
    public Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }
}
