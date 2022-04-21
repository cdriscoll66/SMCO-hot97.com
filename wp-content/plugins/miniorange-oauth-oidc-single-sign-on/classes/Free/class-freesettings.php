<?php


namespace MoOauthClient\Free;

use MoOauthClient\Settings;
use MoOauthClient\Free\CustomizationSettings;
use MoOauthClient\Free\RequestfordemoSettings;
use MoOauthClient\Free\AppSettings;
use MoOauthClient\Customer;
class FreeSettings
{
    private $common_settings;
    public function __construct()
    {
        $this->common_settings = new Settings();
        add_action("\141\144\155\x69\156\x5f\151\x6e\x69\164", array($this, "\x6d\x6f\137\x6f\x61\x75\x74\150\137\143\154\x69\x65\x6e\x74\137\146\162\x65\145\137\163\145\164\x74\x69\x6e\147\x73"));
        add_action("\141\x64\155\151\156\137\x66\157\x6f\164\145\x72", array($this, "\x6d\x6f\x5f\x6f\141\165\164\150\137\143\x6c\151\x65\x6e\164\x5f\146\x65\145\144\x62\141\x63\x6b\137\x72\145\x71\165\x65\x73\x74"));
    }
    public function mo_oauth_client_free_settings()
    {
        global $vj;
        $Ba = new CustomizationSettings();
        $KY = new RequestfordemoSettings();
        $Ba->save_customization_settings();
        $KY->save_requestdemo_settings();
        $KS = new AppSettings();
        $KS->save_app_settings();
        if (!(isset($_POST["\x6d\157\x5f\x6f\x61\x75\x74\x68\x5f\x63\x6c\151\x65\x6e\x74\137\146\x65\x65\x64\x62\x61\143\x6b\x5f\156\x6f\156\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\157\137\157\141\x75\x74\x68\137\x63\x6c\151\145\x6e\164\x5f\x66\x65\x65\x64\142\x61\143\153\137\x6e\x6f\x6e\143\145"])), "\155\157\x5f\157\141\165\x74\150\x5f\143\x6c\151\x65\156\x74\137\146\145\145\x64\142\x61\x63\153") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\137\x6f\141\x75\x74\150\137\143\154\151\145\x6e\164\137\146\145\145\x64\142\x61\x63\x6b" === $_POST[\MoOAuthConstants::OPTION])) {
            goto Vb;
        }
        $user = wp_get_current_user();
        $CG = "\120\154\165\147\x69\156\x20\x44\x65\141\143\164\x69\166\x61\164\x65\x64\72";
        $Gj = isset($_POST["\x64\x65\141\x63\164\x69\166\141\164\x65\137\x72\145\x61\163\157\x6e\137\x72\141\144\151\157"]) ? sanitize_text_field(wp_unslash($_POST["\144\x65\x61\143\164\151\x76\x61\x74\x65\x5f\x72\145\141\x73\x6f\x6e\x5f\x72\141\144\x69\157"])) : false;
        $Ag = isset($_POST["\161\165\145\x72\x79\137\x66\145\x65\144\x62\141\x63\x6b"]) ? sanitize_text_field(wp_unslash($_POST["\161\165\x65\x72\x79\137\146\145\145\x64\142\x61\x63\153"])) : false;
        if ($Gj) {
            goto j_;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\120\x6c\145\x61\163\145\x20\x53\145\154\145\x63\x74\40\157\x6e\145\x20\157\x66\x20\x74\150\145\x20\162\x65\141\163\157\x6e\163\40\54\x69\146\40\x79\157\165\x72\40\x72\x65\141\x73\x6f\x6e\x20\x69\x73\x20\156\157\164\40\x6d\x65\156\x74\151\x6f\156\145\144\x20\160\x6c\145\x61\163\x65\x20\x73\x65\154\145\x63\x74\x20\x4f\164\x68\145\x72\40\x52\145\x61\163\157\x6e\x73");
        $vj->mo_oauth_show_error_message();
        j_:
        $CG .= $Gj;
        if (!isset($Ag)) {
            goto I_;
        }
        $CG .= "\x3a" . $Ag;
        I_:
        $zZ = $vj->mo_oauth_client_get_option("\x6d\x6f\x5f\x6f\141\165\164\x68\137\141\144\x6d\151\156\137\x65\x6d\x61\x69\154");
        if (!($zZ == '')) {
            goto Z3;
        }
        $zZ = $user->user_email;
        Z3:
        $jb = $vj->mo_oauth_client_get_option("\155\x6f\137\157\x61\165\164\x68\x5f\141\144\x6d\x69\x6e\137\x70\150\x6f\x6e\x65");
        $c_ = new Customer();
        $m4 = json_decode($c_->mo_oauth_send_email_alert($zZ, $jb, $CG), true);
        deactivate_plugins(MOC_DIR . "\155\157\137\x6f\141\x75\x74\150\137\163\145\x74\x74\x69\156\x67\x73\x2e\160\150\160");
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x54\150\141\x6e\x6b\x20\171\x6f\x75\40\146\x6f\x72\x20\164\150\145\40\x66\145\145\x64\x62\141\x63\x6b\56");
        $vj->mo_oauth_show_success_message();
        Vb:
        if (!(isset($_POST["\x6d\x6f\x5f\157\x61\x75\164\150\x5f\143\154\x69\145\x6e\x74\137\163\153\151\160\137\146\145\145\x64\x62\141\x63\x6b\x5f\156\157\156\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\137\x6f\141\x75\x74\x68\137\x63\154\151\145\156\164\x5f\x73\153\x69\160\137\146\x65\x65\144\x62\141\143\153\137\x6e\157\156\143\145"])), "\155\x6f\x5f\x6f\141\165\x74\150\137\143\x6c\x69\145\156\x74\x5f\x73\x6b\151\x70\x5f\146\145\x65\144\142\x61\143\153") && isset($_POST["\x6f\x70\164\151\157\x6e"]) && "\x6d\x6f\x5f\157\141\x75\164\x68\x5f\x63\154\151\x65\x6e\164\x5f\163\x6b\151\x70\x5f\146\x65\145\x64\142\x61\x63\x6b" === $_POST["\x6f\x70\x74\x69\157\156"])) {
            goto rJ;
        }
        deactivate_plugins(MOC_DIR . "\x6d\157\x5f\157\141\x75\164\x68\x5f\x73\145\164\x74\151\156\147\163\56\160\150\160");
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x50\x6c\165\147\151\156\40\x44\145\141\143\164\151\x76\141\164\x65\x64\56");
        $vj->mo_oauth_show_success_message();
        rJ:
    }
    public function mo_oauth_client_feedback_request()
    {
        $Mc = new \MoOauthClient\Free\Feedback();
        $Mc->show_form();
    }
}
