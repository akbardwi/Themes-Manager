<?php

declare(strict_types=1);

namespace Akbardwi\ThemesManager\Console\Commands;

use Akbardwi\ThemesManager\Facades\ThemesManager;
use Illuminate\Console\Command;

class RemoveThemes extends Command
{
    /**
     * The console command name.
     */
    protected $signature = 'theme:remove {themeName?} {--force}';

    /**
     * The console command description.
     */
    protected $description = 'Remove a theme';

    /**
     * List of existing themes.
     */
    // protected array $theme = [];

    /**
     * Prompt for module's alias name.
     */
    public function handle(): void
    {
        // Get themes name
        $themeName = $this->argument('themeName');
        if ($themeName == "") {
            $themes = ThemesManager::all()->toArray();
            $themeName = $this->choice('Select a theme to remove', array_keys($themes));
        }

        // Remove without confirmation?
        $force = $this->option('force');

        // Check that theme exists
        if (!ThemesManager::has($themeName)) {
            $this->error("Theme $themeName not found.");
            return;
        }

        // Confirm removal
        if (!$force) {
            $this->info("You are about to remove theme $themeName.");
            if (!$this->confirm('Do you want to continue?')) {
                return;
            }
        }

        // Remove theme
        ThemesManager::remove($themeName);
        $this->info("Theme $themeName removed successfully.");
        // dd($theme);
    }
}
