<?php


namespace MoOauthClient\Premium;

use MoOauthClient\Standard\StandardSettings;
use MoOauthClient\Premium\AppSettings;
use MoOauthClient\Premium\SignInSettingsSettings;
class PremiumSettings
{
    private $standard_settings;
    public function __construct()
    {
        $this->standard_settings = new StandardSettings();
        add_action("\x61\x64\x6d\x69\156\137\151\x6e\x69\x74", array($this, "\155\157\137\x6f\x61\x75\x74\150\137\x63\x6c\151\145\x6e\x74\137\x70\162\145\x6d\x69\x75\155\x5f\163\x65\x74\x74\x69\156\x67\x73"));
    }
    public function mo_oauth_client_premium_settings()
    {
        $jk = new SignInSettingsSettings();
        $KS = new AppSettings();
        $KS->save_app_settings();
        $KS->save_advanced_grant_settings();
        $jk->mo_oauth_save_settings();
        if (!is_multisite()) {
            goto C3;
        }
        $Xd = new MultisiteSettings();
        $Xd->save_multisite_settings();
        C3:
    }
}
