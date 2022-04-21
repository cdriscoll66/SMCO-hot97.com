<?php


namespace MoOauthClient\Standard;

use MoOauthClient\Free\FreeSettings;
use MoOauthClient\Free\CustomizationSettings;
use MoOauthClient\Standard\AppSettings;
use MoOauthClient\Standard\SignInSettingsSettings;
use MoOauthClient\Standard\Customer;
use MoOauthClient\App;
use MoOauthClient\Config;
use MoOauthClient\Widget\MOUtils;
class StandardSettings
{
    private $free_settings;
    public function __construct()
    {
        add_filter("\x63\162\157\x6e\x5f\x73\x63\150\x65\144\x75\x6c\145\163", array($this, "\155\157\137\x6f\141\165\164\x68\137\163\x63\x68\145\x64\x75\x6c\x65"));
        if (wp_next_scheduled("\155\x6f\x5f\x6f\x61\165\164\150\x5f\x73\x63\150\x65\x64\x75\x6c\x65")) {
            goto Sk0;
        }
        wp_schedule_event(time(), "\145\166\145\x72\x79\137\146\151\x76\x65\137\x6d\x69\156\165\x74\x65\163", "\x6d\157\137\157\x61\165\x74\x68\137\163\x63\x68\145\x64\165\154\145");
        Sk0:
        add_action("\x6d\157\x5f\157\x61\x75\164\150\x5f\x73\x63\x68\x65\144\x75\154\145", array($this, "\145\166\x65\162\171\x5f\x73\145\166\145\x6e\x5f\x64\141\171\163\137\x65\166\x65\156\164\x5f\x66\165\x6e\x63"));
        $this->free_settings = new FreeSettings();
        add_action("\x61\144\x6d\151\x6e\x5f\x69\156\x69\164", array($this, "\x6d\157\x5f\157\x61\x75\x74\x68\137\143\154\151\145\156\x74\x5f\163\x74\x61\156\x64\x61\x72\x64\137\x73\145\164\164\151\x6e\147\163"));
        add_action("\x64\157\x5f\155\x61\151\156\137\x73\145\164\x74\x69\x6e\x67\163\137\x69\156\x74\x65\162\156\141\x6c", array($this, "\144\157\137\151\x6e\x74\x65\162\x6e\141\154\x5f\x73\145\x74\164\151\156\x67\x73"), 1, 10);
    }
    public function mo_oauth_schedule($cq)
    {
        $cq["\145\x76\145\162\171\x5f\x66\151\x76\145\x5f\x6d\x69\156\165\x74\x65\x73"] = array("\151\156\164\x65\162\166\141\x6c" => 60 * 60 * 24 * 7, "\144\x69\163\x70\x6c\x61\x79" => __("\x45\x76\145\x72\171\40\x35\40\x4d\x69\x6e\165\164\145\163", "\164\145\x78\164\x64\x6f\x6d\141\151\x6e"));
        return $cq;
    }
    function every_seven_days_event_func()
    {
        global $vj;
        $qa = new Customer();
        $lM = json_decode($qa->check_customer_ln(), true);
        $jk = new SignInSettingsSettings();
        $sC = $jk->get_config_option();
        $nK = $lM["\154\151\143\145\156\x73\145\105\170\160\151\x72\x79"];
        $nK = $vj->mooauthencrypt($nK);
        $sC->add_config("\x6c\x69\143\x65\x6e\x73\145\137\x65\170\x70\151\x72\171\137\144\x61\x74\145", $nK);
        $jk->save_config_option($sC);
        update_option("\x6d\x6f\137\143\x72\x6f\156\137\x63\x68\145\x63\153\137\164\x65\163\164", "\66");
        $lh = date("\131\x2d\155\x2d\x64\x20\110\x3a\151\72\163");
        $lM["\x6c\x69\143\x65\x6e\163\145\x45\x78\x70\151\x72\x79"] <= $lh ? $ja = $vj->mooauthencrypt("\x74\x72\165\x65") : ($ja = $vj->mooauthencrypt("\146\x61\154\x73\145"));
        $sC->add_config("\155\x6f\x5f\142\162\x65\x61\153\157\146\146", $ja);
        $jk->save_config_option($sC);
    }
    public function mo_oauth_client_standard_settings()
    {
        $Ba = new CustomizationSettings();
        $jk = new SignInSettingsSettings();
        $KS = new AppSettings();
        $Ba->save_customization_settings();
        $KS->save_app_settings();
        $jk->mo_oauth_save_settings();
    }
    public function do_internal_settings($post)
    {
        global $vj;
        if (!(isset($_POST["\x6d\x6f\x5f\x6f\x61\165\164\150\137\x63\154\x69\145\156\164\x5f\x76\x65\x72\151\x66\171\x5f\x6c\x69\x63\x65\x6e\163\145\137\x6e\157\x6e\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\157\137\157\141\165\x74\x68\x5f\x63\154\x69\x65\x6e\x74\x5f\166\x65\162\151\146\x79\x5f\x6c\151\x63\145\x6e\163\x65\x5f\156\157\156\143\145"])), "\155\157\x5f\157\141\165\x74\150\x5f\x63\154\x69\x65\x6e\x74\137\166\145\162\151\x66\x79\x5f\x6c\151\x63\x65\156\x73\x65") && isset($post[\MoOAuthConstants::OPTION]) && "\x6d\x6f\137\x6f\141\165\164\x68\137\x63\x6c\x69\145\x6e\164\x5f\x76\x65\x72\x69\146\171\137\154\x69\x63\x65\x6e\163\x65" === $post[\MoOAuthConstants::OPTION])) {
            goto UIU;
        }
        if (!(!isset($post["\x6d\157\x5f\157\141\165\164\x68\137\x63\154\x69\145\156\x74\137\x6c\x69\x63\x65\156\x73\145\137\153\145\171"]) || empty($post["\x6d\157\137\157\141\x75\x74\x68\137\x63\x6c\x69\x65\x6e\x74\x5f\x6c\151\143\145\156\163\x65\x5f\153\145\171"]))) {
            goto lSM;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x50\x6c\x65\x61\x73\145\x20\x65\x6e\164\145\162\40\166\141\x6c\151\144\40\154\151\x63\145\x6e\x73\145\40\x6b\x65\171\x2e");
        $this->mo_oauth_show_error_message();
        return;
        lSM:
        $Yt = trim($post["\x6d\x6f\137\157\x61\165\164\150\137\143\154\151\145\156\x74\x5f\x6c\x69\x63\145\156\163\145\137\x6b\145\171"]);
        $qa = new Customer();
        $lM = json_decode($qa->check_customer_ln(), true);
        $jk = new SignInSettingsSettings();
        $sC = $jk->get_config_option();
        $nK = $lM["\x6c\151\x63\x65\x6e\163\145\105\x78\160\151\x72\171"];
        $nK = $vj->mooauthencrypt($nK);
        $sC->add_config("\154\151\x63\145\156\163\x65\137\145\x78\160\151\162\171\137\x64\141\164\145", $nK);
        $jk->save_config_option($sC);
        $aE = false;
        if (!(isset($lM["\151\163\115\x75\154\164\151\x53\151\x74\x65\120\154\x75\x67\x69\156\x52\x65\161\165\145\x73\x74\x65\144"]) && boolval($lM["\x69\x73\x4d\165\x6c\x74\x69\123\151\x74\x65\120\x6c\165\147\x69\156\x52\x65\x71\x75\x65\163\164\x65\x64"]) && is_multisite())) {
            goto U1w;
        }
        $aE = boolval($lM["\x69\163\115\165\x6c\x74\151\x53\151\164\x65\120\154\x75\x67\151\x6e\x52\x65\161\165\145\x73\x74\x65\144"]);
        $vj->mo_oauth_client_update_option("\x6d\157\137\157\x61\165\164\150\137\x69\163\115\x75\x6c\164\151\123\151\164\145\x50\x6c\165\x67\x69\156\122\145\161\165\145\x73\164\x65\x64", $aE);
        $vj->mo_oauth_client_update_option("\156\x6f\x4f\146\x53\165\x62\123\x69\x74\x65\163", intval($lM["\x6e\157\117\x66\123\x75\x62\x53\x69\164\145\163"]));
        U1w:
        $Ui = 0;
        if (!is_multisite()) {
            goto SJA;
        }
        if (!function_exists("\x67\x65\x74\x5f\163\151\164\145\x73")) {
            goto wxL;
        }
        $Ui = count(get_sites()) - 1;
        wxL:
        SJA:
        if (!(is_multisite() && $aE && ($aE && (!array_key_exists("\x6e\157\x4f\x66\123\165\x62\x53\x69\164\145\163", $lM) && $vj->is_multisite_versi())))) {
            goto xuo;
        }
        $WK = $vj->mo_oauth_client_get_option("\150\x6f\163\x74\x5f\156\x61\155\x65");
        $WK .= "\x2f\155\157\141\x73\57\154\157\147\x69\x6e\x3f\162\145\144\151\162\145\143\164\125\162\x6c\x3d";
        $WK .= $vj->mo_oauth_client_get_option("\150\157\x73\x74\137\156\141\155\x65");
        $WK .= "\x2f\155\x6f\141\x73\57\x69\x6e\151\164\151\141\x6c\x69\x7a\145\160\141\171\155\x65\x6e\164\x3f\162\x65\161\165\x65\x73\164\117\x72\151\x67\x69\x6e\x3d";
        $WK .= "\x77\160\x5f\157\x61\165\164\x68\137\143\154\x69\145\156\164\x5f" . strtolower($vj->get_versi_str()) . "\137\x70\x6c\141\x6e";
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\157\165\40\150\x61\x76\x65\40\156\157\164\x20\x75\160\147\162\141\144\145\x64\x20\x74\x6f\x20\164\150\145\x20\143\x6f\162\162\145\x63\164\x20\154\151\x63\x65\156\163\145\x20\160\x6c\x61\156\x2e\x20\105\x69\x74\150\145\162\x20\x79\157\165\40\150\141\166\x65\x20\160\x75\x72\143\x68\x61\163\x65\x64\x20\146\157\162\40\151\x6e\143\157\x72\x72\x65\x63\x74\40\x6e\x6f\x2e\40\157\x66\40\x73\x69\x74\x65\x73\x20\x6f\x72\x20\x79\157\x75\40\x68\x61\166\x65\40\x6e\157\x74\x20\x73\145\154\145\x63\164\145\x64\x20\x6d\x75\x6c\164\151\163\151\164\x65\40\157\160\164\151\157\156\40\x77\150\151\x6c\x65\x20\160\x75\x72\143\x68\141\163\151\x6e\147\56\x20\x3c\141\40\164\x61\x72\x67\x65\x74\75\42\x5f\x62\x6c\141\156\153\x22\x20\150\162\x65\146\x3d\42" . $WK . "\42\x20\x3e\103\154\151\x63\153\40\x68\x65\x72\x65\74\57\x61\76\x20\x74\x6f\40\165\x70\x67\x72\141\x64\145\x20\164\x6f\x20\160\162\145\155\x69\x75\155\x20\166\x65\x72\163\x69\157\x6e\56");
        $vj->mo_oauth_show_error_message();
        return;
        xuo:
        if (strcasecmp($lM["\163\164\141\x74\165\163"], "\123\125\x43\x43\x45\123\x53") === 0) {
            goto pHI;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\157\x75\40\x68\141\166\145\x6e\47\164\x20\165\x70\147\162\141\144\145\144\40\x74\157\40\164\x68\x69\163\40\x70\x6c\x61\x6e\40\x79\145\x74\56");
        $vj->mo_oauth_show_error_message();
        goto wc7;
        pHI:
        $lM = json_decode($qa->XfskodsfhHJ($Yt), true);
        if (strcasecmp($lM["\163\x74\x61\x74\165\163"], "\x53\125\x43\x43\105\123\x53") === 0) {
            goto LJW;
        }
        if (strcasecmp($lM["\x73\164\141\164\x75\x73"], "\106\x41\x49\114\x45\104") === 0) {
            goto yIc;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x41\156\x20\145\x72\x72\x6f\162\40\157\x63\143\x75\162\145\x64\x20\167\x68\151\x6c\x65\x20\160\x72\157\x63\145\x73\x73\x69\156\147\40\171\157\165\162\x20\x72\145\x71\x75\145\163\164\x2e\x20\120\154\x65\141\163\145\40\x54\162\171\40\x61\x67\x61\x69\156\56");
        $vj->mo_oauth_show_error_message();
        goto HrX;
        LJW:
        $vj->mo_oauth_client_update_option("\155\157\x5f\157\x61\165\164\x68\137\154\x6b", $vj->mooauthencrypt($Yt));
        $vj->mo_oauth_client_update_option("\155\157\137\157\141\165\x74\150\x5f\154\166", $vj->mooauthencrypt("\x74\x72\165\x65"));
        $G5 = $vj->get_app_list();
        if (!(!empty($G5) && is_array($G5))) {
            goto fgT;
        }
        foreach ($G5 as $Mg => $u2) {
            if (is_array($u2) && !empty($u2)) {
                goto GFs;
            }
            if (boolval($u2->get_app_config("\143\x6c\151\x65\156\164\137\143\162\x65\x64\x73\137\x65\x6e\143\162\160\171\164\145\144"))) {
                goto A4I;
            }
            $lY = $u2->get_app_config("\143\154\x69\x65\x6e\164\137\151\144");
            !empty($lY) ? $u2->update_app_config("\x63\x6c\151\x65\x6e\164\x5f\x69\x64", $vj->mooauthencrypt($lY)) : '';
            $mT = $u2->get_app_config("\143\x6c\151\x65\x6e\x74\x5f\163\x65\x63\x72\x65\164");
            !empty($mT) ? $u2->update_app_config("\143\x6c\x69\x65\x6e\164\x5f\163\x65\x63\162\145\164", $vj->mooauthencrypt($mT)) : '';
            $u2->update_app_config("\x63\x6c\x69\145\156\x74\137\143\162\145\144\163\x5f\x65\x6e\143\x72\x70\x79\x74\x65\x64", true);
            A4I:
            $pl[$Mg] = $u2;
            goto q8C;
            GFs:
            if (!(!isset($u2["\x63\x6c\151\x65\x6e\x74\137\x69\144"]) || empty($u2["\x63\x6c\x69\145\x6e\164\137\x69\144"]))) {
                goto PH0;
            }
            $u2["\x63\154\151\145\156\x74\x5f\151\144"] = isset($u2["\143\154\151\145\156\x74\x69\144"]) ? $u2["\143\x6c\x69\145\156\164\151\x64"] : '';
            PH0:
            if (!(!isset($u2["\143\x6c\x69\145\x6e\164\x5f\x73\145\143\162\x65\x74"]) || empty($u2["\143\154\151\x65\x6e\x74\x5f\163\145\x63\x72\x65\x74"]))) {
                goto ipl;
            }
            $u2["\143\x6c\x69\145\156\164\x5f\x73\145\x63\162\x65\x74"] = isset($u2["\x63\x6c\151\145\156\164\163\x65\143\162\145\x74"]) ? $u2["\143\154\151\145\x6e\x74\x73\145\x63\162\145\x74"] : '';
            ipl:
            unset($u2["\143\x6c\x69\145\156\164\x69\144"]);
            unset($u2["\143\x6c\x69\145\x6e\164\163\145\143\162\x65\164"]);
            if (!(!isset($u2["\x63\154\x69\x65\x6e\164\137\143\162\x65\x64\163\x5f\145\x6e\143\162\160\171\x74\x65\x64"]) || !boolval($u2["\143\154\151\x65\x6e\x74\x5f\x63\162\145\x64\163\x5f\x65\x6e\143\x72\x70\171\164\x65\144"]))) {
                goto I3f;
            }
            isset($u2["\x63\154\x69\145\156\164\137\x69\144"]) ? $u2["\x63\x6c\x69\145\x6e\164\x5f\151\144"] = $vj->mooauthencrypt($u2["\143\x6c\x69\x65\156\164\137\151\x64"]) : '';
            isset($u2["\143\154\x69\145\156\x74\x5f\163\x65\x63\162\145\x74"]) ? $u2["\x63\154\151\145\156\164\137\x73\145\143\x72\x65\164"] = $vj->mooauthencrypt($u2["\x63\x6c\151\145\156\164\x5f\x73\145\x63\162\145\164"]) : '';
            $u2["\143\154\x69\145\x6e\x74\x5f\143\x72\145\144\163\137\145\x6e\143\162\160\171\164\x65\x64"] = true;
            I3f:
            $kL = new App();
            $kL->migrate_app($u2, $Mg);
            $pl[$Mg] = $kL;
            q8C:
            IGW:
        }
        mtu:
        fgT:
        !empty($G5) ? $vj->mo_oauth_client_update_option("\155\x6f\x5f\157\141\165\164\x68\137\x61\x70\160\x73\x5f\154\x69\163\164", $pl) : '';
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x59\157\165\162\x20\x6c\151\143\145\x6e\163\x65\x20\151\163\40\166\145\x72\x69\x66\x69\x65\144\56\40\x59\x6f\x75\40\x63\141\x6e\x20\156\157\167\40\x73\x65\x74\165\x70\40\164\150\145\40\160\x6c\x75\147\151\x6e\56");
        $vj->mo_oauth_show_success_message();
        goto HrX;
        yIc:
        if (strcasecmp($lM["\155\145\163\163\141\147\145"], "\x43\157\144\x65\x20\150\141\163\40\105\170\160\151\162\145\144") === 0) {
            goto lcB;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x59\x6f\x75\x20\150\141\x76\x65\40\x65\x6e\164\145\x72\145\x64\x20\x61\x6e\x20\x69\x6e\166\141\154\151\144\40\x6c\x69\143\145\x6e\163\x65\x20\153\145\171\56\40\120\x6c\145\x61\163\145\x20\145\156\164\x65\162\x20\141\x20\x76\x61\x6c\x69\144\40\x6c\151\143\145\x6e\163\x65\40\x6b\145\x79\56");
        $vj->mo_oauth_show_error_message();
        goto MHM;
        lcB:
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x4c\151\x63\x65\x6e\x73\x65\x20\153\145\171\40\171\157\165\x20\150\141\x76\x65\x20\x65\156\164\x65\162\145\x64\40\x68\x61\x73\40\141\x6c\x72\145\x61\x64\171\x20\x62\x65\145\156\40\165\163\x65\x64\x2e\x20\120\x6c\x65\141\163\x65\x20\145\x6e\164\x65\x72\40\141\x20\153\x65\171\40\x77\x68\x69\143\150\40\150\x61\163\x20\x6e\x6f\x74\x20\x62\145\145\156\x20\x75\163\x65\144\40\142\x65\146\157\162\x65\x20\x6f\x6e\x20\x61\x6e\x79\40\157\164\150\x65\162\40\151\x6e\x73\164\x61\156\143\145\40\157\162\40\151\146\40\x79\157\x75\40\x68\141\x76\x65\40\x65\170\141\165\163\x74\x65\x64\40\x61\x6c\154\x20\x79\157\x75\162\40\x6b\x65\171\x73\x20\164\150\145\x6e\x20\x62\x75\x79\x20\155\x6f\162\145\56");
        $vj->mo_oauth_show_error_message();
        MHM:
        HrX:
        wc7:
        UIU:
    }
}
