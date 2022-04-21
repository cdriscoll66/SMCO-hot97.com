<?php


namespace MoOauthClient;

use MoOauthClient\MO_Custom_OAuth1;
use MoOauthClient\MO_Oauth_Debug;
class MO_Custom_OAuth1
{
    public static function mo_oauth1_auth_request($Mg)
    {
        global $vj;
        $BD = $vj->get_app_by_name($Mg)->get_app_config();
        $lY = $BD["\x63\x6c\x69\145\x6e\x74\x5f\151\144"];
        $mT = $BD["\143\x6c\151\145\156\164\137\163\x65\143\162\145\x74"];
        $pJ = $BD["\x61\x75\164\150\157\162\x69\x7a\x65\165\162\x6c"];
        $Wa = $BD["\162\145\161\x75\x65\x73\x74\x75\162\x6c"];
        $uc = $BD["\x61\x63\143\x65\163\163\164\x6f\x6b\x65\156\x75\162\x6c"];
        $hQ = $BD["\162\145\x73\x6f\165\162\x63\145\x6f\x77\156\x65\162\144\145\164\x61\x69\154\x73\x75\162\x6c"];
        $EM = new MO_Custom_OAuth1_Flow($lY, $mT, $Wa, $uc, $hQ);
        $MV = $EM->mo_oauth1_get_request_token();
        if (!(strpos($pJ, "\77") == false)) {
            goto Zt;
        }
        $pJ .= "\77";
        Zt:
        $J9 = $pJ . "\x6f\141\165\164\x68\x5f\x74\x6f\153\145\x6e\75" . $MV;
        if (!($MV == '' || $MV == NULL)) {
            goto Ko;
        }
        MO_Oauth_Debug::mo_oauth_log("\105\162\x72\157\162\40\151\156\x20\x52\x65\161\165\x65\163\x74\40\x54\x6f\153\145\156\40\105\156\144\160\157\x69\156\164");
        wp_die("\x45\162\162\x6f\x72\x20\x69\156\x20\x52\145\161\x75\145\x73\164\40\x54\x6f\x6b\145\156\x20\105\156\144\160\x6f\x69\x6e\164\x3a\x20\x49\x6e\166\x61\x6c\x69\x64\40\164\x6f\x6b\x65\156\40\x72\x65\x63\x65\151\166\145\x64\x2e\x20\103\x6f\156\164\141\x63\x74\40\164\x6f\x20\171\157\165\x72\x20\141\144\155\151\155\151\x73\164\x72\141\x74\157\162\x20\x66\x6f\x72\x20\155\x6f\162\x65\x20\151\x6e\146\157\162\155\x61\x74\x69\157\x6e\56");
        Ko:
        MO_Oauth_Debug::mo_oauth_log("\x52\145\161\165\145\x73\x74\x20\x54\x6f\x6b\145\156\40\162\x65\x63\145\151\166\x65\x64\x2e");
        MO_Oauth_Debug::mo_oauth_log("\122\x65\x71\165\x65\x73\x74\x20\x54\x6f\153\145\156\x20\x3d\76\x20" . $MV);
        header("\114\157\x63\141\x74\x69\157\156\72" . $J9);
        exit;
    }
    static function mo_oidc1_get_access_token($Mg)
    {
        $hM = explode("\46", $_SERVER["\122\105\121\x55\105\x53\x54\137\125\122\111"]);
        $u8 = explode("\x3d", $hM[1]);
        $IQ = explode("\75", $hM[0]);
        $G5 = get_option("\155\157\137\157\x61\165\x74\150\137\141\160\x70\163\137\x6c\x69\x73\164");
        $gW = $Mg;
        $Kk = null;
        foreach ($G5 as $Vi => $kL) {
            if (!($Mg == $Vi)) {
                goto CS;
            }
            $Kk = $kL;
            goto xx;
            CS:
            Dq:
        }
        xx:
        global $vj;
        $BD = $vj->get_app_by_name($Mg)->get_app_config();
        $lY = $BD["\143\x6c\151\145\156\164\x5f\x69\x64"];
        $mT = $BD["\x63\154\151\x65\x6e\x74\x5f\x73\145\x63\162\145\x74"];
        $pJ = $BD["\x61\165\x74\150\x6f\x72\151\x7a\145\165\x72\154"];
        $Wa = $BD["\162\145\x71\x75\x65\163\164\x75\162\154"];
        $uc = $BD["\x61\143\x63\145\x73\163\x74\157\153\x65\156\x75\x72\154"];
        $hQ = $BD["\162\145\x73\157\x75\162\x63\145\x6f\x77\x6e\145\x72\x64\145\x74\141\151\154\x73\x75\162\x6c"];
        $EN = new MO_Custom_OAuth1_Flow($lY, $mT, $Wa, $uc, $hQ);
        $J0 = $EN->mo_oauth1_get_access_token($u8[1], $IQ[1]);
        $JZ = explode("\x26", $J0);
        $cR = '';
        $B3 = '';
        foreach ($JZ as $Vi) {
            $cV = explode("\75", $Vi);
            if ($cV[0] == "\x6f\141\165\164\150\137\164\157\153\145\x6e") {
                goto J7;
            }
            if (!($cV[0] == "\157\x61\x75\164\x68\x5f\x74\157\x6b\x65\x6e\x5f\x73\145\143\x72\x65\x74")) {
                goto LB;
            }
            $B3 = $cV[1];
            LB:
            goto Jm;
            J7:
            $cR = $cV[1];
            Jm:
            a7:
        }
        MM:
        MO_Oauth_Debug::mo_oauth_log("\x41\143\x63\145\163\163\x20\124\157\x6b\x65\x6e\40\x72\145\143\x65\x69\166\145\144\56");
        MO_Oauth_Debug::mo_oauth_log("\x41\143\143\x65\163\163\x20\124\x6f\x6b\145\x6e\40\x3d\x3e\x20" . $cR);
        $ZB = new MO_Custom_OAuth1_Flow($lY, $mT, $Wa, $uc, $hQ);
        $QC = isset($ln[1]) ? $ln[1] : '';
        $ud = isset($MZ[1]) ? $MZ[1] : '';
        $vO = isset($MX[1]) ? $MX[1] : '';
        $B7 = $ZB->mo_oauth1_get_profile_signature($cR, $B3);
        if (isset($B7)) {
            goto KT;
        }
        wp_die("\111\x6e\x76\141\x6c\x69\144\40\x43\x6f\156\146\151\147\165\162\x61\164\151\157\156\x73\x2e\40\x50\x6c\145\x61\163\145\40\x63\x6f\156\x74\x61\143\x74\x20\164\x6f\x20\x74\x68\145\40\141\144\155\151\155\x69\x73\164\162\141\x74\157\x72\x20\x66\157\162\40\x6d\x6f\162\x65\40\x69\x6e\146\157\x72\155\x61\x74\x69\157\x6e");
        KT:
        return $B7;
    }
}
class MO_Custom_OAuth1_Flow
{
    var $key = '';
    var $secret = '';
    var $request_token_url = '';
    var $access_token_url = '';
    var $userinfo_url = '';
    function __construct($y_, $mT, $Wa, $uc, $hQ)
    {
        $this->key = $y_;
        $this->secret = $mT;
        $this->request_token_url = $Wa;
        $this->access_token_url = $uc;
        $this->userinfo_url = $hQ;
    }
    function mo_oauth1_get_request_token()
    {
        $TQ = array("\157\141\x75\x74\150\x5f\166\x65\162\x73\151\x6f\x6e" => "\x31\56\60", "\x6f\x61\165\164\150\137\x6e\157\156\x63\145" => time(), "\157\x61\165\x74\x68\x5f\x74\151\x6d\x65\163\x74\x61\x6d\x70" => time(), "\157\x61\165\164\150\137\143\157\x6e\163\x75\x6d\x65\x72\x5f\x6b\x65\171" => $this->key, "\157\141\x75\x74\150\x5f\x73\x69\x67\x6e\141\164\165\162\x65\137\155\145\x74\x68\157\x64" => "\110\x4d\101\103\x2d\x53\x48\101\61");
        if (!(strpos($this->request_token_url, "\x3f") != false)) {
            goto pr;
        }
        $qP = explode("\77", $this->request_token_url);
        $this->request_token_url = $qP[0];
        $CM = explode("\x26", $qP[1]);
        foreach ($CM as $HH) {
            $eN = explode("\x3d", $HH);
            $TQ[$eN[0]] = $eN[1];
            QN:
        }
        lF:
        pr:
        $NW = array_keys($TQ);
        $oM = array_values($TQ);
        $TQ = $this->mo_oauth1_url_encode_rfc3986(array_combine($NW, $oM));
        uksort($TQ, "\x73\164\162\143\x6d\x70");
        foreach ($TQ as $Uf => $q3) {
            $zn[] = $this->mo_oauth1_url_encode_rfc3986($Uf) . "\x3d" . $this->mo_oauth1_url_encode_rfc3986($q3);
            F2:
        }
        hV:
        $b6 = implode("\46", $zn);
        $Ax = $b6;
        $Ax = str_replace("\x3d", "\45\x33\104", $Ax);
        $Ax = str_replace("\x26", "\45\62\66", $Ax);
        $Ax = "\107\x45\x54\x26" . $this->mo_oauth1_url_encode_rfc3986($this->request_token_url) . "\x26" . $Ax;
        $YU = $this->mo_oauth1_url_encode_rfc3986($this->secret) . "\46";
        $TQ["\157\x61\x75\x74\150\x5f\x73\151\x67\x6e\141\x74\x75\162\145"] = $this->mo_oauth1_url_encode_rfc3986(base64_encode(hash_hmac("\163\150\141\61", $Ax, $YU, TRUE)));
        uksort($TQ, "\x73\164\x72\143\155\x70");
        foreach ($TQ as $Uf => $q3) {
            $xf[] = $Uf . "\75" . $q3;
            LH:
        }
        J0:
        $fk = implode("\46", $xf);
        $im = $this->request_token_url . "\77" . $fk;
        MO_Oauth_Debug::mo_oauth_log("\122\145\x71\165\145\x73\x74\x20\x54\157\x6b\145\156\x20\x55\x52\114\x20\x3d\x3e\x20" . $im);
        $gv = $this->mo_oauth1_https($im);
        MO_Oauth_Debug::mo_oauth_log("\x52\x65\x71\x75\145\163\x74\x20\x54\157\153\x65\156\x20\x45\x6e\x64\160\157\151\x6e\x74\x20\122\x65\x73\160\x6f\x6e\x73\145\40\75\x3e\x20");
        MO_Oauth_Debug::mo_oauth_log($gv);
        $o3 = explode("\46", $gv);
        $qo = '';
        foreach ($o3 as $Vi) {
            $cV = explode("\75", $Vi);
            if ($cV[0] == "\x6f\141\x75\x74\x68\137\164\x6f\153\145\x6e") {
                goto wW;
            }
            if (!($cV[0] == "\157\141\x75\x74\x68\137\164\x6f\153\x65\x6e\137\x73\145\x63\162\x65\164")) {
                goto CC;
            }
            setcookie("\155\157\x5f\x74\x73", $cV[1], time() + 30);
            CC:
            goto Pl;
            wW:
            $qo = $cV[1];
            Pl:
            KX:
        }
        p4:
        return $qo;
    }
    function mo_oauth1_get_access_token($u8, $IQ)
    {
        $TQ = array("\x6f\141\165\x74\x68\137\166\x65\162\163\151\157\156" => "\61\x2e\x30", "\157\141\165\x74\150\137\x6e\157\156\x63\145" => time(), "\157\141\x75\164\x68\137\x74\x69\x6d\x65\163\164\x61\x6d\x70" => time(), "\157\x61\165\x74\150\x5f\x63\x6f\156\x73\x75\155\145\x72\137\153\145\171" => $this->key, "\x6f\x61\165\x74\150\x5f\164\x6f\x6b\145\x6e" => $IQ, "\x6f\x61\165\164\x68\137\163\x69\147\x6e\141\x74\165\162\x65\x5f\x6d\145\x74\x68\157\144" => "\110\115\101\103\55\x53\110\101\x31", "\x6f\141\x75\x74\150\x5f\x76\145\162\151\146\x69\x65\x72" => $u8);
        $NW = $this->mo_oauth1_url_encode_rfc3986(array_keys($TQ));
        $oM = $this->mo_oauth1_url_encode_rfc3986(array_values($TQ));
        $TQ = array_combine($NW, $oM);
        uksort($TQ, "\x73\x74\162\x63\155\x70");
        foreach ($TQ as $Uf => $q3) {
            $zn[] = $this->mo_oauth1_url_encode_rfc3986($Uf) . "\x3d" . $this->mo_oauth1_url_encode_rfc3986($q3);
            kU:
        }
        ow:
        $b6 = implode("\46", $zn);
        $Ax = $b6;
        $Ax = str_replace("\75", "\x25\63\x44", $Ax);
        $Ax = str_replace("\x26", "\x25\62\66", $Ax);
        $Ax = "\x47\x45\124\46" . $this->mo_oauth1_url_encode_rfc3986($this->access_token_url) . "\46" . $Ax;
        $XY = isset($_COOKIE["\155\157\x5f\x74\163"]) ? $_COOKIE["\x6d\157\137\x74\x73"] : '';
        $YU = $this->mo_oauth1_url_encode_rfc3986($this->secret) . "\46" . $XY;
        $TQ["\157\x61\165\164\150\x5f\x73\151\147\x6e\x61\164\x75\162\145"] = $this->mo_oauth1_url_encode_rfc3986(base64_encode(hash_hmac("\163\150\141\x31", $Ax, $YU, TRUE)));
        uksort($TQ, "\x73\164\x72\143\x6d\x70");
        foreach ($TQ as $Uf => $q3) {
            $xf[] = $Uf . "\x3d" . $q3;
            AA:
        }
        eI:
        $fk = implode("\x26", $xf);
        $im = $this->access_token_url . "\x3f" . $fk;
        MO_Oauth_Debug::mo_oauth_log("\x41\143\143\x65\x73\163\x20\x54\x6f\x6b\x65\156\40\x45\x6e\x64\160\x6f\x69\x6e\x74\40\x55\x52\x4c\40\75\x3e\x20" . $im);
        $gv = $this->mo_oauth1_https($im);
        MO_Oauth_Debug::mo_oauth_log("\x41\x63\143\x65\163\x73\40\x54\x6f\x6b\x65\156\x20\x45\156\x64\160\157\151\x6e\164\40\x52\x65\x73\x70\x6f\156\x73\145\40\x3d\76\x20" . $gv);
        return $gv;
    }
    function mo_oauth1_get_profile_signature($J0, $MZ, $MX = '')
    {
        $TQ = array("\x6f\141\x75\164\x68\x5f\166\x65\162\163\151\157\x6e" => "\61\x2e\x30", "\157\x61\x75\x74\x68\137\x6e\x6f\x6e\143\x65" => time(), "\x6f\141\165\164\x68\x5f\164\151\155\145\x73\x74\141\155\160" => time(), "\157\141\165\164\150\137\x63\x6f\x6e\163\x75\155\x65\162\x5f\x6b\x65\x79" => $this->key, "\x6f\141\x75\x74\150\x5f\164\x6f\153\145\x6e" => $J0, "\x6f\141\165\x74\150\x5f\163\151\x67\x6e\x61\x74\165\162\x65\x5f\x6d\x65\x74\x68\157\144" => "\110\x4d\x41\103\x2d\x53\110\101\x31");
        if (!(strpos($this->userinfo_url, "\x3f") != false)) {
            goto aQ;
        }
        $qP = explode("\77", $this->userinfo_url);
        $this->userinfo_url = $qP[0];
        $CM = explode("\46", $qP[1]);
        foreach ($CM as $HH) {
            $eN = explode("\75", $HH);
            $TQ[$eN[0]] = $eN[1];
            V6:
        }
        FQ:
        aQ:
        $NW = $this->mo_oauth1_url_encode_rfc3986(array_keys($TQ));
        $oM = $this->mo_oauth1_url_encode_rfc3986(array_values($TQ));
        $TQ = array_combine($NW, $oM);
        uksort($TQ, "\163\x74\x72\143\x6d\160");
        foreach ($TQ as $Uf => $q3) {
            $zn[] = $this->mo_oauth1_url_encode_rfc3986($Uf) . "\x3d" . $this->mo_oauth1_url_encode_rfc3986($q3);
            nY:
        }
        Df:
        $b6 = implode("\x26", $zn);
        $Ax = "\107\105\124\46" . $this->mo_oauth1_url_encode_rfc3986($this->userinfo_url) . "\x26" . $this->mo_oauth1_url_encode_rfc3986($b6);
        $YU = $this->mo_oauth1_url_encode_rfc3986($this->secret) . "\46" . $this->mo_oauth1_url_encode_rfc3986($MZ);
        $TQ["\157\141\x75\x74\x68\x5f\163\151\x67\156\x61\x74\x75\x72\145"] = $this->mo_oauth1_url_encode_rfc3986(base64_encode(hash_hmac("\163\150\x61\61", $Ax, $YU, TRUE)));
        uksort($TQ, "\x73\164\x72\x63\155\x70");
        foreach ($TQ as $Uf => $q3) {
            $xf[] = $Uf . "\x3d" . $q3;
            nO:
        }
        G2:
        $fk = implode("\46", $xf);
        $im = $this->userinfo_url . "\x3f" . $fk;
        MO_Oauth_Debug::mo_oauth_log("\122\x65\x73\x6f\x75\x72\143\x65\x20\x45\x6e\144\160\x6f\151\x6e\x74\40\x55\x52\x4c\40\75\x3e\40" . $im);
        $q1 = array();
        MO_Oauth_Debug::mo_oauth_log("\x52\145\x73\x6f\165\x72\143\x65\40\x45\156\x64\x70\x6f\x69\156\164\40\151\x6e\x66\157\40\75\76\x20");
        MO_Oauth_Debug::mo_oauth_log($TQ);
        $uo = wp_remote_get($im, $q1);
        MO_Oauth_Debug::mo_oauth_log("\122\x65\163\x6f\165\x72\x63\145\x20\105\156\144\x70\x6f\x69\x6e\164\x20\122\145\163\x70\157\x6e\163\x65\40\x3d\x3e\40");
        MO_Oauth_Debug::mo_oauth_log($uo);
        $B7 = json_decode($uo["\142\x6f\144\171"], true);
        return $B7;
    }
    function mo_oauth1_https($im, $JN = null)
    {
        if (!isset($JN)) {
            goto xk;
        }
        $q1 = array("\155\x65\164\150\x6f\x64" => "\120\x4f\x53\x54", "\142\157\x64\x79" => $JN, "\164\151\x6d\x65\157\x75\x74" => "\65", "\x72\145\144\151\162\145\x63\x74\151\x6f\156" => "\65", "\x68\x74\164\x70\x76\145\162\163\x69\157\x6e" => "\61\x2e\x30", "\142\x6c\x6f\143\x6b\x69\x6e\x67" => true);
        MO_Oauth_Debug::mo_oauth_log("\117\141\165\x74\x68\x31\40\120\x4f\123\124\40\x45\x6e\x64\160\157\151\156\164\40\101\162\x67\165\155\145\156\x74\x73\x20\x3d\x3e\x20");
        MO_Oauth_Debug::mo_oauth_log($uo);
        $xP = wp_remote_post($im, $q1);
        return $xP["\x62\x6f\x64\x79"];
        xk:
        $q1 = array();
        $uo = wp_remote_get($im, $q1);
        if (!is_wp_error($uo)) {
            goto uC;
        }
        wp_die($uo);
        uC:
        $gv = $uo["\142\157\144\x79"];
        return $gv;
    }
    function mo_oauth1_url_encode_rfc3986($uN)
    {
        if (is_array($uN)) {
            goto jb;
        }
        if (is_scalar($uN)) {
            goto gb;
        }
        return '';
        goto ae;
        gb:
        return str_replace("\x2b", "\40", str_replace("\45\67\105", "\176", rawurlencode($uN)));
        ae:
        goto jH;
        jb:
        return array_map(array("\115\x6f\117\141\165\x74\x68\103\154\x69\x65\156\x74\134\x4d\x4f\137\103\165\163\x74\x6f\155\137\x4f\x41\165\164\x68\x31\137\106\154\x6f\167", "\x6d\157\x5f\157\141\x75\164\x68\61\x5f\x75\x72\x6c\137\x65\156\143\x6f\x64\x65\137\162\x66\x63\63\x39\x38\x36"), $uN);
        jH:
    }
}
