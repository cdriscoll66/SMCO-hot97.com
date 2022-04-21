<?php


namespace MoOauthClient;

use MoOauthClient\Base\InstanceHelper;
use MoOauthClient\OauthHandler;
use MoOauthClient\StorageManager;
use MoOauthClient\MO_Custom_OAuth1;
class LoginHandler
{
    public $oauth_handler;
    public function __construct()
    {
        $this->oauth_handler = new OauthHandler();
        add_action("\x69\156\151\x74", array($this, "\155\157\x5f\157\x61\165\x74\x68\137\x64\145\143\151\x64\145\x5f\146\154\157\167"));
        add_action("\x6d\157\137\157\x61\165\164\150\137\x63\x6c\151\145\156\x74\x5f\x74\x69\147\150\x74\137\x6c\x6f\x67\151\156\137\151\156\164\x65\x72\x6e\141\x6c", array($this, "\x68\141\156\x64\154\x65\137\x73\x73\x6f"), 10, 4);
    }
    public function mo_oauth_decide_flow()
    {
        global $vj;
        if (!(isset($_REQUEST[\MoOAuthConstants::OPTION]) && "\x74\145\163\x74\x61\x74\x74\162\155\x61\160\x70\151\x6e\147\x63\157\156\146\x69\147" === $_REQUEST[\MoOAuthConstants::OPTION])) {
            goto x_;
        }
        $uh = $_REQUEST["\x61\160\160"];
        wp_safe_redirect(site_url() . "\x3f\157\160\164\151\157\x6e\x3d\157\x61\165\164\x68\162\145\x64\x69\162\145\x63\164\46\141\160\160\x5f\x6e\x61\155\145\75" . rawurlencode($uh) . "\46\x74\145\163\164\x3d\x74\162\165\145");
        exit;
        x_:
        $this->mo_oauth_login_validate();
    }
    public function mo_oauth_login_validate()
    {
        global $vj;
        $YR = new StorageManager();
        if (!(isset($_REQUEST[\MoOAuthConstants::OPTION]) and strpos($_REQUEST[\MoOAuthConstants::OPTION], "\x6f\141\165\x74\150\162\145\144\151\x72\145\143\164") !== false)) {
            goto vh;
        }
        if (isset($_REQUEST["\155\157\x5f\x6c\157\147\x69\x6e\x5f\x70\157\160\x75\x70"])) {
            goto D2;
        }
        if (!(isset($_REQUEST["\x72\145\163\157\x75\x72\143\x65"]) && !empty($_REQUEST["\162\x65\x73\157\165\162\143\x65"]))) {
            goto Bl;
        }
        if (!empty($_REQUEST["\162\x65\163\157\165\x72\x63\x65"])) {
            goto lQ;
        }
        $vj->handle_error("\124\150\x65\40\x72\145\x73\160\157\156\x73\x65\x20\146\x72\x6f\x6d\40\x75\x73\145\162\151\x6e\x66\x6f\x20\x77\x61\163\40\x65\155\x70\x74\x79\x2e");
        MO_Oauth_Debug::mo_oauth_log("\124\x68\x65\x20\162\145\x73\x70\157\x6e\x73\x65\40\x66\162\157\155\x20\165\163\x65\x72\151\156\x66\157\x20\167\x61\x73\40\145\155\160\164\x79\56");
        wp_die(wp_kses("\x54\x68\x65\40\162\145\163\x70\x6f\x6e\163\x65\40\x66\x72\x6f\155\x20\165\163\x65\x72\151\156\x66\x6f\40\167\x61\163\40\x65\155\160\164\171\x2e", \mo_oauth_get_valid_html()));
        lQ:
        $YR = new StorageManager(urldecode($_REQUEST["\162\145\x73\x6f\x75\x72\143\145"]));
        $Nm = $YR->get_value("\x72\x65\x73\157\165\162\x63\x65");
        $gW = $YR->get_value("\x61\160\x70\156\x61\155\x65");
        $eJ = $YR->get_value("\162\145\x64\151\162\x65\143\164\x5f\165\x72\151");
        $u1 = $YR->get_value("\x61\x63\x63\145\x73\163\x5f\x74\x6f\153\145\x6e");
        $BD = $vj->get_app_by_name($gW)->get_app_config();
        $af = isset($_REQUEST["\164\145\x73\x74"]) && !empty($_REQUEST["\x74\145\x73\164"]);
        if (!($af && '' !== $af)) {
            goto MB;
        }
        $this->handle_group_test_conf($Nm, $BD, $u1, false, $af);
        exit;
        MB:
        $YR->remove_key("\162\x65\x73\x6f\x75\x72\x63\145");
        $YR->add_replace_entry("\x70\x6f\160\165\160", "\x69\x67\x6e\157\x72\x65");
        if (!has_filter("\167\x6f\157\x63\157\x6d\155\145\x72\143\145\x5f\x63\150\x65\143\153\x6f\x75\164\137\x67\x65\164\x5f\x76\x61\x6c\165\x65")) {
            goto MT;
        }
        $Nm["\141\160\160\156\141\155\145"] = $gW;
        MT:
        do_action("\155\157\x5f\141\x62\x72\137\x66\x69\x6c\164\x65\162\137\x6c\157\147\151\x6e", $Nm);
        $this->handle_sso($gW, $BD, $Nm, $YR->get_state(), ["\141\143\x63\x65\x73\163\137\x74\157\153\145\x6e" => $u1]);
        Bl:
        if (isset($_REQUEST["\141\160\160\x5f\x6e\x61\x6d\145"])) {
            goto e7;
        }
        $Ha = "\120\x6c\145\141\163\145\x20\143\150\145\x63\x6b\x20\x69\x66\40\x79\x6f\x75\40\x61\x72\145\40\163\x65\x6e\144\151\156\147\40\x74\x68\x65\40\47\x61\160\160\137\x6e\141\155\145\47\40\160\141\162\141\155\x65\x74\x65\162";
        $vj->handle_error($Ha);
        wp_die(wp_kses($Ha, \mo_oauth_get_valid_html()));
        exit;
        e7:
        $Mg = isset($_REQUEST["\141\x70\x70\137\x6e\x61\x6d\x65"]) && !empty($_REQUEST["\141\x70\x70\137\x6e\141\x6d\145"]) ? $_REQUEST["\x61\x70\160\137\156\141\155\145"] : '';
        if (!($Mg == '')) {
            goto WE;
        }
        $Ha = "\116\x6f\40\163\165\x63\150\x20\x61\x70\160\x20\146\157\x75\x6e\144\40\143\157\x6e\146\x69\x67\x75\162\145\x64\x2e\40\x50\x6c\145\x61\x73\x65\40\143\150\145\x63\x6b\x20\x69\x66\x20\171\157\x75\40\141\x72\145\40\163\145\156\x64\151\156\x67\40\164\150\x65\40\143\x6f\162\162\145\143\x74\40\x61\160\160\137\156\x61\155\145";
        MO_Oauth_Debug::mo_oauth_log($Ha);
        $vj->handle_error($Ha);
        wp_die(wp_kses($Ha, \mo_oauth_get_valid_html()));
        exit;
        WE:
        $G5 = $vj->mo_oauth_client_get_option("\155\x6f\x5f\157\x61\165\164\x68\137\141\160\x70\163\x5f\154\151\x73\164");
        if (is_array($G5) && isset($G5[$Mg])) {
            goto UC;
        }
        $Ha = "\116\x6f\x20\163\165\x63\150\x20\x61\x70\x70\40\146\x6f\165\156\x64\x20\143\x6f\156\x66\151\147\x75\162\145\144\56\x20\120\154\145\141\163\145\40\143\150\x65\143\x6b\40\x69\x66\x20\171\157\x75\x20\x61\x72\x65\40\x73\145\156\144\x69\x6e\147\x20\164\x68\x65\40\x63\157\x72\162\x65\x63\x74\x20\x61\160\160\137\156\141\x6d\x65";
        MO_Oauth_Debug::mo_oauth_log($Ha);
        $vj->handle_error($Ha);
        wp_die(wp_kses($Ha, \mo_oauth_get_valid_html()));
        exit;
        UC:
        $Ac = "\57\57" . $_SERVER["\x48\124\124\120\x5f\x48\x4f\x53\124"] . $_SERVER["\x52\105\121\125\x45\123\x54\x5f\x55\x52\x49"];
        $Ac = strtok($Ac, "\77");
        $bc = isset($_REQUEST["\x72\145\144\x69\162\x65\143\x74\137\x75\x72\154"]) ? urldecode($_REQUEST["\162\145\x64\x69\162\x65\143\164\x5f\165\162\154"]) : $Ac;
        $af = isset($_REQUEST["\164\145\x73\x74"]) ? urldecode($_REQUEST["\x74\x65\x73\x74"]) : false;
        $Yr = isset($_REQUEST["\162\x65\163\x74\x72\151\143\164\x72\x65\144\x69\162\x65\143\x74"]) ? urldecode($_REQUEST["\x72\x65\163\x74\162\x69\x63\x74\162\x65\x64\151\162\x65\x63\x74"]) : false;
        $kL = $vj->get_app_by_name($Mg);
        $Ts = $kL->get_app_config("\147\x72\141\x6e\164\x5f\164\x79\x70\145");
        if (!is_multisite()) {
            goto eA;
        }
        $blog_id = get_current_blog_id();
        $nq = $vj->mo_oauth_client_get_option("\155\x6f\x5f\157\x61\165\x74\x68\x5f\143\x33\126\151\143\x32\x6c\x30\x5a\x58\116\172\x5a\x57\x78\x6c\131\x33\x52\x6c\132\x41");
        $Wq = array();
        if (!isset($nq)) {
            goto vy;
        }
        $Wq = json_decode($vj->mooauthdecrypt($nq), true);
        vy:
        $dS = false;
        $aE = $vj->mo_oauth_client_get_option("\x6d\x6f\x5f\157\141\165\164\150\x5f\151\163\x4d\165\x6c\164\x69\123\151\x74\145\x50\154\x75\147\151\156\122\145\x71\165\145\163\164\145\144");
        if (!(is_array($Wq) && in_array($blog_id, $Wq))) {
            goto lA;
        }
        $dS = true;
        lA:
        if (!(is_multisite() && $aE && ($aE && !$dS) && !$af && $vj->mo_oauth_client_get_option("\156\157\x4f\146\123\165\x62\x53\151\164\145\163") < 1000)) {
            goto Rk;
        }
        $vj->handle_error("\114\157\x67\151\x6e\40\151\163\40\x64\x69\x73\141\x62\x6c\145\144\x20\146\157\162\40\x74\x68\x69\163\x20\x73\151\164\x65\56\x20\x50\154\145\x61\x73\x65\x20\x63\x6f\x6e\164\x61\x63\164\x20\171\x6f\x75\162\x20\x61\x64\x6d\151\156\x69\163\164\162\141\x74\x6f\162\x2e");
        MO_Oauth_Debug::mo_oauth_log("\x4c\157\147\151\x6e\x20\x69\163\40\144\x69\x73\141\x62\x6c\x65\x64\x20\x66\157\162\x20\164\150\x69\x73\40\163\x69\x74\145\x2e\40\120\x6c\x65\141\x73\x65\40\x63\x6f\x6e\164\x61\x63\164\x20\x79\x6f\165\x72\40\x61\144\155\151\x6e\x69\x73\x74\x72\141\x74\x6f\x72\56");
        wp_die("\x4c\x6f\147\151\x6e\40\151\163\x20\144\x69\163\141\x62\154\x65\144\x20\x66\x6f\162\40\x74\150\x69\163\40\163\x69\x74\145\56\40\120\154\x65\x61\x73\145\40\143\x6f\x6e\x74\x61\143\164\40\171\157\x75\x72\40\x61\144\x6d\151\x6e\x69\x73\164\162\141\164\157\162\x2e");
        Rk:
        $YR->add_replace_entry("\x62\x6c\157\147\137\x69\144", $blog_id);
        eA:
        MO_Oauth_Debug::mo_oauth_log("\x47\x72\141\156\164\72\40" . $Ts);
        if ($Ts && "\x50\141\163\x73\x77\157\162\144\x20\107\162\141\x6e\x74" === $Ts) {
            goto lw;
        }
        if (!($Ts && "\103\x6c\x69\145\x6e\x74\40\103\x72\145\144\145\x6e\164\151\x61\x6c\163\40\x47\x72\141\x6e\164" === $Ts)) {
            goto Rb;
        }
        do_action("\x6d\157\137\x6f\141\x75\x74\x68\x5f\x63\154\x69\145\x6e\164\137\143\x72\x65\144\x65\156\x74\151\141\x6c\x73\137\147\x72\x61\x6e\164\137\x69\x6e\151\164\x69\141\x74\145", $Mg, $af);
        exit;
        Rb:
        goto LO;
        lw:
        do_action("\x70\167\144\x5f\x65\x73\x73\145\156\164\x69\x61\154\x73\x5f\x69\156\164\x65\162\156\x61\x6c");
        do_action("\155\x6f\x5f\x6f\x61\165\x74\150\x5f\143\x6c\x69\145\156\x74\x5f\x61\144\x64\137\x70\x77\144\137\x6a\163");
        echo "\11\11\11\11\x3c\163\143\x72\x69\x70\x74\x3e\15\12\11\11\11\x9\x9\166\x61\162\40\x6d\157\x5f\157\x61\165\x74\150\137\141\160\x70\137\x6e\x61\x6d\x65\40\75\x20\42";
        echo wp_kses($Mg, \mo_oauth_get_valid_html());
        echo "\42\x3b\15\12\11\x9\x9\x9\x9\x64\x6f\x63\x75\x6d\145\156\164\x2e\141\144\x64\105\x76\x65\x6e\164\114\x69\163\164\x65\x6e\145\x72\50\47\x44\117\x4d\x43\x6f\x6e\x74\x65\156\164\114\157\141\144\x65\144\47\54\40\146\165\x6e\143\164\x69\157\156\50\51\40\173\xd\xa\x9\x9\11\11\11\x9";
        if ($af) {
            goto hT;
        }
        echo "\x9\11\11\11\x9\11\11\155\157\x4f\x41\x75\x74\150\x4c\x6f\x67\151\x6e\120\x77\x64\50\x6d\x6f\x5f\157\x61\x75\x74\x68\x5f\x61\160\x70\137\x6e\x61\x6d\x65\54\40\x66\x61\x6c\x73\145\54\40\x27";
        echo $bc;
        echo "\47\x29\x3b\15\xa\x9\x9\x9\11\11\x9";
        goto HQ;
        hT:
        echo "\11\11\11\x9\x9\x9\x9\x6d\157\117\x41\165\x74\x68\114\x6f\147\151\156\x50\x77\x64\x28\155\x6f\137\x6f\141\x75\164\x68\x5f\141\x70\160\137\156\141\155\145\54\x20\x74\162\165\x65\x2c\x20\x27";
        echo $bc;
        echo "\x27\x29\x3b\xd\12\11\x9\x9\11\11\x9";
        HQ:
        echo "\11\11\11\x9\x9\x7d\54\40\x66\x61\x6c\x73\x65\x29\x3b\xd\12\11\x9\11\x9\74\57\163\x63\162\151\160\x74\x3e\xd\xa\11\x9\11\x9";
        exit;
        LO:
        if (!($kL->get_app_config("\141\160\160\x49\x64") === "\x74\x77\x69\x74\164\145\162" || $kL->get_app_config("\141\x70\x70\x49\x64") === "\157\x61\x75\164\150\x31")) {
            goto fc;
        }
        MO_Oauth_Debug::mo_oauth_log("\117\x61\165\164\150\61\40\x66\x6c\157\167");
        $af = isset($_REQUEST["\x74\x65\x73\164"]) && !empty($_REQUEST["\x74\145\163\x74"]);
        if (!($af && '' !== $af)) {
            goto LR;
        }
        setcookie("\157\x61\x75\x74\150\x31\x5f\164\145\163\x74", "\61", time() + 20);
        LR:
        setcookie("\157\x61\x75\164\150\61\141\160\x70\x6e\141\155\145", $Mg, time() + 60);
        $_COOKIE["\157\141\x75\x74\150\x31\x61\x70\x70\156\141\155\145"] = $Mg;
        MO_Custom_OAuth1::mo_oauth1_auth_request($Mg);
        exit;
        fc:
        $oR = md5(rand(0, 15));
        $YR->add_replace_entry("\141\x70\160\156\141\x6d\145", $Mg);
        $YR->add_replace_entry("\x72\x65\144\151\162\145\x63\x74\137\165\x72\x69", $bc);
        $YR->add_replace_entry("\x74\145\163\x74\137\143\x6f\x6e\x66\x69\147", $af);
        $YR->add_replace_entry("\x72\x65\x73\x74\x72\x69\143\164\162\145\x64\151\x72\x65\143\164", $Yr);
        $YR->add_replace_entry("\163\164\x61\164\x65\x5f\156\x6f\156\143\x65", $oR);
        $YR = apply_filters("\155\157\x5f\157\x61\165\164\x68\137\x73\145\164\137\x63\165\x73\x74\x6f\155\137\163\x74\x6f\162\141\x67\145", $YR);
        $SC = $YR->get_state();
        $SC = apply_filters("\x73\164\141\x74\145\x5f\x69\156\164\145\162\156\141\154", $SC);
        $dv = $kL->get_app_config("\x61\x75\x74\x68\x6f\162\151\x7a\x65\165\162\x6c");
        if (!($kL->get_app_config("\x73\145\156\x64\x5f\163\x74\x61\164\x65") === false || $kL->get_app_config("\163\x65\x6e\144\137\x73\x74\x61\x74\x65") === '')) {
            goto qF;
        }
        $kL->update_app_config("\x73\x65\156\144\x5f\x73\164\x61\164\x65", 1);
        $vj->set_app_by_name($Mg, $kL->get_app_config('', false));
        qF:
        if ($kL->get_app_config("\163\x65\156\x64\137\163\164\141\164\x65")) {
            goto W4;
        }
        setcookie("\x73\x74\141\164\x65\x5f\160\x61\x72\x61\155", $SC, time() + 60);
        W4:
        $tJ = $kL->get_app_config("\160\x6b\x63\x65\137\146\154\x6f\x77");
        $eJ = $kL->get_app_config("\162\x65\x64\x69\162\145\x63\164\137\x75\162\151");
        $lY = urlencode($kL->get_app_config("\x63\x6c\x69\x65\156\164\x5f\151\144"));
        $eJ = empty($eJ) ? \site_url() : $eJ;
        if ($tJ && 1 === $tJ) {
            goto Xw;
        }
        $Mq = $kL->get_app_config("\x73\145\x6e\144\x5f\163\x74\x61\x74\x65") ? "\x26\x73\164\141\164\x65\75" . $SC : '';
        if ($kL->get_app_config("\x73\x65\x6e\x64\137\163\x74\141\x74\x65")) {
            goto Uw;
        }
        setcookie("\x73\164\x61\164\145\137\x70\x61\162\x61\x6d", $SC, time() + 60);
        MO_Oauth_Debug::mo_oauth_log("\x73\164\x61\164\x65\40\x70\x61\162\x61\x6d\145\164\x65\x72\x20\x6e\157\164\40\x73\x65\x6e\x74");
        goto Op;
        Uw:
        MO_Oauth_Debug::mo_oauth_log("\x73\x74\x61\164\x65\40\160\141\x72\141\155\145\x74\145\162\40\163\x65\156\x74");
        Op:
        if (strpos($dv, "\77") !== false) {
            goto IK;
        }
        $dv = $dv . "\77\143\x6c\x69\145\x6e\164\x5f\x69\144\75" . $lY . "\x26\x73\143\157\160\145\75" . $kL->get_app_config("\163\x63\157\160\145") . "\x26\x72\145\144\151\162\x65\143\164\x5f\x75\162\151\75" . urlencode($eJ) . "\46\x72\145\163\160\157\156\163\x65\x5f\164\x79\160\145\x3d\x63\157\144\145" . $Mq;
        goto DU;
        IK:
        $dv = $dv . "\x26\x63\154\x69\x65\156\164\x5f\151\144\x3d" . $lY . "\x26\x73\x63\x6f\x70\145\75" . $kL->get_app_config("\x73\x63\157\x70\x65") . "\x26\162\x65\144\151\162\145\143\x74\137\x75\162\x69\75" . urlencode($eJ) . "\46\x72\x65\x73\x70\x6f\156\x73\x65\137\164\171\160\145\x3d\143\x6f\144\x65" . $Mq;
        DU:
        goto kX;
        Xw:
        MO_Oauth_Debug::mo_oauth_log("\x50\113\x43\105\40\x66\154\x6f\x77");
        $Yt = bin2hex(openssl_random_pseudo_bytes(32));
        $M5 = $vj->base64url_encode(pack("\110\52", $Yt));
        $zV = $vj->base64url_encode(pack("\x48\x2a", hash("\x73\150\x61\x32\x35\66", $M5)));
        $YR->add_replace_entry("\143\x6f\144\x65\x5f\166\145\162\x69\x66\151\x65\x72", $M5);
        $SC = $YR->get_state();
        $Mq = $kL->get_app_config("\163\145\156\144\x5f\163\164\141\x74\x65") ? "\46\x73\x74\x61\x74\145\75" . $SC : '';
        if ($kL->get_app_config("\163\x65\156\x64\137\163\x74\141\164\x65")) {
            goto fb;
        }
        MO_Oauth_Debug::mo_oauth_log("\163\164\141\164\x65\x20\x70\141\x72\141\155\145\164\145\x72\x20\156\157\164\x20\x73\145\x6e\x74");
        goto mD;
        fb:
        MO_Oauth_Debug::mo_oauth_log("\x73\164\x61\x74\x65\40\x70\x61\x72\x61\x6d\145\x74\145\162\40\x73\x65\x6e\164");
        mD:
        if (strpos($dv, "\77") !== false) {
            goto b9;
        }
        $dv = $dv . "\77\x63\154\x69\145\156\164\x5f\151\144\75" . $lY . "\x26\163\143\157\160\x65\75" . $kL->get_app_config("\163\143\x6f\160\x65") . "\46\162\x65\x64\151\162\x65\x63\x74\137\165\x72\151\75" . urlencode($eJ) . "\46\162\145\x73\x70\x6f\156\163\145\x5f\164\171\160\145\x3d\x63\x6f\x64\145" . $Mq . "\x26\143\157\144\x65\137\143\x68\141\x6c\x6c\x65\x6e\147\x65\75" . $zV . "\46\x63\157\x64\145\x5f\143\x68\x61\154\154\145\x6e\147\145\x5f\155\145\164\150\157\144\x3d\123\62\x35\x36";
        goto wL;
        b9:
        $dv = $dv . "\46\143\154\151\x65\x6e\164\x5f\151\x64\75" . $lY . "\46\163\x63\157\x70\145\75" . $kL->get_app_config("\x73\x63\157\160\145") . "\x26\162\x65\x64\x69\x72\145\x63\x74\137\x75\x72\x69\x3d" . urlencode($eJ) . "\x26\x72\145\163\x70\157\156\x73\145\x5f\164\171\x70\x65\x3d\x63\x6f\144\145" . $Mq . "\x26\143\157\x64\145\x5f\143\150\x61\154\x6c\145\156\147\145\75" . $zV . "\46\143\x6f\x64\145\x5f\143\150\141\154\x6c\145\x6e\147\145\137\155\145\164\x68\x6f\144\x3d\123\62\65\x36";
        wL:
        kX:
        if (!(null !== $kL->get_app_config("\x73\145\156\144\x5f\x6e\x6f\x6e\143\x65") && $kL->get_app_config("\163\145\x6e\144\137\156\x6f\156\143\145"))) {
            goto ll;
        }
        $NJ = md5(rand());
        $vj->set_transient("\155\x6f\137\x6f\x61\x75\x74\150\x5f\156\157\x6e\x63\x65\x5f" . $NJ, $NJ, time() + 120);
        $dv = $dv . "\x26\x6e\157\x6e\x63\x65\x3d" . $NJ;
        MO_Oauth_Debug::mo_oauth_log("\156\x6f\156\143\145\x20\160\x61\x72\x61\x6d\145\164\145\162\40\x73\145\156\x74");
        ll:
        if (!(strpos($dv, "\141\160\160\154\x65") !== false)) {
            goto ze;
        }
        $dv = $dv . "\46\x72\145\163\160\157\156\x73\145\137\155\x6f\x64\145\75\146\x6f\162\x6d\x5f\x70\x6f\x73\x74";
        ze:
        $dv = apply_filters("\155\157\137\x61\x75\x74\x68\x5f\x75\162\154\137\151\156\x74\145\162\156\141\154", $dv, $Mg);
        MO_Oauth_Debug::mo_oauth_log("\101\x75\164\150\157\162\151\172\141\x69\x6f\x6e\40\105\156\144\x70\157\x69\156\x74\x20\75\76\40" . $dv);
        header("\114\157\143\141\x74\151\157\156\x3a\40" . $dv);
        exit;
        D2:
        vh:
        if (isset($_GET["\145\x72\x72\157\162\x5f\x64\x65\x73\x63\162\x69\160\164\151\x6f\156"])) {
            goto od;
        }
        if (!isset($_GET["\x65\162\x72\x6f\x72"])) {
            goto eH;
        }
        do_action("\x6d\x6f\137\x72\145\144\151\162\x65\x63\164\x5f\164\x6f\137\143\165\163\x74\157\155\x5f\x65\x72\x72\x6f\162\x5f\160\x61\147\145");
        $TM = "\105\x72\162\x6f\162\40\146\162\x6f\x6d\x20\x41\165\x74\150\157\x72\151\172\x65\x20\105\x6e\144\160\x6f\x69\156\164\72\x20" . sanitize_text_field($_GET["\145\x72\x72\x6f\162"]);
        MO_Oauth_Debug::mo_oauth_log($TM);
        $vj->handle_error($TM);
        wp_die($TM);
        eH:
        goto nr;
        od:
        if (!(strpos($_GET["\x73\164\x61\x74\x65"], "\144\157\153\141\156\x2d\x73\164\162\151\x70\145\x2d\143\157\x6e\x6e\145\143\x74") !== false)) {
            goto BA;
        }
        return;
        BA:
        do_action("\x6d\157\137\x72\145\144\x69\162\x65\x63\x74\x5f\164\x6f\x5f\143\165\163\x74\x6f\x6d\137\145\162\162\157\162\x5f\x70\x61\147\145");
        $aK = "\x45\162\162\x6f\x72\x20\x64\x65\x73\x63\162\x69\x70\x74\151\x6f\x6e\x20\x66\162\x6f\155\x20\x41\x75\164\x68\157\162\x69\172\x65\x20\x45\156\x64\x70\157\x69\156\x74\x3a\40" . sanitize_text_field($_GET["\x65\x72\162\157\162\x5f\144\145\x73\143\162\151\160\164\151\157\156"]);
        MO_Oauth_Debug::mo_oauth_log($aK);
        $vj->handle_error($aK);
        wp_die($aK);
        nr:
        if (!(strpos($_SERVER["\x52\x45\121\x55\105\x53\x54\x5f\x55\122\x49"], "\x6f\x70\145\156\151\x64\x63\x61\154\x6c\x62\x61\x63\153") !== false || strpos($_SERVER["\122\105\121\x55\x45\x53\124\x5f\125\122\111"], "\x6f\x61\165\x74\150\137\164\157\x6b\x65\156") !== false && strpos($_SERVER["\x52\x45\x51\x55\105\x53\x54\x5f\125\122\111"], "\x6f\141\165\x74\150\137\x76\x65\162\x69\x66\x69\145\162"))) {
            goto wi;
        }
        MO_Oauth_Debug::mo_oauth_log("\117\x61\165\164\x68\x31\x20\143\x61\x6c\x6c\x62\x61\143\153\40\146\x6c\157\167");
        if (!empty($_COOKIE["\157\x61\165\x74\150\x31\141\160\160\156\x61\155\145"])) {
            goto jK;
        }
        MO_Oauth_Debug::mo_oauth_log("\x52\x65\164\x75\162\156\151\x6e\147\x20\x66\162\157\x6d\x20\x4f\x41\x75\x74\x68\61");
        return;
        jK:
        MO_Oauth_Debug::mo_oauth_log("\117\101\165\164\150\61\x20\141\x70\160\40\x66\x6f\x75\156\144");
        $Mg = $_COOKIE["\x6f\x61\x75\x74\x68\61\141\160\160\x6e\x61\x6d\x65"];
        $Nm = MO_Custom_OAuth1::mo_oidc1_get_access_token($_COOKIE["\x6f\x61\x75\164\150\x31\141\x70\x70\156\x61\x6d\x65"]);
        $BA = apply_filters("\155\157\x5f\x74\x72\137\x61\146\x74\x65\x72\x5f\160\162\157\x66\151\154\145\x5f\151\x6e\146\157\137\145\x78\164\x72\x61\143\x74\151\157\x6e\x5f\146\162\x6f\155\x5f\x74\157\153\x65\x6e", $Nm);
        $qP = [];
        $hy = $this->dropdownattrmapping('', $Nm, $qP);
        $vj->mo_oauth_client_update_option("\155\x6f\137\157\x61\165\x74\x68\137\141\164\164\x72\137\156\141\155\145\x5f\154\x69\163\x74" . $Mg, $hy);
        if (!(isset($_COOKIE["\x6f\x61\165\x74\150\x31\137\164\x65\163\x74"]) && $_COOKIE["\157\x61\165\164\150\61\x5f\x74\145\163\164"] == "\x31")) {
            goto og;
        }
        $kL = $vj->get_app_by_name($Mg);
        $u2 = $kL->get_app_config();
        $this->render_test_config_output($Nm, false, $u2, $Mg);
        exit;
        og:
        $kL = $vj->get_app_by_name($Mg);
        $g8 = $kL->get_app_config("\x75\163\145\x72\x6e\x61\x6d\x65\x5f\141\x74\x74\x72");
        $QO = isset($BD["\145\x6d\141\x69\x6c\137\141\164\164\x72"]) ? $BD["\x65\155\x61\151\x6c\137\x61\x74\x74\x72"] : '';
        $zZ = $vj->getnestedattribute($Nm, $QO);
        $nU = $vj->getnestedattribute($Nm, $g8);
        if (!empty($nU)) {
            goto kO;
        }
        MO_Oauth_Debug::mo_oauth_log("\125\163\x65\162\x6e\x61\155\x65\40\156\157\x74\40\x72\x65\143\x65\x69\x76\145\x64\56\120\x6c\145\x61\x73\x65\40\143\x6f\156\x66\x69\147\x75\x72\145\40\x41\x74\164\162\151\x62\165\x74\145\40\x4d\x61\x70\x70\x69\x6e\x67");
        wp_die("\x55\x73\x65\162\x6e\x61\155\145\x20\x6e\x6f\x74\x20\x72\x65\x63\145\x69\166\145\144\56\x50\154\145\x61\163\x65\40\x63\157\156\x66\x69\147\x75\x72\145\40\101\x74\x74\x72\x69\142\165\x74\145\x20\115\x61\x70\x70\151\156\x67");
        kO:
        if (!empty($zZ)) {
            goto mG;
        }
        $user = get_user_by("\154\157\147\151\x6e", $nU);
        goto Aj;
        mG:
        $zZ = $vj->getnestedattribute($Nm, $QO);
        if (!(false === strpos($zZ, "\x40"))) {
            goto OW;
        }
        MO_Oauth_Debug::mo_oauth_log("\115\x61\x70\160\145\x64\x20\x45\155\x61\151\154\x20\x61\164\x74\162\x69\x62\x75\164\x65\x20\x64\157\145\x73\x20\x6e\x6f\x74\x20\143\x6f\156\x74\x61\x69\x6e\40\x76\141\154\x69\x64\x20\145\155\x61\151\154\x2e");
        wp_die("\115\141\x70\x70\145\x64\40\x45\x6d\x61\151\154\40\141\x74\164\x72\x69\x62\165\x74\145\x20\144\x6f\x65\x73\x20\x6e\157\x74\x20\x63\x6f\156\x74\x61\151\156\40\166\141\x6c\x69\144\x20\145\x6d\x61\151\x6c\56");
        OW:
        Aj:
        if ($user) {
            goto nB;
        }
        $he = 0;
        if ($vj->mo_oauth_hbca_xyake()) {
            goto AI;
        }
        $user = $vj->mo_oauth_hjsguh_kiishuyauh878gs($zZ, $nU);
        goto vU;
        AI:
        if ($vj->mo_oauth_client_get_option("\155\157\137\157\141\x75\164\150\x5f\x66\154\141\x67") !== true) {
            goto VR;
        }
        $AL = base64_decode("PGRpdiBzdHlsZT0ndGV4dC1hbGlnbjpjZW50ZXI7Jz48Yj5Vc2VyIEFjY291bnQgZG9lcyBub3QgZXhpc3QuPC9iPjwvZGl2Pjxicj48c21hbGw+VGhpcyB2ZXJzaW9uIHN1cHBvcnRzIEF1dG8gQ3JlYXRlIFVzZXIgZmVhdHVyZSB1cHRvIDEwIFVzZXJzLiBQbGVhc2UgdXBncmFkZSB0byB0aGUgaGlnaGVyIHZlcnNpb24gb2YgdGhlIHBsdWdpbiB0byBlbmFibGUgYXV0byBjcmVhdGUgdXNlciBmb3IgdW5saW1pdGVkIHVzZXJzIG9yIGFkZCB1c2VyIG1hbnVhbGx5Ljwvc21hbGw+");
        MO_Oauth_Debug::mo_oauth_log($AL);
        wp_die($AL);
        goto tv;
        VR:
        if (!empty($zZ)) {
            goto QL;
        }
        $user = $vj->mo_oauth_jhuyn_jgsukaj($nU, $nU);
        goto dL;
        QL:
        $user = $vj->mo_oauth_jhuyn_jgsukaj($zZ, $nU);
        dL:
        tv:
        vU:
        goto ol;
        nB:
        $he = $user->ID;
        ol:
        if (!$user) {
            goto Jq;
        }
        wp_set_current_user($user->ID);
        $Ex = false;
        $Ex = apply_filters("\155\157\x5f\x72\x65\155\145\155\x62\x65\162\137\x6d\145", $Ex);
        wp_set_auth_cookie($user->ID, $Ex);
        $user = get_user_by("\x49\x44", $user->ID);
        do_action("\167\x70\x5f\x6c\157\147\151\156", $user->user_login, $user);
        wp_safe_redirect(home_url());
        exit;
        Jq:
        wi:
        if (!(!isset($_SERVER["\110\124\124\120\x5f\x58\137\122\x45\121\125\105\123\124\x45\x44\x5f\127\x49\x54\x48"]) && (strpos($_SERVER["\x52\x45\x51\x55\105\123\x54\x5f\x55\122\x49"], "\57\x6f\141\x75\x74\150\143\x61\154\x6c\x62\141\143\x6b") !== false || isset($_REQUEST["\x63\157\144\x65"]) && !isset($_REQUEST["\151\144\137\x74\157\153\145\x6e"])))) {
            goto II;
        }
        if (!isset($_REQUEST["\160\157\163\x74\x5f\x49\x44"])) {
            goto Ri;
        }
        return;
        Ri:
        try {
            if (isset($_COOKIE["\163\x74\141\164\145\x5f\x70\141\162\x61\x6d"])) {
                goto no;
            }
            if (isset($_GET["\163\164\x61\x74\x65"])) {
                goto Sf;
            }
            $rl = new StorageManager();
            if (!is_multisite()) {
                goto RG;
            }
            $rl->add_replace_entry("\142\154\x6f\x67\137\151\x64", 1);
            RG:
            $fm = $vj->get_app_by_name();
            if ($_GET["\x61\x70\x70\137\x6e\141\155\145"]) {
                goto Og;
            }
            $rl->add_replace_entry("\141\160\x70\156\x61\155\x65", $fm->get_app_name());
            goto Ss;
            Og:
            $rl->add_replace_entry("\x61\160\160\x6e\x61\155\145", $_GET["\141\x70\x70\x5f\x6e\141\155\145"]);
            Ss:
            $rl->add_replace_entry("\x74\x65\x73\164\137\143\x6f\156\146\151\x67", false);
            $rl->add_replace_entry("\162\x65\144\151\162\145\143\164\137\165\162\151", site_url());
            $SC = $rl->get_state();
            goto Mz;
            Sf:
            $SC = wp_unslash($_GET["\163\x74\x61\x74\x65"]);
            Mz:
            goto ng;
            no:
            $SC = $_COOKIE["\x73\x74\141\164\145\x5f\x70\141\162\x61\155"];
            ng:
            $YR = new StorageManager($SC);
            if (!empty($YR->get_value("\141\160\x70\x6e\141\x6d\145"))) {
                goto lu;
            }
            return;
            lu:
            $Mg = $YR->get_value("\141\160\160\156\x61\155\x65");
            $af = $YR->get_value("\x74\x65\163\164\x5f\143\157\156\x66\151\x67");
            if (!is_multisite()) {
                goto x2;
            }
            if (!(empty($YR->get_value("\162\145\x64\x69\x72\145\143\164\x65\x64\x5f\x74\x6f\137\x73\x75\142\x73\x69\164\145")) || $YR->get_value("\x72\x65\x64\x69\162\145\x63\x74\145\144\137\x74\157\137\x73\165\142\163\x69\x74\x65") !== "\162\x65\x64\x69\162\x65\143\x74")) {
                goto ff;
            }
            MO_Oauth_Debug::mo_oauth_log("\x52\x65\x64\151\x72\x65\x63\164\151\156\x67\40\146\x6f\x72\x20\155\165\154\x74\151\x73\164\x65\x20\x73\x75\142\x73\151\164\x65");
            $blog_id = $YR->get_value("\142\154\x6f\147\137\151\x64");
            $LY = get_site_url($blog_id);
            $YR->add_replace_entry("\x72\x65\144\151\162\x65\x63\x74\x65\x64\137\164\157\137\163\165\x62\x73\151\x74\145", "\x72\145\144\x69\162\x65\x63\164");
            $lE = $YR->get_state();
            $LY = $LY . "\77\x63\157\144\145\75" . $_GET["\143\157\144\145"] . "\46\x73\x74\141\164\145\x3d" . $lE;
            wp_redirect($LY);
            exit;
            ff:
            x2:
            $gW = $Mg ? $Mg : '';
            $G5 = $vj->mo_oauth_client_get_option("\155\x6f\137\x6f\141\165\164\150\x5f\x61\160\x70\x73\x5f\x6c\151\x73\164");
            $g8 = '';
            $QO = '';
            $Kk = $vj->get_app_by_name($gW);
            if ($Kk) {
                goto bQ;
            }
            $vj->handle_error("\x41\x70\160\154\151\143\141\164\151\x6f\x6e\x20\x6e\x6f\x74\40\x63\157\x6e\146\x69\x67\x75\162\145\144\56");
            MO_Oauth_Debug::mo_oauth_log("\101\160\x70\154\x69\x63\x61\x74\x69\x6f\156\40\x6e\157\164\x20\x63\x6f\x6e\x66\151\147\165\162\145\x64\x2e");
            exit("\101\x70\x70\154\x69\x63\141\164\151\x6f\x6e\40\156\x6f\x74\x20\143\157\x6e\146\151\x67\x75\x72\145\144\x2e");
            bQ:
            $BD = $Kk->get_app_config();
            if (!(isset($BD["\x73\145\x6e\x64\x5f\x6e\x6f\156\143\145"]) && $BD["\x73\145\156\144\137\x6e\157\156\143\145"] === 1)) {
                goto xM;
            }
            if (!(isset($_REQUEST["\x6e\x6f\156\143\145"]) && !$vj->get_transient("\155\157\137\x6f\x61\165\x74\150\x5f\x6e\157\x6e\x63\145\x5f" . $_REQUEST["\156\157\x6e\x63\145"]))) {
                goto o8;
            }
            $TM = "\116\157\x6e\x63\x65\x20\166\145\x72\151\146\x69\143\x61\164\x69\157\156\40\151\163\40\146\x61\151\154\x65\144\56\x20\120\154\145\x61\163\x65\x20\143\x6f\156\164\x61\x63\x74\40\x74\157\40\171\157\x75\162\40\141\144\155\x69\x6e\x69\163\x74\x72\x61\164\157\162\x2e";
            $vj->handle_error($TM);
            MO_Oauth_Debug::mo_oauth_log($TM);
            wp_die($TM);
            o8:
            xM:
            $tJ = $Kk->get_app_config("\x70\153\143\145\137\x66\154\157\x77");
            $Mo = $Kk->get_app_config("\160\153\x63\145\137\x63\154\151\145\x6e\x74\x5f\163\x65\143\x72\x65\164");
            $q1 = array("\x67\x72\x61\156\x74\x5f\164\x79\160\x65" => "\141\165\x74\150\x6f\x72\151\x7a\141\164\x69\x6f\156\137\x63\x6f\x64\x65", "\x63\154\151\x65\156\164\137\x69\144" => $BD["\x63\x6c\151\x65\x6e\164\x5f\x69\x64"], "\x72\x65\144\x69\x72\145\x63\164\x5f\165\162\151" => $BD["\x72\x65\144\151\162\x65\143\x74\137\x75\162\x69"], "\x63\157\x64\145" => $_REQUEST["\x63\157\144\145"]);
            if (!(strpos($BD["\x61\143\143\145\163\163\164\157\x6b\x65\156\x75\162\154"], "\163\145\162\x76\151\x63\x65\163\57\x6f\141\165\164\x68\x32\x2f\164\157\x6b\x65\x6e") === false && strpos($BD["\141\143\x63\x65\163\163\x74\x6f\153\145\156\165\x72\154"], "\163\x61\154\x65\x73\146\157\x72\143\x65") === false && strpos($BD["\141\x63\x63\145\163\x73\164\157\153\145\156\165\x72\x6c"], "\x2f\x6f\x61\x6d\57\x6f\141\x75\164\x68\x32\x2f\x61\x63\143\145\x73\163\x5f\164\157\153\x65\x6e") === false)) {
                goto ev;
            }
            $q1["\x73\143\157\160\145"] = $Kk->get_app_config("\163\x63\157\160\x65");
            ev:
            if ($tJ && 1 === $tJ) {
                goto XU;
            }
            $q1["\143\x6c\151\145\156\164\137\163\145\x63\162\x65\x74"] = $BD["\143\x6c\x69\145\x6e\164\x5f\x73\x65\x63\x72\x65\164"];
            goto pB;
            XU:
            if (!($Mo && 1 === $Mo)) {
                goto gX;
            }
            $q1["\143\154\151\x65\x6e\164\137\x73\x65\143\162\145\x74"] = $BD["\143\x6c\151\145\156\164\x5f\163\x65\x63\162\145\164"];
            gX:
            $q1 = apply_filters("\x6d\157\137\x6f\x61\165\x74\x68\x5f\141\x64\144\x5f\x63\154\151\145\156\164\x5f\x73\x65\x63\162\145\x74\x5f\x70\153\x63\145\137\x66\x6c\157\167", $q1, $BD);
            $q1["\143\x6f\x64\145\137\166\x65\x72\151\146\151\145\162"] = $YR->get_value("\x63\157\144\x65\x5f\x76\145\x72\151\146\151\x65\162");
            pB:
            $ET = isset($BD["\x73\x65\x6e\144\x5f\150\145\x61\x64\145\162\x73"]) ? $BD["\163\145\x6e\x64\x5f\150\145\141\x64\x65\x72\163"] : 0;
            $zg = isset($BD["\x73\145\156\144\x5f\x62\x6f\144\171"]) ? $BD["\x73\x65\156\144\137\142\157\x64\x79"] : 0;
            if ("\157\x70\145\156\151\x64\x63\157\x6e\156\x65\x63\164" === $Kk->get_app_config("\x61\160\160\x5f\164\x79\x70\145")) {
                goto K5;
            }
            $zl = $BD["\x61\x63\143\x65\x73\x73\x74\x6f\x6b\145\156\x75\x72\x6c"];
            MO_Oauth_Debug::mo_oauth_log("\117\x41\165\164\x68\x20\x66\154\157\167");
            if (strpos($BD["\x61\165\164\x68\157\162\151\x7a\145\165\x72\x6c"], "\x63\154\x65\166\145\x72\x2e\143\x6f\155\57\157\x61\165\x74\150") != false || strpos($BD["\x61\143\x63\145\163\163\164\157\153\145\156\x75\x72\x6c"], "\142\151\x74\162\151\x78") != false) {
                goto Mu;
            }
            $vJ = json_decode($this->oauth_handler->get_token($zl, $q1, $ET, $zg), true);
            goto cI;
            Mu:
            $vJ = json_decode($this->oauth_handler->get_atoken($zl, $q1, $_GET["\x63\x6f\144\145"], $ET, $zg), true);
            cI:
            if (!(get_current_user_id() && $af != 1)) {
                goto tt;
            }
            wp_clear_auth_cookie();
            wp_set_current_user(0);
            tt:
            $_SESSION["\x70\x72\x6f\x63\157\x72\145\x5f\x61\x63\143\145\163\x73\137\x74\x6f\x6b\x65\x6e"] = isset($vJ["\141\x63\x63\x65\163\163\x5f\164\157\x6b\x65\x6e"]) ? $vJ["\141\x63\143\x65\x73\163\137\164\x6f\153\x65\x6e"] : false;
            if (isset($vJ["\141\143\x63\x65\163\163\x5f\x74\157\153\145\x6e"])) {
                goto Ih;
            }
            do_action("\155\157\137\162\x65\x64\x69\162\145\143\x74\x5f\x74\x6f\x5f\143\x75\x73\164\x6f\155\137\145\x72\162\157\x72\x5f\x70\141\x67\x65");
            $vj->handle_error("\x49\x6e\166\x61\154\151\x64\x20\x74\x6f\x6b\145\x6e\40\x72\x65\143\x65\x69\x76\x65\x64\56");
            MO_Oauth_Debug::mo_oauth_log("\111\x6e\x76\141\x6c\x69\x64\40\164\x6f\x6b\x65\x6e\x20\x72\x65\143\145\x69\166\x65\144\x2e");
            exit("\x49\x6e\166\141\154\x69\x64\x20\x74\x6f\153\145\x6e\40\162\x65\x63\145\151\x76\145\x64\x2e");
            Ih:
            MO_Oauth_Debug::mo_oauth_log("\x54\x6f\x6b\x65\156\x20\122\145\x73\160\157\156\x73\x65\x20\x3d\76\40");
            MO_Oauth_Debug::mo_oauth_log($vJ);
            $lQ = $BD["\x72\x65\163\157\165\x72\x63\145\157\167\x6e\x65\x72\144\x65\x74\141\x69\154\163\x75\x72\154"];
            if (!(substr($lQ, -1) === "\x3d")) {
                goto pn;
            }
            $lQ .= $vJ["\141\x63\x63\145\163\x73\137\x74\x6f\x6b\145\x6e"];
            pn:
            MO_Oauth_Debug::mo_oauth_log("\x41\x63\143\145\163\x73\40\164\x6f\x6b\145\x6e\40\x72\145\x63\x65\x69\166\145\144\56");
            MO_Oauth_Debug::mo_oauth_log("\101\x63\x63\145\163\163\x20\x54\157\153\145\x6e\40\75\76\x20" . $vJ["\141\143\143\145\x73\x73\137\164\157\153\145\x6e"]);
            $TK = null;
            $TK = apply_filters("\155\x6f\x5f\x70\157\x6c\141\x72\137\162\145\x67\151\x73\x74\x65\x72\137\x75\x73\x65\x72", $vJ);
            if (!(!empty($TK) && !empty($vJ["\x78\137\x75\x73\145\x72\x5f\x69\x64"]))) {
                goto OQ;
            }
            $lQ .= "\x2f" . $vJ["\x78\137\165\x73\x65\x72\x5f\x69\144"];
            OQ:
            $Nm = $this->oauth_handler->get_resource_owner($lQ, $vJ["\x61\x63\143\x65\x73\163\x5f\164\x6f\153\145\156"]);
            $hk = array();
            if (!(strpos($Kk->get_app_config("\x61\x75\x74\x68\x6f\162\x69\x7a\145\165\x72\154"), "\x6c\x69\x6e\x6b\145\144\x69\156") !== false && strpos($BD["\x73\143\157\x70\x65"], "\x72\x5f\145\x6d\x61\151\154\141\x64\144\162\145\x73\x73") != false)) {
                goto wJ;
            }
            $V0 = "\150\x74\x74\160\163\x3a\57\57\141\160\151\56\154\151\156\x6b\x65\144\151\156\x2e\143\157\x6d\57\x76\62\57\x65\x6d\141\151\154\101\144\144\162\x65\x73\163\77\161\x3d\155\x65\x6d\x62\145\x72\x73\x26\x70\162\x6f\152\145\x63\164\151\x6f\156\75\50\145\x6c\x65\x6d\x65\x6e\164\x73\52\x28\x68\141\156\144\154\x65\x7e\51\x29";
            $hk = $this->oauth_handler->get_resource_owner($V0, $vJ["\x61\143\x63\x65\163\163\137\164\157\153\x65\x6e"]);
            wJ:
            $Nm = array_merge($Nm, $hk);
            MO_Oauth_Debug::mo_oauth_log("\122\145\163\x6f\165\162\x63\x65\40\x4f\x77\x6e\x65\x72\40\75\76\x20");
            MO_Oauth_Debug::mo_oauth_log($Nm);
            $BA = apply_filters("\155\157\137\x74\x72\137\x61\x66\x74\x65\162\x5f\160\162\x6f\146\x69\154\145\x5f\151\x6e\146\x6f\137\x65\x78\164\x72\141\143\x74\x69\x6f\156\137\x66\x72\x6f\155\137\x74\x6f\153\145\x6e", $Nm);
            if (!($BA != '' && is_array($BA))) {
                goto ja;
            }
            $Nm = array_merge($Nm, $BA);
            ja:
            $Gn = apply_filters("\141\143\x63\162\x65\x64\151\164\151\x6f\x6e\x73\137\145\156\144\x70\x6f\x69\x6e\164", $vJ["\x61\143\x63\145\163\x73\137\x74\x6f\153\145\x6e"]);
            if (!($Gn !== '' && is_array($Gn))) {
                goto mp;
            }
            $Nm = array_merge($Nm, $Gn);
            mp:
            if (!has_filter("\x6d\x6f\x5f\x70\x6f\154\141\x72\137\x72\x65\x67\x69\x73\164\145\x72\x5f\x75\163\x65\x72")) {
                goto Cj;
            }
            $yR = array();
            $yR["\164\x6f\x6b\145\x6e"] = $vJ["\x61\x63\x63\x65\x73\x73\137\164\157\x6b\x65\x6e"];
            $Nm = array_merge($Nm, $yR);
            Cj:
            if (!(strpos($Kk->get_app_config("\x61\x75\164\x68\157\x72\151\172\145\165\x72\154"), "\144\151\x73\143\x6f\x72\144") !== false)) {
                goto Iy;
            }
            $Px = apply_filters("\x6d\x6f\137\144\x72\155\x5f\147\145\x74\137\x75\x73\145\x72\x5f\162\157\x6c\x65\x73", $Nm["\151\x64"]);
            if (!(false !== $Px)) {
                goto xw;
            }
            MO_Oauth_Debug::mo_oauth_log("\x44\151\x73\x63\157\x72\x64\40\x52\x6f\x6c\x65\163\40\75\76\x20");
            MO_Oauth_Debug::mo_oauth_log($Px);
            $Nm["\162\x6f\154\145\x73"] = $Px;
            xw:
            Iy:
            if (!(isset($BD["\x73\145\156\x64\137\156\x6f\156\143\145"]) && $BD["\163\x65\x6e\144\137\x6e\157\x6e\143\145"] === 1)) {
                goto ay;
            }
            if (!(isset($Nm["\156\157\156\143\145"]) && $Nm["\x6e\157\x6e\x63\x65"] != NULL)) {
                goto NN;
            }
            if ($vj->get_transient("\155\157\137\x6f\x61\165\x74\x68\137\156\x6f\156\143\145\x5f" . $Nm["\156\157\x6e\143\145"])) {
                goto v6;
            }
            $TM = "\116\x6f\x6e\143\145\40\x76\x65\162\151\x66\x69\x63\141\x74\151\x6f\156\x20\x69\163\40\146\x61\x69\x6c\145\144\x2e\40\120\x6c\x65\141\x73\x65\x20\x63\157\156\x74\141\143\x74\40\x74\157\x20\x79\157\x75\162\x20\x61\144\x6d\x69\x6e\151\x73\164\162\141\x74\x6f\x72\56";
            $vj->handle_error($TM);
            MO_Oauth_Debug::mo_oauth_log($TM);
            wp_die($TM);
            goto Fe;
            v6:
            $vj->delete_transient("\155\x6f\x5f\x6f\x61\165\x74\150\137\x6e\x6f\156\143\x65\x5f" . $Nm["\x6e\157\x6e\x63\x65"]);
            Fe:
            NN:
            ay:
            $qP = [];
            $hy = $this->dropdownattrmapping('', $Nm, $qP);
            $vj->mo_oauth_client_update_option("\155\x6f\137\x6f\141\x75\164\x68\x5f\x61\164\x74\162\x5f\x6e\x61\155\145\137\x6c\x69\163\164" . $gW, $hy);
            if (!($af && '' !== $af)) {
                goto aJ;
            }
            $this->handle_group_test_conf($Nm, $BD, $vJ["\141\143\x63\145\163\163\x5f\164\x6f\153\145\156"], false, $af);
            exit;
            aJ:
            goto LN;
            K5:
            MO_Oauth_Debug::mo_oauth_log("\x4f\160\145\156\111\x44\x20\103\157\156\x6e\145\x63\x74\x20\x66\x6c\x6f\x77");
            $vJ = json_decode($this->oauth_handler->get_token($BD["\x61\x63\x63\x65\x73\x73\164\157\x6b\x65\x6e\x75\x72\154"], $q1, $ET, $zg), true);
            $vP = [];
            try {
                $vP = $this->resolve_and_get_oidc_response($vJ);
            } catch (\Exception $Qo) {
                $vj->handle_error($Qo->getMessage());
                MO_Oauth_Debug::mo_oauth_log("\x49\x6e\x76\x61\154\x69\x64\x20\x52\x65\x73\x70\x6f\156\x73\x65\40\162\145\x63\x65\x69\166\x65\x64\x2e");
                do_action("\x6d\157\x5f\x72\145\144\x69\162\145\x63\x74\x5f\x74\157\x5f\x63\x75\163\164\157\x6d\137\145\162\x72\157\x72\137\160\141\147\145");
                wp_die("\x49\x6e\166\x61\154\151\x64\40\x52\x65\163\160\157\x6e\163\x65\40\x72\x65\x63\145\151\x76\145\144\x2e");
                exit;
            }
            MO_Oauth_Debug::mo_oauth_log("\111\104\x20\x54\157\x6b\x65\x6e\x20\x72\145\143\145\151\x76\145\144\x20\123\x75\143\x63\x65\x73\x73\x66\165\x6c\x6c\171");
            MO_Oauth_Debug::mo_oauth_log("\x49\x44\x20\124\x6f\153\145\x6e\x20\75\x3e\x20" . $vP);
            $Nm = $this->get_resource_owner_from_app($vP, $gW);
            MO_Oauth_Debug::mo_oauth_log("\x52\145\x73\x6f\x75\x72\x63\145\x20\117\x77\x6e\x65\x72\x20\75\76\40");
            MO_Oauth_Debug::mo_oauth_log($Nm);
            if (!(strpos($Kk->get_app_config("\141\165\164\x68\157\x72\x69\x7a\x65\x75\162\x6c"), "\164\x77\x69\x74\143\150") !== false)) {
                goto qA;
            }
            $Ju = apply_filters("\155\157\x5f\164\x73\155\x5f\x67\x65\164\137\165\x73\x65\x72\137\163\x75\142\163\x63\162\x69\160\x74\x69\157\156", $Nm["\x73\165\142"], $BD["\x63\x6c\151\x65\156\x74\x5f\x69\144"], $vJ["\x61\143\143\145\x73\x73\x5f\x74\157\x6b\145\x6e"]);
            if (!(false !== $Ju)) {
                goto RA;
            }
            MO_Oauth_Debug::mo_oauth_log("\x54\167\151\164\143\x68\x20\123\x75\142\163\143\162\x69\160\164\151\x6f\156\x20\x3d\x3e\40");
            MO_Oauth_Debug::mo_oauth_log($Ju);
            $Nm["\x73\x75\x62\x73\x63\x72\x69\x70\164\151\x6f\156"] = $Ju;
            RA:
            qA:
            if (!($Kk->get_app_config("\x61\x70\x70\x49\x64") === "\x6b\145\171\x63\x6c\157\141\x6b")) {
                goto jE;
            }
            $PQ = apply_filters("\x6d\x6f\137\x6b\162\x6d\137\x67\x65\x74\x5f\165\x73\x65\x72\137\x72\157\154\145\163", $Nm, $vJ);
            if (!(false !== $PQ)) {
                goto s5;
            }
            $Nm["\x72\x6f\x6c\145\163"] = $PQ;
            s5:
            jE:
            $Nm = apply_filters("\155\157\x5f\141\172\x75\162\145\x62\62\143\x5f\x67\x65\164\137\165\163\145\162\x5f\147\x72\157\165\x70\x5f\151\144\x73", $Nm, $BD);
            $BA = apply_filters("\155\x6f\137\164\162\x5f\x61\x66\x74\x65\162\x5f\160\162\x6f\x66\151\154\145\x5f\151\x6e\x66\x6f\137\x65\x78\x74\162\x61\143\x74\151\157\x6e\x5f\x66\162\157\x6d\x5f\x74\157\153\x65\x6e", $Nm);
            if (!($BA != '' && is_array($BA))) {
                goto Hg;
            }
            $Nm = array_merge($Nm, $BA);
            Hg:
            if (!(isset($BD["\x73\x65\x6e\x64\137\x6e\157\156\x63\x65"]) && $BD["\x73\145\156\x64\x5f\x6e\157\x6e\143\x65"] === 1)) {
                goto hv;
            }
            if (!(isset($Nm["\x6e\x6f\x6e\143\x65"]) && $Nm["\156\157\x6e\x63\x65"] != NULL)) {
                goto Qc;
            }
            if ($vj->get_transient("\x6d\x6f\x5f\x6f\141\x75\x74\150\137\x6e\x6f\x6e\x63\x65\137" . $Nm["\x6e\157\156\143\145"])) {
                goto Sw;
            }
            $TM = "\116\x6f\x6e\x63\145\x20\166\145\162\151\146\x69\143\141\164\x69\157\x6e\40\151\163\x20\146\x61\151\x6c\x65\x64\56\40\x50\x6c\x65\141\x73\x65\40\x63\x6f\x6e\164\x61\143\x74\x20\x74\x6f\40\x79\x6f\x75\x72\40\x61\x64\155\151\x6e\151\163\164\x72\141\x74\157\162\x2e";
            $vj->handle_error($TM);
            MO_Oauth_Debug::mo_oauth_log($TM);
            wp_die($TM);
            goto zT;
            Sw:
            $vj->delete_transient("\155\157\137\x6f\x61\165\164\x68\x5f\x6e\157\156\143\x65\137" . $Nm["\x6e\157\156\x63\x65"]);
            zT:
            Qc:
            hv:
            $qP = [];
            $hy = $this->dropdownattrmapping('', $Nm, $qP);
            $vj->mo_oauth_client_update_option("\x6d\x6f\x5f\x6f\x61\x75\164\150\x5f\x61\164\x74\x72\x5f\x6e\141\x6d\x65\x5f\154\x69\163\x74" . $gW, $hy);
            if (!($af && '' !== $af)) {
                goto dY;
            }
            $vJ["\162\145\146\x72\x65\163\x68\x5f\x74\157\153\145\x6e"] = isset($vJ["\162\145\146\162\x65\163\150\137\164\x6f\x6b\145\156"]) ? $vJ["\x72\x65\146\162\x65\x73\150\137\x74\157\x6b\145\x6e"] : '';
            $_SESSION["\x70\x72\x6f\143\157\x72\145\x5f\x72\145\x66\162\145\163\x68\137\x74\157\153\x65\156"] = $vJ["\162\145\x66\x72\x65\x73\150\137\x74\157\x6b\x65\156"];
            $id = isset($vJ["\141\143\143\145\163\x73\137\164\157\x6b\x65\x6e"]) ? $vJ["\141\143\143\x65\163\163\x5f\164\x6f\153\145\156"] : '';
            $this->handle_group_test_conf($Nm, $BD, $id, false, $af);
            MO_Oauth_Debug::mo_oauth_log("\101\x74\164\x72\151\142\x75\x74\145\40\x52\145\x63\x65\151\x76\x65\144\x20\123\x75\143\x63\145\163\x73\146\x75\154\x6c\171");
            exit;
            dY:
            LN:
            if (!(isset($BD["\147\162\157\x75\x70\x64\145\x74\x61\x69\154\163\165\x72\154"]) && !empty($BD["\147\x72\157\x75\160\x64\x65\x74\x61\151\154\x73\x75\x72\x6c"]))) {
                goto iy;
            }
            $Nm = $this->handle_group_user_info($Nm, $BD, $vJ["\141\143\x63\x65\163\x73\x5f\x74\x6f\153\145\x6e"]);
            MO_Oauth_Debug::mo_oauth_log("\107\162\157\x75\160\40\x44\145\164\x61\151\x6c\x73\40\117\142\x74\141\151\156\145\x64\40\x3d\76\40" . $Nm);
            iy:
            MO_Oauth_Debug::mo_oauth_log("\x46\x65\164\143\x68\145\x64\40\162\145\x73\x6f\165\162\143\x65\x20\157\x77\x6e\145\162\40\72\x20" . json_encode($Nm));
            if (!has_filter("\x77\157\157\x63\x6f\x6d\x6d\x65\162\x63\145\x5f\x63\x68\x65\143\x6b\157\x75\x74\x5f\147\x65\x74\x5f\166\x61\154\x75\145")) {
                goto t7;
            }
            $Nm["\x61\x70\160\156\x61\x6d\145"] = $gW;
            t7:
            do_action("\155\x6f\137\141\x62\x72\x5f\146\x69\154\164\145\x72\137\x6c\157\147\x69\156", $Nm);
            $this->handle_sso($gW, $BD, $Nm, $SC, $vJ);
        } catch (Exception $Qo) {
            $vj->handle_error($Qo->getMessage());
            MO_Oauth_Debug::mo_oauth_log($Qo->getMessage());
            do_action("\x6d\157\x5f\x72\145\x64\x69\162\x65\x63\x74\137\164\x6f\x5f\x63\165\x73\x74\x6f\x6d\137\x65\x72\162\x6f\162\x5f\160\x61\x67\145");
            exit(esc_html($Qo->getMessage()));
        }
        II:
    }
    public function dropdownattrmapping($P2, $oS, $qP)
    {
        global $vj;
        foreach ($oS as $Vi => $gF) {
            if (is_array($gF)) {
                goto o3;
            }
            if (!empty($P2)) {
                goto HC;
            }
            array_push($qP, $Vi);
            goto RW;
            HC:
            array_push($qP, $P2 . "\x2e" . $Vi);
            RW:
            goto Hz;
            o3:
            if (empty($P2)) {
                goto qG;
            }
            $P2 .= "\x2e";
            qG:
            $qP = $this->dropdownattrmapping($P2 . $Vi, $gF, $qP);
            $P2 = rtrim($P2, "\x2e");
            Hz:
            Mh:
        }
        uO:
        return $qP;
    }
    public function resolve_and_get_oidc_response($vJ = array())
    {
        if (!empty($vJ)) {
            goto RI;
        }
        throw new \Exception("\x54\157\153\145\156\x20\162\145\x73\160\x6f\156\163\x65\40\x69\x73\x20\x65\x6d\160\164\x79", "\151\156\x76\141\x6c\151\144\137\x72\145\163\x70\157\156\x73\x65");
        RI:
        global $vj;
        $xk = isset($vJ["\x69\144\137\x74\157\x6b\x65\156"]) ? $vJ["\x69\x64\137\x74\157\153\145\156"] : false;
        $u1 = isset($vJ["\141\143\143\145\163\x73\x5f\x74\157\x6b\145\156"]) ? $vJ["\x61\x63\143\145\163\163\137\164\157\153\145\x6e"] : false;
        $_SESSION["\160\162\x6f\x63\x6f\x72\x65\x5f\x61\143\x63\x65\x73\x73\x5f\164\157\153\145\156"] = isset($u1) ? $u1 : $xk;
        if (!$vj->is_valid_jwt($xk)) {
            goto Im;
        }
        return $xk;
        Im:
        if (!$vj->is_valid_jwt($u1)) {
            goto xN;
        }
        return $u1;
        xN:
        MO_Oauth_Debug::mo_oauth_log("\x54\x6f\x6b\145\156\40\x69\163\40\156\157\x74\40\141\40\x76\x61\x6c\151\x64\40\112\127\x54\x2e");
        throw new \Exception("\x54\x6f\x6b\x65\x6e\x20\151\x73\40\x6e\157\164\x20\141\40\x76\x61\154\151\x64\40\112\127\124\56");
    }
    public function handle_group_test_conf($Nm = array(), $BD = array(), $u1 = '', $kq = false, $af = false)
    {
        $this->render_test_config_output($Nm, false);
    }
    public function testattrmappingconfig($P2, $oS)
    {
        foreach ($oS as $Vi => $gF) {
            if (is_array($gF) || is_object($gF)) {
                goto Bb;
            }
            echo "\74\x74\x72\76\74\164\x64\x3e";
            if (empty($P2)) {
                goto BW;
            }
            echo $P2 . "\x2e";
            BW:
            echo $Vi . "\x3c\57\x74\x64\76\74\164\x64\x3e" . $gF . "\74\x2f\164\x64\76\x3c\x2f\x74\x72\x3e";
            goto Vq;
            Bb:
            if (empty($P2)) {
                goto p6;
            }
            $P2 .= "\56";
            p6:
            $this->testattrmappingconfig($P2 . $Vi, $gF);
            $P2 = rtrim($P2, "\x2e");
            Vq:
            CG:
        }
        wM:
    }
    public function render_test_config_output($Nm, $kq = false)
    {
        MO_Oauth_Debug::mo_oauth_log("\x54\x68\151\x73\x20\151\163\x20\164\145\163\164\40\143\x6f\156\x66\151\x67\x75\162\x61\x74\151\x6f\156\x20\146\154\157\167\x20\x3d\x3e\40");
        echo "\74\144\x69\166\40\163\164\x79\x6c\x65\75\x22\146\x6f\156\x74\x2d\x66\141\x6d\x69\154\171\72\103\141\x6c\151\x62\162\151\73\x70\x61\x64\x64\151\156\147\72\x30\x20\x33\45\73\42\76";
        echo "\74\163\x74\171\x6c\145\76\x74\141\x62\154\145\173\x62\157\162\x64\x65\162\x2d\x63\x6f\154\x6c\141\160\163\x65\72\x63\157\154\154\x61\x70\163\x65\73\175\164\150\40\x7b\x62\x61\x63\153\x67\162\157\x75\x6e\144\x2d\x63\157\154\157\162\x3a\x20\x23\145\145\x65\73\40\x74\145\x78\x74\55\x61\154\151\147\156\72\x20\143\x65\x6e\164\145\x72\x3b\40\x70\141\144\144\151\156\x67\x3a\40\x38\160\x78\73\x20\142\157\x72\144\x65\162\55\167\151\x64\x74\x68\72\61\160\170\x3b\x20\x62\157\162\144\145\162\55\x73\164\x79\154\145\72\163\157\x6c\x69\x64\x3b\40\142\x6f\162\x64\x65\x72\x2d\143\157\x6c\x6f\162\72\43\62\x31\62\61\x32\x31\x3b\175\x74\162\72\156\164\x68\55\143\150\x69\x6c\x64\x28\157\144\144\x29\x20\x7b\142\x61\x63\153\147\162\157\165\156\144\x2d\x63\x6f\154\157\162\72\x20\x23\x66\x32\146\x32\x66\62\x3b\x7d\40\164\x64\x7b\x70\x61\144\x64\151\156\147\x3a\70\x70\x78\x3b\x62\x6f\162\x64\145\162\x2d\167\151\x64\164\150\x3a\x31\160\170\73\40\x62\157\162\x64\x65\x72\55\163\164\171\154\x65\x3a\x73\157\154\151\144\x3b\40\142\157\162\x64\x65\162\55\x63\x6f\x6c\x6f\x72\72\x23\62\61\62\x31\x32\x31\x3b\x7d\74\57\x73\x74\171\x6c\145\x3e";
        echo "\74\150\62\x3e";
        echo $kq ? "\x47\x72\157\165\160\x20\x49\x6e\x66\x6f" : "\x54\x65\x73\164\x20\x43\157\x6e\x66\151\x67\x75\162\x61\164\x69\x6f\x6e";
        echo "\x3c\57\x68\x32\x3e\x3c\164\141\142\154\x65\76\x3c\x74\162\76\x3c\164\x68\76\101\164\x74\162\x69\142\x75\164\x65\40\116\x61\155\x65\74\57\x74\150\76\74\164\150\76\101\164\164\162\x69\x62\x75\164\145\x20\x56\141\x6c\x75\145\x3c\x2f\x74\150\76\x3c\57\164\x72\x3e";
        $this->testattrmappingconfig('', $Nm);
        echo "\x3c\x2f\x74\x61\142\154\x65\76";
        if ($kq) {
            goto bJ;
        }
        echo "\x3c\144\x69\166\x20\163\x74\x79\x6c\x65\75\42\160\141\144\x64\151\x6e\x67\x3a\x20\x31\60\x70\170\73\42\x3e\x3c\57\x64\x69\166\x3e\74\151\156\x70\165\x74\40\x73\x74\171\154\x65\75\x22\x70\x61\x64\x64\x69\x6e\147\72\x31\45\x3b\167\x69\144\164\150\72\x31\60\60\x70\170\73\142\x61\143\x6b\147\162\157\x75\156\x64\x3a\x20\43\60\60\71\61\x43\104\40\x6e\x6f\156\x65\40\162\145\160\145\141\x74\40\163\x63\162\x6f\154\x6c\x20\x30\x25\x20\60\x25\73\x63\x75\162\163\x6f\x72\x3a\40\x70\x6f\x69\156\x74\145\162\73\x66\x6f\156\164\55\x73\x69\x7a\x65\x3a\x31\65\x70\170\73\142\157\x72\x64\145\162\x2d\x77\x69\x64\x74\x68\x3a\x20\61\x70\x78\73\142\x6f\162\x64\x65\162\55\163\164\171\154\x65\72\40\x73\x6f\x6c\151\x64\x3b\x62\157\x72\144\x65\162\x2d\x72\141\144\x69\165\163\72\x20\x33\x70\170\x3b\x77\x68\x69\164\x65\55\x73\160\x61\x63\x65\x3a\40\156\157\x77\162\x61\x70\73\142\157\x78\55\163\151\x7a\x69\156\147\x3a\x20\142\157\x72\144\x65\162\x2d\142\x6f\170\x3b\x62\x6f\162\144\x65\162\55\x63\157\x6c\157\162\72\x20\x23\x30\x30\x37\x33\101\x41\73\142\157\170\x2d\x73\150\141\x64\157\167\72\x20\60\160\170\x20\61\x70\170\40\60\160\x78\x20\162\x67\x62\141\x28\61\x32\60\54\x20\62\x30\60\x2c\40\x32\x33\60\x2c\40\60\x2e\x36\51\40\151\156\163\145\164\x3b\x63\x6f\154\157\x72\x3a\x20\x23\x46\x46\x46\73\42\x74\171\160\145\75\42\142\x75\x74\x74\x6f\x6e\42\40\166\x61\154\x75\x65\x3d\42\104\x6f\x6e\145\x22\x20\x6f\x6e\x43\x6c\x69\x63\x6b\75\x22\x73\145\x6c\x66\56\x63\154\x6f\163\x65\50\x29\x3b\x22\76\x3c\57\144\x69\166\76";
        bJ:
    }
    public function handle_sso($gW, $BD, $Nm, $SC, $vJ, $EY = false)
    {
        MO_Oauth_Debug::mo_oauth_log("\123\123\x4f\x20\x68\x61\x6e\x64\154\x69\x6e\x67\x20\x66\154\157\x77");
        global $vj;
        if (!(get_class($this) === "\x4d\x6f\117\x61\165\x74\150\x43\x6c\151\145\156\x74\x5c\114\x6f\x67\x69\x6e\110\x61\x6e\x64\154\145\162" && $vj->check_versi(1))) {
            goto kW;
        }
        $C0 = new \MoOauthClient\Base\InstanceHelper();
        $A9 = $C0->get_login_handler_instance();
        $A9->handle_sso($gW, $BD, $Nm, $SC, $vJ, $EY);
        kW:
        $g8 = isset($BD["\156\141\155\x65\x5f\x61\x74\x74\x72"]) ? $BD["\156\x61\x6d\x65\x5f\x61\x74\164\x72"] : '';
        $QO = isset($BD["\x65\155\x61\x69\154\137\x61\x74\x74\x72"]) ? $BD["\145\155\141\151\x6c\x5f\x61\x74\164\x72"] : '';
        $zZ = $vj->getnestedattribute($Nm, $QO);
        $nU = $vj->getnestedattribute($Nm, $g8);
        if (!empty($zZ)) {
            goto L0;
        }
        MO_Oauth_Debug::mo_oauth_log("\x45\x6d\141\151\x6c\40\141\144\144\x72\145\163\163\x20\156\x6f\164\x20\162\145\x63\145\x69\x76\145\144\x2e\x20\103\150\145\143\153\x20\171\x6f\165\162\40\x41\164\x74\x72\151\x62\165\164\x65\40\x4d\141\160\160\x69\156\147\x20\143\x6f\x6e\146\151\x67\165\162\141\x74\x69\157\x6e\56");
        wp_die("\x45\x6d\141\151\154\40\x61\144\x64\x72\145\x73\x73\x20\x6e\157\x74\x20\x72\x65\x63\x65\x69\x76\x65\144\x2e\40\x43\150\x65\x63\x6b\x20\x79\x6f\x75\x72\40\x3c\163\164\x72\x6f\156\147\x3e\101\x74\164\162\x69\142\165\x74\x65\40\115\x61\160\160\151\x6e\147\74\57\x73\164\x72\157\156\x67\76\x20\143\157\x6e\146\151\x67\165\x72\141\164\x69\157\156\x2e");
        L0:
        if (!(false === strpos($zZ, "\100"))) {
            goto Vs;
        }
        MO_Oauth_Debug::mo_oauth_log("\115\x61\x70\160\x65\144\x20\x45\x6d\141\x69\x6c\40\x61\x74\x74\x72\x69\x62\165\x74\x65\x20\144\157\145\x73\40\156\x6f\x74\x20\143\x6f\156\164\141\x69\156\x20\166\x61\x6c\x69\144\x20\145\155\x61\x69\154\x2e");
        wp_die("\x4d\x61\x70\160\x65\x64\40\105\x6d\141\x69\154\x20\x61\164\164\x72\151\x62\165\x74\x65\x20\144\x6f\x65\x73\x20\156\157\x74\40\x63\157\x6e\164\x61\151\156\40\x76\x61\x6c\151\144\x20\x65\x6d\141\x69\154\56");
        Vs:
        $user = get_user_by("\154\157\x67\151\156", $zZ);
        if ($user) {
            goto ga;
        }
        $user = get_user_by("\145\155\141\151\154", $zZ);
        ga:
        if ($user) {
            goto SN;
        }
        $he = 0;
        if ($vj->mo_oauth_hbca_xyake()) {
            goto U8;
        }
        $user = $vj->mo_oauth_hjsguh_kiishuyauh878gs($zZ, $nU);
        goto ha;
        U8:
        if ($vj->mo_oauth_client_get_option("\x6d\157\137\x6f\x61\x75\164\150\x5f\x66\x6c\x61\x67") !== true) {
            goto d6;
        }
        $AL = base64_decode("PGRpdiBzdHlsZT0ndGV4dC1hbGlnbjpjZW50ZXI7Jz48Yj5Vc2VyIEFjY291bnQgZG9lcyBub3QgZXhpc3QuPC9iPjwvZGl2Pjxicj48c21hbGw+VGhpcyB2ZXJzaW9uIHN1cHBvcnRzIEF1dG8gQ3JlYXRlIFVzZXIgZmVhdHVyZSB1cHRvIDEwIFVzZXJzLiBQbGVhc2UgdXBncmFkZSB0byB0aGUgaGlnaGVyIHZlcnNpb24gb2YgdGhlIHBsdWdpbiB0byBlbmFibGUgYXV0byBjcmVhdGUgdXNlciBmb3IgdW5saW1pdGVkIHVzZXJzIG9yIGFkZCB1c2VyIG1hbnVhbGx5Ljwvc21hbGw+");
        MO_Oauth_Debug::mo_oauth_log($AL);
        wp_die($AL);
        goto WT;
        d6:
        $user = $vj->mo_oauth_jhuyn_jgsukaj($zZ, $nU);
        WT:
        ha:
        goto Rs;
        SN:
        $he = $user->ID;
        Rs:
        if (!$user) {
            goto HK;
        }
        wp_set_current_user($user->ID);
        MO_Oauth_Debug::mo_oauth_log("\125\x73\145\162\x20\x46\x6f\165\x6e\x64");
        $Ex = false;
        $Ex = apply_filters("\x6d\157\x5f\x72\x65\x6d\x65\x6d\x62\145\x72\x5f\x6d\x65", $Ex);
        if (!$Ex) {
            goto jn;
        }
        MO_Oauth_Debug::mo_oauth_log("\122\x65\x6d\145\x6d\142\x65\162\40\101\x64\x64\157\156\40\141\143\164\x69\166\x61\164\145\144");
        jn:
        wp_set_auth_cookie($user->ID, $Ex);
        MO_Oauth_Debug::mo_oauth_log("\x55\x73\x65\162\x20\143\x6f\x6f\x6b\x69\x65\x20\x73\145\x74");
        $user = get_user_by("\111\x44", $user->ID);
        do_action("\167\x70\x5f\154\x6f\147\x69\156", $user->user_login, $user);
        wp_safe_redirect(home_url());
        MO_Oauth_Debug::mo_oauth_log("\x55\x73\x65\162\40\x52\x65\x64\x69\x72\x65\x63\x74\x65\144\40\164\157\x20\x68\157\155\145\x20\x75\162\154");
        exit;
        HK:
    }
    public function get_resource_owner_from_app($xk, $Xr)
    {
        return $this->oauth_handler->get_resource_owner_from_id_token($xk);
    }
}
