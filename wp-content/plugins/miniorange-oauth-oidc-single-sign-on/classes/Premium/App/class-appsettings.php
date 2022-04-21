<?php


namespace MoOauthClient\Premium;

use MoOauthClient\App;
use MoOauthClient\Standard\AppSettings as StandardAppSettings;
class AppSettings extends StandardAppSettings
{
    public function __construct()
    {
        parent::__construct();
        add_action("\155\x6f\x5f\157\x61\x75\x74\150\x5f\x63\154\151\145\x6e\x74\137\163\x61\166\145\137\141\160\x70\137\163\145\x74\164\x69\156\147\x73\x5f\151\x6e\x74\145\x72\156\141\154", array($this, "\163\x61\x76\145\x5f\x72\157\154\x65\137\x6d\141\x70\160\x69\x6e\x67"));
    }
    public function change_app_settings($post, $T8)
    {
        global $vj;
        $T8 = parent::change_app_settings($post, $T8);
        $T8["\147\162\157\165\x70\144\145\164\x61\x69\154\163\165\x72\154"] = isset($post["\155\157\x5f\157\x61\165\x74\x68\x5f\147\162\x6f\x75\x70\144\x65\x74\141\151\x6c\163\165\x72\x6c"]) ? trim(stripslashes($post["\x6d\157\137\157\x61\x75\x74\x68\x5f\x67\162\157\165\160\x64\x65\164\x61\151\154\163\165\162\154"])) : '';
        $T8["\x6a\x77\x6b\163\165\x72\154"] = isset($post["\155\x6f\x5f\157\141\165\164\150\137\x6a\x77\x6b\163\x75\x72\x6c"]) ? trim(stripslashes($post["\155\x6f\x5f\157\x61\x75\x74\150\x5f\x6a\167\153\x73\165\162\154"])) : '';
        $T8["\147\x72\x61\156\x74\137\x74\171\160\145"] = isset($post["\147\x72\141\156\164\x5f\x74\171\160\x65"]) ? stripslashes($post["\x67\162\x61\x6e\164\137\164\x79\x70\x65"]) : "\x41\165\164\x68\157\162\151\172\x61\164\x69\x6f\156\40\x43\157\144\x65\x20\107\162\x61\156\164";
        if (isset($post["\145\x6e\141\x62\154\x65\137\157\x61\165\164\x68\x5f\167\160\x5f\154\x6f\147\151\x6e"]) && "\x6f\156" === $post["\145\x6e\x61\142\x6c\x65\137\x6f\x61\x75\x74\x68\x5f\x77\x70\137\154\157\147\151\x6e"]) {
            goto xc;
        }
        $vj->mo_oauth_client_delete_option("\x6d\x6f\137\x6f\x61\165\164\x68\137\145\x6e\x61\x62\x6c\x65\x5f\x6f\x61\x75\x74\150\137\167\x70\137\x6c\x6f\147\x69\x6e");
        goto op;
        xc:
        $vj->mo_oauth_client_update_option("\x6d\x6f\x5f\x6f\x61\x75\164\x68\137\x65\156\x61\x62\154\145\x5f\157\x61\165\x74\150\x5f\167\x70\137\154\x6f\147\151\156", $_GET["\x61\160\x70"]);
        op:
        return $T8;
    }
    public function save_advanced_grant_settings()
    {
        if (!(!isset($_POST["\x6d\157\x5f\x6f\x61\165\164\150\x5f\x67\162\141\x6e\164\137\x73\x65\164\164\151\x6e\x67\x73\137\156\x6f\156\x63\x65"]) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\x6f\x5f\157\141\165\x74\150\x5f\x67\162\141\x6e\x74\x5f\x73\x65\x74\164\x69\x6e\x67\x73\137\156\x6f\x6e\143\x65"])), "\155\x6f\x5f\157\141\x75\164\150\x5f\147\x72\141\156\164\137\163\145\x74\164\x69\x6e\x67\x73"))) {
            goto y4;
        }
        return;
        y4:
        $post = $_POST;
        if (!(!isset($post[\MoOAuthConstants::OPTION]) || "\x6d\x6f\137\x6f\x61\165\x74\x68\137\147\162\141\156\x74\x5f\163\145\x74\164\151\156\147\x73" !== $post[\MoOAuthConstants::OPTION])) {
            goto c_;
        }
        return;
        c_:
        if (!(!isset($post[\MoOAuthConstants::POST_APP_NAME]) || empty($post[\MoOAuthConstants::POST_APP_NAME]))) {
            goto R6;
        }
        return;
        R6:
        global $vj;
        if (!($GLOBALS["\155\157\x5f\x6c\156\x5f\x65\170\x70"] != 1)) {
            goto IR;
        }
        $Xr = $post[\MoOAuthConstants::POST_APP_NAME];
        $T8 = $vj->get_app_by_name($Xr);
        $T8 = $T8->get_app_config('', false);
        $T8 = $this->save_grant_settings($post, $T8);
        $vj->set_app_by_name($Xr, $T8);
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\x6f\165\162\40\x53\145\164\x74\x69\156\147\x73\x20\x68\x61\x76\x65\40\x62\x65\x65\x6e\40\x73\141\x76\x65\x64\x20\x73\x75\x63\x63\145\163\x73\146\x75\154\154\x79\56");
        $vj->mo_oauth_show_success_message();
        wp_safe_redirect("\x61\x64\x6d\151\x6e\x2e\160\150\x70\77\160\x61\x67\x65\x3d\x6d\157\137\157\141\165\x74\x68\137\x73\145\164\164\151\x6e\x67\x73\46\x61\x63\x74\151\x6f\156\75\165\160\144\x61\164\x65\46\141\160\160\75" . rawurlencode($Xr));
        IR:
    }
    public function save_grant_settings($post, $T8)
    {
        global $vj;
        $T8["\x6d\x6f\137\157\141\x75\164\150\x5f\162\145\163\160\x6f\x6e\x73\145\137\164\x79\160\145"] = isset($post["\155\157\x5f\157\141\165\164\x68\x5f\162\145\x73\x70\x6f\156\x73\145\137\164\171\x70\145"]) ? stripslashes($post["\x6d\157\x5f\157\141\x75\164\150\x5f\x72\x65\163\160\x6f\x6e\x73\x65\x5f\x74\171\x70\x65"]) : '';
        $T8["\x6a\167\164\x5f\163\x75\160\x70\x6f\x72\x74"] = isset($post["\152\167\164\137\x73\165\x70\x70\157\x72\x74"]) ? 1 : 0;
        $T8["\x6a\x77\x74\x5f\x61\x6c\147\157"] = isset($post["\x6a\167\164\x5f\x61\154\x67\157"]) ? stripslashes($post["\152\x77\164\x5f\141\154\147\x6f"]) : "\x48\123\101";
        if ("\x52\x53\101" === $T8["\x6a\x77\164\137\141\x6c\147\157"]) {
            goto sF;
        }
        if (!isset($T8["\x78\65\60\x39\137\x63\145\162\164"])) {
            goto oT;
        }
        unset($T8["\170\65\x30\71\x5f\x63\145\x72\x74"]);
        oT:
        goto Ov;
        sF:
        $T8["\170\x35\60\x39\x5f\x63\x65\x72\x74"] = isset($post["\155\157\x5f\157\x61\165\x74\150\x5f\x78\65\60\71\137\x63\145\162\164"]) ? stripslashes($post["\155\x6f\x5f\157\141\165\164\150\x5f\x78\65\x30\71\137\143\145\162\164"]) : '';
        Ov:
        return $T8;
    }
    public function change_attribute_mapping($post, $T8)
    {
        $T8 = parent::change_attribute_mapping($post, $T8);
        $J2 = array();
        $hn = 0;
        foreach ($post as $Vi => $GT) {
            if (!(strpos($Vi, "\155\157\137\157\x61\165\x74\150\x5f\x63\x6c\x69\145\x6e\164\x5f\143\165\163\x74\157\x6d\137\x61\164\x74\x72\151\x62\x75\x74\x65\137\153\x65\171") !== false && !empty($post[$Vi]))) {
                goto vt;
            }
            $hn++;
            $bU = "\155\x6f\x5f\157\x61\165\x74\x68\137\x63\154\x69\145\x6e\164\x5f\x63\165\x73\164\x6f\155\137\141\164\x74\x72\151\x62\x75\x74\x65\137\x76\141\154\x75\x65\x5f" . $hn;
            $J2[$GT] = $post[$bU];
            vt:
            I7:
        }
        sd:
        $T8["\143\165\163\x74\157\155\137\141\164\x74\162\163\137\x6d\141\x70\x70\x69\156\147"] = $J2;
        return $T8;
    }
    public function save_role_mapping()
    {
        global $vj;
        if (!($GLOBALS["\x6d\157\137\154\x6e\x5f\145\170\160"] != 1)) {
            goto VB;
        }
        if (!(isset($_POST["\155\157\x5f\x6f\x61\165\x74\x68\x5f\143\x6c\x69\x65\156\x74\137\163\141\x76\145\137\x72\157\x6c\145\x5f\155\141\160\x70\151\156\147\137\156\157\156\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\157\137\x6f\x61\x75\x74\150\137\x63\154\151\145\x6e\164\137\x73\x61\x76\x65\137\x72\x6f\154\145\137\x6d\x61\x70\x70\151\156\147\x5f\156\x6f\156\x63\145"])), "\155\x6f\137\157\x61\x75\x74\x68\x5f\143\154\x69\145\x6e\164\137\163\141\x76\145\137\162\x6f\x6c\145\x5f\155\141\x70\160\x69\156\147") && isset($_POST[\MoOAuthConstants::OPTION]) && "\155\157\x5f\x6f\x61\165\164\x68\x5f\x63\154\x69\x65\x6e\164\x5f\163\x61\166\145\x5f\162\x6f\154\145\x5f\x6d\x61\x70\x70\151\x6e\147" === $_POST[\MoOAuthConstants::OPTION])) {
            goto s1;
        }
        $Mg = sanitize_text_field(wp_unslash(isset($_POST[\MoOAuthConstants::POST_APP_NAME]) ? $_POST[\MoOAuthConstants::POST_APP_NAME] : ''));
        $kL = $vj->get_app_by_name($Mg);
        $BD = $kL->get_app_config('', false);
        $BD["\x72\145\163\164\162\x69\143\x74\x5f\154\157\147\151\x6e\x5f\146\157\162\x5f\155\x61\160\160\x65\x64\x5f\162\x6f\x6c\145\x73"] = isset($_POST["\162\145\163\x74\x72\x69\143\164\x5f\x6c\157\147\151\x6e\137\x66\x6f\x72\137\x6d\141\160\160\145\144\137\x72\157\154\145\163"]) ? sanitize_text_field(wp_unslash($_POST["\x72\x65\x73\x74\x72\x69\143\x74\137\x6c\x6f\x67\x69\156\137\x66\157\162\137\x6d\x61\x70\160\145\x64\137\x72\157\x6c\145\x73"])) : false;
        $BD["\x67\162\x6f\165\160\156\141\x6d\145\137\141\x74\x74\162\151\x62\x75\x74\145"] = isset($_POST["\155\x61\x70\x70\x69\x6e\x67\137\147\162\157\165\x70\156\x61\x6d\x65\x5f\x61\x74\164\162\151\x62\165\164\x65"]) ? trim(stripslashes($_POST["\155\x61\x70\x70\151\x6e\x67\x5f\x67\x72\x6f\x75\x70\x6e\141\x6d\x65\x5f\141\164\164\x72\151\142\165\164\x65"])) : '';
        $O7 = 100;
        $OV = 0;
        $hB = [];
        if (!isset($_POST["\155\141\x70\160\x69\156\x67\137\153\145\x79\x5f"])) {
            goto jg;
        }
        $hB = array_map("\x73\x61\x6e\151\164\x69\x7a\145\137\164\145\x78\x74\137\146\151\x65\x6c\x64", wp_unslash($_POST["\155\141\x70\160\151\x6e\x67\x5f\153\x65\x79\x5f"]));
        jg:
        $Dp = count($hB);
        $zM = 1;
        $mS = 1;
        F3:
        if (!($mS <= $Dp)) {
            goto DC;
        }
        if (isset($_POST["\x6d\x61\x70\x70\151\x6e\x67\137\153\x65\171\137"][$zM])) {
            goto vn;
        }
        G8:
        if (!($zM < 100)) {
            goto U3;
        }
        if (!isset($_POST["\155\x61\160\160\151\156\147\x5f\x6b\x65\x79\137"][$zM])) {
            goto s4;
        }
        if (!('' === $_POST["\155\141\x70\x70\x69\x6e\x67\137\153\145\x79\137"][$zM]["\166\x61\154\x75\145"])) {
            goto sV;
        }
        $zM++;
        goto G8;
        sV:
        $BD["\x5f\x6d\141\160\x70\x69\x6e\x67\x5f\x6b\145\171\137" . $mS] = sanitize_text_field(wp_unslash(isset($_POST["\155\141\x70\x70\151\x6e\147\137\x6b\x65\x79\x5f"][$zM]) ? $_POST["\x6d\141\x70\x70\151\x6e\147\x5f\x6b\x65\171\x5f"][$zM]["\x76\141\x6c\x75\145"] : ''));
        $BD["\x5f\x6d\141\x70\x70\x69\156\147\x5f\166\x61\154\x75\x65\x5f" . $mS] = sanitize_text_field(wp_unslash(isset($_POST["\x6d\x61\160\x70\x69\156\147\x5f\153\145\x79\137"][$zM]) ? $_POST["\155\x61\x70\160\151\156\147\x5f\153\x65\x79\x5f"][$zM]["\x72\157\x6c\145"] : ''));
        $OV++;
        $zM++;
        goto U3;
        s4:
        $zM++;
        goto G8;
        U3:
        goto h0;
        vn:
        if (!('' === $_POST["\155\x61\160\x70\x69\x6e\147\137\153\x65\x79\x5f"][$zM]["\166\x61\154\x75\145"])) {
            goto nQ;
        }
        $zM++;
        goto du;
        nQ:
        $BD["\137\x6d\141\160\x70\x69\156\x67\x5f\x6b\x65\x79\x5f" . $mS] = sanitize_text_field(wp_unslash(isset($_POST["\155\141\160\x70\151\156\x67\137\153\x65\171\137"][$zM]) ? $_POST["\x6d\x61\160\160\x69\x6e\x67\x5f\x6b\x65\x79\x5f"][$zM]["\x76\141\x6c\165\145"] : ''));
        $BD["\x5f\155\141\x70\160\x69\156\x67\137\x76\141\154\x75\x65\x5f" . $mS] = sanitize_text_field(wp_unslash(isset($_POST["\155\141\x70\x70\151\156\x67\137\x6b\145\x79\137"][$zM]) ? $_POST["\155\x61\x70\x70\151\156\x67\x5f\153\145\x79\x5f"][$zM]["\x72\157\x6c\x65"] : ''));
        $zM++;
        $OV++;
        h0:
        du:
        $mS++;
        goto F3;
        DC:
        $BD["\x72\157\154\x65\x5f\155\x61\160\160\x69\156\x67\137\143\157\165\x6e\164"] = $OV;
        $NX = $vj->set_app_by_name($Mg, $BD);
        if (!$NX) {
            goto LV;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x59\157\x75\162\x20\163\145\x74\x74\x69\x6e\147\x73\40\141\162\x65\x20\163\141\x76\145\144\x20\163\165\143\x63\x65\163\x73\x66\165\154\x6c\x79\56");
        $vj->mo_oauth_show_success_message();
        goto Fb;
        LV:
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x54\150\145\x72\145\40\x77\x61\163\40\141\x6e\x20\145\162\162\x6f\162\40\163\141\166\151\x6e\x67\x20\163\x65\164\164\x69\156\147\163\56");
        $vj->mo_oauth_show_error_message();
        Fb:
        wp_safe_redirect("\141\144\x6d\x69\x6e\56\x70\150\160\x3f\160\141\x67\x65\75\155\157\x5f\157\141\x75\x74\x68\x5f\x73\145\164\164\x69\156\147\163\x26\x74\141\142\x3d\143\157\x6e\146\x69\x67\46\x61\143\164\x69\157\x6e\75\165\160\144\x61\164\145\x26\141\160\x70\75" . rawurlencode($Mg));
        s1:
        VB:
    }
}
