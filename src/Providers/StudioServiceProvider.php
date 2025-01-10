<?php

namespace lf11\Studio\Providers;

use lf11\Studio\Console\Commands\BotManCacheClear;
use lf11\Studio\Console\Commands\BotManInstallDriver;
use lf11\Studio\Console\Commands\BotManListDrivers;
use lf11\Studio\Console\Commands\BotManMakeConversation;
use lf11\Studio\Console\Commands\BotManMakeMiddleware;
use lf11\Studio\Console\Commands\BotManMakeTest;
use Illuminate\Support\ServiceProvider;
use TheCodingMachine\Discovery\Discovery;

class StudioServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->commands([
            BotManListDrivers::class,
            BotManInstallDriver::class,
            BotManMakeMiddleware::class,
            BotManMakeConversation::class,
            BotManMakeTest::class,
            BotManCacheClear::class,
        ]);

        $this->discoverCommands();
    }

    /**
     * Auto-discover BotMan commands and load them.
     */
    public function discoverCommands()
    {
        $this->commands(Discovery::getInstance()->get('botman/commands'));
    }
}
