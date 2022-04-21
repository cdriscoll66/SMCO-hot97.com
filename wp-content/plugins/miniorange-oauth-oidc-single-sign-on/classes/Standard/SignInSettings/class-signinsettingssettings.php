<?php


namespace MoOauthClient\Standard;

use MoOauthClient\Config;
class SignInSettingsSettings
{
    private $plugin_config;
    public function __construct()
    {
        $qP = $this->get_config_option();
        if ($qP && isset($qP)) {
            goto II8;
        }
        $this->plugin_config = new Config();
        $this->save_config_option($this->plugin_config);
        goto e6y;
        II8:
        $this->save_config_option($qP);
        $this->plugin_config = $qP;
        e6y:
    }
    public function save_config_option($sC = array())
    {
        global $vj;
        if (!(isset($sC) && !empty($sC))) {
            goto MT2;
        }
        return $vj->mo_oauth_client_update_option("\155\x6f\x5f\157\x61\165\x74\150\x5f\x63\154\151\145\x6e\x74\137\143\157\156\x66\x69\x67", $sC);
        MT2:
        return false;
    }
    public function get_config_option()
    {
        global $vj;
        return $vj->mo_oauth_client_get_option("\155\x6f\x5f\x6f\x61\x75\164\x68\137\x63\154\151\x65\x6e\x74\x5f\143\x6f\156\x66\x69\x67");
    }
    public function get_sane_config()
    {
        $sC = $this->plugin_config;
        if ($sC && isset($sC)) {
            goto gNS;
        }
        $sC = $this->get_config_option();
        gNS:
        if (!(!$sC || !isset($sC))) {
            goto NBL;
        }
        $sC = new Config();
        NBL:
        return $sC;
    }
    public function mo_oauth_save_settings()
    {
        global $vj;
        if (!($GLOBALS["\155\x6f\137\154\156\x5f\x65\170\160"] != 1)) {
            goto Kjf;
        }
        $sC = $this->get_sane_config();
        if (!(isset($_POST["\155\x6f\137\163\151\147\x6e\151\156\x73\x65\164\x74\151\x6e\x67\163\x5f\156\x6f\x6e\x63\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\157\x5f\x73\151\147\156\151\x6e\x73\x65\164\x74\151\x6e\147\163\137\156\157\x6e\x63\x65"])), "\155\157\x5f\157\141\x75\164\150\137\143\x6c\151\x65\x6e\164\137\x73\151\x67\x6e\137\151\x6e\x5f\x73\145\x74\x74\151\x6e\x67\x73") && (isset($_POST[\MoOAuthConstants::OPTION]) && "\155\x6f\x5f\x6f\141\x75\164\x68\x5f\143\x6c\x69\x65\156\x74\x5f\141\144\166\x61\156\143\x65\x64\x5f\x73\145\164\164\x69\x6e\x67\163" === $_POST[\MoOAuthConstants::OPTION]))) {
            goto ezr;
        }
        $sC = $this->change_current_config($_POST, $sC);
        $sC->save_settings($sC->get_current_config());
        $this->save_config_option($sC);
        ezr:
        Kjf:
    }
    public function change_current_config($post, $sC)
    {
        $sC->add_config("\x61\x66\164\x65\162\137\154\157\147\151\x6e\137\x75\162\154", isset($post["\143\165\163\x74\x6f\x6d\x5f\141\146\x74\x65\x72\137\x6c\x6f\147\151\x6e\x5f\165\x72\154"]) ? stripslashes(wp_unslash($post["\x63\165\x73\164\x6f\155\x5f\141\146\x74\x65\x72\137\154\x6f\x67\151\x6e\x5f\165\x72\154"])) : '');
        $sC->add_config("\141\146\164\145\x72\x5f\154\157\x67\x6f\165\164\x5f\165\162\x6c", isset($post["\x63\165\x73\x74\157\x6d\x5f\141\146\164\x65\162\137\154\157\x67\157\x75\x74\137\165\162\154"]) ? stripslashes(wp_unslash($post["\143\x75\163\164\157\x6d\x5f\x61\x66\x74\145\162\x5f\x6c\x6f\x67\157\x75\164\x5f\165\x72\x6c"])) : '');
        $sC->add_config("\160\157\160\x75\160\x5f\x6c\x6f\147\x69\x6e", isset($post["\160\x6f\160\x75\160\137\154\x6f\x67\x69\156"]) ? stripslashes(wp_unslash($post["\x70\x6f\160\x75\x70\137\x6c\x6f\x67\151\x6e"])) : 0);
        $sC->add_config("\141\165\164\x6f\x5f\x72\x65\147\151\163\x74\145\x72", isset($post["\x61\165\164\157\x5f\x72\145\x67\151\x73\164\145\x72"]) ? stripslashes(wp_unslash($post["\x61\165\x74\x6f\137\162\x65\147\x69\x73\164\x65\162"])) : 0);
        $sC->add_config("\x63\157\156\x66\151\x72\155\137\154\x6f\147\x6f\165\164", isset($post["\x63\157\x6e\x66\151\x72\155\137\154\x6f\x67\157\165\x74"]) ? stripslashes(wp_unslash($post["\x63\157\156\146\x69\x72\155\x5f\154\157\x67\157\x75\164"])) : 0);
        return $sC;
    }
}
