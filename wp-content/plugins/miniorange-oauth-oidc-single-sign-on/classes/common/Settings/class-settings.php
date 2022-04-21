<?php


namespace MoOauthClient;

use MoOauthClient\Backup\BackupHandler;
use MoOauthClient\mc_utils;
use MoOauthClient\Customer;
use MoOauthClient\Config;
class Settings
{
    public $config;
    public $util;
    public function __construct()
    {
        global $vj;
        $this->util = $vj;
        add_action("\141\x64\155\x69\156\137\x69\x6e\151\x74", array($this, "\155\x69\x6e\x69\x6f\x72\141\x6e\x67\145\137\x6f\141\x75\x74\x68\x5f\163\141\166\145\137\x73\145\164\164\151\x6e\147\163"));
        add_shortcode("\x6d\157\x5f\x6f\x61\165\x74\150\137\154\157\x67\x69\156", array($this, "\x6d\157\x5f\157\x61\165\164\x68\x5f\x73\150\x6f\162\164\143\x6f\x64\x65\x5f\154\157\147\151\156"));
        $this->util->mo_oauth_client_update_option("\155\x6f\137\x6f\141\165\164\x68\137\x6c\157\x67\151\x6e\x5f\x69\143\x6f\156\137\x73\x70\x61\x63\145", "\65");
        $this->util->mo_oauth_client_update_option("\155\157\x5f\157\x61\165\x74\150\x5f\x6c\157\147\x69\x6e\x5f\x69\143\157\156\x5f\143\x75\x73\x74\x6f\x6d\x5f\167\x69\x64\x74\x68", "\63\62\x35\x2e\x34\63");
        $this->util->mo_oauth_client_update_option("\155\x6f\x5f\x6f\x61\x75\x74\x68\137\x6c\x6f\x67\151\x6e\x5f\x69\143\x6f\156\x5f\143\165\x73\x74\157\155\137\x68\x65\x69\x67\150\x74", "\x39\x2e\66\x33");
        $this->util->mo_oauth_client_update_option("\155\x6f\137\157\x61\165\164\150\x5f\154\x6f\x67\x69\x6e\x5f\x69\x63\x6f\x6e\137\143\165\x73\164\x6f\155\137\163\151\x7a\x65", "\63\x35");
        $this->util->mo_oauth_client_update_option("\x6d\157\137\x6f\x61\x75\164\150\137\154\157\147\x69\156\x5f\151\143\x6f\156\x5f\143\x75\163\x74\157\155\137\143\x6f\154\157\x72", "\x32\x42\x34\61\106\106");
        $this->util->mo_oauth_client_update_option("\155\x6f\x5f\157\x61\x75\x74\150\137\x6c\157\x67\x69\x6e\137\x69\143\x6f\156\x5f\143\165\x73\x74\157\155\x5f\142\x6f\165\156\x64\x61\x72\171", "\64");
        $this->config = $this->util->get_plugin_config();
    }
    public function miniorange_oauth_save_settings()
    {
        global $vj;
        if (!(isset($_POST["\143\x68\x61\156\x67\x65\137\155\151\156\151\157\162\141\156\147\145\x5f\156\157\156\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x63\x68\141\156\x67\145\137\155\151\156\151\x6f\162\141\156\x67\x65\x5f\156\x6f\156\143\145"])), "\143\x68\x61\156\x67\145\137\x6d\x69\156\x69\157\x72\141\156\147\x65") && isset($_POST[\MoOAuthConstants::OPTION]) && "\143\x68\x61\156\147\x65\x5f\155\x69\x6e\151\157\x72\x61\x6e\147\145" === $_POST[\MoOAuthConstants::OPTION])) {
            goto WK;
        }
        mo_oauth_deactivate();
        return;
        WK:
        if (!(isset($_POST["\155\157\x5f\x6f\141\165\x74\150\137\x65\156\x61\142\154\x65\137\144\x65\x62\x75\x67\137\156\157\156\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\137\157\141\x75\x74\150\x5f\x65\156\x61\x62\154\x65\137\x64\145\142\165\x67\137\x6e\157\x6e\143\x65"])), "\155\157\x5f\x6f\141\x75\x74\150\137\x65\x6e\141\x62\x6c\145\137\144\145\x62\165\x67") && isset($_POST[\MoOAuthConstants::OPTION]) && "\155\157\137\157\141\x75\164\x68\137\x65\x6e\x61\142\154\x65\137\x64\145\142\165\147" === $_POST[\MoOAuthConstants::OPTION])) {
            goto BE;
        }
        $UL = isset($_POST["\155\157\137\157\x61\x75\x74\150\137\144\145\x62\x75\147\x5f\x63\x68\145\143\153"]);
        $VX = current_time("\x74\x69\155\145\163\x74\141\155\160");
        $vj->mo_oauth_client_update_option("\x6d\x6f\x5f\144\145\142\165\147\x5f\145\156\141\x62\x6c\145", $UL);
        if (!$vj->mo_oauth_client_get_option("\155\x6f\x5f\144\x65\x62\x75\x67\137\145\x6e\141\x62\x6c\145")) {
            goto uB;
        }
        $vj->mo_oauth_client_update_option("\x6d\x6f\137\x64\x65\142\x75\x67\137\x63\x68\145\x63\x6b", 1);
        $vj->mo_oauth_client_update_option("\x6d\x6f\x5f\144\145\142\165\x67\x5f\x74\x69\155\x65", $VX);
        uB:
        if (!($vj->mo_oauth_client_get_option("\155\x6f\137\x64\145\x62\165\x67\137\145\156\141\142\154\x65") && !$vj->mo_oauth_client_get_option("\x6d\157\137\x6f\141\165\164\150\x5f\x64\x65\x62\165\147"))) {
            goto MN;
        }
        $vj->mo_oauth_client_update_option("\x6d\157\x5f\x6f\141\165\164\x68\x5f\x64\x65\x62\x75\x67", "\155\157\x5f\157\x61\x75\x74\150\x5f\x64\145\x62\x75\x67" . uniqid());
        $Q6 = $vj->mo_oauth_client_get_option("\x6d\157\x5f\157\x61\x75\x74\150\137\144\x65\142\165\x67");
        $fz = dirname(__DIR__) . DIRECTORY_SEPARATOR . "\x4f\101\x75\x74\150\110\141\x6e\144\154\x65\x72" . DIRECTORY_SEPARATOR . $Q6 . "\x2e\154\157\x67";
        $cL = fopen($fz, "\167");
        chmod($fz, 0644);
        $vj->mo_oauth_client_update_option("\155\157\137\144\x65\x62\165\x67\137\143\150\x65\x63\x6b", 1);
        MO_Oauth_Debug::mo_oauth_log('');
        $vj->mo_oauth_client_update_option("\155\x6f\137\144\145\142\x75\x67\x5f\x63\150\145\143\153", 0);
        MN:
        return;
        BE:
        if (!(isset($_POST["\155\157\137\x6f\x61\165\x74\x68\137\x65\156\141\142\x6c\145\137\144\145\142\165\x67\137\x64\157\x77\156\154\157\141\144\x5f\156\x6f\156\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\157\137\157\x61\165\x74\x68\137\x65\x6e\x61\142\154\145\137\x64\145\142\165\147\137\x64\x6f\167\x6e\x6c\157\x61\x64\137\x6e\157\156\143\x65"])), "\155\157\x5f\157\x61\x75\x74\150\137\x65\156\x61\142\x6c\145\x5f\144\145\142\165\147\x5f\x64\x6f\x77\x6e\154\x6f\x61\x64") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\x5f\157\141\x75\164\150\137\145\x6e\141\142\154\145\137\x64\x65\142\x75\x67\137\x64\157\167\156\x6c\x6f\141\x64" === $_POST[\MoOAuthConstants::OPTION])) {
            goto cC;
        }
        $qV = plugin_dir_path(__FILE__) . "\x2f\x2e\x2e\57\x4f\101\165\164\150\x48\141\156\x64\x6c\145\162\x2f" . $vj->mo_oauth_client_get_option("\x6d\157\x5f\x6f\x61\165\x74\x68\137\144\x65\142\165\147") . "\x2e\154\x6f\147";
        if (is_file($qV)) {
            goto TK;
        }
        echo "\64\x30\x34\40\106\151\154\x65\40\156\157\x74\40\146\157\x75\156\144\41";
        exit;
        TK:
        $QV = filesize($qV);
        $KD = basename($qV);
        $i9 = strtolower(pathinfo($KD, PATHINFO_EXTENSION));
        $bk = "\141\x70\x70\x6c\151\x63\141\x74\x69\157\x6e\x2f\146\x6f\x72\x63\x65\55\144\157\x77\156\154\157\x61\x64";
        if (!ob_get_contents()) {
            goto t_;
        }
        ob_clean();
        t_:
        header("\120\x72\141\147\x6d\141\x3a\40\x70\165\x62\154\x69\x63");
        header("\x45\170\x70\x69\x72\x65\163\72\x20\60");
        header("\103\x61\143\150\x65\x2d\103\x6f\x6e\x74\x72\157\154\72\40\x6d\x75\163\164\x2d\162\145\166\141\x6c\x69\x64\x61\x74\145\54\x20\160\x6f\x73\164\55\x63\x68\x65\x63\153\75\x30\x2c\40\x70\x72\145\55\x63\x68\145\143\x6b\x3d\60");
        header("\103\141\x63\x68\145\55\x43\x6f\x6e\x74\x72\x6f\x6c\72\x20\x70\165\142\x6c\x69\x63");
        header("\103\157\156\x74\x65\156\x74\x2d\104\145\x73\143\x72\x69\160\164\151\157\x6e\72\40\x46\x69\x6c\145\40\x54\162\141\156\163\146\145\x72");
        header("\x43\x6f\x6e\x74\145\x6e\x74\x2d\124\171\160\145\x3a\x20{$bk}");
        $Vj = "\x43\157\156\x74\145\x6e\164\55\x44\151\x73\160\x6f\x73\x69\x74\151\157\156\72\x20\x61\164\164\x61\143\150\155\145\x6e\x74\73\40\x66\x69\154\145\156\141\x6d\x65\x3d" . $KD . "\73";
        header($Vj);
        header("\103\157\x6e\164\x65\156\x74\x2d\124\162\141\x6e\163\x66\145\x72\55\x45\156\143\x6f\x64\151\x6e\147\72\40\142\x69\156\141\x72\171");
        header("\x43\157\156\x74\x65\156\x74\x2d\114\x65\x6e\x67\164\x68\72\40" . $QV);
        @readfile($qV);
        exit;
        cC:
        if (!(isset($_POST["\155\x6f\x5f\x6f\x61\165\x74\x68\137\162\145\x67\151\x73\x74\145\162\137\x63\165\163\164\157\155\145\162\137\x6e\x6f\x6e\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\137\x6f\x61\x75\164\150\137\162\145\147\151\x73\x74\145\x72\x5f\x63\165\163\164\157\x6d\145\162\137\x6e\157\x6e\143\145"])), "\155\x6f\x5f\157\x61\x75\x74\x68\x5f\x72\x65\147\151\x73\x74\x65\162\x5f\143\165\163\164\157\x6d\145\x72") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\x5f\x6f\141\x75\x74\150\137\162\x65\147\151\x73\164\x65\162\x5f\143\165\x73\164\157\x6d\145\x72" === $_POST[\MoOAuthConstants::OPTION])) {
            goto Nc;
        }
        $zZ = '';
        $jb = '';
        $hF = '';
        $Mn = '';
        $E4 = '';
        $l8 = '';
        $Ga = '';
        if (!($this->util->mo_oauth_check_empty_or_null($_POST["\x65\155\x61\151\154"]) || $this->util->mo_oauth_check_empty_or_null($_POST["\x70\141\163\x73\167\157\162\144"]) || $this->util->mo_oauth_check_empty_or_null($_POST["\143\157\x6e\146\151\162\x6d\120\x61\x73\x73\167\157\162\144"]))) {
            goto lq;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x41\154\154\40\164\x68\145\40\x66\151\145\x6c\144\163\x20\141\x72\145\x20\x72\145\161\x75\151\162\145\x64\56\x20\120\154\x65\x61\163\x65\40\x65\x6e\164\x65\x72\40\x76\x61\x6c\x69\x64\40\x65\156\164\162\x69\145\163\56");
        $this->util->mo_oauth_show_error_message();
        return;
        lq:
        if (strlen($_POST["\160\141\163\163\x77\x6f\162\x64"]) < 8 || strlen($_POST["\x63\157\156\x66\151\162\x6d\120\x61\163\163\167\x6f\162\144"]) < 8) {
            goto HE;
        }
        $zZ = sanitize_email($_POST["\x65\x6d\x61\x69\154"]);
        $jb = stripslashes($_POST["\160\x68\x6f\x6e\x65"]);
        $hF = stripslashes($_POST["\160\141\x73\163\167\157\162\x64"]);
        $Mn = stripslashes($_POST["\x66\x6e\x61\x6d\145"]);
        $E4 = stripslashes($_POST["\154\x6e\x61\155\145"]);
        $l8 = stripslashes($_POST["\x63\x6f\155\160\x61\x6e\x79"]);
        $Ga = stripslashes($_POST["\x63\x6f\x6e\146\x69\162\155\x50\141\x73\x73\x77\157\162\144"]);
        goto M2;
        HE:
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x43\150\x6f\x6f\x73\x65\x20\x61\40\160\141\x73\x73\x77\157\162\x64\x20\167\151\164\x68\x20\155\151\156\151\155\x75\155\40\154\x65\x6e\147\x74\150\40\x38\56");
        $this->util->mo_oauth_show_error_message();
        return;
        M2:
        $this->util->mo_oauth_client_update_option("\155\x6f\137\157\x61\165\x74\150\137\141\144\155\x69\x6e\137\x65\x6d\x61\x69\x6c", $zZ);
        $this->util->mo_oauth_client_update_option("\x6d\157\x5f\x6f\x61\165\x74\150\x5f\x61\144\155\x69\x6e\137\160\x68\157\x6e\145", $jb);
        $this->util->mo_oauth_client_update_option("\x6d\x6f\137\157\141\165\164\x68\137\141\x64\155\x69\x6e\x5f\x66\156\141\x6d\x65", $Mn);
        $this->util->mo_oauth_client_update_option("\155\x6f\x5f\x6f\141\165\164\150\137\x61\x64\155\x69\x6e\x5f\x6c\156\141\x6d\x65", $E4);
        $this->util->mo_oauth_client_update_option("\155\x6f\137\157\141\x75\164\150\137\141\x64\155\x69\x6e\x5f\x63\x6f\155\x70\141\156\x79", $l8);
        if (!($this->util->mo_oauth_is_curl_installed() === 0)) {
            goto mz;
        }
        return $this->util->mo_oauth_show_curl_error();
        mz:
        if (strcmp($hF, $Ga) === 0) {
            goto Ly;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\120\141\x73\x73\x77\157\162\x64\x73\x20\144\157\x20\x6e\x6f\x74\40\155\141\x74\143\x68\x2e");
        $this->util->mo_oauth_client_delete_option("\x76\x65\162\x69\146\x79\137\143\x75\x73\164\157\155\145\x72");
        $this->util->mo_oauth_show_error_message();
        goto UA;
        Ly:
        $this->util->mo_oauth_client_update_option("\160\141\x73\163\x77\x6f\x72\144", $hF);
        $qa = new Customer();
        $zZ = $this->util->mo_oauth_client_get_option("\x6d\x6f\x5f\157\141\165\164\150\x5f\141\x64\155\x69\156\137\x65\155\141\x69\154");
        $lM = json_decode($qa->check_customer(), true);
        if (strcasecmp($lM["\163\164\141\164\165\x73"], "\x43\125\x53\124\117\115\x45\122\x5f\116\x4f\124\137\106\117\125\x4e\x44") === 0) {
            goto aF;
        }
        $this->mo_oauth_get_current_customer();
        goto YZ;
        aF:
        $this->create_customer();
        YZ:
        UA:
        Nc:
        if (!(isset($_POST["\155\x6f\x5f\157\141\165\164\x68\x5f\x76\x65\x72\151\x66\171\x5f\x63\165\163\x74\157\x6d\145\x72\137\x6e\x6f\x6e\x63\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\137\157\141\x75\x74\150\137\166\x65\x72\x69\146\171\137\x63\165\x73\x74\157\155\x65\162\137\x6e\x6f\x6e\x63\x65"])), "\155\157\x5f\x6f\x61\165\x74\150\137\x76\145\162\151\x66\x79\137\x63\165\163\164\157\155\145\162") && isset($_POST[\MoOAuthConstants::OPTION]) && "\155\157\137\x6f\141\x75\164\x68\x5f\x76\x65\162\151\x66\171\x5f\x63\x75\163\164\x6f\x6d\x65\162" === $_POST[\MoOAuthConstants::OPTION])) {
            goto ZS;
        }
        if (!($this->util->mo_oauth_is_curl_installed() === 0)) {
            goto I8;
        }
        return $this->util->mo_oauth_show_curl_error();
        I8:
        $zZ = isset($_POST["\x65\x6d\141\x69\x6c"]) ? sanitize_email(wp_unslash($_POST["\145\155\x61\x69\x6c"])) : '';
        $hF = isset($_POST["\160\141\x73\163\x77\x6f\x72\144"]) ? $_POST["\x70\x61\163\x73\x77\157\x72\x64"] : '';
        if (!($this->util->mo_oauth_check_empty_or_null($zZ) || $this->util->mo_oauth_check_empty_or_null($hF))) {
            goto QK;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\101\x6c\x6c\40\x74\x68\x65\40\x66\151\x65\154\x64\x73\40\141\x72\145\40\162\145\161\x75\x69\x72\145\144\56\x20\120\154\x65\x61\163\x65\x20\145\x6e\x74\145\162\40\166\x61\x6c\151\144\x20\x65\x6e\164\162\151\145\x73\56");
        $this->util->mo_oauth_show_error_message();
        return;
        QK:
        $this->util->mo_oauth_client_update_option("\x6d\x6f\137\x6f\x61\x75\164\150\137\141\x64\x6d\x69\156\137\x65\x6d\x61\151\154", $zZ);
        $this->util->mo_oauth_client_update_option("\160\x61\163\163\x77\x6f\162\x64", $hF);
        $qa = new Customer();
        $lM = $qa->get_customer_key();
        $ZR = json_decode($lM, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            goto Ek;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\111\156\166\x61\x6c\x69\144\x20\x75\163\x65\x72\156\x61\x6d\x65\x20\x6f\162\40\x70\x61\163\x73\x77\x6f\x72\144\x2e\x20\120\154\x65\141\163\145\x20\x74\x72\x79\40\x61\x67\x61\151\x6e\x2e");
        $this->util->mo_oauth_show_error_message();
        goto Cq;
        Ek:
        $this->util->mo_oauth_client_update_option("\155\x6f\x5f\x6f\141\165\164\150\x5f\x61\x64\x6d\151\156\x5f\143\x75\x73\x74\x6f\x6d\145\162\x5f\x6b\145\x79", $ZR["\x69\144"]);
        $this->util->mo_oauth_client_update_option("\155\157\137\157\x61\165\x74\x68\x5f\x61\x64\155\151\x6e\x5f\141\x70\x69\137\153\145\x79", $ZR["\x61\160\x69\113\145\171"]);
        $this->util->mo_oauth_client_update_option("\143\x75\x73\164\x6f\155\145\x72\x5f\164\x6f\x6b\x65\x6e", $ZR["\164\157\153\x65\156"]);
        if (!isset($nf["\x70\150\157\x6e\x65"])) {
            goto p3;
        }
        $this->util->mo_oauth_client_update_option("\x6d\157\x5f\x6f\x61\165\164\x68\x5f\141\144\155\x69\x6e\x5f\x70\x68\157\156\145", $ZR["\x70\150\x6f\x6e\x65"]);
        p3:
        $this->util->mo_oauth_client_delete_option("\160\x61\x73\163\x77\157\x72\144");
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x43\x75\163\164\157\x6d\x65\x72\40\162\145\x74\162\151\x65\x76\145\144\40\163\x75\x63\x63\145\x73\x73\146\165\x6c\x6c\x79");
        $this->util->mo_oauth_client_delete_option("\166\145\162\151\x66\x79\x5f\143\x75\x73\x74\x6f\155\x65\162");
        $this->util->mo_oauth_show_success_message();
        Cq:
        ZS:
        if (!(isset($_POST["\155\x6f\137\157\141\x75\x74\x68\137\x63\150\x61\x6e\147\x65\x5f\x65\155\141\151\154\x5f\156\x6f\156\x63\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\137\157\x61\165\164\150\137\143\x68\x61\156\x67\145\137\145\x6d\141\x69\x6c\137\x6e\157\x6e\143\145"])), "\155\157\x5f\157\x61\x75\x74\x68\137\143\150\x61\156\x67\x65\137\x65\155\x61\151\x6c") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\x5f\157\x61\165\164\150\137\x63\150\141\156\147\145\137\145\x6d\x61\151\x6c" === $_POST[\MoOAuthConstants::OPTION])) {
            goto KS;
        }
        $this->util->mo_oauth_client_update_option("\166\x65\162\x69\146\171\x5f\x63\x75\163\x74\157\155\145\162", '');
        $this->util->mo_oauth_client_update_option("\155\x6f\137\157\141\x75\x74\150\137\162\x65\147\x69\x73\x74\x72\x61\x74\x69\157\x6e\137\x73\164\x61\x74\x75\163", '');
        $this->util->mo_oauth_client_update_option("\x6e\145\x77\x5f\x72\x65\x67\x69\163\x74\x72\x61\164\x69\157\156", "\x74\x72\165\145");
        KS:
        if (!(isset($_POST["\155\x6f\x5f\x6f\x61\165\164\150\x5f\143\x6f\156\164\x61\143\164\137\165\x73\x5f\161\x75\x65\x72\171\137\157\160\x74\151\x6f\156\x5f\x6e\x6f\156\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\x6f\137\157\x61\x75\x74\x68\x5f\143\x6f\156\164\141\143\x74\137\x75\x73\x5f\161\x75\x65\162\171\x5f\x6f\160\x74\151\157\x6e\137\156\157\x6e\x63\x65"])), "\155\157\137\157\141\165\164\x68\x5f\x63\157\x6e\164\141\143\x74\137\165\163\x5f\161\165\x65\162\x79\x5f\157\x70\164\x69\157\156") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\x6f\x5f\x6f\141\165\x74\x68\137\x63\x6f\x6e\x74\x61\143\164\137\x75\x73\x5f\x71\x75\x65\x72\171\x5f\157\160\x74\x69\x6f\156" === $_POST[\MoOAuthConstants::OPTION])) {
            goto s3;
        }
        if (!($this->util->mo_oauth_is_curl_installed() === 0)) {
            goto TE;
        }
        return $this->util->mo_oauth_show_curl_error();
        TE:
        $zZ = isset($_POST["\x6d\x6f\137\x6f\141\x75\x74\150\137\143\x6f\x6e\164\x61\143\x74\x5f\165\x73\x5f\x65\x6d\141\151\x6c"]) ? sanitize_text_field(wp_unslash($_POST["\155\x6f\x5f\x6f\141\x75\164\x68\137\143\157\156\164\141\x63\164\x5f\x75\163\x5f\145\155\x61\151\x6c"])) : '';
        $jb = isset($_POST["\x6d\x6f\137\157\x61\165\164\150\x5f\143\157\156\x74\x61\x63\x74\137\x75\163\x5f\x70\150\157\x6e\145"]) ? sanitize_text_field(wp_unslash($_POST["\155\157\137\157\141\165\164\x68\x5f\143\x6f\x6e\164\141\x63\164\137\165\163\x5f\x70\x68\x6f\156\x65"])) : '';
        $gC = isset($_POST["\155\157\x5f\x6f\x61\165\164\150\x5f\143\157\x6e\164\x61\x63\x74\137\165\163\137\x71\165\145\x72\171"]) ? sanitize_text_field(wp_unslash($_POST["\155\157\x5f\x6f\x61\165\164\x68\x5f\143\x6f\x6e\164\x61\143\164\x5f\x75\163\137\161\x75\145\162\171"])) : '';
        $VJ = isset($_POST["\x6d\x6f\137\x6f\x61\165\x74\150\137\x73\145\156\144\137\160\154\165\147\x69\x6e\x5f\x63\x6f\156\x66\x69\x67"]);
        $qa = new Customer();
        if ($this->util->mo_oauth_check_empty_or_null($zZ) || $this->util->mo_oauth_check_empty_or_null($gC)) {
            goto UN;
        }
        $m4 = $qa->submit_contact_us($zZ, $jb, $gC, $VJ);
        if (false === $m4) {
            goto NX;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\124\150\x61\156\x6b\163\40\x66\x6f\x72\x20\x67\145\x74\x74\151\156\147\x20\x69\156\x20\164\157\x75\x63\x68\41\x20\127\145\x20\x73\x68\x61\154\154\x20\147\x65\x74\40\142\141\143\153\x20\x74\x6f\x20\171\x6f\165\40\163\150\x6f\162\164\x6c\x79\56");
        $this->util->mo_oauth_show_success_message();
        goto dh;
        NX:
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\x6f\165\162\40\x71\165\x65\x72\171\40\x63\x6f\165\154\x64\x20\x6e\157\x74\x20\142\x65\x20\x73\x75\x62\155\151\164\164\145\x64\x2e\40\x50\x6c\145\141\163\x65\40\164\162\x79\40\141\x67\x61\151\156\56");
        $this->util->mo_oauth_show_error_message();
        dh:
        goto BI;
        UN:
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x50\x6c\145\x61\163\x65\40\146\151\154\x6c\x20\x75\160\x20\105\155\141\151\154\40\141\156\144\40\121\165\x65\162\x79\40\x66\x69\145\x6c\x64\163\x20\x74\157\40\163\165\x62\155\x69\164\40\x79\157\x75\162\x20\x71\165\x65\x72\171\56");
        $this->util->mo_oauth_show_error_message();
        BI:
        s3:
        if (!(isset($_POST["\x6d\157\137\157\141\x75\164\x68\x5f\x63\x6f\156\x74\x61\x63\x74\137\165\x73\x5f\x71\x75\145\162\171\137\157\160\x74\x69\x6f\x6e\x5f\x75\160\147\162\141\x64\x65\x5f\x6e\157\x6e\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\157\x5f\157\x61\x75\x74\150\x5f\143\x6f\156\164\141\143\x74\x5f\165\163\x5f\x71\x75\x65\x72\171\137\x6f\x70\x74\151\157\x6e\137\165\160\x67\162\x61\x64\x65\x5f\156\157\x6e\143\145"])), "\x6d\x6f\137\x6f\x61\165\x74\x68\137\x63\x6f\156\x74\x61\x63\164\137\x75\x73\137\x71\x75\145\162\x79\x5f\157\x70\164\x69\x6f\x6e\x5f\x75\x70\147\x72\x61\x64\x65") && isset($_POST[\MoOAuthConstants::OPTION]) && "\155\x6f\x5f\x6f\x61\x75\x74\150\x5f\x63\157\x6e\x74\141\143\x74\137\x75\x73\137\161\x75\145\162\x79\137\157\160\164\151\x6f\156\137\x75\160\147\162\141\144\x65" === $_POST[\MoOAuthConstants::OPTION])) {
            goto m7;
        }
        if (!($this->util->mo_oauth_is_curl_installed() === 0)) {
            goto g1;
        }
        return $this->util->mo_oauth_show_curl_error();
        g1:
        $zZ = isset($_POST["\155\157\x5f\x6f\x61\x75\x74\150\x5f\x63\157\x6e\x74\141\x63\x74\x5f\x75\163\x5f\145\155\141\x69\x6c"]) ? sanitize_text_field(wp_unslash($_POST["\x6d\157\x5f\157\141\165\x74\x68\137\143\x6f\156\164\141\x63\164\x5f\x75\163\137\145\155\141\151\154"])) : '';
        $vm = isset($_POST["\x6d\157\x5f\157\x61\x75\164\x68\137\143\165\x72\162\x65\x6e\164\x5f\x76\145\162\x73\151\157\x6e"]) ? sanitize_text_field(wp_unslash($_POST["\x6d\x6f\x5f\157\x61\165\x74\150\137\x63\x75\x72\162\145\x6e\x74\x5f\166\x65\x72\163\151\157\156"])) : '';
        $V2 = isset($_POST["\155\157\x5f\x6f\x61\x75\x74\150\137\165\160\147\x72\x61\144\151\156\x67\x5f\x74\157\x5f\x76\x65\162\x73\x69\157\156"]) ? sanitize_text_field(wp_unslash($_POST["\155\157\137\x6f\x61\165\x74\150\x5f\165\160\x67\x72\141\144\x69\156\x67\x5f\x74\157\137\166\145\x72\163\151\x6f\156"])) : '';
        $EX = isset($_POST["\x6d\157\x5f\146\x65\x61\x74\165\162\145\x73\137\162\x65\161\x75\x69\162\145\144"]) ? sanitize_text_field(wp_unslash($_POST["\x6d\x6f\x5f\x66\145\141\164\165\162\x65\x73\x5f\162\x65\161\165\151\162\145\x64"])) : '';
        $qa = new Customer();
        if ($this->util->mo_oauth_check_empty_or_null($zZ)) {
            goto fd;
        }
        $m4 = $qa->submit_contact_us_upgrade($zZ, $vm, $V2, $EX);
        if (false === $m4) {
            goto lR;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\124\150\x61\156\x6b\163\40\146\157\162\40\x67\145\x74\164\x69\156\x67\x20\x69\156\40\x74\157\x75\x63\150\x21\40\x57\145\40\x73\150\x61\154\x6c\40\x67\x65\164\x20\142\x61\143\x6b\40\164\x6f\40\171\157\165\x20\x73\150\157\162\x74\x6c\x79\40\x77\x69\x74\150\40\161\x75\157\164\141\x74\x69\x6f\156");
        $this->util->mo_oauth_show_success_message();
        goto tN;
        lR:
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\157\165\162\x20\x71\x75\x65\162\171\x20\x63\x6f\165\x6c\x64\40\x6e\157\x74\40\142\145\x20\x73\x75\x62\155\x69\x74\164\x65\x64\x2e\x20\120\154\x65\x61\163\145\x20\164\162\171\x20\x61\x67\x61\151\156\x2e");
        $this->util->mo_oauth_show_error_message();
        tN:
        goto mi;
        fd:
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\120\154\145\x61\163\x65\40\146\x69\154\x6c\x20\165\x70\40\x45\155\141\151\x6c\x20\146\151\x65\154\x64\40\x74\x6f\x20\163\165\x62\x6d\151\x74\40\171\157\x75\162\x20\161\165\145\162\x79\56");
        $this->util->mo_oauth_show_error_message();
        mi:
        m7:
        if (!($GLOBALS["\155\157\x5f\154\156\x5f\145\170\x70"] != 1)) {
            goto KP;
        }
        if (!(isset($_POST["\x6d\x6f\137\157\x61\165\x74\150\x5f\x72\x65\x73\164\x6f\162\145\x5f\x62\x61\x63\x6b\x75\160\x5f\156\x6f\x6e\143\x65"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\137\x6f\141\x75\x74\x68\137\162\145\x73\164\x6f\x72\145\137\x62\x61\x63\x6b\165\160\x5f\x6e\x6f\156\x63\x65"])), "\x6d\x6f\x5f\157\x61\x75\x74\150\137\x72\145\163\x74\x6f\162\145\x5f\x62\x61\143\x6b\165\x70") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\137\157\x61\x75\x74\x68\x5f\x72\145\x73\164\x6f\x72\145\x5f\142\141\x63\153\x75\160" === $_POST[\MoOAuthConstants::OPTION])) {
            goto dK;
        }
        $Ha = "\x54\150\x65\x72\145\x20\x77\x61\163\x20\141\156\40\x65\162\162\x6f\x72\x20\165\160\154\x6f\141\144\151\156\147\x20\164\x68\x65\x20\146\151\x6c\145";
        if (isset($_FILES["\155\x6f\137\x6f\x61\x75\x74\x68\137\143\154\151\x65\x6e\x74\x5f\x62\141\x63\153\165\x70"])) {
            goto ST;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, $Ha);
        $this->util->mo_oauth_show_error_message();
        return;
        ST:
        if (!function_exists("\167\x70\137\150\x61\x6e\x64\154\145\137\x75\x70\x6c\157\141\144")) {
            require_once ABSPATH . "\x77\x70\55\141\x64\x6d\151\156\57\151\x6e\143\154\165\144\145\x73\x2f\146\151\154\145\x2e\x70\150\160";
        }
        $XC = $_FILES["\x6d\157\x5f\x6f\x61\165\164\x68\137\x63\154\151\x65\156\164\137\x62\141\143\x6b\x75\160"];
        if (!(!isset($XC["\x65\x72\162\x6f\x72"]) || is_array($XC["\x65\x72\x72\157\162"]) || UPLOAD_ERR_OK !== $XC["\145\162\x72\157\162"])) {
            goto kx;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, $Ha . "\x3a\40" . json_encode($XC["\x65\162\x72\157\162"], JSON_UNESCAPED_SLASHES));
        $this->util->mo_oauth_show_error_message();
        return;
        kx:
        $ms = new \finfo(FILEINFO_MIME_TYPE);
        $aO = array_search($ms->file($XC["\164\x6d\x70\137\156\141\155\x65"]), array("\164\145\170\164" => "\164\145\170\x74\x2f\x70\x6c\141\x69\x6e", "\x6a\x73\x6f\x6e" => "\x61\x70\x70\x6c\x69\x63\141\164\151\x6f\156\x2f\x6a\x73\x6f\156"), true);
        $TF = explode("\56", $XC["\156\141\x6d\145"]);
        $TF = $TF[count($TF) - 1];
        if (!(false === $aO || $TF !== "\x6a\x73\x6f\156")) {
            goto xm;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, $Ha . "\x3a\x20\x49\156\x76\x61\x6c\x69\144\x20\x46\151\154\x65\x20\x46\157\162\155\x61\x74\x2e");
        $this->util->mo_oauth_show_error_message();
        return;
        xm:
        $dx = file_get_contents($XC["\164\x6d\x70\137\x6e\141\x6d\x65"]);
        $sC = json_decode($dx, true);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto K_;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, $Ha . "\x3a\40\x49\156\x76\141\154\151\144\40\x46\x69\x6c\145\x20\106\157\162\x6d\x61\x74\x2e");
        $this->util->mo_oauth_show_error_message();
        return;
        K_:
        $wI = BackupHandler::restore_settings($sC);
        if (!$wI) {
            goto zu;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x53\145\164\164\151\156\x67\x73\40\162\x65\x73\164\x6f\162\145\144\40\x73\165\x63\143\x65\163\x73\x66\165\x6c\154\x79\56");
        $this->util->mo_oauth_show_success_message();
        return;
        zu:
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\124\x68\x65\162\145\x20\167\x61\x73\40\141\x6e\40\151\163\x73\x75\x65\x20\x77\x68\151\x6c\x65\40\162\145\163\164\x6f\x72\x69\156\x67\x20\164\150\145\x20\x63\x6f\156\146\151\147\x75\x72\x61\164\151\157\x6e\56");
        $this->util->mo_oauth_show_error_message();
        return;
        dK:
        if (!(isset($_POST["\x6d\x6f\137\157\141\165\164\150\137\x64\x6f\x77\x6e\154\x6f\x61\x64\137\142\141\x63\153\165\160\137\x6e\157\x6e\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\157\137\157\141\x75\164\x68\137\144\x6f\167\156\x6c\157\x61\144\137\142\x61\143\153\x75\x70\x5f\x6e\157\x6e\x63\x65"])), "\155\157\x5f\x6f\141\165\x74\x68\137\x64\157\x77\156\x6c\157\141\144\137\x62\141\143\x6b\x75\x70") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\x5f\157\141\x75\x74\x68\x5f\144\157\167\x6e\x6c\157\x61\144\x5f\x62\141\x63\x6b\x75\160" === $_POST[\MoOAuthConstants::OPTION])) {
            goto tV;
        }
        $OU = BackupHandler::get_backup_json();
        header("\103\x6f\156\x74\x65\x6e\x74\x2d\x54\x79\160\145\72\x20\141\x70\160\154\151\143\141\164\x69\x6f\156\57\152\163\157\x6e");
        header("\x43\x6f\x6e\x74\x65\x6e\x74\x2d\x44\x69\x73\160\x6f\x73\151\164\x69\x6f\x6e\x3a\x20\141\164\164\x61\x63\150\x6d\145\156\x74\73\x20\146\151\x6c\145\x6e\x61\x6d\x65\x3d\42\160\154\165\147\151\156\137\142\x61\x63\153\165\160\56\x6a\x73\x6f\156\42");
        header("\x43\157\x6e\164\145\156\164\55\114\145\156\147\164\150\72\40" . strlen($OU));
        header("\x43\157\156\x6e\x65\x63\x74\x69\157\x6e\72\x20\143\x6c\157\x73\145");
        echo $OU;
        exit;
        tV:
        KP:
        do_action("\144\157\137\155\141\151\x6e\x5f\x73\x65\164\164\x69\156\147\x73\137\x69\156\x74\145\x72\156\141\154", $_POST);
    }
    public function mo_oauth_get_current_customer()
    {
        $qa = new Customer();
        $lM = $qa->get_customer_key();
        $ZR = json_decode($lM, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            goto pg;
        }
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x59\x6f\165\40\x61\x6c\162\x65\141\144\171\40\x68\x61\166\145\x20\x61\156\x20\141\x63\143\157\165\156\164\x20\167\151\x74\x68\40\155\x69\x6e\x69\x4f\x72\141\x6e\x67\x65\56\40\x50\154\145\141\x73\x65\x20\145\x6e\164\145\162\40\x61\40\166\x61\154\x69\144\40\160\x61\163\x73\x77\157\162\144\56");
        $this->util->mo_oauth_client_update_option("\x76\x65\162\151\146\x79\137\143\165\x73\x74\157\155\145\x72", "\164\x72\x75\145");
        $this->util->mo_oauth_show_error_message();
        goto b3;
        pg:
        $this->util->mo_oauth_client_update_option("\155\157\x5f\157\141\x75\x74\150\x5f\141\144\x6d\x69\x6e\137\143\x75\163\x74\157\x6d\x65\x72\137\x6b\x65\171", $ZR["\151\x64"]);
        $this->util->mo_oauth_client_update_option("\155\157\x5f\x6f\x61\165\164\x68\137\141\144\x6d\151\156\x5f\141\160\151\x5f\153\145\x79", $ZR["\141\x70\151\x4b\145\171"]);
        $this->util->mo_oauth_client_update_option("\143\165\x73\164\x6f\x6d\x65\x72\x5f\164\x6f\153\x65\156", $ZR["\x74\x6f\153\145\x6e"]);
        $this->util->mo_oauth_client_update_option("\x70\x61\163\163\167\157\162\144", '');
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\103\x75\x73\x74\157\x6d\145\x72\40\x72\x65\x74\x72\151\x65\166\x65\x64\x20\163\165\x63\x63\x65\x73\163\x66\165\x6c\x6c\x79");
        $this->util->mo_oauth_client_delete_option("\x76\x65\162\x69\x66\x79\137\143\165\x73\x74\x6f\x6d\x65\x72");
        $this->util->mo_oauth_client_delete_option("\156\145\167\x5f\162\x65\147\151\x73\x74\x72\x61\x74\151\157\x6e");
        $this->util->mo_oauth_show_success_message();
        b3:
    }
    public function create_customer()
    {
        global $vj;
        $qa = new Customer();
        $ZR = json_decode($qa->create_customer(), true);
        if (strcasecmp($ZR["\163\164\x61\x74\165\x73"], "\103\x55\x53\x54\117\x4d\x45\x52\137\125\x53\105\122\116\101\115\x45\x5f\101\x4c\x52\x45\101\x44\131\x5f\x45\x58\x49\x53\124\123") === 0) {
            goto tC;
        }
        if (strcasecmp($ZR["\163\164\141\x74\165\163"], "\x53\x55\x43\x43\x45\123\123") === 0) {
            goto VZ;
        }
        goto rH;
        tC:
        $this->mo_oauth_get_current_customer();
        $this->util->mo_oauth_client_delete_option("\x6d\157\x5f\x6f\141\x75\x74\150\x5f\156\x65\167\x5f\x63\x75\163\164\x6f\x6d\145\x72");
        goto rH;
        VZ:
        $this->util->mo_oauth_client_update_option("\x6d\x6f\x5f\x6f\x61\165\x74\x68\137\x61\144\155\x69\156\137\x63\x75\163\x74\157\155\x65\x72\137\x6b\x65\171", $ZR["\151\144"]);
        $this->util->mo_oauth_client_update_option("\155\157\137\157\x61\165\x74\x68\137\x61\144\x6d\x69\x6e\x5f\141\x70\151\137\x6b\145\171", $ZR["\x61\x70\x69\x4b\145\x79"]);
        $this->util->mo_oauth_client_update_option("\x63\165\x73\x74\157\155\145\x72\x5f\164\x6f\153\x65\156", $ZR["\164\x6f\153\x65\156"]);
        $this->util->mo_oauth_client_update_option("\x70\x61\163\x73\167\x6f\x72\x64", '');
        $this->util->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x52\145\147\151\163\164\145\162\145\144\x20\163\x75\x63\x63\145\x73\x73\146\x75\154\x6c\x79\56");
        $this->util->mo_oauth_client_update_option("\155\x6f\x5f\157\x61\165\164\x68\x5f\162\145\x67\151\163\x74\162\x61\x74\151\x6f\x6e\137\163\x74\141\164\165\163", "\x4d\x4f\x5f\x4f\101\125\124\x48\137\122\105\x47\x49\123\x54\122\x41\x54\111\x4f\x4e\x5f\x43\117\x4d\120\114\x45\x54\x45");
        $this->util->mo_oauth_client_update_option("\155\x6f\137\x6f\141\x75\x74\150\x5f\156\x65\x77\137\x63\165\x73\164\x6f\x6d\145\x72", 1);
        $this->util->mo_oauth_client_delete_option("\x76\145\x72\151\146\x79\x5f\143\165\x73\x74\157\155\145\162");
        $this->util->mo_oauth_client_delete_option("\156\145\167\x5f\x72\x65\x67\151\x73\164\162\141\x74\151\157\x6e");
        $this->util->mo_oauth_show_success_message();
        rH:
    }
}
