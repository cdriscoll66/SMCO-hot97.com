<?php


namespace MoOauthClient\GrantTypes;

use MoOauthClient\GrantTypes\Implicit;
use MoOauthClient\OauthHandler;
use MoOauthClient\StorageManager;
use MoOauthClient\Base\InstanceHelper;
use MoOauthClient\LoginHandler;
use MoOauthClient\MO_Oauth_Debug;
class Password
{
    const CSS_URL = MOC_URL . "\x63\x6c\x61\163\163\x65\x73\57\x50\x72\x65\x6d\151\x75\155\x2f\162\145\x73\157\x75\162\143\145\163\57\160\x77\x64\x73\x74\171\154\x65\56\143\163\163";
    const JS_URL = MOC_URL . "\143\x6c\141\x73\x73\145\163\57\x50\x72\x65\x6d\151\x75\x6d\x2f\162\145\x73\x6f\165\162\143\x65\163\57\160\167\x64\56\x6a\x73";
    public function __construct($EY = false)
    {
        if (!$EY) {
            goto TLa;
        }
        return;
        TLa:
        add_action("\x69\x6e\151\164", array($this, "\x62\x65\x68\141\x76\145"));
    }
    public function inject_ui()
    {
        global $vj;
        wp_enqueue_style("\x77\x70\55\x6d\x6f\x2d\157\x63\x2d\160\167\144\55\x63\163\163", self::CSS_URL, array(), $n2 = null, $Bv = false);
        $Ix = $vj->parse_url($vj->get_current_url());
        $Z0 = "\x62\165\x74\164\x6f\156";
        if (!isset($Ix["\x71\165\145\x72\x79"]["\x6c\x6f\147\x69\x6e"])) {
            goto RRy;
        }
        return;
        RRy:
        echo "\x9\11\x3c\x64\151\x76\x20\151\x64\75\42\160\x61\163\163\x77\157\162\144\55\147\162\141\x6e\164\x2d\x6d\x6f\144\141\x6c\42\x20\x63\154\x61\x73\163\x3d\42\x70\141\x73\x73\x77\157\x72\x64\55\155\x6f\144\x61\x6c\40\x6d\x6f\x5f\x74\141\142\x6c\145\x5f\x6c\141\x79\x6f\x75\164\x22\76\15\xa\x9\11\x9\74\x64\151\x76\40\143\x6c\141\163\x73\x3d\x22\160\x61\163\x73\167\x6f\x72\144\x2d\x6d\x6f\x64\x61\x6c\x2d\143\x6f\x6e\164\x65\x6e\164\42\76\15\xa\x9\x9\11\11\x3c\144\x69\166\40\x63\x6c\141\x73\x73\x3d\42\160\x61\x73\163\167\157\x72\x64\55\155\157\144\141\x6c\55\150\145\x61\144\x65\x72\42\x3e\xd\xa\x9\11\11\11\x9\74\144\x69\x76\40\x63\154\141\163\163\x3d\42\160\x61\x73\x73\167\x6f\x72\144\55\x6d\x6f\x64\x61\154\x2d\x68\x65\x61\x64\x65\x72\x2d\x74\x69\164\x6c\145\42\x3e\15\xa\x9\11\x9\x9\11\11\74\x73\160\x61\156\x20\143\x6c\141\x73\x73\x3d\42\x70\141\x73\163\x77\x6f\162\x64\55\155\x6f\x64\x61\154\x2d\143\x6c\157\x73\145\x22\x3e\46\x74\x69\x6d\145\163\x3b\74\57\x73\x70\x61\156\x3e\15\xa\11\x9\11\11\x9\11\74\163\160\141\156\x20\151\144\x3d\x22\x70\x61\163\163\167\x6f\x72\x64\x2d\x6d\157\144\141\154\55\x68\145\x61\144\145\162\55\164\x69\164\x6c\x65\55\x74\145\x78\164\x22\76\74\57\163\x70\141\156\76\15\xa\11\11\11\x9\x9\x3c\x2f\x64\x69\166\76\15\12\x9\x9\11\x9\x3c\57\144\x69\x76\76\xd\12\11\x9\x9\11\74\x66\157\x72\x6d\40\x69\144\75\x22\160\167\144\x67\162\x6e\164\x66\162\155\x22\x3e\xd\xa\11\x9\x9\x9\11\74\151\156\160\165\164\x20\x74\x79\160\145\75\42\x68\151\x64\x64\x65\156\x22\x20\156\x61\155\145\75\x22\x6c\x6f\x67\151\156\42\40\166\x61\154\x75\x65\x3d\x22\x70\x77\144\x67\162\156\x74\x66\162\155\x22\x3e\xd\xa\11\x9\x9\11\11\74\151\x6e\x70\x75\164\40\164\x79\x70\145\x3d\42\x74\145\170\164\42\x20\143\154\141\x73\x73\75\x22\155\157\x5f\164\141\x62\154\x65\x5f\x74\x65\x78\164\142\x6f\170\42\x20\151\x64\x3d\42\160\x77\144\147\x72\156\x74\146\162\x6d\x2d\x75\x6e\x6d\x66\x6c\144\x22\x20\156\141\x6d\x65\75\42\143\x61\154\154\145\162\42\40\x70\x6c\x61\x63\145\150\x6f\154\x64\x65\162\75\x22\125\163\145\162\x6e\x61\155\x65\x22\76\xd\xa\11\x9\x9\11\11\74\151\156\160\165\x74\40\x74\x79\160\145\x3d\42\x70\141\x73\163\167\157\x72\x64\42\40\x63\x6c\x61\x73\x73\75\42\x6d\x6f\137\x74\x61\x62\x6c\145\x5f\164\x65\170\x74\x62\157\170\x22\x20\151\x64\75\x22\x70\167\144\147\162\156\164\146\x72\x6d\x2d\x70\x66\154\x64\42\40\156\141\155\x65\75\x22\x74\x6f\x6f\x6c\x22\x20\x70\154\x61\143\145\150\157\154\x64\x65\162\75\42\x50\x61\x73\x73\x77\x6f\x72\x64\42\76\xd\12\x9\11\x9\x9\11\74\151\x6e\x70\x75\164\40\x74\171\160\x65\75\42";
        echo $Z0;
        echo "\42\x20\143\x6c\141\x73\x73\75\x22\x62\165\164\164\x6f\156\40\x62\165\164\164\157\156\x2d\x70\162\x69\x6d\x61\x72\171\x20\x62\165\x74\x74\157\x6e\55\154\x61\162\x67\145\42\40\x69\x64\75\x22\160\167\x64\147\x72\x6e\x74\x66\x72\x6d\x2d\154\157\x67\151\156\x22\40\x76\x61\154\x75\x65\75\42\114\x6f\x67\x69\x6e\x22\76\xd\xa\x9\11\11\11\x3c\57\146\157\x72\155\x3e\15\xa\x9\11\11\74\57\144\151\166\76\xd\12\11\11\x3c\57\x64\151\x76\x3e\15\xa\11\11";
    }
    public function inject_behaviour()
    {
        wp_enqueue_script("\167\160\x2d\155\157\55\x6f\x63\55\x70\167\144\55\x6a\x73", self::JS_URL, ["\152\161\x75\x65\x72\x79"], $n2 = null, $Bv = true);
    }
    public function behave($sN = '', $jK = '', $Xr = '', $cs = '', $cv = false, $EY = false)
    {
        global $vj;
        $sN = !empty($sN) ? hex2bin($sN) : false;
        $jK = !empty($jK) ? hex2bin($jK) : false;
        $Xr = !empty($Xr) ? $Xr : false;
        $cs = !empty($cs) ? $cs : site_url();
        if (!($jK && !$cv)) {
            goto r8a;
        }
        $jK = wp_unslash($jK);
        r8a:
        if (!(!$sN || !$jK || !$Xr)) {
            goto L2_;
        }
        $vj->redirect_user(urldecode($cs));
        exit;
        L2_:
        $kL = $vj->get_app_by_name($Xr);
        if ($kL) {
            goto atR;
        }
        $SU = $vj->parse_url(urldecode(site_url()));
        $SU["\x71\165\x65\162\171"]["\x65\162\x72\157\x72"] = "\x54\x68\145\162\x65\40\151\163\40\x6e\x6f\x20\x61\x70\160\x6c\x69\143\141\x74\151\x6f\x6e\40\143\157\x6e\x66\151\x67\165\x72\145\x64\x20\146\x6f\x72\40\164\x68\x69\x73\x20\162\145\161\x75\x65\x73\164";
        $vj->redirect_user($vj->generate_url($SU));
        atR:
        $BD = $kL->get_app_config();
        $q1 = array("\x67\162\141\x6e\164\x5f\x74\171\x70\x65" => "\x70\141\x73\163\167\157\162\x64", "\143\154\x69\145\x6e\x74\x5f\151\x64" => $BD["\x63\x6c\x69\x65\x6e\x74\137\x69\144"], "\x63\154\x69\x65\x6e\164\x5f\163\x65\143\162\x65\x74" => $BD["\143\154\x69\145\156\164\137\x73\x65\143\x72\x65\x74"], "\165\x73\x65\162\x6e\x61\155\145" => $sN, "\x70\141\x73\163\167\x6f\x72\x64" => $jK, "\x69\x73\x5f\x77\x70\137\154\157\x67\x69\x6e" => $EY);
        $OZ = new OauthHandler();
        $zl = $BD["\141\143\x63\x65\x73\x73\164\157\x6b\x65\156\x75\x72\154"];
        if (!(strpos($zl, "\147\157\157\x67\154\x65") !== false)) {
            goto rHy;
        }
        $zl = "\150\164\164\160\x73\72\57\57\x77\167\x77\56\147\157\x6f\x67\x6c\x65\x61\160\x69\163\56\143\x6f\x6d\x2f\x6f\141\165\x74\150\x32\x2f\166\64\57\x74\157\153\x65\x6e";
        rHy:
        if (!(strpos($zl, "\163\145\162\x76\151\x63\x65\163\x2f\x6f\x61\x75\164\x68\62\57\x74\157\x6b\x65\x6e") === false && strpos($zl, "\163\x61\x6c\145\x73\146\x6f\162\x63\145") === false && strpos($BD["\x61\x63\143\x65\163\163\164\x6f\x6b\x65\156\x75\162\x6c"], "\57\157\141\x6d\57\157\x61\x75\x74\150\x32\x2f\141\143\x63\145\x73\x73\137\x74\x6f\x6b\145\156") === false)) {
            goto fnA;
        }
        $q1["\163\x63\x6f\160\145"] = $kL->get_app_config("\x73\x63\x6f\x70\x65");
        fnA:
        $ET = isset($BD["\163\145\156\x64\x5f\150\x65\141\x64\x65\x72\163"]) ? $BD["\163\145\x6e\x64\x5f\x68\x65\141\x64\x65\162\163"] : 0;
        $zg = isset($BD["\x73\x65\156\x64\137\142\x6f\144\171"]) ? $BD["\163\145\x6e\x64\137\x62\157\144\x79"] : 0;
        do_action("\155\157\x5f\147\145\x73\x63\x6f\x6c\137\150\141\156\x64\154\145\x72", $sN, $jK, $Xr);
        $vJ = $OZ->get_access_token($zl, $q1, $ET, $zg);
        if (!is_wp_error($vJ)) {
            goto TBb;
        }
        return $vJ;
        TBb:
        MO_Oauth_Debug::mo_oauth_log("\x54\x6f\x6b\145\156\x20\x52\145\x73\x70\157\x6e\163\145\x20\x52\x65\x63\145\151\x76\145\x64\40\x3d\x3e\x20");
        MO_Oauth_Debug::mo_oauth_log($vJ);
        if ($vJ) {
            goto zf9;
        }
        $TM = new \WP_Error();
        $TM->add("\151\156\x76\141\x6c\x69\144\x5f\x70\141\x73\163\x77\x6f\162\x64", __("\x3c\163\164\162\x6f\x6e\147\76\105\122\x52\x4f\122\x3c\57\x73\x74\x72\x6f\156\147\x3e\72\40\111\x6e\x63\x6f\x72\162\x65\x63\x74\40\105\155\x61\151\154\40\141\144\x64\162\145\x73\x73\x20\157\x72\40\x50\x61\163\x73\x77\x6f\x72\144\56"));
        return $TM;
        zf9:
        $u1 = isset($vJ["\x61\143\x63\x65\x73\163\137\164\x6f\153\x65\156"]) ? $vJ["\141\143\143\x65\163\163\x5f\x74\157\x6b\x65\x6e"] : false;
        $xk = isset($vJ["\x69\x64\x5f\164\x6f\x6b\x65\156"]) ? $vJ["\151\144\137\x74\x6f\153\x65\156"] : false;
        $vP = isset($vJ["\164\x6f\x6b\x65\x6e"]) ? $vJ["\164\157\153\145\156"] : false;
        $Nm = [];
        if (false !== $xk || false !== $vP) {
            goto Da7;
        }
        if ($u1) {
            goto nvC;
        }
        $vj->handle_error("\111\156\x76\x61\x6c\151\x64\x20\x74\x6f\153\x65\x6e\x20\x72\145\143\145\151\x76\x65\x64\56");
        MO_Oauth_Debug::mo_oauth_log("\105\162\162\157\162\x20\x66\x72\157\x6d\40\x54\x6f\153\x65\x6e\40\105\x6e\x64\160\x6f\151\x6e\x74\x20\75\76\40\x49\156\x76\141\x6c\151\144\40\164\157\153\x65\x6e\x20\x72\145\x63\145\x69\x76\x65\x64");
        exit("\111\156\x76\141\154\151\144\x20\164\x6f\153\145\x6e\x20\x72\145\x63\x65\x69\x76\145\x64\x2e");
        nvC:
        goto hM0;
        Da7:
        $OG = '';
        if (!(false !== $vP)) {
            goto w8h;
        }
        $OG = "\164\157\153\145\156\75" . $vP;
        w8h:
        if (!(false !== $xk)) {
            goto mmg;
        }
        $OG = "\151\144\x5f\164\157\153\145\156\75" . $xk;
        mmg:
        $na = new Implicit($OG);
        if (!is_wp_error($na)) {
            goto WEL;
        }
        $vj->handle_error($na->get_error_message());
        MO_Oauth_Debug::mo_oauth_log($na->get_error_message());
        wp_die(wp_kses($na->get_error_message(), \mo_oauth_get_valid_html()));
        exit("\120\154\x65\x61\163\145\40\164\x72\x79\x20\114\x6f\147\147\151\x6e\147\x20\x69\156\40\141\x67\x61\151\156\56");
        WEL:
        $M3 = $na->get_jwt_from_query_param();
        $Nm = $M3->get_decoded_payload();
        hM0:
        $lQ = $BD["\x72\145\163\x6f\x75\x72\143\x65\157\x77\156\145\x72\x64\145\164\141\151\x6c\163\165\x72\x6c"];
        if (!(substr($lQ, -1) === "\x3d")) {
            goto R1p;
        }
        $lQ .= $u1;
        R1p:
        if (!(strpos($lQ, "\147\157\157\x67\154\145") !== false)) {
            goto xwA;
        }
        $lQ = "\x68\164\164\x70\x73\72\x2f\x2f\167\167\167\56\147\x6f\157\147\x6c\x65\x61\x70\x69\x73\x2e\143\157\155\x2f\x6f\141\x75\164\x68\62\x2f\x76\61\57\165\x73\x65\x72\151\x6e\146\157";
        xwA:
        if (empty($lQ)) {
            goto JNd;
        }
        $Nm = $OZ->get_resource_owner($lQ, $u1);
        JNd:
        MO_Oauth_Debug::mo_oauth_log("\122\x65\x73\157\165\162\143\x65\x20\117\167\x6e\x65\162\40\75\x3e\x20");
        MO_Oauth_Debug::mo_oauth_log($Nm);
        $C0 = new InstanceHelper();
        $A9 = $C0->get_login_handler_instance();
        $qP = [];
        $ab = new LoginHandler();
        $hy = $ab->dropdownattrmapping('', $Nm, $qP);
        $vj->mo_oauth_client_update_option("\x6d\157\x5f\157\141\165\164\150\x5f\x61\164\x74\162\x5f\x6e\141\155\145\x5f\154\151\x73\x74" . $Xr, $hy);
        if (!$cv) {
            goto XB3;
        }
        $A9->handle_group_test_conf($Nm, $BD, $u1, false, $cv);
        exit;
        XB3:
        $blog_id = get_current_blog_id();
        $YR = new StorageManager();
        $YR->add_replace_entry("\162\145\x64\151\162\145\143\x74\x5f\165\x72\x69", $cs);
        $YR->add_replace_entry("\142\154\x6f\147\137\151\x64", $blog_id);
        $SC = $YR->get_state();
        $user = $A9->handle_sso($BD["\141\x70\x70\x49\144"], $BD, $Nm, $SC, $vJ, $EY);
        if (!$EY) {
            goto EcC;
        }
        return $user;
        EcC:
    }
    public function mo_oauth_wp_login($user, $Z3, $hF)
    {
        global $vj;
        $TM = new \WP_Error();
        if (!(empty($Z3) || empty($hF))) {
            goto jD7;
        }
        if (!empty($Z3)) {
            goto xjz;
        }
        $TM->add("\x65\x6d\x70\x74\x79\137\165\163\145\x72\x6e\141\x6d\x65", __("\x3c\163\164\x72\x6f\156\x67\76\x45\122\x52\x4f\122\74\x2f\163\x74\x72\157\x6e\x67\x3e\72\x20\x45\155\x61\x69\154\x20\x66\x69\145\154\144\x20\151\163\x20\x65\155\x70\x74\171\56"));
        xjz:
        if (!empty($hF)) {
            goto C4V;
        }
        $TM->add("\145\155\x70\x74\x79\x5f\160\x61\163\x73\x77\157\162\x64", __("\74\163\164\x72\157\x6e\x67\76\105\x52\122\117\x52\x3c\57\163\164\x72\x6f\156\147\x3e\72\x20\x50\x61\163\x73\167\157\x72\x64\x20\146\x69\145\154\144\40\151\x73\40\145\x6d\160\164\171\56"));
        C4V:
        return $TM;
        jD7:
        $Xr = $vj->mo_oauth_client_get_option("\x6d\157\137\157\x61\x75\x74\150\x5f\x65\156\141\x62\154\145\137\x6f\141\165\x74\x68\x5f\x77\x70\137\154\x6f\x67\151\156");
        $user = false;
        if (\username_exists($Z3)) {
            goto Fvw;
        }
        if (!email_exists($Z3)) {
            goto kae;
        }
        $user = get_user_by("\x65\x6d\141\151\x6c", $Z3);
        kae:
        goto Ub4;
        Fvw:
        $user = \get_user_by("\154\x6f\147\x69\156", $Z3);
        Ub4:
        if (!($user && wp_check_password($hF, $user->data->user_pass, $user->ID))) {
            goto lsi;
        }
        return $user;
        lsi:
        if (!(false !== $Xr)) {
            goto qk4;
        }
        $sB = '';
        $sB = do_action("\155\x6f\137\x6f\x61\165\164\150\x5f\x63\x75\163\x74\157\155\x5f\x73\163\x6f", \bin2hex($Z3), \bin2hex($hF), $Xr, site_url(), false, true);
        if (empty($sB)) {
            goto FWc;
        }
        return $sB;
        FWc:
        return $this->behave(\bin2hex($Z3), \bin2hex($hF), $Xr, site_url(), false, true);
        qk4:
        $TM->add("\151\156\x76\x61\x6c\151\x64\x5f\x70\141\x73\x73\167\157\x72\144", __("\x3c\x73\164\x72\x6f\x6e\147\76\105\x52\122\x4f\x52\x3c\x2f\163\x74\x72\x6f\156\147\76\x3a\x20\125\x73\x65\162\156\x61\155\145\x20\x6f\162\x20\120\141\x73\163\167\157\x72\x64\40\151\x73\x20\151\x6e\x76\141\154\151\144\56"));
        MO_Oauth_Debug::mo_oauth_log($TM);
        return $TM;
    }
}
