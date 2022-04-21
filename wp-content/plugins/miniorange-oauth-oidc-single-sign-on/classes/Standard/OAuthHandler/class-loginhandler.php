<?php


namespace MoOauthClient\Standard;

use MoOauthClient\LoginHandler as FreeLoginHandler;
use MoOauthClient\Config;
use MoOauthClient\StorageManager;
use MoOauthClient\MO_Oauth_Debug;
class LoginHandler extends FreeLoginHandler
{
    public $config;
    public function handle_group_test_conf($Nm = array(), $BD = array(), $u1 = '', $kq = false, $af = false)
    {
        global $vj;
        $this->render_test_config_output($Nm, false);
        if (!(!isset($BD["\x67\x72\157\x75\160\x64\145\164\x61\151\154\x73\165\162\x6c"]) || '' === $BD["\147\162\157\x75\x70\144\x65\164\x61\151\x6c\163\165\162\x6c"])) {
            goto ROE;
        }
        return;
        ROE:
        $VP = [];
        $Z_ = $BD["\x67\162\157\x75\160\x64\x65\164\x61\x69\154\163\165\x72\154"];
        if (!(strpos($Z_, "\141\160\x69\x2e\x63\154\x65\x76\145\162\x2e\x63\157\x6d") != false && isset($Nm["\144\141\x74\x61"]["\x69\x64"]))) {
            goto YQz;
        }
        $Z_ = str_replace("\165\163\145\x72\x69\x64", $Nm["\144\x61\x74\x61"]["\151\144"], $Z_);
        YQz:
        MO_Oauth_Debug::mo_oauth_log("\x47\x72\x6f\165\160\x20\104\x65\x74\x61\x69\x6c\163\x20\125\122\114\x3a\40" . $Z_);
        if (!('' === $u1)) {
            goto KRf;
        }
        if (has_filter("\x6d\157\x5f\x6f\141\x75\x74\x68\x5f\x63\x66\x61\x5f\147\x72\x6f\165\160\137\x64\x65\x74\141\151\154\x73")) {
            goto th6;
        }
        MO_Oauth_Debug::mo_oauth_log("\101\x63\x63\145\x73\163\40\124\157\153\x65\x6e\40\105\x6d\x70\164\171");
        return;
        th6:
        KRf:
        if (!('' !== $Z_)) {
            goto fLO;
        }
        if (has_filter("\155\157\137\157\x61\165\x74\150\x5f\x63\146\141\x5f\x67\x72\157\165\160\x5f\x64\145\164\141\151\x6c\x73")) {
            goto EAC;
        }
        if (has_filter("\x6d\x6f\x5f\x6f\x61\165\164\150\137\147\x72\x6f\165\x70\x5f\144\x65\x74\141\151\x6c\163")) {
            goto RRw;
        }
        if (has_filter("\155\x6f\137\x6f\141\165\x74\x68\x5f\x72\x61\x76\145\156\x5f\x67\162\157\165\x70\137\x64\145\x74\141\x69\x6c\x73")) {
            goto S8C;
        }
        $VP = $this->oauth_handler->get_resource_owner($Z_, $u1);
        goto yA9;
        S8C:
        $VP = apply_filters("\155\157\x5f\x6f\x61\165\164\x68\x5f\x72\141\166\x65\156\x5f\x67\162\157\165\160\x5f\144\145\164\x61\151\154\163", $Nm["\145\x6d\141\151\x6c"], $Z_, $u1, $BD, $kq);
        yA9:
        goto Py6;
        RRw:
        $VP = apply_filters("\x6d\157\137\157\141\165\x74\150\137\147\x72\157\165\160\137\x64\x65\x74\141\151\154\x73", $Z_, $u1, $BD, $kq);
        Py6:
        goto eyj;
        EAC:
        MO_Oauth_Debug::mo_oauth_log("\106\145\x74\143\150\151\x6e\x67\40\103\106\x41\x20\x47\x72\157\x75\160\x2e\x2e");
        $VP = apply_filters("\155\157\x5f\x6f\141\165\x74\x68\137\143\146\x61\137\x67\162\157\165\160\137\x64\x65\164\x61\x69\154\163", $Nm, $Z_, $u1, $BD, $kq);
        eyj:
        $qP = $vj->mo_oauth_client_get_option("\155\157\x5f\157\141\165\164\x68\x5f\x61\164\x74\x72\x5f\x6e\x61\155\x65\137\154\x69\x73\164" . $BD["\x61\160\160\111\144"]);
        $PR = [];
        $hy = $this->dropdownattrmapping('', $VP, $PR);
        $qP = (array) $qP + $hy;
        $vj->mo_oauth_client_update_option("\155\x6f\137\x6f\x61\165\x74\150\137\x61\x74\x74\x72\137\x6e\141\155\x65\137\x6c\151\x73\x74" . $BD["\141\160\x70\x49\144"], $qP);
        if (!($af && '' !== $af)) {
            goto u2p;
        }
        if (!(is_array($VP) && !empty($VP))) {
            goto Zl1;
        }
        $this->render_test_config_output($VP, true);
        Zl1:
        return;
        u2p:
        fLO:
    }
    public function handle_group_user_info($Nm, $BD, $u1)
    {
        if (!(!isset($BD["\147\x72\x6f\x75\160\144\x65\164\141\x69\x6c\x73\165\162\154"]) || '' === $BD["\x67\162\157\165\160\144\x65\164\x61\x69\154\x73\x75\162\154"])) {
            goto om9;
        }
        return $Nm;
        om9:
        $Z_ = $BD["\x67\x72\157\165\160\x64\x65\x74\x61\151\154\163\x75\162\154"];
        if (!(strpos($Z_, "\x61\x70\151\x2e\143\x6c\x65\166\145\162\56\143\157\155") != false && isset($Nm["\144\x61\164\141"]["\x69\144"]))) {
            goto m2f;
        }
        $Z_ = str_replace("\x75\163\145\162\x69\x64", $Nm["\x64\x61\x74\x61"]["\151\x64"], $Z_);
        m2f:
        if (!('' === $u1)) {
            goto kde;
        }
        return $Nm;
        kde:
        $VP = array();
        if (!('' !== $Z_)) {
            goto nES;
        }
        if (has_filter("\155\x6f\137\x6f\141\165\164\150\x5f\x63\146\x61\137\147\x72\x6f\165\x70\x5f\144\x65\164\x61\x69\154\163")) {
            goto SqT;
        }
        if (has_filter("\155\x6f\137\x6f\141\165\164\x68\137\147\162\157\x75\160\x5f\x64\145\164\x61\x69\154\163")) {
            goto br4;
        }
        if (has_filter("\155\157\x5f\157\141\x75\164\x68\137\162\141\166\145\x6e\x5f\x67\x72\157\165\x70\137\144\145\164\141\x69\x6c\163")) {
            goto T_u;
        }
        $VP = $this->oauth_handler->get_resource_owner($Z_, $u1);
        goto Ydj;
        T_u:
        $VP = apply_filters("\155\x6f\x5f\x6f\x61\165\164\150\x5f\162\141\166\145\x6e\x5f\x67\x72\x6f\165\x70\x5f\x64\x65\164\141\151\x6c\163", $Nm["\x65\x6d\141\151\x6c"], $Z_, $u1, $BD, $kq);
        Ydj:
        goto NyL;
        br4:
        $VP = apply_filters("\x6d\157\x5f\157\141\165\x74\x68\x5f\147\162\157\x75\160\137\x64\x65\x74\141\x69\x6c\x73", $Z_, $u1, $BD);
        NyL:
        goto g2B;
        SqT:
        MO_Oauth_Debug::mo_oauth_log("\x46\x65\164\x63\x68\151\156\147\x20\x43\106\x41\x20\x47\162\x6f\x75\160\56\x2e");
        $VP = apply_filters("\x6d\x6f\137\157\141\x75\x74\150\137\143\x66\x61\137\147\162\x6f\x75\x70\x5f\x64\x65\x74\x61\151\154\163", $Nm, $Z_, $u1, $BD, $kq);
        g2B:
        nES:
        MO_Oauth_Debug::mo_oauth_log("\x47\162\x6f\x75\x70\40\x44\x65\164\141\151\x6c\x73\40\75\76\x20");
        MO_Oauth_Debug::mo_oauth_log($VP);
        if (!(is_array($VP) && count($VP) > 0)) {
            goto Qam;
        }
        $Nm = array_merge_recursive($Nm, $VP);
        Qam:
        MO_Oauth_Debug::mo_oauth_log("\122\x65\163\x6f\x75\x72\x63\x65\x20\x4f\x77\156\x65\162\40\x41\146\164\145\162\x20\155\145\162\147\151\x6e\147\x20\x77\151\164\x68\40\107\162\x6f\165\160\x20\144\145\x74\151\x61\154\x73\40\75\76\40");
        MO_Oauth_Debug::mo_oauth_log($Nm);
        return $Nm;
    }
    public function mo_oauth_client_map_default_role($he, $BD)
    {
        $B8 = new \WP_User($he);
        if (!(isset($BD["\145\x6e\x61\x62\x6c\145\x5f\x72\157\154\145\x5f\155\x61\160\160\151\156\147"]) && !boolval($BD["\145\x6e\141\142\x6c\145\x5f\162\x6f\154\x65\x5f\155\141\x70\x70\151\156\147"]))) {
            goto KfF;
        }
        $B8->set_role('');
        return;
        KfF:
        if (!(isset($BD["\x5f\x6d\x61\x70\160\151\156\x67\137\166\x61\154\x75\145\137\x64\145\146\141\x75\154\x74"]) && '' !== $BD["\137\155\141\x70\160\151\x6e\x67\x5f\166\141\154\x75\x65\x5f\x64\145\146\141\165\x6c\x74"])) {
            goto gH7;
        }
        $B8->set_role($BD["\x5f\x6d\141\160\160\151\156\147\x5f\x76\x61\154\165\x65\x5f\x64\145\x66\x61\x75\x6c\x74"]);
        gH7:
    }
    public function handle_sso($gW, $BD, $Nm, $SC, $vJ, $EY = false)
    {
        global $vj;
        $YR = new StorageManager($SC);
        do_action("\155\157\x5f\157\x61\x75\164\x68\137\x6c\151\x6e\x6b\137\x64\x69\x73\x63\x6f\x72\x64\137\141\x63\143\157\x75\x6e\164", $YR, $Nm);
        $Zf = isset($BD["\165\163\145\162\156\141\155\x65\137\141\164\x74\162"]) ? $BD["\165\x73\x65\162\156\141\x6d\145\137\141\164\x74\162"] : '';
        $QO = isset($BD["\145\155\x61\x69\x6c\137\141\x74\x74\162"]) ? $BD["\x65\155\141\x69\154\137\141\x74\x74\162"] : '';
        $nW = isset($BD["\x66\151\x72\x73\164\156\x61\155\x65\x5f\x61\164\164\x72"]) ? $BD["\146\x69\162\x73\164\156\141\x6d\145\137\x61\164\x74\162"] : '';
        $Vq = isset($BD["\154\141\163\164\156\141\x6d\145\x5f\x61\164\x74\162"]) ? $BD["\x6c\141\163\164\156\141\x6d\x65\x5f\141\x74\x74\162"] : '';
        $ma = isset($BD["\144\x69\x73\x70\x6c\x61\x79\137\x61\164\164\162"]) ? $BD["\144\x69\x73\x70\x6c\x61\x79\137\x61\x74\x74\x72"] : '';
        $Z3 = $vj->getnestedattribute($Nm, $Zf);
        $zZ = $vj->getnestedattribute($Nm, $QO);
        $yp = $vj->getnestedattribute($Nm, $nW);
        $GK = $vj->getnestedattribute($Nm, $Vq);
        $VI = $Z3;
        $this->config = $vj->mo_oauth_client_get_option("\x6d\x6f\137\x6f\x61\165\164\150\137\x63\x6c\x69\x65\156\x74\137\143\x6f\156\146\x69\x67");
        $this->config = !$this->config || empty($this->config) ? array() : $this->config->get_current_config();
        $MU = isset($this->config["\x61\143\x74\151\x76\141\x74\145\137\165\163\x65\x72\x5f\141\x6e\x61\x6c\171\x74\x69\x63\163"]) ? $this->config["\x61\x63\164\x69\x76\x61\x74\145\137\x75\x73\145\x72\137\141\x6e\141\154\171\x74\x69\x63\x73"] : 0;
        $current_user = wp_get_current_user();
        if (!($current_user->ID !== 0)) {
            goto qMK;
        }
        do_action("\155\x6f\137\x6f\x61\165\x74\x68\x5f\144\151\x73\x63\x6f\x72\144\137\146\x6c\x6f\167\x5f\150\x61\x6e\144\154\145", $current_user, $vJ, $Nm);
        do_action("\x6d\157\x5f\157\141\165\x74\150\x5f\154\x6f\147\x67\145\x64\137\x69\x6e\x5f\165\163\x65\x72\x5f\x74\141\147\x5f\x75\x70\x64\141\164\145", $current_user, $vJ, $Nm);
        $k9 = get_option("\155\x6f\x5f\x64\162\x6d\x5f\163\x79\156\143\x5f\x72\x65\144\151\162\145\143\164");
        if (!(isset($k9) && $k9)) {
            goto Dyy;
        }
        wp_redirect($k9);
        exit;
        Dyy:
        qMK:
        if (empty($ma)) {
            goto Yg_;
        }
        switch ($ma) {
            case "\106\116\101\115\x45":
                $VI = $yp;
                goto kh1;
            case "\x4c\116\101\x4d\x45":
                $VI = $GK;
                goto kh1;
            case "\125\x53\x45\122\116\101\115\x45":
                $VI = $Z3;
                goto kh1;
            case "\x46\x4e\x41\x4d\x45\x5f\114\x4e\101\115\105":
                $VI = $yp . "\x20" . $GK;
                goto kh1;
            case "\114\116\x41\x4d\x45\x5f\106\x4e\x41\115\x45":
                $VI = $GK . "\40" . $yp;
            default:
                goto kh1;
        }
        Gbw:
        kh1:
        Yg_:
        if (!empty($Z3)) {
            goto XpY;
        }
        MO_Oauth_Debug::mo_oauth_log("\125\x73\x65\162\156\141\x6d\145\40\72\40" . $Z3);
        $this->check_status(array("\x6d\x73\147" => "\x55\163\145\162\156\x61\x6d\x65\x20\x6e\x6f\x74\x20\x72\x65\143\145\151\166\x65\x64\x2e\40\x43\150\x65\143\153\40\x79\x6f\x75\x72\40\x3c\x73\x74\x72\x6f\156\x67\x3e\x41\x74\x74\162\x69\x62\165\164\x65\40\x4d\141\160\x70\151\x6e\147\74\x2f\163\164\162\x6f\156\x67\x3e\40\x63\x6f\156\x66\151\147\x75\162\x61\x74\151\157\156\56", "\x63\157\144\145" => "\x55\x4e\x41\115\x45", "\x73\x74\x61\164\165\163" => false, "\x61\160\x70\154\x69\x63\x61\164\151\157\x6e" => $gW, "\145\x6d\141\x69\x6c" => '', "\165\163\145\x72\x6e\141\155\x65" => ''), $MU);
        XpY:
        if (!(!empty($zZ) && false === strpos($zZ, "\x40"))) {
            goto GcT;
        }
        $this->check_status(array("\155\x73\147" => "\x4d\141\x70\160\x65\144\40\105\x6d\x61\151\154\40\x61\164\x74\x72\x69\x62\x75\x74\145\x20\x64\x6f\x65\163\x20\x6e\157\x74\x20\x63\x6f\156\x74\141\151\156\x20\166\141\x6c\x69\144\x20\x65\x6d\141\x69\154\x2e", "\x63\x6f\144\x65" => "\105\x4d\x41\111\x4c", "\x73\x74\141\164\165\163" => false, "\x61\x70\160\154\151\143\141\x74\151\157\156" => $gW, "\x63\154\151\x65\x6e\x74\137\x69\160" => $vj->get_client_ip(), "\145\x6d\141\151\154" => $zZ, "\165\163\145\162\x6e\x61\155\x65" => $Z3), $MU);
        GcT:
        if (!is_multisite()) {
            goto YAt;
        }
        $blog_id = $YR->get_value("\142\x6c\157\147\x5f\x69\x64");
        switch_to_blog($blog_id);
        do_action("\155\157\x5f\x6f\141\x75\164\x68\137\143\x6c\151\145\x6e\164\137\x63\157\x6e\x63\x6f\x72\x64\137\162\x65\x73\164\162\151\x63\164\x5f\154\157\x67\x69\x6e", $BD, $Nm, $blog_id);
        YAt:
        do_action("\x6d\x6f\137\x6f\141\x75\164\x68\137\x72\x65\163\x74\x72\x69\143\164\137\145\x6d\x61\151\154\163", $zZ, $this->config);
        $user = get_user_by("\x6c\157\x67\x69\156", $Z3);
        $LJ = isset($BD["\141\x6c\154\x6f\x77\x5f\144\165\x70\x6c\x69\143\x61\164\x65\137\x65\x6d\x61\x69\154\x73"]) ? true : false;
        if ($user) {
            goto xMN;
        }
        if (!(!$LJ || $LJ && !$BD["\141\x6c\x6c\157\x77\137\144\165\160\x6c\x69\x63\x61\x74\145\x5f\145\x6d\141\x69\x6c\x73"])) {
            goto eKK;
        }
        $user = get_user_by("\145\x6d\141\x69\154", $zZ);
        eKK:
        xMN:
        $he = $user ? $user->ID : 0;
        $RV = 0 === $he;
        if (!(isset($BD["\x61\165\164\x6f\x63\x72\x65\x61\164\x65\165\x73\145\162\x73"]) && 1 !== intval($BD["\x61\165\164\x6f\143\162\x65\x61\x74\x65\165\163\x65\x72\163"]))) {
            goto xUX;
        }
        $blog_id = 1;
        $CF = apply_filters("\x6d\157\x5f\x6f\141\165\x74\x68\x5f\x63\154\151\x65\x6e\x74\x5f\144\151\x73\x61\142\x6c\145\137\x61\165\x74\x6f\x5f\x63\162\x65\x61\x74\x65\137\x75\163\x65\x72\x73\x5f\146\x6f\x72\x5f\163\160\145\x63\x69\146\151\143\137\x69\144\160", $he, $blog_id, $this->config, $BD);
        $this->config = $CF[0];
        $BD = $CF[1];
        xUX:
        if (!(!(isset($this->config["\141\x75\x74\x6f\137\x72\145\147\151\163\164\x65\162"]) && 1 === intval($this->config["\x61\x75\164\x6f\137\x72\x65\x67\x69\x73\x74\x65\162"])) && $RV)) {
            goto qVt;
        }
        $this->check_status(array("\155\163\x67" => "\x52\x65\x67\151\163\x74\x72\141\x74\151\x6f\156\40\x69\163\40\144\x69\x73\x61\142\x6c\145\x64\40\x66\x6f\x72\x20\164\x68\x69\x73\40\x73\151\164\x65\56\40\120\x6c\x65\x61\x73\x65\40\x63\157\156\164\141\143\164\x20\x79\157\165\162\x20\141\144\155\x69\x6e\x69\163\x74\162\x61\x74\x6f\x72", "\x63\x6f\144\x65" => "\122\x45\107\111\123\x54\122\x41\x54\x49\x4f\x4e\x5f\104\x49\x53\x41\102\x4c\105\x44", "\163\164\x61\x74\x75\163" => false, "\x61\160\x70\154\151\143\141\x74\x69\157\156" => $gW, "\143\x6c\x69\x65\156\164\137\151\x70" => $vj->get_client_ip(), "\x65\155\x61\x69\x6c" => $zZ, "\165\x73\145\162\x6e\141\x6d\145" => $Z3), $MU);
        qVt:
        if (!$RV) {
            goto e7k;
        }
        $Sp = 10;
        $Qb = false;
        $Un = false;
        $sC = apply_filters("\x6d\157\137\x6f\x61\x75\164\x68\x5f\x70\x61\163\163\167\157\x72\144\137\160\x6f\154\151\x63\x79\137\x6d\x61\156\x61\147\x65\162", $Sp);
        if (!is_array($sC)) {
            goto Mcm;
        }
        $Sp = intval($sC["\x70\x61\x73\x73\167\157\162\144\x5f\x6c\x65\x6e\x67\164\x68"]);
        $Qb = $sC["\x73\160\145\143\151\x61\x6c\x5f\143\x68\141\162\141\x63\164\145\x72\163"];
        $Un = $sC["\145\x78\x74\162\141\137\x73\x70\145\143\151\x61\x6c\137\x63\x68\141\162\141\143\164\x65\162\x73"];
        Mcm:
        $Yg = wp_generate_password($Sp, $Qb, $Un);
        $Zc = get_user_by("\145\155\x61\151\x6c", $zZ);
        if (!$Zc) {
            goto nOh;
        }
        add_filter("\x70\x72\145\x5f\165\x73\x65\162\137\x65\155\x61\151\154", array($this, "\163\x6b\151\x70\137\x65\155\141\x69\154\x5f\145\x78\x69\x73\164"), 30);
        nOh:
        $he = wp_create_user($Z3, $Yg, $zZ);
        MO_Oauth_Debug::mo_oauth_log("\x4e\x65\x77\40\x75\x73\x65\162\40\143\162\145\141\x74\145\144\x20\x3d\x3e");
        MO_Oauth_Debug::mo_oauth_log("\x55\x73\x65\162\40\x49\104\x20\x3d\76\x20" . $he);
        $mz = array("\111\x44" => $he, "\165\x73\145\x72\x5f\145\155\141\x69\154" => $zZ, "\x75\163\x65\x72\x5f\154\157\x67\151\156" => $Z3, "\165\x73\x65\x72\137\156\x69\143\145\x6e\x61\x6d\x65" => $Z3);
        do_action("\x75\163\x65\162\137\x72\145\x67\x69\x73\x74\x65\162", $he, $mz);
        e7k:
        if (!($RV || (!isset($this->config["\153\x65\145\160\x5f\x65\170\151\163\164\x69\x6e\147\x5f\x75\163\145\162\163"]) || 1 !== intval($this->config["\153\145\x65\160\x5f\145\170\151\163\x74\151\x6e\x67\137\x75\x73\x65\x72\x73"])))) {
            goto t3P;
        }
        if (!is_wp_error($he)) {
            goto RAD;
        }
        $he = get_user_by("\x6c\157\147\x69\156", $Z3)->ID;
        RAD:
        $ya = array("\x49\104" => $he, "\146\x69\162\163\x74\x5f\156\x61\x6d\x65" => $yp, "\x6c\x61\163\x74\x5f\x6e\141\155\145" => $GK, "\x64\151\163\x70\154\x61\171\137\x6e\x61\x6d\145" => $VI, "\165\163\x65\x72\x5f\154\157\x67\x69\156" => $Z3, "\165\163\x65\162\x5f\156\x69\143\145\156\x61\155\x65" => $Z3);
        if (isset($this->config["\x6b\145\x65\160\137\145\x78\151\163\164\x69\156\x67\x5f\x65\155\141\151\x6c\x5f\x61\x74\x74\x72"]) && 1 === intval($this->config["\153\145\x65\160\x5f\145\x78\151\x73\x74\151\x6e\147\x5f\x65\155\141\x69\x6c\137\141\164\164\x72"])) {
            goto n3x;
        }
        $ya["\x75\163\145\162\x5f\x65\155\x61\151\154"] = $zZ;
        wp_update_user($ya);
        MO_Oauth_Debug::mo_oauth_log("\x41\164\164\162\151\x62\x75\x74\x65\x20\x4d\x61\x70\x70\x69\156\x67\40\x44\157\x6e\x65");
        goto k5F;
        n3x:
        wp_update_user($ya);
        MO_Oauth_Debug::mo_oauth_log("\x41\x74\x74\162\151\142\165\164\145\40\115\141\160\x70\x69\156\x67\40\104\x6f\156\x65");
        k5F:
        update_user_meta($he, "\155\157\137\x6f\x61\x75\164\x68\x5f\x62\165\144\144\x79\x70\x72\145\x73\163\137\141\x74\164\x72\151\142\165\164\145\x73", $Nm);
        MO_Oauth_Debug::mo_oauth_log("\x42\165\x64\x64\171\120\162\x65\x73\163\x20\141\164\164\162\x69\142\x75\164\x65\163\40\165\160\144\x61\164\145\x64\x20\163\x75\x63\143\x65\x73\163\x66\165\x6c\x6c\x79");
        t3P:
        $user = get_user_by("\111\104", $he);
        MO_Oauth_Debug::mo_oauth_log("\x55\x73\x65\x72\40\x46\x6f\x75\156\144");
        MO_Oauth_Debug::mo_oauth_log("\125\163\145\x72\40\x49\x44\40\x3d\x3e\x20" . $he);
        $aE = $vj->is_multisite_plan();
        if (!is_multisite()) {
            goto kZ8;
        }
        MO_Oauth_Debug::mo_oauth_log("\115\x75\154\164\x69\163\151\164\145\40\x50\154\x61\156");
        $nq = $vj->mo_oauth_client_get_option("\x6d\x6f\137\157\x61\x75\x74\x68\x5f\143\x33\126\x69\143\62\154\60\132\130\x4e\x7a\132\127\170\154\x59\x33\122\x6c\x5a\x41");
        $Wq = array();
        if (!isset($nq)) {
            goto tY0;
        }
        $Wq = json_decode($vj->mooauthdecrypt($nq), true);
        tY0:
        $dS = false;
        if (!(is_array($Wq) && in_array($blog_id, $Wq))) {
            goto Wam;
        }
        $dS = true;
        Wam:
        $ea = intval($vj->mo_oauth_client_get_option("\156\157\x4f\146\123\165\142\x53\x69\x74\145\163"));
        $Hb = get_sites();
        if (!(is_multisite() && $aE && ($aE && !$dS && $ea < 1000))) {
            goto B24;
        }
        $TM = "\131\x6f\165\x20\150\x61\166\x65\40\156\157\x74\x20\165\160\x67\x72\141\144\145\144\40\164\157\40\x74\150\145\x20\143\x6f\x72\x72\x65\143\x74\40\x6c\151\x63\x65\x6e\163\x65\x20\160\x6c\141\x6e\x2e\40\x45\x69\x74\150\x65\162\x20\171\157\x75\40\x68\x61\x76\x65\40\160\165\162\x63\x68\141\x73\x65\144\40\x66\157\x72\40\151\x6e\x63\x6f\x72\x72\x65\143\x74\x20\156\x6f\x2e\x20\x6f\x66\40\x73\151\x74\145\163\x20\157\x72\40\171\157\165\x20\x68\141\x76\x65\40\143\162\145\141\164\x65\x64\x20\141\x20\156\x65\167\40\x73\x75\142\163\x69\164\x65\56\40\x43\157\156\164\x61\143\x74\x20\164\x6f\40\x79\x6f\165\162\x20\141\x64\x6d\151\156\151\x73\x74\162\141\x74\x6f\162\x20\164\x6f\x20\165\160\147\162\141\x64\x65\40\171\157\x75\x72\x20\163\165\142\x73\x69\x74\145\56";
        MO_Oauth_Debug::mo_oauth_log($TM);
        $vj->handle_error($TM);
        wp_die($TM);
        B24:
        kZ8:
        if ($user) {
            goto ih_;
        }
        return;
        ih_:
        $DZ = '';
        if (isset($this->config["\141\x66\x74\x65\162\137\154\x6f\x67\151\x6e\x5f\165\162\154"]) && '' !== $this->config["\x61\146\x74\x65\x72\137\154\157\x67\151\x6e\137\165\162\x6c"]) {
            goto DMZ;
        }
        $LY = $YR->get_value("\162\x65\144\x69\162\x65\x63\x74\137\x75\x72\x69");
        $kB = parse_url($LY);
        if (!(isset($kB["\x70\x61\x74\x68"]) && strpos($kB["\x70\x61\164\x68"], "\x77\160\x2d\x6c\x6f\x67\x69\x6e\x2e\160\150\160") !== false)) {
            goto am2;
        }
        $LY = site_url();
        am2:
        if (!isset($kB["\x71\165\145\162\171"])) {
            goto I49;
        }
        parse_str($kB["\161\165\145\x72\x79"], $OG);
        if (!isset($OG["\162\x65\x64\x69\162\x65\x63\164\x5f\164\157"])) {
            goto wQw;
        }
        $LY = $OG["\162\x65\x64\151\162\x65\143\x74\137\164\157"];
        wQw:
        I49:
        $DZ = rawurldecode($LY && '' !== $LY ? $LY : site_url());
        goto o13;
        DMZ:
        $DZ = $this->config["\x61\146\164\145\162\137\154\157\147\151\156\137\x75\x72\154"];
        o13:
        if (!($vj->get_versi() === 1)) {
            goto J33;
        }
        if (isset($BD["\145\156\x61\x62\154\145\137\162\157\x6c\145\137\155\x61\160\160\151\156\147"])) {
            goto elY;
        }
        $BD["\x65\156\x61\142\154\x65\x5f\x72\157\154\145\x5f\x6d\x61\160\160\151\156\x67"] = true;
        if (!(isset($BD["\143\154\151\x65\156\164\x5f\x63\162\145\144\x73\137\145\156\143\162\160\171\x74\145\x64"]) && boolval($BD["\143\x6c\151\145\x6e\164\137\143\162\x65\144\163\x5f\145\156\x63\x72\x70\171\x74\x65\144"]))) {
            goto FVO;
        }
        $BD["\x63\154\151\145\x6e\x74\x5f\x69\x64"] = $vj->mooauthencrypt($BD["\x63\154\x69\145\x6e\164\137\x69\144"]);
        $BD["\143\154\x69\145\156\x74\137\163\x65\x63\162\145\164"] = $vj->mooauthencrypt($BD["\143\x6c\x69\145\x6e\x74\x5f\163\x65\x63\x72\145\164"]);
        FVO:
        $vj->set_app_by_name($q1["\x61\x70\x70\137\156\141\x6d\145"], $BD);
        elY:
        if (!(!user_can($he, "\x61\x64\x6d\x69\x6e\x69\163\164\x72\141\164\157\x72") && $RV || !isset($BD["\153\145\145\160\137\145\170\151\x73\x74\151\x6e\x67\x5f\x75\x73\x65\x72\137\x72\157\154\x65\x73"]) || 1 !== intval($BD["\153\145\x65\160\137\x65\170\151\x73\164\151\x6e\147\137\x75\x73\145\162\137\162\157\154\x65\163"]))) {
            goto K5b;
        }
        $this->mo_oauth_client_map_default_role($he, $BD);
        MO_Oauth_Debug::mo_oauth_log("\x52\x6f\154\x65\40\x4d\141\160\160\151\x6e\x67\40\x44\x6f\156\145");
        K5b:
        J33:
        do_action("\155\x6f\137\157\141\165\x74\x68\137\143\x6c\x69\x65\156\164\137\155\141\160\x5f\x72\157\x6c\145\x73", array("\x75\x73\x65\162\137\151\144" => $he, "\141\160\160\137\x63\x6f\x6e\146\x69\147" => $BD, "\156\145\167\x5f\165\x73\145\x72" => $RV, "\x72\x65\x73\x6f\165\162\x63\x65\137\157\167\156\145\162" => $Nm, "\141\x70\160\x5f\x6e\x61\x6d\x65" => $gW, "\143\x6f\156\146\151\147" => $this->config));
        MO_Oauth_Debug::mo_oauth_log("\122\157\x6c\145\x20\115\x61\160\x70\151\x6e\147\x20\104\157\x6e\x65");
        do_action("\155\x6f\137\157\x61\165\164\150\137\x6c\157\x67\147\x65\144\137\x69\156\137\x75\163\145\x72\x5f\x74\x6f\x6b\x65\x6e", $user, $vJ);
        $this->check_status(array("\155\163\147" => "\114\x6f\147\151\156\x20\x53\x75\143\143\145\163\x73\x66\165\154\x21", "\143\157\144\145" => "\114\x4f\x47\111\x4e\x5f\123\x55\x43\103\x45\123\x53", "\163\x74\141\x74\x75\x73" => true, "\x61\160\x70\154\151\143\x61\164\151\x6f\156" => $gW, "\x63\x6c\151\145\156\x74\x5f\151\x70" => $vj->get_client_ip(), "\x6e\141\166\151\147\x61\x74\151\x6f\x6e\165\162\154" => $DZ, "\x65\155\x61\151\154" => $zZ, "\x75\163\145\x72\x6e\141\155\x65" => $Z3), $MU);
        if (!$EY) {
            goto XSf;
        }
        return $user;
        XSf:
        do_action("\x6d\157\137\157\x61\x75\164\x68\137\x73\x65\164\x5f\154\x6f\x67\151\x6e\137\x63\157\x6f\153\151\x65");
        do_action("\155\157\137\x6f\x61\x75\164\x68\x5f\147\x65\x74\137\165\x73\145\162\137\x61\164\164\162\163", $user, $Nm);
        update_user_meta($user->ID, "\155\x6f\137\157\141\165\x74\x68\x5f\143\154\151\145\156\164\x5f\154\141\x73\x74\x5f\x69\144\x5f\x74\157\153\x65\x6e", isset($vJ["\x69\x64\x5f\x74\157\x6b\x65\x6e"]) ? $vJ["\x69\144\x5f\x74\157\153\145\156"] : $vJ["\141\143\x63\x65\x73\x73\x5f\x74\x6f\x6b\x65\156"]);
        wp_set_current_user($user->ID);
        $Ex = false;
        $Ex = apply_filters("\155\x6f\x5f\x72\x65\x6d\x65\x6d\x62\145\162\137\155\x65", $Ex);
        wp_set_auth_cookie($user->ID, $Ex);
        if (!has_action("\x6d\x6f\137\x68\x61\x63\153\x5f\154\157\147\x69\x6e\x5f\x73\145\163\163\x69\157\156\137\x72\145\x64\x69\x72\145\x63\164")) {
            goto CUu;
        }
        $vP = $vj->gen_rand_str();
        $hF = $vj->gen_rand_str();
        $sC = array("\x75\163\145\x72\x5f\151\144" => $user->ID, "\165\x73\145\162\137\160\x61\x73\x73\167\157\162\x64" => $hF);
        set_transient($vP, $sC);
        do_action("\x6d\x6f\137\x68\141\x63\153\137\x6c\157\147\151\156\x5f\x73\x65\163\163\151\x6f\156\137\x72\145\144\151\162\x65\x63\164", $user, $hF, $vP, $LY);
        CUu:
        do_action("\167\x70\137\x6c\x6f\x67\151\156", $user->user_login, $user);
        setcookie("\x6d\x6f\x5f\157\141\165\164\x68\x5f\x6c\x6f\147\x69\x6e\x5f\141\160\160\x5f\x73\145\x73\163\151\157\156", $gW);
        $Re = $YR->get_value("\x72\x65\x73\x74\x72\x69\x63\x74\162\x65\x64\x69\x72\x65\x63\164") !== false;
        $fG = $YR->get_value("\x70\157\160\165\x70") === "\151\x67\x6e\157\162\145";
        if (isset($this->config["\x70\x6f\160\165\160\x5f\x6c\x6f\147\x69\x6e"]) && 1 === intval($this->config["\x70\x6f\x70\165\160\x5f\154\x6f\x67\151\156"]) && !$fG && !boolval($Re)) {
            goto E2Z;
        }
        do_action("\155\x6f\137\157\141\165\x74\x68\x5f\162\x65\x64\151\x72\145\x63\164\137\x6f\x61\x75\x74\x68\137\x75\163\x65\x72\163", $user, $DZ);
        wp_redirect($DZ);
        goto tSL;
        E2Z:
        echo "\74\x73\x63\x72\151\160\x74\x3e\167\x69\156\144\157\167\x2e\x6f\x70\x65\x6e\145\x72\x2e\x48\141\x6e\144\154\145\x50\157\x70\165\160\x52\x65\163\x75\x6c\164\50\x22" . $DZ . "\42\x29\x3b\x77\151\156\x64\x6f\167\56\x63\154\x6f\163\145\x28\51\73\x3c\x2f\x73\143\x72\151\160\x74\x3e";
        tSL:
        exit;
    }
    public function check_status($q1, $MU)
    {
        global $vj;
        if (isset($q1["\x73\x74\x61\x74\x75\x73"])) {
            goto SLh;
        }
        MO_Oauth_Debug::mo_oauth_log("\123\x6f\155\145\164\x68\151\x6e\x67\x20\167\145\156\x74\x20\x77\162\157\x6e\147\x2e\40\x50\x6c\145\x61\163\x65\x20\x74\162\x79\40\114\x6f\x67\x67\x69\156\x67\40\x69\156\40\x61\x67\141\x69\156\56");
        $vj->handle_error("\123\x6f\x6d\x65\164\x68\151\156\147\40\167\x65\x6e\164\40\x77\162\157\156\x67\56\x20\x50\x6c\x65\141\x73\145\40\x74\162\171\x20\x4c\x6f\x67\147\151\156\x67\x20\x69\156\x20\141\147\x61\151\x6e\56");
        wp_die(wp_kses("\123\x6f\155\145\164\x68\x69\x6e\147\40\x77\145\156\164\x20\x77\162\x6f\156\147\x2e\40\120\x6c\x65\x61\163\145\x20\164\x72\171\40\x4c\x6f\147\147\x69\x6e\x67\x20\x69\x6e\40\x61\x67\141\x69\x6e\x2e", \mo_oauth_get_valid_html()));
        SLh:
        if (!(isset($q1["\163\164\x61\164\165\163"]) && true === $q1["\163\164\141\164\x75\163"] && (isset($q1["\143\x6f\x64\145"]) && "\114\117\107\111\x4e\137\123\125\x43\x43\105\123\x53" === $q1["\x63\x6f\x64\145"]))) {
            goto s4J;
        }
        return true;
        s4J:
        if (!(true !== $q1["\163\164\x61\x74\165\x73"])) {
            goto oeB;
        }
        $Ha = isset($q1["\x6d\163\147"]) && !empty($q1["\155\163\x67"]) ? $q1["\x6d\163\x67"] : "\123\x6f\x6d\145\164\x68\151\156\147\40\x77\145\x6e\164\40\167\162\x6f\x6e\147\x2e\x20\120\x6c\x65\x61\163\x65\x20\164\x72\x79\x20\x4c\x6f\x67\x67\151\156\147\x20\151\x6e\40\141\147\x61\151\x6e\x2e";
        MO_Oauth_Debug::mo_oauth_log($Ha);
        $vj->handle_error($Ha);
        wp_die(wp_kses($Ha, \mo_oauth_get_valid_html()));
        exit;
        oeB:
    }
    public function skip_email_exist($pK)
    {
        define("\127\120\x5f\x49\x4d\120\x4f\x52\124\x49\x4e\107", "\x53\113\111\x50\x5f\105\x4d\x41\111\x4c\x5f\105\130\x49\123\124");
        return $pK;
    }
}
