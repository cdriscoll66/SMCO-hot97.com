<?php

namespace App\Providers;

use Rareloop\Lumberjack\Config;
use Rareloop\Lumberjack\Providers\ServiceProvider;

class CustomPostTypesServiceProvider extends ServiceProvider
{
    public function boot(Config $config)
    {
        $postTypesToRegister = $config->get('posttypes.register');

        foreach ($postTypesToRegister as $postType) {
            $postType::register();
        }
    }
}
