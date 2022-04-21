<?php


namespace MoOauthClient\App;

interface AppInterface
{
    public function get_app_config($CM);
    public function update_app_config($Vi, $GT);
}
