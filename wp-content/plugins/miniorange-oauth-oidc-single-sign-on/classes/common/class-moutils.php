<?php


namespace MoOauthClient;

use MoOauthClient\App;
use MoOauthClient\Backup\EnvVarResolver;
class MOUtils
{
    const FREE = 0;
    const STANDARD = 1;
    const PREMIUM = 2;
    const MULTISITE_PREMIUM = 3;
    const ENTERPRISE = 4;
    const ALL_INCLUSIVE_SINGLE_SITE = 5;
    const MULTISITE_ENTERPRISE = 6;
    const ALL_INCLUSIVE_MULTISITE = 7;
    private $is_multisite = false;
    public function __construct()
    {
        remove_action("\141\x64\155\x69\156\x5f\156\x6f\x74\151\143\145\x73", array($this, "\x6d\x6f\137\157\x61\165\164\150\137\x73\x75\143\x63\145\x73\163\x5f\x6d\145\x73\x73\141\147\145"));
        remove_action("\141\144\x6d\151\x6e\137\x6e\x6f\164\151\x63\145\x73", array($this, "\x6d\x6f\137\157\141\165\x74\150\x5f\x65\x72\162\x6f\x72\137\155\145\163\x73\x61\x67\x65"));
        $this->is_multisite = boolval(get_site_option("\x6d\157\x5f\x6f\x61\165\164\150\137\x69\x73\x4d\x75\x6c\x74\151\x53\151\x74\x65\x50\154\x75\147\x69\156\122\145\x71\x75\145\x73\164\x65\x64")) ? true : ($this->is_multisite_versi() ? true : false);
    }
    public function mo_oauth_success_message()
    {
        $PM = "\145\162\162\157\x72";
        $CG = $this->mo_oauth_client_get_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION);
        echo "\74\144\151\x76\40\143\x6c\141\x73\163\75\47" . $PM . "\47\x3e\40\74\160\76" . $CG . "\x3c\x2f\160\x3e\x3c\57\x64\151\x76\76";
    }
    public function mo_oauth_error_message()
    {
        $PM = "\x75\160\x64\x61\x74\145\144";
        $CG = $this->mo_oauth_client_get_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION);
        echo "\x3c\144\x69\x76\40\x63\x6c\x61\163\x73\75\47" . $PM . "\47\76\x3c\x70\x3e" . $CG . "\74\x2f\160\x3e\x3c\57\x64\151\166\76";
    }
    public function mo_oauth_show_success_message()
    {
        $jZ = is_multisite() && $this->is_multisite_versi() ? "\x6e\145\164\167\x6f\162\x6b\x5f" : '';
        remove_action("{$jZ}\141\x64\x6d\x69\x6e\x5f\156\x6f\164\151\143\145\x73", array($this, "\155\157\137\x6f\x61\x75\x74\x68\137\x73\165\143\143\x65\163\163\137\155\x65\x73\x73\x61\147\145"));
        add_action("{$jZ}\x61\144\x6d\151\156\x5f\156\x6f\164\151\143\x65\x73", array($this, "\155\x6f\137\157\x61\165\x74\150\137\145\x72\162\x6f\x72\x5f\155\145\x73\x73\x61\147\145"));
    }
    public function mo_oauth_show_error_message()
    {
        $jZ = is_multisite() && $this->is_multisite_versi() ? "\x6e\x65\x74\x77\x6f\x72\153\x5f" : '';
        remove_action("{$jZ}\141\x64\155\151\156\x5f\156\x6f\164\x69\143\x65\163", array($this, "\155\157\137\x6f\x61\165\164\x68\x5f\x65\162\x72\157\x72\x5f\x6d\x65\x73\163\x61\147\x65"));
        add_action("{$jZ}\141\144\x6d\x69\x6e\137\x6e\157\x74\151\143\145\163", array($this, "\155\x6f\x5f\x6f\141\x75\164\150\x5f\163\x75\143\143\x65\x73\x73\137\x6d\145\x73\x73\141\147\x65"));
    }
    public function mo_oauth_is_customer_registered()
    {
        $zZ = $this->mo_oauth_client_get_option("\x6d\157\137\x6f\141\x75\x74\150\x5f\x61\x64\x6d\151\x6e\137\x65\x6d\141\151\154");
        $ZR = $this->mo_oauth_client_get_option("\155\x6f\137\157\x61\165\164\x68\137\141\x64\155\x69\x6e\137\x63\165\163\x74\x6f\x6d\145\162\137\x6b\145\x79");
        if (!$zZ || !$ZR || !is_numeric(trim($ZR))) {
            goto l1;
        }
        return 1;
        goto lD;
        l1:
        return 0;
        lD:
    }
    public function mooauthencrypt($Ys)
    {
        $gu = $this->mo_oauth_client_get_option("\x63\x75\x73\x74\157\155\x65\x72\x5f\x74\157\153\145\156");
        if ($gu) {
            goto ri;
        }
        return "\146\141\154\163\x65";
        ri:
        $gu = str_split(str_pad('', strlen($Ys), $gu, STR_PAD_RIGHT));
        $SR = str_split($Ys);
        foreach ($SR as $Uf => $q3) {
            $h0 = ord($q3) + ord($gu[$Uf]);
            $SR[$Uf] = chr($h0 > 255 ? $h0 - 256 : $h0);
            Zh:
        }
        js:
        return base64_encode(join('', $SR));
    }
    public function mooauthdecrypt($Ys)
    {
        $Ys = base64_decode($Ys);
        $gu = $this->mo_oauth_client_get_option("\143\165\163\164\157\155\145\162\x5f\164\157\153\x65\x6e");
        if ($gu) {
            goto xU;
        }
        return "\x66\141\x6c\x73\145";
        xU:
        $gu = str_split(str_pad('', strlen($Ys), $gu, STR_PAD_RIGHT));
        $SR = str_split($Ys);
        foreach ($SR as $Uf => $q3) {
            $h0 = ord($q3) - ord($gu[$Uf]);
            $SR[$Uf] = chr($h0 < 0 ? $h0 + 256 : $h0);
            c3:
        }
        qB:
        return join('', $SR);
    }
    public function mo_oauth_check_empty_or_null($GT)
    {
        if (!(!isset($GT) || empty($GT))) {
            goto BR;
        }
        return true;
        BR:
        return false;
    }
    public function is_multisite_plan()
    {
        return $this->is_multisite;
    }
    public function mo_oauth_is_curl_installed()
    {
        if (in_array("\143\x75\x72\154", get_loaded_extensions())) {
            goto g2;
        }
        return 0;
        goto Md;
        g2:
        return 1;
        Md:
    }
    public function mo_oauth_show_curl_error()
    {
        if (!($this->mo_oauth_is_curl_installed() === 0)) {
            goto cZ;
        }
        $this->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\74\x61\40\150\x72\145\146\75\42\150\x74\x74\160\72\x2f\57\160\x68\x70\56\156\145\x74\57\x6d\x61\x6e\165\x61\154\57\x65\x6e\x2f\x63\165\x72\x6c\56\x69\x6e\x73\x74\x61\x6c\x6c\141\164\x69\x6f\156\56\160\x68\x70\x22\x20\x74\141\x72\x67\145\x74\75\42\x5f\142\x6c\x61\156\153\42\76\x50\110\x50\40\103\x55\122\x4c\40\145\170\x74\145\x6e\163\151\x6f\x6e\74\x2f\141\x3e\40\x69\163\40\156\157\x74\x20\151\x6e\x73\164\141\x6c\154\145\x64\40\x6f\x72\40\144\x69\x73\x61\x62\x6c\145\x64\x2e\x20\120\154\x65\141\163\145\x20\x65\156\x61\x62\x6c\145\40\151\164\x20\x74\x6f\40\x63\x6f\x6e\x74\x69\156\x75\145\56");
        $this->mo_oauth_show_error_message();
        return;
        cZ:
    }
    public function mo_oauth_is_clv()
    {
        $P1 = $this->mo_oauth_client_get_option("\x6d\157\x5f\x6f\141\165\x74\x68\137\154\166");
        $P1 = boolval($P1) ? $this->mooauthdecrypt($P1) : "\146\141\x6c\163\145";
        $P1 = !empty($this->mo_oauth_client_get_option("\x6d\157\137\x6f\x61\165\x74\x68\137\154\x6b")) && "\164\162\165\145" === $P1 ? 1 : 0;
        if (!($P1 === 0)) {
            goto ak;
        }
        return $this->verify_lk();
        ak:
        return $P1;
    }
    public function mo_oauth_hbca_xyake()
    {
        if ($this->mo_oauth_is_customer_registered()) {
            goto Oi;
        }
        return false;
        Oi:
        if ($this->mo_oauth_client_get_option("\x6d\157\x5f\x6f\141\x75\164\x68\x5f\x61\x64\x6d\x69\156\x5f\x63\165\x73\x74\x6f\155\145\x72\137\x6b\x65\171") > 138200) {
            goto rL;
        }
        return false;
        goto gk;
        rL:
        return true;
        gk:
    }
    public function get_default_app($SD, $cK = false)
    {
        if ($SD) {
            goto Sj;
        }
        return false;
        Sj:
        $fV = false;
        $LO = file_get_contents(MOC_DIR . "\162\x65\x73\157\165\162\x63\145\163\x2f\x61\x70\x70\137\x63\x6f\155\x70\157\156\145\x6e\x74\163\57\x64\145\x66\141\165\154\164\141\160\x70\x73\56\152\x73\x6f\x6e", true);
        $oh = json_decode($LO, $cK);
        foreach ($oh as $gy => $C3) {
            if (!($gy === $SD)) {
                goto NJ;
            }
            if ($cK) {
                goto Fm;
            }
            $C3->appId = $gy;
            goto C9;
            Fm:
            $C3["\x61\160\x70\x49\144"] = $gy;
            C9:
            return $C3;
            NJ:
            Vp:
        }
        tq:
        return false;
    }
    public function get_plugin_config()
    {
        $sC = $this->mo_oauth_client_get_option("\x6d\157\x5f\x6f\x61\165\164\150\x5f\143\x6c\151\x65\156\164\137\x63\x6f\156\146\x69\147");
        return !$sC || empty($sC) ? new Config(array()) : $sC;
    }
    public function get_app_list()
    {
        return $this->mo_oauth_client_get_option("\155\x6f\137\x6f\x61\165\164\150\137\x61\160\x70\163\137\154\151\163\x74") ? $this->mo_oauth_client_get_option("\x6d\157\x5f\157\141\x75\164\150\x5f\x61\x70\x70\163\137\154\x69\x73\164") : false;
    }
    public function get_app_by_name($Mg = '')
    {
        $G5 = $this->get_app_list();
        if ($G5) {
            goto E8;
        }
        return false;
        E8:
        if (!('' === $Mg || false === $Mg)) {
            goto xn;
        }
        $CD = array_values($G5);
        return isset($CD[0]) ? $CD[0] : false;
        xn:
        foreach ($G5 as $Vi => $kL) {
            if (!($Mg === $Vi)) {
                goto CF;
            }
            return $kL;
            CF:
            ZT:
        }
        va:
        return false;
    }
    public function get_default_app_by_code_name($Mg = '')
    {
        $G5 = $this->mo_oauth_client_get_option("\x6d\x6f\x5f\x6f\141\165\164\150\137\141\x70\160\x73\137\154\x69\163\x74") ? $this->mo_oauth_client_get_option("\x6d\157\137\x6f\x61\165\x74\150\137\141\160\160\163\137\154\x69\x73\164") : false;
        if ($G5) {
            goto vk;
        }
        return false;
        vk:
        if (!('' === $Mg)) {
            goto AZ;
        }
        $CD = array_values($G5);
        return isset($CD[0]) ? $CD[0] : false;
        AZ:
        foreach ($G5 as $Vi => $kL) {
            $aq = $kL->get_app_name();
            if (!($Mg === $aq)) {
                goto el;
            }
            return $this->get_default_app($kL->get_app_config("\141\x70\160\x5f\164\171\x70\x65"), true);
            el:
            UO:
        }
        Ow:
        return false;
    }
    public function set_app_by_name($Mg, $BD)
    {
        $G5 = $this->mo_oauth_client_get_option("\x6d\157\137\x6f\x61\165\x74\150\137\141\160\160\163\137\154\151\x73\x74") ? $this->mo_oauth_client_get_option("\155\157\137\157\141\165\x74\150\137\141\160\160\x73\137\154\x69\x73\164") : false;
        if ($G5) {
            goto iR;
        }
        return false;
        iR:
        foreach ($G5 as $Vi => $kL) {
            if (!($Mg === $Vi)) {
                goto R2;
            }
            $G5[$Vi] = new App($BD);
            $G5[$Vi]->set_app_name($Vi);
            $this->mo_oauth_client_update_option("\x6d\157\137\157\x61\x75\x74\x68\x5f\141\160\x70\163\x5f\x6c\151\x73\164", $G5);
            return true;
            R2:
            bn:
        }
        Um:
        return false;
    }
    public function mo_oauth_jhuyn_jgsukaj($rz, $dA)
    {
        return $this->mo_oauth_jkhuiysuayhbw($rz, $dA);
    }
    public function mo_oauth_jkhuiysuayhbw($ep, $Bj)
    {
        $Qj = 0;
        $dS = false;
        $YP = $this->mo_oauth_client_get_option("\155\x6f\137\157\141\x75\x74\x68\137\141\165\x74\x68\157\x72\151\172\141\x74\x69\x6f\156\x73");
        if (empty($YP)) {
            goto TZ;
        }
        $Qj = $this->mo_oauth_client_get_option("\x6d\157\x5f\157\x61\165\164\x68\137\x61\x75\164\x68\x6f\162\151\x7a\x61\x74\151\x6f\x6e\x73");
        TZ:
        $user = $this->mo_oauth_hjsguh_kiishuyauh878gs($ep, $Bj);
        if (!$user) {
            goto St;
        }
        ++$Qj;
        St:
        $this->mo_oauth_client_update_option("\x6d\x6f\137\x6f\141\165\x74\150\137\141\165\x74\x68\157\162\151\172\141\164\151\x6f\156\163", $Qj);
        if (!($Qj >= 10)) {
            goto aT;
        }
        $DD = base64_decode("bW9fb2F1dGhfZmxhZw==");
        $this->mo_oauth_client_update_option($DD, true);
        aT:
        return $user;
    }
    public function mo_oauth_hjsguh_kiishuyauh878gs($zZ, $nU)
    {
        $Sp = 10;
        $Qb = false;
        $Un = false;
        $sC = apply_filters("\155\157\137\x6f\x61\165\x74\150\137\160\141\163\163\167\x6f\x72\144\x5f\160\157\x6c\x69\143\171\x5f\155\141\x6e\x61\147\145\162", $Sp);
        if (!is_array($sC)) {
            goto o9;
        }
        $Sp = intval($sC["\x70\141\x73\x73\x77\157\x72\144\x5f\x6c\x65\x6e\147\x74\150"]);
        $Qb = $sC["\163\x70\145\x63\151\x61\154\x5f\x63\x68\141\162\x61\x63\x74\x65\162\x73"];
        $Un = $sC["\145\x78\x74\162\x61\137\163\160\x65\143\151\141\154\x5f\143\x68\x61\162\141\x63\164\145\x72\163"];
        o9:
        $Yg = wp_generate_password($Sp, $Qb, $Un);
        $he = is_email($zZ) ? wp_create_user($zZ, $Yg, $zZ) : wp_create_user($zZ, $Yg);
        $mz = array("\111\x44" => $he, "\165\x73\x65\x72\x5f\x65\155\141\x69\x6c" => $zZ, "\165\163\145\x72\x5f\154\x6f\x67\151\x6e" => $nU, "\x75\163\x65\x72\137\x6e\151\143\145\x6e\141\155\145" => $nU, "\146\x69\x72\x73\x74\137\x6e\141\155\145" => $nU);
        do_action("\x75\x73\145\162\137\162\x65\147\151\x73\164\145\x72", $he, $mz);
        $user = get_user_by("\154\x6f\147\151\156", $zZ);
        wp_update_user(array("\111\104" => $he, "\146\151\162\163\164\x5f\156\x61\x6d\145" => $nU));
        return $user;
    }
    public function check_versi($JL)
    {
        return $this->get_versi() >= $JL;
    }
    public function is_multisite_versi()
    {
        return $this->get_versi() >= 6 || $this->get_versi() == 3;
    }
    public function get_versi()
    {
        return VERSION === "\155\x6f\x5f\x6d\165\154\x74\x69\163\x69\164\x65\x5f\x61\154\x6c\x5f\151\156\143\x6c\x75\163\151\x76\x65\137\166\145\x72\163\x69\157\x6e" ? self::ALL_INCLUSIVE_MULTISITE : (VERSION === "\x6d\x6f\137\155\x75\154\x74\151\163\x69\164\145\x5f\160\x72\145\155\151\x75\x6d\137\166\145\x72\163\151\157\156" ? self::MULTISITE_PREMIUM : (VERSION === "\x6d\x6f\137\155\x75\154\164\x69\x73\151\x74\145\137\x65\156\164\x65\x72\160\162\151\x73\x65\137\x76\145\x72\163\x69\157\156" ? self::MULTISITE_ENTERPRISE : (VERSION === "\x6d\157\x5f\x61\x6c\154\137\x69\156\x63\154\165\163\x69\166\x65\137\166\145\x72\163\x69\x6f\156" ? self::ALL_INCLUSIVE_SINGLE_SITE : (VERSION === "\x6d\157\x5f\145\156\x74\x65\x72\160\162\x69\x73\145\x5f\x76\145\162\x73\151\x6f\156" ? self::ENTERPRISE : (VERSION === "\155\x6f\x5f\x70\162\x65\x6d\x69\x75\x6d\137\166\145\x72\163\151\x6f\x6e" ? self::PREMIUM : (VERSION === "\155\x6f\137\x73\164\141\x6e\x64\141\162\x64\137\x76\145\162\163\151\157\156" ? self::STANDARD : self::FREE))))));
    }
    public function get_plan_type_versi()
    {
        switch ($this->get_versi()) {
            case self::ALL_INCLUSIVE_MULTISITE:
                return "\101\x4c\x4c\137\x49\x4e\x43\x4c\x55\x53\x49\x56\x45\x5f\115\x55\114\x54\x49\x53\111\x54\x45";
            case self::MULTISITE_PREMIUM:
                return "\x4d\x55\114\124\111\123\111\x54\x45\137\x50\122\x45\x4d\111\x55\115";
            case self::MULTISITE_ENTERPRISE:
                return "\115\x55\114\124\111\x53\111\x54\x45\137\105\116\124\105\x52\120\122\111\x53\105";
            case self::ALL_INCLUSIVE_SINGLE_SITE:
                return "\x45\x4e\124\105\122\x50\x52\x49\123\x45";
            case self::ENTERPRISE:
                return "\105\116\124\105\122\120\122\111\x53\105";
            case self::PREMIUM:
                return '';
            case self::STANDARD:
                return "\123\124\x41\116\x44\101\x52\x44";
            case self::FREE:
            default:
                return "\x46\122\105\105";
        }
        Fk:
        sM:
    }
    public function get_versi_str()
    {
        switch ($this->get_versi()) {
            case self::ALL_INCLUSIVE_MULTISITE:
                return "\x41\x4c\x4c\x5f\111\x4e\x43\x4c\125\123\x49\x56\105\x5f\x4d\125\x4c\124\x49\x53\111\x54\x45";
            case self::MULTISITE_PREMIUM:
                return "\x4d\125\x4c\124\111\x53\111\124\105\x5f\120\x52\105\115\x49\x55\115";
            case self::MULTISITE_ENTERPRISE:
                return "\x4d\x55\114\124\x49\x53\111\x54\105\137\x45\x4e\x54\105\122\120\122\111\x53\105";
            case self::ALL_INCLUSIVE_SINGLE_SITE:
                return "\101\x4c\114\x5f\111\116\x43\114\x55\x53\x49\x56\105\137\123\111\x4e\107\114\105\x5f\x53\x49\x54\x45";
            case self::ENTERPRISE:
                return "\x45\x4e\x54\105\x52\x50\x52\x49\x53\x45";
            case self::PREMIUM:
                return "\120\122\105\x4d\111\125\x4d";
            case self::STANDARD:
                return "\123\x54\101\x4e\x44\101\122\104";
            case self::FREE:
            default:
                return "\106\122\105\105";
        }
        RP:
        iv:
    }
    public function mo_oauth_client_get_option($Vi, $Ly = false)
    {
        $GT = getenv(strtoupper($Vi));
        if (!$GT) {
            goto E9;
        }
        $GT = EnvVarResolver::resolve_var($Vi, $GT);
        goto oz;
        E9:
        $GT = is_multisite() && $this->is_multisite ? get_site_option($Vi, $Ly) : get_option($Vi, $Ly);
        oz:
        if (!(!$GT || $Ly == $GT)) {
            goto Ip;
        }
        return $Ly;
        Ip:
        return $GT;
    }
    public function mo_oauth_client_update_option($Vi, $GT)
    {
        return is_multisite() && $this->is_multisite ? update_site_option($Vi, $GT) : update_option($Vi, $GT);
    }
    public function mo_oauth_client_delete_option($Vi)
    {
        return is_multisite() && $this->is_multisite ? delete_site_option($Vi) : delete_option($Vi);
    }
    public function array_overwrite($DG, $aw, $WE)
    {
        if ($WE) {
            goto JX;
        }
        array_push($DG, $aw);
        return array_unique($DG);
        JX:
        foreach ($aw as $Vi => $GT) {
            $DG[$Vi] = $GT;
            te:
        }
        vO:
        return $DG;
    }
    public function gen_rand_str($Sp = 10)
    {
        $Sw = "\x61\x62\x63\144\x65\x66\147\x68\151\x6a\153\154\155\156\157\160\161\162\x73\x74\165\x76\x77\x78\171\x7a\101\x42\103\104\x45\106\107\x48\x49\112\113\114\115\116\117\120\121\122\123\x54\x55\126\127\130\131\132";
        $WN = strlen($Sw);
        $zD = '';
        $hn = 0;
        Th:
        if (!($hn < $Sp)) {
            goto qD;
        }
        $zD .= $Sw[rand(0, $WN - 1)];
        Xi:
        $hn++;
        goto Th;
        qD:
        return $zD;
    }
    public function parse_url($im)
    {
        $fV = array();
        $nL = explode("\77", $im);
        $fV["\x68\x6f\x73\x74"] = $nL[0];
        $fV["\161\x75\x65\162\171"] = isset($nL[1]) && '' !== $nL[1] ? $nL[1] : '';
        if (!(empty($fV["\161\x75\145\x72\171"]) || '' === $fV["\x71\165\145\162\171"])) {
            goto da;
        }
        return $fV;
        da:
        $OG = [];
        foreach (explode("\x26", $fV["\x71\165\x65\x72\171"]) as $Pq) {
            $nL = explode("\x3d", $Pq);
            if (!(is_array($nL) && count($nL) === 2)) {
                goto Na;
            }
            $OG[str_replace("\141\155\160\73", '', $nL[0])] = $nL[1];
            Na:
            if (!(is_array($nL) && "\163\164\x61\164\x65" === $nL[0])) {
                goto Bd;
            }
            $nL = explode("\x73\164\141\164\x65\x3d", $Pq);
            $OG["\163\164\x61\164\x65"] = $nL[1];
            Bd:
            Ts:
        }
        sk:
        $fV["\161\165\145\x72\171"] = is_array($OG) && !empty($OG) ? $OG : [];
        return $fV;
    }
    public function generate_url($SU)
    {
        if (!(!is_array($SU) || empty($SU))) {
            goto eh;
        }
        return '';
        eh:
        if (isset($SU["\150\157\163\x74"])) {
            goto S2;
        }
        return '';
        S2:
        $im = $SU["\150\x6f\163\x74"];
        $I7 = '';
        $hn = 0;
        foreach ($SU["\x71\165\x65\x72\171"] as $CM => $GT) {
            if (!($hn !== 0)) {
                goto Yv;
            }
            $I7 .= "\x26";
            Yv:
            $I7 .= "{$CM}\x3d{$GT}";
            $hn += 1;
            Hd:
        }
        tS:
        return $im . "\x3f" . $I7;
    }
    public function getnestedattribute($gF, $Vi)
    {
        if (!($Vi == '')) {
            goto Sr;
        }
        return '';
        Sr:
        if (!filter_var($Vi, FILTER_VALIDATE_URL)) {
            goto iK;
        }
        if (isset($gF[$Vi])) {
            goto O3;
        }
        return '';
        goto d9;
        O3:
        return $gF[$Vi];
        d9:
        iK:
        $NW = explode("\x2e", $Vi);
        if (count($NW) > 1) {
            goto ZC;
        }
        if (isset($gF[$Vi]) && is_array($gF[$Vi])) {
            goto Fz;
        }
        $qQ = $NW[0];
        if (isset($gF[$qQ])) {
            goto lK;
        }
        return '';
        goto Dp;
        lK:
        if (is_array($gF[$qQ])) {
            goto Cn;
        }
        return $gF[$qQ];
        goto Jh;
        Cn:
        return $gF[$qQ][0];
        Jh:
        Dp:
        goto oA;
        Fz:
        if (!(count($gF[$Vi]) > 1)) {
            goto KD;
        }
        return $gF[$Vi];
        KD:
        if (!isset($gF[$Vi][0])) {
            goto rd;
        }
        return $gF[$Vi][0];
        rd:
        if (!is_array($gF[$Vi])) {
            goto RB;
        }
        return array_key_first($gF[$Vi]);
        RB:
        oA:
        goto vf;
        ZC:
        $qQ = $NW[0];
        if (!isset($gF[$qQ])) {
            goto qJ;
        }
        $g5 = array_count_values($NW);
        if (!($g5[$qQ] > 1)) {
            goto WP;
        }
        $Vi = substr_replace($Vi, '', 0, strlen($qQ));
        $Vi = trim($Vi, "\56");
        return $this->getnestedattribute($gF[$qQ], $Vi);
        WP:
        return $this->getnestedattribute($gF[$qQ], str_replace($qQ . "\x2e", '', $Vi));
        qJ:
        vf:
    }
    public function get_client_ip()
    {
        $Ni = '';
        if (getenv("\110\x54\x54\120\137\103\x4c\x49\105\x4e\x54\137\111\120")) {
            goto X6;
        }
        if (getenv("\110\x54\x54\120\137\x58\x5f\106\x4f\122\127\101\122\104\105\x44\x5f\106\x4f\x52")) {
            goto w1;
        }
        if (getenv("\x48\124\x54\120\x5f\x58\x5f\106\x4f\x52\x57\x41\122\x44\x45\x44")) {
            goto cq;
        }
        if (getenv("\110\x54\x54\x50\x5f\106\117\x52\127\101\122\104\x45\104\x5f\106\x4f\122")) {
            goto uX;
        }
        if (getenv("\x48\124\124\120\x5f\x46\117\x52\x57\x41\122\x44\105\x44")) {
            goto bR;
        }
        if (getenv("\x52\x45\x4d\117\124\105\137\101\104\x44\122")) {
            goto OL;
        }
        $Ni = "\125\116\x4b\x4e\x4f\127\x4e";
        goto GB;
        X6:
        $Ni = getenv("\x48\124\124\x50\x5f\103\x4c\x49\x45\116\124\x5f\x49\x50");
        goto GB;
        w1:
        $Ni = getenv("\x48\124\124\120\x5f\130\137\106\117\122\127\x41\122\x44\x45\x44\137\106\117\122");
        goto GB;
        cq:
        $Ni = getenv("\x48\124\124\x50\x5f\x58\137\106\x4f\x52\127\101\122\x44\x45\x44");
        goto GB;
        uX:
        $Ni = getenv("\110\x54\124\120\x5f\x46\x4f\x52\127\101\x52\104\x45\104\x5f\x46\x4f\122");
        goto GB;
        bR:
        $Ni = getenv("\110\x54\124\x50\137\x46\x4f\x52\127\101\x52\x44\x45\x44");
        goto GB;
        OL:
        $Ni = getenv("\x52\105\115\117\124\105\137\x41\104\x44\122");
        GB:
        return $Ni;
    }
    public function get_current_url()
    {
        return (isset($_SERVER["\110\x54\124\x50\x53"]) ? "\150\x74\x74\x70\163" : "\150\x74\x74\160") . "\x3a\x2f\57{$_SERVER["\110\124\x54\120\137\x48\x4f\123\124"]}{$_SERVER["\122\105\x51\125\x45\x53\124\x5f\x55\122\111"]}";
    }
    public function get_all_headers()
    {
        $rE = [];
        foreach ($_SERVER as $nU => $GT) {
            if (!(substr($nU, 0, 5) == "\110\124\x54\x50\x5f")) {
                goto uW;
            }
            $rE[str_replace("\40", "\x2d", ucwords(strtolower(str_replace("\137", "\x20", substr($nU, 5)))))] = $GT;
            uW:
            N3:
        }
        Bc:
        $rE = array_change_key_case($rE, CASE_UPPER);
        return $rE;
    }
    public function store_info($sm = '', $GT = false)
    {
        if (!('' === $sm || !$GT)) {
            goto cl;
        }
        return;
        cl:
        setcookie($sm, $GT);
    }
    public function redirect_user($im = false, $si = false)
    {
        if (!(false === $im)) {
            goto d0;
        }
        return;
        d0:
        if (!$si) {
            goto W9;
        }
        echo "\11\x9\11\x3c\163\x63\162\x69\x70\x74\x3e\xd\12\11\x9\11\11\166\141\162\x20\x6d\171\127\x69\156\x64\157\x77\40\x3d\40\x77\x69\156\x64\157\x77\x2e\x6f\160\145\x6e\50\42";
        echo $im;
        echo "\42\x2c\40\x22\x54\x65\163\x74\x20\103\157\x6e\146\151\x67\165\x72\x61\164\x69\x6f\156\x22\x2c\x20\42\x77\151\x64\x74\x68\75\66\60\60\54\x20\150\x65\151\x67\150\164\x3d\x36\60\60\x22\x29\73\15\12\11\x9\x9\11\167\150\151\x6c\145\50\x31\x29\x20\x7b\15\xa\11\x9\x9\11\11\151\146\x28\x6d\171\x57\151\x6e\144\157\167\x2e\143\154\x6f\163\145\144\50\51\51\x20\x7b\xd\xa\x9\x9\11\x9\x9\x9\x24\x28\144\157\x63\165\155\145\156\x74\51\56\164\162\151\x67\147\x65\162\50\x22\x63\157\x6e\x66\151\x67\x5f\164\145\x73\164\145\x64\x22\51\73\15\xa\11\x9\11\11\11\x9\x62\x72\145\141\x6b\73\xd\xa\x9\x9\11\11\11\x7d\x20\x65\x6c\163\x65\x20\x7b\x63\157\156\x74\x69\x6e\165\145\73\x7d\15\12\x9\x9\11\x9\175\xd\xa\x9\x9\x9\74\57\x73\x63\162\x69\x70\x74\x3e\xd\12\11\11\x9";
        W9:
        echo "\11\11\74\163\143\x72\x69\160\x74\x3e\15\12\x9\11\11\x77\151\x6e\144\x6f\x77\56\x6c\x6f\143\x61\164\151\x6f\156\x2e\162\x65\x70\154\x61\143\145\x28\42";
        echo $im;
        echo "\x22\x29\x3b\15\xa\11\11\74\57\163\143\162\x69\x70\164\x3e\xd\xa\11\x9";
        exit;
    }
    public function is_ajax_request()
    {
        return defined("\x44\117\x49\x4e\107\137\x41\x4a\101\130") && DOING_AJAX;
    }
    public function deactivate_plugin()
    {
        $this->mo_oauth_client_delete_option("\x68\x6f\x73\164\x5f\156\141\155\x65");
        $this->mo_oauth_client_delete_option("\156\145\167\137\162\145\147\x69\163\164\162\x61\164\x69\157\x6e");
        $this->mo_oauth_client_delete_option("\x6d\x6f\137\x6f\x61\165\x74\x68\x5f\x61\x64\155\151\156\x5f\x70\150\x6f\x6e\x65");
        $this->mo_oauth_client_delete_option("\x76\145\162\x69\146\171\x5f\x63\x75\163\x74\157\155\145\162");
        $this->mo_oauth_client_delete_option("\x6d\x6f\137\x6f\141\165\x74\150\x5f\141\x64\x6d\151\156\137\143\165\163\x74\x6f\155\x65\x72\x5f\x6b\145\171");
        $this->mo_oauth_client_delete_option("\155\157\x5f\x6f\141\x75\164\150\137\141\x64\155\151\156\x5f\x61\160\151\137\x6b\x65\x79");
        $this->mo_oauth_client_delete_option("\x6d\x6f\137\157\141\x75\x74\x68\137\156\145\167\137\x63\165\163\x74\x6f\x6d\x65\x72");
        $this->mo_oauth_client_delete_option("\143\165\163\164\157\x6d\x65\x72\x5f\x74\157\153\145\x6e");
        $this->mo_oauth_client_delete_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION);
        $this->mo_oauth_client_delete_option("\155\x6f\137\x6f\x61\165\x74\150\x5f\162\145\x67\x69\x73\164\x72\x61\164\x69\157\156\137\163\x74\x61\x74\x75\x73");
        $this->mo_oauth_client_delete_option("\155\157\137\x6f\x61\165\x74\150\x5f\x6e\145\x77\137\x63\x75\x73\x74\157\155\x65\162");
        $this->mo_oauth_client_delete_option("\x6e\x65\x77\x5f\162\145\x67\151\163\x74\162\141\164\151\157\x6e");
        $this->mo_oauth_client_delete_option("\x6d\x6f\x5f\157\141\x75\164\x68\x5f\x6c\157\147\x69\x6e\x5f\151\143\x6f\x6e\137\x63\165\x73\164\157\x6d\137\150\x65\x69\147\150\x74");
        $this->mo_oauth_client_delete_option("\x6d\x6f\x5f\x6f\141\x75\x74\150\137\154\x6f\147\x69\156\137\151\x63\x6f\x6e\137\143\x75\x73\x74\157\155\137\163\x69\x7a\x65");
        $this->mo_oauth_client_delete_option("\x6d\157\x5f\157\141\165\x74\150\x5f\x6c\157\147\x69\156\x5f\x69\143\157\156\137\143\x75\x73\164\157\155\x5f\x63\x6f\154\x6f\x72");
        $this->mo_oauth_client_delete_option("\x6d\x6f\x5f\x6f\x61\165\x74\150\x5f\154\157\x67\151\156\x5f\x69\x63\x6f\x6e\137\143\165\163\164\157\x6d\x5f\x62\x6f\x75\x6e\144\x61\x72\171");
    }
    public function base64url_encode($pY)
    {
        return rtrim(strtr(base64_encode($pY), "\x2b\x2f", "\x2d\x5f"), "\x3d");
    }
    public function base64url_decode($pY)
    {
        return base64_decode(str_pad(strtr($pY, "\x2d\x5f", "\53\57"), strlen($pY) % 4, "\75", STR_PAD_RIGHT));
    }
    function export_plugin_config($rA = false)
    {
        $ty = [];
        $uA = [];
        $x7 = [];
        $ty = $this->get_plugin_config();
        $uA = get_site_option("\155\x6f\137\157\x61\x75\x74\150\x5f\x61\x70\x70\x73\137\154\x69\163\x74");
        if (empty($ty)) {
            goto Da;
        }
        $ty = $ty->get_current_config();
        Da:
        if (!is_array($uA)) {
            goto cS;
        }
        foreach ($uA as $Xr => $BD) {
            if (!is_array($BD)) {
                goto z_;
            }
            $BD = new App($BD);
            z_:
            $WA = $BD->get_app_config('', false);
            if (!$rA) {
                goto iP;
            }
            unset($WA["\x63\154\151\x65\156\x74\137\151\144"]);
            unset($WA["\143\x6c\x69\145\x6e\164\137\163\145\x63\162\145\x74"]);
            iP:
            $x7[$Xr] = $WA;
            hZ:
        }
        a9:
        cS:
        $IZ = ["\x70\154\x75\147\151\156\137\143\x6f\156\146\x69\x67" => $ty, "\141\x70\160\137\x63\x6f\x6e\x66\x69\147\x73" => $x7];
        $IZ = apply_filters("\155\x6f\137\x74\x72\x5f\x67\x65\164\x5f\154\x69\x63\x65\x6e\x73\145\137\143\x6f\x6e\x66\x69\147", $IZ);
        return $IZ;
    }
    private function verify_lk()
    {
        $qa = new \MoOauthClient\Standard\Customer();
        $Yt = $this->mo_oauth_client_get_option("\x6d\157\137\x6f\141\165\164\x68\x5f\154\151\143\x65\x6e\x73\x65\137\153\145\171");
        if (!empty($Yt)) {
            goto AG;
        }
        return 0;
        AG:
        $Cz = $qa->XfskodsfhHJ($Yt);
        $Cz = json_decode($Cz, true);
        return isset($Cz["\x73\x74\141\x74\x75\x73"]) && "\123\125\x43\103\105\123\x53" === $Cz["\163\x74\x61\x74\x75\x73"];
    }
    public function is_valid_jwt($M3 = '')
    {
        $nL = explode("\56", $M3);
        if (!(count($nL) === 3)) {
            goto Y1;
        }
        return true;
        Y1:
        return false;
    }
    public function validate_appslist($G5)
    {
        if (is_array($G5)) {
            goto za;
        }
        return false;
        za:
        foreach ($G5 as $Vi => $kL) {
            if (!$kL instanceof \MoOauthClient\App) {
                goto ld;
            }
            goto PQ;
            ld:
            return false;
            PQ:
        }
        mL:
        return true;
    }
    public function handle_error($TM)
    {
        do_action("\x6d\157\x5f\x74\162\x5f\154\157\147\x69\156\137\x65\162\x72\x6f\162\163", $TM);
    }
    public function set_transient($Vi, $GT, $AI)
    {
        return is_multisite() && $this->is_multisite ? set_site_transient($Vi, $GT, $AI) : set_transient($Vi, $GT, $AI);
    }
    public function get_transient($Vi)
    {
        return is_multisite() && $this->is_multisite ? get_site_transient($Vi) : get_transient($Vi);
    }
    public function delete_transient($Vi)
    {
        return is_multisite() && $this->is_multisite ? delete_site_transient($Vi) : delete_transient($Vi);
    }
}
