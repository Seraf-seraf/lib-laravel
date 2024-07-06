<?php

namespace App\Listeners;

use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Artisan;

class WarningHandler
{
    /**
     * Handle the event.
     */
    public function handle(CommandStarting $event): void
    {
        if ($event->command !== 'show:warning') {
            Artisan::call('show:warning');
        }
    }
}
