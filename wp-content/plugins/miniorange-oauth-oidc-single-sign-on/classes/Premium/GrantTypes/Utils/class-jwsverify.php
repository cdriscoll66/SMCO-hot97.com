<?php


namespace MoOauthClient\GrantTypes;

class JWSVerify
{
    public $algo;
    public function __construct($du = '')
    {
        if (!empty($du)) {
            goto xTj;
        }
        return;
        xTj:
        $du = explode("\123", $du);
        if (!(!is_array($du) || 2 !== count($du))) {
            goto Rkd;
        }
        return WP_Error("\151\x6e\166\x61\154\x69\x64\137\x73\x69\147\x6e\x61\164\165\162\x65", __("\x54\150\x65\x20\x53\x69\147\156\x61\x74\x75\x72\x65\40\163\145\145\x6d\x73\40\x74\157\x20\x62\x65\x20\x69\156\x76\141\x6c\151\x64\x20\157\162\40\165\156\163\165\160\160\x6f\x72\x74\145\x64\56"));
        Rkd:
        if ("\x48" === $du[0]) {
            goto UCc;
        }
        if ("\x52" === $du[0]) {
            goto zYn;
        }
        return WP_Error("\x69\156\166\141\x6c\151\144\137\163\x69\x67\x6e\141\164\x75\162\145", __("\124\x68\x65\x20\x73\x69\147\156\x61\x74\165\x72\145\40\x61\154\147\157\162\x69\x74\150\x6d\40\163\x65\x65\x6d\x73\x20\x74\x6f\40\x62\x65\x20\165\156\163\165\x70\160\157\x72\x74\x65\x64\x20\x6f\x72\x20\x69\156\x76\x61\x6c\x69\x64\56"));
        goto DKr;
        UCc:
        $this->algo["\x61\x6c\x67"] = "\x48\123\x41";
        goto DKr;
        zYn:
        $this->algo["\141\x6c\147"] = "\122\x53\101";
        DKr:
        $this->algo["\163\x68\141"] = $du[1];
    }
    private function validate_hmac($sk = '', $YU = '', $wZ = '')
    {
        if (!(empty($sk) || empty($wZ))) {
            goto i4A;
        }
        return false;
        i4A:
        $xY = $this->algo["\x73\x68\x61"];
        $xY = "\163\x68\x61" . $xY;
        $tx = \hash_hmac($xY, $sk, $YU, true);
        return hash_equals($tx, $wZ);
    }
    private function validate_rsa($sk = '', $hd = '', $wZ = '')
    {
        if (!(empty($sk) || empty($wZ))) {
            goto uNT;
        }
        return false;
        uNT:
        $xY = $this->algo["\x73\x68\x61"];
        $nP = '';
        $nL = explode("\55\x2d\55\55\x2d", $hd);
        if (preg_match("\57\x5c\162\134\x6e\174\x5c\162\x7c\134\156\x2f", $nL[2])) {
            goto EBN;
        }
        $RS = "\x2d\55\x2d\55\55" . $nL[1] . "\55\55\x2d\x2d\x2d\12";
        $VD = 0;
        U_9:
        if (!($hE = substr($nL[2], $VD, 64))) {
            goto j_i;
        }
        $RS .= $hE . "\12";
        $VD += 64;
        goto U_9;
        j_i:
        $RS .= "\55\x2d\x2d\55\x2d" . $nL[3] . "\55\55\x2d\x2d\55\xa";
        $nP = $RS;
        goto QB2;
        EBN:
        $nP = $hd;
        QB2:
        $p2 = false;
        switch ($xY) {
            case "\62\x35\x36":
                $p2 = openssl_verify($sk, $wZ, $nP, OPENSSL_ALGO_SHA256);
                goto YLX;
            case "\x33\70\x34":
                $p2 = openssl_verify($sk, $wZ, $nP, OPENSSL_ALGO_SHA384);
                goto YLX;
            case "\65\x31\x32":
                $p2 = openssl_verify($sk, $wZ, $nP, OPENSSL_ALGO_SHA512);
                goto YLX;
            default:
                $p2 = false;
                goto YLX;
        }
        uZP:
        YLX:
        return $p2;
    }
    public function verify($sk = '', $YU = '', $wZ = '')
    {
        if (!(empty($sk) || empty($wZ))) {
            goto RLM;
        }
        return false;
        RLM:
        $du = $this->algo["\x61\154\x67"];
        switch ($du) {
            case "\110\x53\x41":
                return $this->validate_hmac($sk, $YU, $wZ);
            case "\122\x53\101":
                return @$this->validate_rsa($sk, $YU, $wZ);
            default:
                return false;
        }
        kyj:
        uPG:
    }
}
