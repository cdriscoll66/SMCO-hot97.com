<?php


namespace MoOauthClient;

use MoOauthClient\OauthHandlerInterface;
class MO_Oauth_Debug
{
    public static function mo_oauth_log($AL)
    {
        global $vj;
        $kJ = plugin_dir_path(__FILE__) . $vj->mo_oauth_client_get_option("\155\157\137\157\141\x75\x74\x68\137\x64\145\x62\x75\x67") . "\56\x6c\x6f\x67";
        $VX = time();
        $Ri = "\133" . date("\131\55\x6d\55\144\x20\x48\72\x69\72\163", $VX) . "\40\125\x54\103\x5d\40\72\40" . print_r($AL, true) . PHP_EOL;
        if (!$vj->mo_oauth_client_get_option("\x6d\157\x5f\x64\145\142\165\x67\x5f\145\156\141\x62\154\145")) {
            goto hr;
        }
        if ($vj->mo_oauth_client_get_option("\x6d\x6f\137\144\145\x62\165\x67\137\x63\x68\x65\x63\153")) {
            goto Wc;
        }
        error_log($Ri, 3, $kJ);
        goto Xu;
        Wc:
        $AL = "\124\150\x69\163\x20\x69\163\40\x6d\x69\x6e\x69\x4f\162\x61\156\147\x65\40\x4f\101\x75\164\x68\40\x70\x6c\165\x67\x69\x6e\40\104\145\142\x75\x67\x20\114\x6f\x67\40\146\x69\x6c\145" . PHP_EOL;
        error_log($AL, 3, $kJ);
        Xu:
        hr:
    }
}
class OauthHandler implements OauthHandlerInterface
{
    public function get_token($w7, $q1, $ET = true, $zg = false)
    {
        MO_Oauth_Debug::mo_oauth_log("\124\157\153\145\156\x20\162\x65\x71\165\x65\163\164\x20\x63\x6f\x6e\164\145\x6e\164\x20\x3d\76\40");
        global $vj;
        $TM = new \WP_Error();
        $EY = isset($q1["\151\163\137\x77\160\x5f\x6c\157\x67\x69\x6e"]) ? $q1["\x69\163\x5f\167\x70\x5f\x6c\x6f\x67\x69\x6e"] : false;
        unset($q1["\151\163\137\x77\160\137\154\x6f\147\x69\156"]);
        foreach ($q1 as $Vi => $GT) {
            $q1[$Vi] = html_entity_decode($GT);
            dp:
        }
        cF:
        $mT = '';
        if (!isset($q1["\x63\x6c\151\145\x6e\164\x5f\163\x65\x63\162\145\x74"])) {
            goto Y0;
        }
        $mT = $q1["\x63\x6c\151\x65\x6e\164\137\x73\145\x63\x72\145\164"];
        Y0:
        $rE = array("\101\x63\143\x65\x70\x74" => "\x61\x70\x70\154\x69\143\x61\164\x69\157\156\x2f\152\x73\x6f\x6e", "\143\x68\141\x72\x73\x65\x74" => "\125\124\106\40\55\40\70", "\x43\x6f\156\164\x65\156\164\x2d\x54\171\x70\145" => "\x61\160\x70\154\151\143\x61\x74\x69\x6f\x6e\57\x78\x2d\x77\x77\x77\x2d\146\x6f\x72\x6d\x2d\x75\x72\154\x65\156\143\x6f\144\145\x64", "\101\x75\x74\150\x6f\162\151\172\141\x74\x69\157\156" => "\x42\x61\x73\x69\x63\40" . base64_encode($q1["\143\154\x69\x65\x6e\164\x5f\x69\144"] . "\72" . $mT));
        if (!(isset($q1["\143\157\144\145\x5f\x76\145\162\151\146\x69\x65\x72"]) && !isset($q1["\x63\x6c\x69\x65\156\x74\x5f\x73\145\143\x72\x65\164"]))) {
            goto ao;
        }
        unset($rE["\101\x75\164\x68\x6f\x72\151\172\x61\164\x69\157\156"]);
        ao:
        if (1 == $ET && 0 == $zg) {
            goto MV;
        }
        if (0 == $ET && 1 == $zg) {
            goto Zz;
        }
        goto Aw;
        MV:
        unset($q1["\x63\154\x69\x65\x6e\164\x5f\151\144"]);
        if (!isset($q1["\143\x6c\151\x65\x6e\x74\x5f\163\145\143\x72\x65\x74"])) {
            goto S6;
        }
        unset($q1["\143\154\x69\x65\x6e\x74\x5f\x73\145\x63\x72\145\164"]);
        S6:
        goto Aw;
        Zz:
        if (!isset($rE["\x41\x75\164\x68\157\x72\x69\x7a\x61\164\151\x6f\x6e"])) {
            goto WA;
        }
        unset($rE["\101\x75\164\150\157\x72\151\172\x61\x74\x69\157\x6e"]);
        WA:
        Aw:
        MO_Oauth_Debug::mo_oauth_log("\124\x6f\153\x65\x6e\x20\145\x6e\144\160\x6f\x69\x6e\x74\40\x55\122\114\x20\75\76\x20" . $w7);
        $q1 = apply_filters("\x6d\x6f\137\157\141\x75\164\150\137\x70\157\x6c\x61\162\137\142\x6f\x64\171\x5f\x61\162\147\x75\x6d\x65\156\164\x73", $q1);
        MO_Oauth_Debug::mo_oauth_log("\142\157\x64\x79\x20\x3d\76");
        MO_Oauth_Debug::mo_oauth_log($q1);
        MO_Oauth_Debug::mo_oauth_log("\150\145\141\144\145\162\163\x20\x3d\x3e");
        MO_Oauth_Debug::mo_oauth_log($rE);
        $gv = wp_remote_post($w7, array("\x6d\145\164\150\x6f\144" => "\x50\117\123\x54", "\x74\x69\x6d\145\157\x75\164" => 45, "\x72\x65\x64\x69\x72\145\x63\164\x69\157\156" => 5, "\150\164\x74\160\166\x65\162\163\151\157\x6e" => "\x31\56\60", "\x62\x6c\x6f\143\153\x69\156\147" => true, "\150\145\141\144\x65\162\163" => $rE, "\x62\x6f\144\x79" => $q1, "\x63\157\157\x6b\x69\x65\x73" => array(), "\x73\163\x6c\x76\x65\162\151\x66\x79" => false));
        if (!is_wp_error($gv)) {
            goto b8;
        }
        $vj->handle_error($gv->get_error_message());
        MO_Oauth_Debug::mo_oauth_log("\105\x72\x72\157\162\40\x66\162\157\155\40\124\x6f\153\x65\x6e\x20\x45\156\x64\x70\157\151\x6e\164\x3a\40" . $gv->get_error_message());
        wp_die(wp_kses($gv->get_error_message(), \mo_oauth_get_valid_html()));
        exit;
        b8:
        $gv = $gv["\142\157\144\171"];
        if (is_array(json_decode($gv, true))) {
            goto ya;
        }
        $vj->handle_error("\111\156\x76\141\x6c\x69\x64\40\162\x65\163\160\157\x6e\163\145\40\x72\145\143\x65\151\x76\x65\x64\x20\72\x20" . $gv);
        echo "\74\163\164\162\x6f\x6e\x67\x3e\x52\145\163\x70\x6f\x6e\163\x65\x20\72\x20\74\x2f\163\164\162\157\x6e\147\76\x3c\x62\x72\76";
        print_r($gv);
        echo "\x3c\142\x72\76\74\142\x72\76";
        MO_Oauth_Debug::mo_oauth_log("\x45\x72\x72\x6f\162\40\146\x72\x6f\155\40\124\x6f\x6b\145\156\x20\105\156\x64\160\x6f\x69\x6e\x74\75\x3e\40\x49\x6e\x76\141\154\151\144\40\x52\145\x73\160\157\x6e\163\145\x20\162\145\x63\145\x69\166\x65\144\x2e" . $gv);
        exit("\x49\x6e\166\141\x6c\151\144\x20\x72\145\x73\x70\157\156\163\145\x20\x72\145\143\x65\x69\166\145\x64\x2e");
        ya:
        $lM = json_decode($gv, true);
        if (isset($lM["\145\162\x72\157\162\137\x64\145\x73\x63\x72\x69\160\x74\x69\157\x6e"])) {
            goto bb;
        }
        if (isset($lM["\x65\162\162\157\162"])) {
            goto B0;
        }
        goto Hf;
        bb:
        do_action("\155\x6f\137\x72\x65\x64\x69\162\145\x63\164\137\x74\x6f\137\143\165\163\x74\157\155\x5f\145\x72\162\157\x72\x5f\x70\x61\x67\145");
        if (!($q1["\x67\x72\141\156\x74\x5f\x74\171\x70\x65"] == "\160\141\163\x73\x77\x6f\x72\144" && $EY)) {
            goto nP;
        }
        $TM->add("\x6d\157\137\x6f\x61\165\x74\150\x5f\x69\144\x70\137\145\162\x72\x6f\x72", __("\74\163\164\x72\157\156\x67\x3e\x45\x52\x52\x4f\x52\x3c\x2f\163\164\x72\157\156\147\76\72\x20" . $lM["\145\x72\x72\157\162\x5f\144\x65\x73\x63\x72\151\x70\x74\x69\157\156"]));
        return $TM;
        nP:
        $vj->handle_error($lM["\x65\162\162\x6f\x72\x5f\144\145\163\x63\162\151\160\164\x69\157\x6e"]);
        $this->handle_error(json_encode($lM["\x65\x72\162\x6f\162\137\x64\x65\163\143\x72\151\x70\x74\151\157\x6e"]), $q1);
        return;
        goto Hf;
        B0:
        do_action("\155\157\137\162\x65\144\x69\x72\145\143\164\137\x74\157\x5f\x63\x75\163\x74\x6f\155\137\145\162\162\157\x72\137\x70\141\x67\145");
        if (!($q1["\147\x72\141\x6e\164\x5f\x74\171\x70\145"] == "\x70\x61\163\163\167\157\162\x64" && $EY)) {
            goto BX;
        }
        $TM->add("\155\157\x5f\157\141\165\x74\150\x5f\151\x64\x70\x5f\x65\x72\x72\x6f\x72", __("\74\163\164\162\157\x6e\147\x3e\105\x52\122\117\x52\x3c\x2f\x73\x74\x72\x6f\156\x67\x3e\x3a\40" . $lM["\x65\162\x72\x6f\x72"]));
        return $TM;
        BX:
        $vj->handle_error($lM["\x65\162\x72\x6f\x72"]);
        $this->handle_error(json_encode($lM["\145\x72\162\x6f\162"]), $q1);
        return;
        Hf:
        return $gv;
    }
    public function get_atoken($w7, $q1, $Yt, $ET = true, $zg = false)
    {
        global $vj;
        foreach ($q1 as $Vi => $GT) {
            $q1[$Vi] = html_entity_decode($GT);
            iS:
        }
        dA:
        $mT = '';
        if (!isset($q1["\x63\154\151\x65\x6e\164\137\x73\145\143\x72\145\x74"])) {
            goto MS;
        }
        $mT = $q1["\x63\x6c\151\x65\x6e\164\x5f\163\x65\143\x72\x65\164"];
        MS:
        $lY = $q1["\x63\154\151\145\156\164\137\151\x64"];
        $rE = array("\x41\143\143\x65\x70\164" => "\141\x70\x70\154\151\x63\x61\164\151\x6f\156\57\x6a\x73\157\x6e", "\x63\150\x61\162\x73\145\164" => "\125\124\x46\x20\55\x20\x38", "\x43\157\156\164\145\x6e\164\x2d\x54\x79\160\145" => "\x61\160\x70\x6c\x69\143\141\164\x69\157\156\x2f\x78\x2d\167\167\167\55\x66\157\162\155\55\x75\162\x6c\x65\156\x63\157\x64\145\x64", "\x41\165\164\150\x6f\162\151\172\x61\164\x69\157\x6e" => "\x42\x61\163\151\143\40" . base64_encode($lY . "\x3a" . $mT));
        if (!isset($q1["\143\x6f\x64\x65\137\166\145\x72\x69\146\151\145\x72"])) {
            goto V0;
        }
        unset($rE["\x41\165\164\x68\x6f\162\151\x7a\141\164\151\x6f\156"]);
        V0:
        if (1 === $ET && 0 === $zg) {
            goto OZ;
        }
        if (0 === $ET && 1 === $zg) {
            goto pa;
        }
        goto ww;
        OZ:
        unset($q1["\143\154\151\145\156\x74\137\151\144"]);
        if (!isset($q1["\143\154\151\x65\x6e\164\137\x73\x65\x63\x72\x65\x74"])) {
            goto HW;
        }
        unset($q1["\143\154\x69\145\156\x74\x5f\x73\x65\x63\162\145\164"]);
        HW:
        goto ww;
        pa:
        if (!isset($rE["\x41\165\164\x68\x6f\x72\x69\172\x61\164\151\x6f\x6e"])) {
            goto zj;
        }
        unset($rE["\x41\x75\164\150\157\162\x69\x7a\141\x74\151\157\x6e"]);
        zj:
        ww:
        $jr = curl_init($w7);
        curl_setopt($jr, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($jr, CURLOPT_ENCODING, '');
        curl_setopt($jr, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($jr, CURLOPT_AUTOREFERER, true);
        curl_setopt($jr, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($jr, CURLOPT_MAXREDIRS, 10);
        curl_setopt($jr, CURLOPT_POST, true);
        curl_setopt($jr, CURLOPT_HTTPHEADER, array("\101\x75\x74\150\157\162\151\172\x61\x74\x69\157\x6e\72\x20\102\141\x73\151\143\x20" . base64_encode($lY . "\x3a" . $mT), "\101\143\143\145\x70\164\x3a\x20\141\x70\160\154\151\143\x61\164\x69\157\x6e\x2f\152\163\x6f\156"));
        curl_setopt($jr, CURLOPT_POSTFIELDS, "\162\x65\x64\151\x72\145\x63\164\137\165\x72\x69\x3d" . $q1["\162\145\144\151\162\145\143\x74\x5f\165\x72\x69"] . "\46\147\x72\141\x6e\x74\137\164\x79\160\145\75" . "\x61\x75\164\x68\157\x72\x69\x7a\x61\164\151\157\156\137\143\x6f\x64\x65" . "\x26\x63\154\x69\x65\156\x74\137\x69\x64\75" . $lY . "\46\143\154\151\145\156\164\137\x73\x65\x63\162\145\164\75" . $mT . "\x26\x63\x6f\144\145\75" . $Yt);
        $lM = curl_exec($jr);
        if (!curl_error($jr)) {
            goto IE;
        }
        echo "\74\x62\x3e\x52\x65\163\x70\157\x6e\x73\x65\40\72\40\74\x2f\x62\x3e\x3c\142\162\76";
        print_r($lM);
        echo "\74\142\x72\x3e\x3c\142\x72\76";
        MO_Oauth_Debug::mo_oauth_log(curl_error($jr));
        exit(curl_error($jr));
        IE:
        if (isset($lM["\x65\162\162\x6f\162\x5f\144\145\163\x63\x72\151\160\164\x69\157\x6e"])) {
            goto sU;
        }
        if (isset($lM["\x65\x72\162\x6f\162"])) {
            goto Re;
        }
        if (!isset($lM["\141\x63\x63\145\163\x73\137\164\x6f\x6b\x65\x6e"])) {
            goto Qp;
        }
        $u1 = $lM["\x61\143\143\145\x73\x73\137\164\157\153\145\156"];
        Qp:
        goto q0;
        Re:
        $vA = "\x45\162\162\x6f\x72\40\146\162\157\x6d\40\124\x6f\x6b\x65\156\x20\105\x6e\144\x70\157\151\x6e\x74\72\x20" . $lM["\145\162\162\157\162"];
        MO_Oauth_Debug::mo_oauth_log($vA);
        do_action("\155\157\137\x72\145\144\151\x72\x65\143\x74\137\164\157\137\143\165\x73\164\x6f\x6d\137\145\162\162\157\162\137\160\x61\x67\145");
        exit($lM["\x65\162\162\157\x72\x5f\144\x65\x73\x63\162\151\160\x74\x69\157\156"]);
        q0:
        goto QE;
        sU:
        $vA = "\x45\x72\x72\x6f\162\40\x66\162\x6f\x6d\x20\x54\x6f\153\145\x6e\x20\x45\156\x64\x70\157\151\156\x74\x3a\40" . $lM["\145\x72\x72\x6f\x72\x5f\144\x65\163\143\162\x69\x70\x74\x69\157\x6e"];
        MO_Oauth_Debug::mo_oauth_log($vA);
        do_action("\x6d\x6f\137\x72\x65\x64\x69\162\x65\143\x74\x5f\164\x6f\137\x63\x75\163\164\157\155\137\x65\x72\x72\x6f\x72\x5f\x70\141\x67\x65");
        exit($lM["\145\162\x72\x6f\162\137\144\145\x73\143\x72\x69\160\x74\x69\x6f\156"]);
        QE:
        return $lM;
    }
    public function get_access_token($w7, $q1, $ET, $zg)
    {
        global $vj;
        $gv = $this->get_token($w7, $q1, $ET, $zg);
        if (!is_wp_error($gv)) {
            goto ZK;
        }
        return $gv;
        ZK:
        $lM = json_decode($gv, true);
        if (!("\x70\x61\x73\163\167\x6f\x72\144" === $q1["\147\162\141\x6e\x74\137\164\171\x70\145"])) {
            goto uP;
        }
        return $lM;
        uP:
        if (isset($lM["\x61\143\143\x65\163\x73\137\x74\157\x6b\145\156"])) {
            goto ti;
        }
        $TM = "\x49\156\x76\x61\x6c\x69\x64\x20\x72\x65\163\160\x6f\156\x73\x65\x20\x72\x65\143\145\x69\x76\145\x64\40\146\162\157\155\40\117\101\165\164\x68\40\x50\162\157\x76\151\x64\x65\x72\x2e\x20\x43\157\x6e\x74\x61\x63\164\x20\x79\157\x75\x72\x20\x61\x64\x6d\151\156\151\163\164\x72\141\x74\x6f\162\x20\146\x6f\162\x20\155\157\x72\145\40\144\x65\x74\x61\151\154\163\56\x3c\x62\162\76\x3c\x62\x72\76\x3c\x73\164\x72\x6f\x6e\x67\x3e\x52\x65\x73\x70\157\x6e\163\145\x20\x3a\x20\x3c\x2f\x73\164\x72\x6f\156\147\76\x3c\x62\162\76" . $gv;
        $vj->handle_error($TM);
        MO_Oauth_Debug::mo_oauth_log("\105\162\x72\157\x72\40\x77\x68\x69\x6c\x65\x20\146\x65\x74\143\x68\151\x6e\147\x20\164\157\153\x65\156\x3a\40" . $TM);
        echo $TM;
        exit;
        goto Pu;
        ti:
        return $lM["\141\x63\143\145\163\163\137\x74\x6f\153\145\156"];
        Pu:
    }
    public function get_id_token($w7, $q1, $ET, $zg)
    {
        global $vj;
        $gv = $this->get_token($w7, $q1, $ET, $zg);
        $lM = json_decode($gv, true);
        if (isset($lM["\x69\144\137\164\x6f\153\x65\x6e"])) {
            goto ym;
        }
        $TM = "\111\x6e\x76\141\x6c\151\144\40\x72\x65\163\160\157\156\x73\x65\40\x72\145\x63\x65\151\166\145\x64\40\146\162\157\155\40\x4f\160\x65\156\111\x64\x20\120\x72\x6f\x76\x69\144\145\162\56\x20\103\157\x6e\x74\141\x63\x74\40\171\x6f\x75\162\40\141\x64\155\x69\156\x69\163\164\162\141\x74\157\x72\x20\x66\157\x72\x20\x6d\157\162\x65\x20\144\x65\164\141\151\154\163\56\x3c\x62\162\x3e\74\x62\x72\x3e\x3c\163\x74\x72\x6f\x6e\x67\x3e\x52\x65\163\x70\157\156\x73\x65\x20\72\40\74\x2f\x73\164\x72\157\x6e\147\x3e\x3c\142\x72\x3e" . $gv;
        $vj->handle_error($TM);
        MO_Oauth_Debug::mo_oauth_log("\x45\x72\162\157\162\x20\167\150\151\x6c\145\x20\146\145\x74\143\x68\151\156\x67\x20\151\144\137\164\157\153\x65\x6e\72\x20" . $TM);
        echo $TM;
        exit;
        goto Ch;
        ym:
        return $lM;
        Ch:
    }
    public function get_resource_owner_from_id_token($xk)
    {
        global $vj;
        $Ql = explode("\56", $xk);
        if (!isset($Ql[1])) {
            goto lY;
        }
        $ok = $vj->base64url_decode($Ql[1]);
        if (!is_array(json_decode($ok, true))) {
            goto qm;
        }
        return json_decode($ok, true);
        qm:
        lY:
        $TM = "\x49\156\166\141\x6c\151\144\40\x72\145\163\160\157\156\x73\x65\40\162\x65\143\x65\x69\x76\x65\x64\56\x3c\x62\x72\x3e\x3c\x73\164\162\157\156\147\x3e\151\144\x5f\x74\157\x6b\x65\156\40\x3a\40\74\x2f\163\x74\x72\157\x6e\x67\76" . $xk;
        $vj->handle_error($TM);
        MO_Oauth_Debug::mo_oauth_log("\105\x72\x72\x6f\x72\40\167\150\x69\154\145\40\146\145\164\143\x68\x69\156\x67\x20\x72\145\163\x6f\x75\162\143\145\40\x6f\x77\156\145\x72\40\146\x72\157\155\40\151\144\x20\x74\157\153\145\x6e\x3a" . $TM);
        echo $TM;
        exit;
    }
    public function get_resource_owner($lQ, $u1)
    {
        global $vj;
        $rE = array();
        $rE["\x41\x75\164\150\x6f\x72\x69\172\141\x74\x69\x6f\x6e"] = "\x42\145\141\162\145\162\x20" . $u1;
        $rE = apply_filters("\x6d\157\x5f\x65\x78\164\145\156\x64\137\x75\x73\x65\x72\151\156\x66\157\137\x70\x61\162\x61\155\163", $rE, $lQ);
        MO_Oauth_Debug::mo_oauth_log("\x52\x65\163\157\165\162\x63\x65\40\x4f\167\x6e\145\x72\40\105\x6e\144\x70\x6f\x69\x6e\164\40\x3d\76\x20" . $lQ);
        MO_Oauth_Debug::mo_oauth_log("\122\x65\163\157\x75\x72\x63\145\40\x4f\x77\156\x65\162\40\162\x65\x71\x75\145\x73\x74\x20\143\157\x6e\x74\x65\156\x74\x20\x3d\x3e\40");
        MO_Oauth_Debug::mo_oauth_log("\x68\145\141\144\145\162\x73\40\75\x3e");
        MO_Oauth_Debug::mo_oauth_log($rE);
        $lQ = apply_filters("\155\157\137\157\x61\165\164\x68\137\x75\x73\145\x72\x69\156\146\157\x5f\151\x6e\164\x65\x72\156\141\x6c", $lQ);
        $gv = wp_remote_post($lQ, array("\155\x65\164\150\157\144" => "\x47\105\x54", "\x74\151\155\145\157\x75\x74" => 45, "\162\145\144\x69\162\x65\143\x74\x69\157\156" => 5, "\150\x74\x74\160\166\145\x72\x73\x69\157\156" => "\61\56\x30", "\142\154\x6f\143\153\x69\156\147" => true, "\150\x65\141\x64\145\x72\x73" => $rE, "\x63\157\157\153\151\x65\x73" => array(), "\163\163\x6c\x76\145\162\151\146\171" => false));
        if (!is_wp_error($gv)) {
            goto kH;
        }
        $vj->handle_error($gv->get_error_message());
        MO_Oauth_Debug::mo_oauth_log("\105\162\162\x6f\162\40\146\162\157\155\x20\122\145\x73\x6f\x75\162\143\x65\40\105\156\x64\160\157\151\156\x74\72\x20" . $gv->get_error_message());
        wp_die(wp_kses($gv->get_error_message(), \mo_oauth_get_valid_html()));
        exit;
        kH:
        $gv = $gv["\x62\157\144\171"];
        if (is_array(json_decode($gv, true))) {
            goto mQ;
        }
        $vj->handle_error("\111\x6e\166\141\154\151\x64\x20\162\x65\163\160\157\x6e\x73\x65\40\162\145\x63\145\x69\166\145\144\x20\72\40" . $gv);
        echo "\x3c\x73\x74\x72\157\x6e\147\x3e\x52\x65\x73\x70\157\x6e\163\x65\x20\72\x20\74\x2f\x73\x74\x72\x6f\156\x67\76\74\x62\x72\x3e";
        print_r($gv);
        echo "\74\142\162\x3e\x3c\x62\162\x3e";
        MO_Oauth_Debug::mo_oauth_log("\111\x6e\x76\x61\154\151\144\40\x72\145\163\x70\157\x6e\163\x65\40\162\145\143\151\x65\x76\145\x64\x20\167\150\151\x6c\145\40\146\x65\x74\x63\150\x69\x6e\147\40\162\145\163\x6f\165\162\143\145\x20\157\x77\156\145\x72\40\x64\145\x74\141\x69\154\163");
        exit("\111\x6e\166\x61\x6c\x69\x64\x20\x72\145\163\x70\x6f\156\163\x65\x20\x72\145\143\145\x69\x76\x65\144\56");
        mQ:
        $lM = json_decode($gv, true);
        if (!(strpos($lQ, "\141\x70\151\56\x63\154\x65\166\145\162\56\x63\157\155") != false && isset($lM["\154\x69\156\153\x73"][1]["\165\x72\151"]) && strpos($lQ, $lM["\154\x69\156\153\x73"][1]["\x75\x72\x69"]) === false)) {
            goto Bf;
        }
        $Lz = $lM["\x6c\151\156\153\x73"][1]["\165\x72\x69"];
        $Sy = "\x68\164\x74\160\x73\x3a\x2f\x2f\x61\160\151\x2e\143\x6c\145\166\145\x72\x2e\x63\157\x6d" . $Lz;
        $vj->mo_oauth_client_update_option("\x6d\x6f\x5f\157\x61\165\x74\150\137\x63\154\x69\x65\156\164\137\x63\x6c\145\166\145\x72\x5f\165\x73\145\x72\x5f\141\160\x69", $Sy);
        $lM = $this->get_resource_owner($Sy, $u1);
        Bf:
        if (isset($lM["\x65\x72\x72\x6f\x72\x5f\144\145\x73\x63\162\x69\160\x74\151\157\x6e"])) {
            goto QH;
        }
        if (isset($lM["\x65\x72\x72\x6f\x72"])) {
            goto yY;
        }
        goto ED;
        QH:
        $vA = "\105\162\x72\x6f\x72\x20\146\x72\157\x6d\40\122\145\163\x6f\165\x72\x63\x65\x20\105\156\x64\x70\157\x69\156\164\x3a\40" . $lM["\145\162\162\x6f\x72\x5f\144\145\x73\x63\162\x69\160\x74\x69\x6f\x6e"];
        $vj->handle_error($lM["\145\162\x72\157\x72\137\x64\x65\163\143\x72\x69\160\164\151\157\x6e"]);
        MO_Oauth_Debug::mo_oauth_log($vA);
        do_action("\x6d\157\137\162\x65\144\x69\162\x65\143\x74\137\164\157\137\x63\x75\x73\x74\x6f\155\137\145\x72\162\157\x72\137\160\x61\x67\145");
        exit(json_encode($lM["\145\162\162\x6f\162\x5f\x64\x65\163\x63\x72\x69\x70\164\x69\157\x6e"]));
        goto ED;
        yY:
        $vA = "\x45\x72\162\x6f\162\x20\146\162\x6f\x6d\x20\122\x65\163\157\165\162\x63\145\x20\105\156\144\x70\157\x69\156\x74\72\40" . $lM["\x65\x72\x72\157\x72"];
        $vj->handle_error($lM["\145\x72\162\x6f\x72"]);
        MO_Oauth_Debug::mo_oauth_log($vA);
        do_action("\155\x6f\137\162\145\144\151\162\145\143\164\137\x74\x6f\x5f\x63\x75\x73\164\x6f\155\x5f\x65\x72\162\x6f\162\137\x70\141\x67\x65");
        exit(json_encode($lM["\x65\162\x72\157\x72"]));
        ED:
        return $lM;
    }
    public function get_response($im)
    {
        $gv = wp_remote_get($im, array("\x6d\145\x74\x68\157\x64" => "\107\x45\124", "\x74\x69\155\x65\157\x75\x74" => 45, "\162\x65\x64\x69\162\145\143\x74\x69\157\x6e" => 5, "\150\164\164\x70\166\145\x72\x73\x69\x6f\x6e" => 1.0, "\x62\x6c\157\x63\153\151\x6e\147" => true, "\150\145\141\144\145\x72\163" => array(), "\143\157\157\153\x69\145\x73" => array(), "\x73\163\x6c\x76\x65\x72\x69\x66\x79" => false));
        if (!is_wp_error($gv)) {
            goto hq;
        }
        MO_Oauth_Debug::mo_oauth_log($gv->get_error_message());
        wp_die(wp_kses($gv->get_error_message(), \mo_oauth_get_valid_html()));
        exit;
        hq:
        $gv = $gv["\142\157\144\x79"];
        $lM = json_decode($gv, true);
        if (isset($lM["\145\x72\162\x6f\162\137\144\145\163\143\x72\151\x70\164\x69\157\x6e"])) {
            goto VU;
        }
        if (isset($lM["\145\162\162\x6f\162"])) {
            goto JI;
        }
        goto w7;
        VU:
        $vj->handle_error($lM["\145\x72\x72\157\x72\x5f\144\x65\163\x63\162\151\x70\164\151\x6f\156"]);
        MO_Oauth_Debug::mo_oauth_log($vA);
        do_action("\x6d\157\x5f\162\145\144\151\162\x65\x63\164\137\x74\x6f\x5f\143\165\x73\164\157\155\137\x65\x72\x72\x6f\x72\137\x70\x61\x67\145");
        goto w7;
        JI:
        $vj->handle_error($lM["\145\162\162\x6f\162"]);
        MO_Oauth_Debug::mo_oauth_log($vA);
        do_action("\x6d\x6f\137\162\145\144\x69\x72\x65\143\x74\x5f\164\x6f\x5f\x63\165\163\164\157\x6d\x5f\x65\x72\162\x6f\x72\x5f\x70\141\147\145");
        w7:
        return $lM;
    }
    private function handle_error($TM, $q1)
    {
        global $vj;
        if (!($q1["\x67\162\141\156\x74\x5f\164\171\x70\x65"] === "\160\x61\x73\163\x77\x6f\x72\x64")) {
            goto hk;
        }
        $bc = $vj->get_current_url();
        $bc = apply_filters("\x6d\x6f\137\157\x61\x75\x74\x68\137\x77\x6f\x6f\143\157\155\x6d\145\x72\143\x65\137\x63\150\x65\x63\x6b\x6f\165\x74\x5f\x63\157\155\160\141\x74\x69\142\151\154\x69\164\171", $bc);
        if ($bc != '') {
            goto ys;
        }
        return;
        goto vA;
        ys:
        $bc = "\77\x6f\x70\x74\x69\x6f\x6e\x3d\x65\162\x72\x6f\x72\155\x61\x6e\x61\147\x65\162\46\145\162\x72\157\162\75" . \base64_encode($TM);
        MO_Oauth_Debug::mo_oauth_log("\105\x72\x72\x6f\162\x3a\40" . $TM);
        wp_die($TM);
        exit;
        vA:
        hk:
        MO_Oauth_Debug::mo_oauth_log("\105\162\162\157\162\72\40" . $TM);
        exit($TM);
    }
}
