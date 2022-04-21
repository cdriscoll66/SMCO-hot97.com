<?php


namespace MoOauthClient\Free;

use MoOauthClient\App;
class AppSettings
{
    private $app_config;
    public function __construct()
    {
        $this->app_config = array("\143\x6c\x69\145\156\x74\x5f\x69\144", "\x63\x6c\151\x65\x6e\164\x5f\163\145\143\x72\145\164", "\163\x63\157\160\x65", "\162\x65\144\151\162\145\143\164\x5f\x75\162\x69", "\x61\160\160\137\164\171\x70\145", "\x61\x75\164\150\x6f\162\151\172\145\x75\x72\154", "\x61\x63\x63\145\163\163\x74\157\153\x65\x6e\x75\162\154", "\x72\x65\163\x6f\x75\x72\143\x65\x6f\167\156\x65\162\x64\145\164\x61\x69\x6c\x73\x75\162\154", "\147\162\x6f\165\x70\144\145\x74\x61\x69\154\163\x75\x72\x6c", "\x6a\x77\x6b\x73\137\x75\x72\151", "\x64\151\163\160\x6c\x61\171\141\x70\x70\156\141\x6d\145", "\141\160\160\111\144", "\155\x6f\137\157\x61\x75\x74\x68\137\x72\x65\163\160\157\156\x73\x65\137\x74\171\x70\x65");
    }
    public function save_app_settings()
    {
        global $vj;
        if (!($GLOBALS["\x6d\157\137\154\x6e\x5f\x65\170\160"] != 1)) {
            goto i1;
        }
        if (!(isset($_POST["\155\x6f\x5f\x6f\141\165\x74\x68\137\141\144\x64\137\x61\160\160\137\x6e\x6f\x6e\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\x6f\137\157\x61\165\x74\150\x5f\141\x64\144\137\141\x70\160\x5f\x6e\157\156\x63\145"])), "\155\157\137\x6f\141\165\x74\150\137\x61\x64\144\137\x61\x70\x70") && isset($_POST[\MoOAuthConstants::OPTION]) && "\155\157\137\x6f\x61\165\x74\x68\137\141\144\144\x5f\x61\160\x70" === $_POST[\MoOAuthConstants::OPTION])) {
            goto nZ;
        }
        if (!($vj->mo_oauth_check_empty_or_null($_POST["\x6d\157\137\157\141\165\x74\x68\x5f\x63\154\x69\x65\x6e\x74\137\x69\144"]) || $vj->mo_oauth_check_empty_or_null($_POST["\155\x6f\x5f\x6f\x61\x75\x74\x68\x5f\143\x6c\x69\145\156\164\137\163\x65\x63\162\x65\x74"]))) {
            goto qt;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x50\x6c\145\141\x73\x65\40\145\x6e\164\145\162\40\x76\x61\154\151\144\x20\x43\154\x69\x65\156\x74\x20\111\104\x20\141\x6e\144\40\103\154\151\x65\156\164\x20\x53\x65\x63\x72\x65\164\x2e");
        $vj->mo_oauth_show_error_message();
        return;
        qt:
        $Mg = isset($_POST["\155\157\x5f\157\141\165\x74\x68\x5f\143\165\163\x74\x6f\155\137\x61\x70\x70\137\156\141\x6d\145"]) ? sanitize_text_field(wp_unslash($_POST["\155\157\x5f\x6f\141\x75\164\x68\137\x63\165\163\164\x6f\155\x5f\x61\x70\x70\137\x6e\141\155\145"])) : false;
        $T8 = $vj->get_app_by_name($Mg);
        $T8 = false !== $T8 ? $T8->get_app_config() : [];
        $Lm = false !== $T8;
        $G5 = $vj->get_app_list();
        if (!(!$Lm && is_array($G5) && count($G5) > 0 && !$vj->check_versi(4))) {
            goto Ox;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\157\165\x20\x63\x61\x6e\40\x6f\x6e\154\x79\40\x61\x64\x64\x20\x31\40\x61\160\160\x6c\x69\143\x61\164\151\157\x6e\x20\x77\x69\164\150\x20\x66\x72\145\x65\40\166\x65\x72\163\151\157\x6e\56\x20\x55\160\147\162\141\x64\x65\40\164\x6f\x20\145\156\164\145\x72\160\162\x69\x73\x65\x20\166\145\x72\163\151\157\156\x20\x69\x66\40\171\x6f\165\40\x77\141\156\164\x20\x74\x6f\x20\x61\144\x64\x20\155\x6f\162\x65\x20\x61\x70\x70\x6c\x69\143\141\x74\x69\157\156\163\x2e");
        $vj->mo_oauth_show_error_message();
        return;
        Ox:
        $T8 = !is_array($T8) || empty($T8) ? array() : $T8;
        $T8 = $this->change_app_settings($_POST, $T8);
        $mY = isset($_POST["\155\x6f\x5f\x6f\x61\x75\x74\x68\x5f\144\151\163\143\157\166\145\162\171"]) && isset($T8["\x69\x73\137\x64\x69\163\143\x6f\166\145\x72\x79\137\166\141\x6c\151\144"]) && $T8["\x69\x73\137\x64\x69\163\x63\157\x76\145\162\x79\x5f\x76\x61\154\151\144"] == "\164\x72\165\145";
        if (!$mY) {
            goto HP;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\x6f\165\x72\x20\163\145\x74\x74\151\156\x67\163\40\x61\x72\x65\40\163\141\x76\145\x64\40\163\165\143\x63\x65\x73\x73\x66\165\154\154\171\x2e");
        $T8["\x6d\157\x5f\x64\151\x73\x63\x6f\x76\145\x72\x79\x5f\x76\141\x6c\151\144\141\164\151\x6f\x6e"] = "\x76\x61\x6c\x69\x64";
        $vj->mo_oauth_show_success_message();
        goto B5;
        HP:
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x3c\163\164\162\x6f\156\x67\x3e\105\x72\162\157\x72\x3a\40\x3c\57\163\164\x72\157\x6e\x67\76\40\x49\x6e\x63\x6f\x72\162\x65\143\164\x20\104\x6f\x6d\x61\151\156\x2f\x54\x65\x6e\141\156\164\57\x50\157\154\x69\143\x79\x2f\x52\145\141\154\x6d\x2e\x20\x50\154\x65\x61\x73\145\x20\x63\x6f\156\146\x69\x67\165\162\145\40\167\x69\x74\x68\x20\143\x6f\x72\x72\145\143\164\x20\166\x61\x6c\165\145\163\40\x61\156\x64\x20\x74\x72\x79\40\x61\147\x61\x69\x6e\x2e");
        $T8["\x6d\157\137\x64\x69\163\x63\x6f\x76\145\x72\171\x5f\166\x61\x6c\151\144\x61\164\x69\157\156"] = "\x69\x6e\166\141\154\151\x64";
        $vj->mo_oauth_show_error_message();
        B5:
        $G5[$Mg] = new App($T8);
        $G5[$Mg]->set_app_name($Mg);
        $G5 = apply_filters("\x6d\x6f\x5f\157\141\165\164\150\x5f\x63\x6c\x69\145\x6e\164\x5f\163\x61\x76\x65\x5f\x61\x64\144\151\x74\x69\157\x6e\x61\x6c\x5f\x66\151\145\154\144\137\x73\x65\164\x74\x69\x6e\147\163\137\151\x6e\x74\x65\x72\156\x61\x6c", $G5);
        $vj->mo_oauth_client_update_option("\155\x6f\137\157\x61\x75\164\150\137\141\x70\160\163\x5f\154\151\163\164", $G5);
        wp_redirect("\141\144\x6d\151\156\56\160\150\x70\x3f\x70\x61\x67\145\75\x6d\157\137\x6f\141\165\x74\x68\x5f\163\145\164\x74\x69\x6e\147\x73\x26\164\x61\x62\75\143\157\156\146\x69\x67\46\x61\x63\x74\151\x6f\156\x3d\165\160\144\x61\164\x65\x26\x61\160\x70\x3d" . urlencode($Mg));
        nZ:
        if (!(isset($_POST["\x6d\157\x5f\157\141\165\x74\150\x5f\141\x74\x74\162\151\142\165\164\145\137\x6d\141\160\160\151\156\x67\137\x6e\x6f\156\x63\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\x5f\157\141\x75\164\150\137\141\164\164\x72\151\142\165\164\x65\137\x6d\x61\160\160\x69\x6e\x67\x5f\x6e\x6f\156\x63\x65"])), "\155\x6f\137\157\x61\x75\164\x68\137\141\164\x74\x72\x69\x62\x75\164\145\x5f\x6d\141\x70\x70\x69\x6e\x67") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\137\x6f\x61\165\164\150\x5f\x61\x74\x74\162\x69\x62\165\x74\145\x5f\155\141\160\x70\151\x6e\147" === $_POST[\MoOAuthConstants::OPTION])) {
            goto kK;
        }
        $Mg = sanitize_text_field(wp_unslash(isset($_POST[\MoOAuthConstants::POST_APP_NAME]) ? $_POST[\MoOAuthConstants::POST_APP_NAME] : ''));
        $kL = $vj->get_app_by_name($Mg);
        $BD = $kL->get_app_config('', false);
        $BD = $this->change_attribute_mapping($_POST, $BD);
        $BD = apply_filters("\155\157\137\157\141\165\x74\150\137\143\154\151\145\x6e\x74\x5f\x73\x61\x76\x65\x5f\x61\144\144\151\164\x69\157\156\x61\x6c\x5f\x61\x74\x74\x72\x5f\155\141\160\160\x69\156\147\137\163\x65\x74\164\151\156\147\x73\x5f\151\x6e\164\145\x72\156\x61\154", $BD);
        $NX = $vj->set_app_by_name($Mg, $BD);
        if (!$NX) {
            goto qg;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x59\157\165\x72\x20\163\145\x74\x74\x69\156\147\163\x20\141\x72\x65\40\x73\141\166\145\144\x20\163\165\x63\143\145\163\x73\146\x75\x6c\154\x79\x2e");
        $vj->mo_oauth_show_success_message();
        goto kC;
        qg:
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\124\x68\145\162\145\40\x77\141\x73\40\141\x6e\x20\145\x72\162\x6f\162\x20\x73\141\x76\151\x6e\147\40\163\x65\x74\x74\151\x6e\x67\x73\56");
        $vj->mo_oauth_show_error_message();
        kC:
        wp_safe_redirect("\141\144\x6d\151\x6e\x2e\x70\x68\x70\77\x70\x61\x67\x65\x3d\x6d\x6f\137\x6f\141\x75\164\x68\137\163\145\x74\164\151\x6e\x67\x73\46\x74\x61\142\x3d\143\x6f\156\x66\151\x67\x26\141\x63\164\x69\157\156\x3d\165\x70\x64\x61\164\x65\46\141\x70\x70\x3d" . rawurlencode($Mg));
        kK:
        i1:
        do_action("\155\157\137\157\x61\165\164\150\137\x63\x6c\x69\x65\156\x74\137\x73\141\166\145\x5f\x61\x70\x70\x5f\163\x65\164\x74\x69\x6e\147\x73\137\151\x6e\x74\x65\162\156\141\154");
    }
    public function change_app_settings($post, $T8)
    {
        global $vj;
        $Jo = '';
        $zl = '';
        $lQ = '';
        $Mg = sanitize_text_field(wp_unslash(isset($post[\MoOAuthConstants::POST_APP_NAME]) ? $post[\MoOAuthConstants::POST_APP_NAME] : ''));
        if ("\145\x76\x65\x6f\x6e\154\151\x6e\145" === $Mg) {
            goto Eu;
        }
        $Ma = isset($post["\155\x6f\137\157\x61\x75\164\x68\x5f\144\x69\163\143\x6f\166\x65\x72\171"]) ? $post["\x6d\x6f\x5f\x6f\x61\x75\x74\x68\137\x64\151\163\143\x6f\x76\x65\x72\171"] : null;
        if (!empty($Ma)) {
            goto Pk;
        }
        $Jo = isset($post["\x6d\157\137\x6f\141\x75\164\150\x5f\141\165\164\x68\x6f\162\x69\172\x65\165\162\x6c"]) ? stripslashes($post["\x6d\157\137\x6f\141\x75\164\x68\137\x61\x75\164\150\x6f\162\x69\x7a\x65\165\x72\x6c"]) : '';
        $zl = isset($post["\155\x6f\137\157\141\x75\x74\x68\137\141\x63\x63\x65\x73\163\x74\157\153\x65\156\x75\x72\154"]) ? stripslashes($post["\155\x6f\x5f\x6f\141\x75\164\150\137\141\x63\143\145\163\163\x74\x6f\153\x65\x6e\x75\162\154"]) : '';
        $lQ = isset($post["\x6d\x6f\x5f\157\x61\x75\164\x68\x5f\x72\145\163\x6f\x75\162\x63\145\157\167\156\145\x72\x64\x65\164\141\x69\154\163\165\162\x6c"]) ? stripslashes($post["\155\157\x5f\x6f\141\165\164\150\x5f\x72\x65\x73\157\x75\x72\x63\145\157\x77\x6e\x65\x72\x64\145\164\x61\151\154\163\165\162\154"]) : '';
        goto uE;
        Pk:
        $T8["\145\x78\x69\x73\x74\151\x6e\147\x5f\x61\160\x70\137\146\x6c\157\x77"] = true;
        if (isset($post["\x6d\157\x5f\x6f\141\x75\x74\x68\137\160\162\x6f\166\x69\x64\x65\162\137\x64\x6f\x6d\x61\151\156"])) {
            goto UE;
        }
        if (!isset($post["\x6d\157\x5f\x6f\x61\165\x74\150\x5f\x70\x72\x6f\x76\x69\144\145\162\137\x74\145\x6e\141\156\164"])) {
            goto yU;
        }
        $li = stripslashes(trim($post["\155\157\137\157\141\x75\164\150\x5f\x70\162\157\166\151\144\145\162\137\164\x65\156\141\156\x74"]));
        $Ma = str_replace("\164\145\156\x61\x6e\x74", $li, $Ma);
        $T8["\164\x65\x6e\x61\156\x74"] = $li;
        yU:
        goto BC;
        UE:
        $Gf = stripslashes(rtrim($post["\x6d\x6f\x5f\x6f\141\165\x74\150\137\160\162\157\166\151\x64\x65\x72\x5f\144\x6f\155\x61\151\x6e"], "\x2f"));
        $Ma = str_replace("\x64\157\x6d\x61\151\156", $Gf, $Ma);
        $T8["\144\x6f\x6d\141\151\156"] = $Gf;
        BC:
        if (isset($post["\155\x6f\137\x6f\141\x75\164\150\137\x70\x72\157\166\151\144\145\x72\137\160\157\154\x69\x63\171"])) {
            goto IL;
        }
        if (!isset($post["\x6d\x6f\137\157\141\165\x74\150\137\160\x72\x6f\166\x69\144\145\x72\137\x72\x65\141\x6c\155"])) {
            goto Vc;
        }
        $Jm = stripslashes(trim($post["\x6d\157\x5f\157\x61\165\164\150\137\x70\x72\x6f\166\151\144\x65\162\137\x72\x65\141\154\x6d"]));
        $Ma = str_replace("\x72\x65\141\x6c\155\156\141\155\145", $Jm, $Ma);
        $T8["\162\x65\141\154\155"] = $Jm;
        Vc:
        goto ob;
        IL:
        $LU = stripslashes(trim($post["\x6d\x6f\x5f\x6f\141\x75\x74\150\137\x70\162\157\166\x69\x64\x65\162\137\160\157\154\x69\143\171"]));
        $Ma = str_replace("\160\157\154\x69\x63\171", $LU, $Ma);
        $T8["\160\x6f\154\151\x63\171"] = $LU;
        ob:
        error_log("\x4f\x41\x75\164\x68\x20\x43\154\151\145\x6e\x74\40\105\156\x64\160\x6f\x69\156\x74\x3a\x20");
        error_log($Ma);
        $Bh = null;
        if (filter_var($Ma, FILTER_VALIDATE_URL)) {
            goto aU;
        }
        $T8["\x69\x73\x5f\x64\x69\163\143\x6f\x76\x65\x72\171\137\x76\141\x6c\x69\x64"] = "\146\x61\x6c\x73\145";
        goto QC;
        aU:
        $vj->mo_oauth_client_update_option("\155\x6f\x5f\157\x63\137\x76\x61\x6c\x69\144\137\144\151\x73\143\x6f\166\145\162\x79\x5f\145\160", true);
        $hw = array("\x73\163\154" => array("\166\x65\x72\151\146\171\x5f\x70\x65\x65\x72" => false, "\166\145\162\x69\x66\171\x5f\x70\145\145\162\137\x6e\141\x6d\x65" => false));
        $lM = @file_get_contents($Ma, false, stream_context_create($hw));
        $Bh = array();
        if ($lM) {
            goto Dn;
        }
        $T8["\x69\163\x5f\144\151\x73\143\x6f\x76\x65\162\171\137\x76\x61\x6c\x69\x64"] = "\146\x61\x6c\x73\145";
        goto S9;
        Dn:
        $Bh = json_decode($lM);
        $T8["\151\x73\137\x64\x69\x73\x63\157\x76\145\x72\171\137\x76\141\154\151\144"] = "\x74\162\x75\145";
        S9:
        $F8 = isset($Bh->scopes_supported[0]) ? $Bh->scopes_supported[0] : '';
        $F1 = isset($Bh->scopes_supported[1]) ? $Bh->scopes_supported[1] : '';
        $Tz = stripslashes($F8) . "\x20" . stripslashes($F1);
        $T8["\144\x69\163\143\157\x76\145\162\x79"] = $Ma;
        $T8["\163\x63\157\160\x65"] = isset($uJ) && !empty($uJ) ? $uJ : $Tz;
        $Jo = isset($Bh->authorization_endpoint) ? stripslashes($Bh->authorization_endpoint) : '';
        $zl = isset($Bh->token_endpoint) ? stripslashes($Bh->token_endpoint) : '';
        $lQ = isset($Bh->userinfo_endpoint) ? stripslashes($Bh->userinfo_endpoint) : '';
        QC:
        uE:
        goto ck;
        Eu:
        $vj->mo_oauth_client_update_option("\x6d\x6f\x5f\x6f\141\x75\x74\150\x5f\x65\x76\145\157\156\154\x69\x6e\x65\137\145\x6e\141\x62\x6c\x65", 1);
        $vj->mo_oauth_client_update_option("\155\157\x5f\157\141\165\x74\x68\137\145\166\145\157\156\x6c\151\x6e\145\137\143\154\x69\x65\156\x74\x5f\151\x64", $Qt);
        $vj->mo_oauth_client_update_option("\x6d\x6f\137\157\141\x75\164\x68\x5f\x65\x76\145\157\156\x6c\x69\156\145\137\143\x6c\151\x65\156\164\137\x73\x65\143\162\x65\164", $Q1);
        if (!($vj->mo_oauth_client_get_option("\155\x6f\x5f\157\141\165\164\x68\137\x65\166\145\x6f\x6e\154\x69\x6e\145\137\x63\x6c\151\145\x6e\x74\x5f\x69\144") && $vj->mo_oauth_client_get_option("\155\x6f\x5f\157\x61\x75\164\x68\x5f\x65\x76\145\157\156\x6c\151\156\x65\x5f\x63\154\151\145\x6e\x74\x5f\163\x65\x63\x72\145\164"))) {
            goto kg;
        }
        $qa = new Customer();
        $CG = $qa->add_oauth_application("\x65\166\145\157\x6e\154\151\156\145", "\105\126\105\x20\x4f\156\154\151\x6e\145\x20\x4f\x41\165\x74\x68");
        if ("\101\160\x70\154\x69\143\x61\x74\x69\x6f\x6e\40\103\162\x65\x61\164\145\144" === $CG) {
            goto ac;
        }
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, $CG);
        $this->mo_oauth_show_error_message();
        goto X8;
        ac:
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x59\157\165\162\40\x73\x65\164\x74\151\156\147\x73\x20\167\145\162\x65\40\163\x61\166\x65\x64\x2e\40\107\157\x20\x74\157\x20\101\x64\166\141\156\143\145\x64\40\x45\126\x45\x20\117\156\154\x69\x6e\x65\40\123\145\x74\x74\151\x6e\x67\x73\x20\146\x6f\162\x20\143\x6f\x6e\146\x69\x67\x75\x72\151\x6e\147\x20\162\145\163\164\162\x69\x63\164\151\x6f\x6e\x73\40\x6f\x6e\x20\x75\163\145\162\x20\x73\151\x67\x6e\x20\x69\156\56");
        $this->mo_oauth_show_success_message();
        X8:
        kg:
        ck:
        isset($post["\155\x6f\x5f\x6f\x61\x75\x74\x68\137\163\143\157\x70\x65"]) && !empty($post["\155\x6f\x5f\x6f\141\x75\x74\150\137\x73\143\x6f\x70\x65"]) ? $T8["\163\143\157\160\145"] = sanitize_text_field(wp_unslash($post["\x6d\x6f\137\157\141\x75\164\150\137\163\143\157\160\145"])) : '';
        $T8["\165\156\151\161\x75\145\x5f\x61\160\160\151\x64"] = isset($post["\155\x6f\137\157\141\165\x74\150\137\x61\x70\x70\x5f\156\141\155\145"]) ? stripslashes($post["\155\x6f\137\x6f\141\165\x74\x68\137\x61\x70\x70\137\156\x61\155\145"]) : '';
        $T8["\143\x6c\x69\x65\x6e\x74\x5f\x69\144"] = $vj->mooauthencrypt(sanitize_text_field(wp_unslash(isset($post["\155\x6f\x5f\x6f\141\x75\x74\x68\137\143\x6c\151\x65\156\164\137\x69\144"]) ? $post["\155\157\x5f\x6f\x61\165\164\x68\x5f\x63\154\x69\145\156\x74\137\x69\x64"] : '')));
        $T8["\x63\154\x69\x65\x6e\164\x5f\163\x65\x63\162\x65\164"] = $vj->mooauthencrypt(wp_unslash(isset($post["\155\x6f\137\157\141\165\x74\x68\137\143\154\151\x65\156\x74\137\163\145\x63\162\145\164"]) ? stripslashes(trim($post["\x6d\x6f\137\x6f\141\165\164\150\137\143\154\x69\145\x6e\164\x5f\x73\145\x63\x72\x65\164"])) : ''));
        $T8["\143\154\x69\x65\x6e\164\x5f\143\x72\145\144\x73\x5f\145\x6e\x63\x72\160\x79\164\145\x64"] = true;
        $T8["\163\145\156\144\137\150\145\141\x64\x65\x72\x73"] = isset($post["\155\157\x5f\157\x61\165\x74\x68\x5f\141\165\x74\x68\157\162\x69\172\141\164\151\157\x6e\137\x68\x65\x61\144\x65\162"]) ? (int) filter_var($post["\x6d\157\x5f\x6f\141\x75\x74\150\x5f\141\165\x74\150\x6f\162\151\172\x61\x74\x69\x6f\x6e\x5f\150\145\x61\x64\x65\162"], FILTER_SANITIZE_NUMBER_INT) : 0;
        $T8["\163\x65\156\x64\137\142\x6f\x64\171"] = isset($post["\x6d\157\137\157\x61\165\x74\x68\x5f\x62\157\x64\x79"]) ? (int) filter_var($post["\155\157\137\157\141\165\x74\150\x5f\142\157\x64\x79"], FILTER_SANITIZE_NUMBER_INT) : 0;
        $T8["\163\145\156\x64\x5f\x73\x74\x61\164\145"] = isset($_POST["\155\157\137\x6f\141\165\x74\150\x5f\x73\x74\141\x74\145"]) ? (int) filter_var($_POST["\155\x6f\137\x6f\x61\x75\x74\150\x5f\x73\164\141\x74\145"], FILTER_SANITIZE_NUMBER_INT) : 0;
        $T8["\163\x65\x6e\x64\137\156\x6f\x6e\143\145"] = isset($_POST["\x6d\x6f\x5f\x6f\x61\x75\164\x68\137\156\x6f\156\x63\x65"]) ? (int) filter_var($_POST["\x6d\157\x5f\157\141\165\x74\150\137\x6e\157\156\143\x65"], FILTER_SANITIZE_NUMBER_INT) : 0;
        $T8["\163\150\x6f\167\137\157\x6e\x5f\154\x6f\147\x69\156\137\160\141\147\x65"] = isset($post["\155\157\x5f\157\141\165\x74\150\137\163\x68\x6f\x77\137\x6f\156\137\x6c\157\147\x69\156\137\x70\x61\147\145"]) ? (int) filter_var($post["\x6d\157\x5f\x6f\x61\x75\164\x68\x5f\x73\x68\x6f\x77\137\157\x6e\x5f\154\x6f\x67\x69\x6e\x5f\x70\x61\147\145"], FILTER_SANITIZE_NUMBER_INT) : 0;
        if (!(!empty($T8["\141\x70\x70\137\x74\x79\160\x65"]) && $T8["\x61\x70\160\x5f\x74\x79\160\145"] === "\x6f\x61\165\164\150\61")) {
            goto bD;
        }
        $T8["\162\x65\161\x75\145\x73\x74\x75\x72\154"] = isset($post["\155\x6f\137\157\141\165\x74\x68\x5f\x72\x65\x71\x75\x65\x73\164\x75\x72\x6c"]) ? stripslashes($post["\x6d\157\x5f\157\141\x75\x74\150\137\162\145\x71\165\x65\163\164\165\x72\154"]) : '';
        bD:
        if (isset($T8["\x61\x70\160\111\144"])) {
            goto G9;
        }
        $T8["\141\160\x70\111\x64"] = $Mg;
        G9:
        $T8["\162\145\144\151\x72\145\x63\164\137\165\162\151"] = sanitize_text_field(wp_unslash(isset($post["\x6d\157\x5f\x75\x70\144\141\164\145\x5f\x75\162\x6c"]) ? $post["\155\x6f\x5f\165\160\x64\141\x74\x65\137\x75\162\154"] : site_url()));
        $T8["\141\x75\x74\x68\157\x72\x69\x7a\x65\165\162\154"] = $Jo;
        $T8["\x61\x63\143\145\163\x73\164\x6f\153\x65\x6e\x75\x72\x6c"] = $zl;
        $T8["\141\160\160\137\164\x79\x70\145"] = isset($post["\x6d\157\137\157\x61\x75\164\x68\x5f\141\160\160\x5f\x74\171\160\145"]) ? stripslashes($post["\155\157\x5f\157\x61\x75\x74\x68\x5f\x61\160\x70\137\x74\x79\x70\145"]) : stripslashes("\x6f\141\x75\164\150");
        if (!($T8["\141\160\160\137\164\x79\x70\x65"] == "\x6f\x61\x75\164\x68" || $T8["\141\x70\160\137\x74\x79\160\x65"] == "\157\141\x75\164\x68\x31" || isset($post["\x6d\x6f\x5f\157\x61\165\x74\x68\x5f\162\x65\163\x6f\x75\x72\x63\x65\157\x77\156\x65\162\144\x65\164\141\151\x6c\163\165\162\154"]))) {
            goto am;
        }
        $T8["\162\145\x73\157\165\x72\143\x65\x6f\167\156\x65\162\x64\145\x74\141\x69\154\x73\165\x72\154"] = $lQ;
        am:
        return $T8;
    }
    public function change_attribute_mapping($post, $T8)
    {
        $Zf = stripslashes($post["\x6d\x6f\x5f\x6f\141\x75\x74\150\137\x75\163\145\x72\x6e\141\x6d\x65\x5f\x61\164\164\162"]);
        $T8["\165\x73\x65\x72\x6e\x61\x6d\x65\x5f\x61\164\164\162"] = $Zf;
        return $T8;
    }
}
