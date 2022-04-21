<?php


namespace MoOauthClient\GrantTypes;

use MoOauthClient\GrantTypes\JWSVerify;
use MoOauthClient\GrantTypes\Crypt_RSA;
use MoOauthClient\GrantTypes\Math_BigInteger;
class JWTUtils
{
    const HEADER = "\110\x45\x41\x44\105\122";
    const PAYLOAD = "\120\x41\x59\114\117\x41\104";
    const SIGN = "\123\111\x47\116";
    private $jwt;
    private $decoded_jwt;
    public function __construct($M3)
    {
        $M3 = \explode("\x2e", $M3);
        if (!(3 > count($M3))) {
            goto FU0;
        }
        return new \WP_Error("\x69\x6e\x76\x61\x6c\151\144\137\152\x77\x74", __("\112\x57\124\x20\x52\x65\x63\x65\x69\x76\145\144\40\x69\163\40\156\157\x74\x20\141\x20\166\x61\154\151\x64\40\x4a\x57\124"));
        FU0:
        $this->jwt = $M3;
        $ap = $this->get_jwt_claim('', self::HEADER);
        $rB = $this->get_jwt_claim('', self::PAYLOAD);
        $this->decoded_jwt = array("\x68\x65\141\x64\x65\x72" => $ap, "\160\x61\171\154\157\141\144" => $rB);
    }
    private function get_jwt_claim($uE = '', $jt = '')
    {
        global $vj;
        $Tg = '';
        switch ($jt) {
            case self::HEADER:
                $Tg = $this->jwt[0];
                goto tJz;
            case self::PAYLOAD:
                $Tg = $this->jwt[1];
                goto tJz;
            case self::SIGN:
                return $this->jwt[2];
            default:
                $vj->handle_error("\x43\x61\x6e\x6e\x6f\x74\40\106\151\156\144\x20" . $jt . "\40\x69\156\x20\164\150\145\40\112\127\124");
                wp_die(wp_kses("\103\x61\x6e\156\x6f\x74\40\106\x69\x6e\x64\x20" . $jt . "\40\x69\156\x20\x74\150\145\40\x4a\127\124", \mo_oauth_get_valid_html()));
        }
        JTo:
        tJz:
        $Tg = json_decode($vj->base64url_decode($Tg), true);
        if (!(!$Tg || empty($Tg))) {
            goto om6;
        }
        return null;
        om6:
        return empty($uE) ? $Tg : (isset($Tg[$uE]) ? $Tg[$uE] : null);
    }
    public function check_algo($K3 = '')
    {
        global $vj;
        $Xt = $this->get_jwt_claim("\x61\154\147", self::HEADER);
        $Xt = explode("\123", $Xt);
        if (isset($Xt[0])) {
            goto I7Y;
        }
        $TM = "\111\x6e\166\x61\x6c\151\x64\x20\122\x65\x73\160\x6f\x6e\163\145\40\122\145\x63\x65\x69\x76\145\x64\x20\x66\x72\x6f\155\x20\117\x41\165\164\x68\57\x4f\160\x65\x6e\111\x44\x20\120\162\x6f\166\x69\x64\145\162\x2e";
        $vj->handle_error($TM);
        wp_die(wp_kses($TM, \mo_oauth_get_valid_html()));
        I7Y:
        switch ($Xt[0]) {
            case "\x48":
                return "\110\x53\x41" === $K3;
            case "\x52":
                return "\x52\123\101" === $K3;
            default:
                return false;
        }
        gPx:
        JAb:
    }
    public function verify($YU = '')
    {
        global $vj;
        if (!empty($YU)) {
            goto cWY;
        }
        return false;
        cWY:
        $ub = $this->get_jwt_claim("\x65\170\160", self::PAYLOAD);
        if (!(is_null($ub) || time() > $ub)) {
            goto CUU;
        }
        $a8 = "\112\x57\124\x20\150\141\163\x20\x62\145\145\156\40\x65\x78\x70\151\162\x65\144\56\x20\x50\x6c\x65\x61\163\x65\40\164\162\x79\x20\x4c\157\147\147\151\156\147\40\151\x6e\40\141\147\x61\x69\x6e\56";
        $vj->handle_error($a8);
        wp_die(wp_kses($a8, \mo_oauth_get_valid_html()));
        CUU:
        $u4 = $this->get_jwt_claim("\156\x62\x66", self::PAYLOAD);
        if (!(!is_null($u4) || time() < $u4)) {
            goto CpV;
        }
        $pt = "\x49\x74\x20\x69\163\40\x74\157\157\40\x65\x61\162\154\171\40\x74\x6f\40\165\163\x65\x20\x74\150\151\163\40\x4a\x57\x54\56\40\x50\154\145\141\x73\145\x20\x74\162\171\40\x4c\157\x67\x67\x69\156\147\40\151\x6e\40\141\x67\141\x69\x6e\56";
        $vj->handle_error($pt);
        wp_die(wp_kses($pt, \mo_oauth_get_valid_html()));
        CpV:
        $If = new JWSVerify($this->get_jwt_claim("\141\154\147", self::HEADER));
        $sk = $this->get_header() . "\x2e" . $this->get_payload();
        return $If->verify(\utf8_decode($sk), $YU, base64_decode(strtr($this->get_jwt_claim(false, self::SIGN), "\55\137", "\x2b\x2f")));
    }
    public function verify_from_jwks($ii = '', $Xt = "\122\123\62\x35\66")
    {
        global $vj;
        $hX = wp_remote_get($ii);
        if (!is_wp_error($hX)) {
            goto qXK;
        }
        return false;
        qXK:
        $hX = json_decode($hX["\142\157\x64\x79"], true);
        $p2 = false;
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto eFV;
        }
        return $p2;
        eFV:
        if (isset($hX["\153\145\171\163"])) {
            goto IcX;
        }
        return $p2;
        IcX:
        foreach ($hX["\x6b\x65\171\163"] as $Vi => $GT) {
            if (!(!isset($GT["\153\164\171"]) || "\122\123\x41" !== $GT["\153\164\171"] || !isset($GT["\x65"]) || !isset($GT["\156"]))) {
                goto jDc;
            }
            goto yyK;
            jDc:
            $p2 = $p2 || $this->verify($this->jwks_to_pem(["\x6e" => new Math_BigInteger($vj->base64url_decode($GT["\156"]), 256), "\145" => new Math_BigInteger($vj->base64url_decode($GT["\145"]), 256)]));
            if (!(true === $p2)) {
                goto tOH;
            }
            goto YzF;
            tOH:
            yyK:
        }
        YzF:
        return $p2;
    }
    private function jwks_to_pem($Zp = array())
    {
        $fh = new Crypt_RSA();
        $fh->loadKey($Zp);
        return $fh->getPublicKey();
    }
    public function get_decoded_header()
    {
        return $this->decoded_jwt["\150\x65\141\144\145\162"];
    }
    public function get_decoded_payload()
    {
        return $this->decoded_jwt["\x70\141\171\154\x6f\x61\144"];
    }
    public function get_header()
    {
        return $this->jwt[0];
    }
    public function get_payload()
    {
        return $this->jwt[1];
    }
}
