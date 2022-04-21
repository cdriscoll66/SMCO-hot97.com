<?php


namespace MoOauthClient\GrantTypes;

use MoOauthClient\GrantTypes\JWTUtils;
use MoOauthClient\MO_Oauth_Debug;
class Implicit
{
    private $url = '';
    private $query_params = array();
    public function __construct($I7 = '')
    {
        if (!('' === $I7)) {
            goto XE;
        }
        return $this->get_invalid_response_error("\151\156\166\141\154\x69\x64\x5f\161\165\x65\x72\x79\x5f\163\x74\162\151\156\x67", __("\x55\x6e\x61\x62\154\145\40\164\157\x20\x70\x61\x72\163\x65\x20\161\165\145\x72\x79\40\163\164\162\151\156\x67\x20\146\162\x6f\155\x20\125\x52\x4c\x2e"));
        XE:
        $nL = explode("\x26", $I7);
        if (!(!is_array($nL) || empty($nL))) {
            goto jcs;
        }
        return $this->get_invalid_response_error();
        jcs:
        $OG = array();
        foreach ($nL as $Ta) {
            $Ta = explode("\x3d", $Ta);
            if (is_array($Ta) && !empty($Ta)) {
                goto Jp6;
            }
            return $this->get_invalid_response_error();
            goto oMK;
            Jp6:
            $OG[$Ta[0]] = $Ta[1];
            oMK:
            xYf:
        }
        h0Z:
        if (!(!is_array($OG) || empty($OG))) {
            goto Hy2;
        }
        return $this->get_invalid_response_error();
        Hy2:
        $this->query_params = $OG;
    }
    public function get_invalid_response_error($Yt = '', $CG = '')
    {
        if (!('' === $Yt && '' === $CG)) {
            goto f2b;
        }
        MO_Oauth_Debug::mo_oauth_log(new WP_Error("\151\156\166\141\x6c\151\144\x5f\x72\x65\x73\x70\x6f\x6e\163\145\137\146\162\x6f\x6d\x5f\x73\145\x72\166\x65\162", __("\111\156\166\x61\x6c\151\x64\x20\x52\145\x73\160\x6f\x6e\163\145\40\162\x65\143\145\151\x76\x65\144\x20\x66\162\x6f\x6d\40\163\x65\x72\166\145\162\56")));
        return new WP_Error("\151\x6e\x76\141\x6c\151\x64\x5f\x72\145\x73\x70\x6f\156\163\x65\137\x66\x72\x6f\155\x5f\x73\x65\162\x76\x65\x72", __("\x49\156\x76\x61\x6c\151\x64\x20\x52\145\163\160\157\156\163\x65\40\162\x65\x63\x65\151\x76\x65\x64\x20\x66\162\157\155\40\x73\145\x72\x76\145\162\56"));
        f2b:
        return new \WP_Error($Yt, $CG);
    }
    public function get_query_param($Vi = "\141\154\154")
    {
        if (!isset($this->query_params[$Vi])) {
            goto wcM;
        }
        return $this->query_params[$Vi];
        wcM:
        if (!("\141\x6c\154" === $Vi)) {
            goto ss_;
        }
        return $this->query_params;
        ss_:
        return '';
    }
    public function get_jwt_from_query_param()
    {
        $M3 = '';
        if (isset($this->query_params["\x74\157\x6b\x65\x6e"])) {
            goto TZy;
        }
        if (isset($this->query_params["\151\x64\x5f\x74\x6f\x6b\145\156"])) {
            goto mvi;
        }
        if (isset($this->query_params["\x61\x63\x63\145\163\x73\137\x74\157\153\x65\156"])) {
            goto y9n;
        }
        goto nrQ;
        TZy:
        $M3 = $this->query_params["\164\157\x6b\x65\x6e"];
        goto nrQ;
        mvi:
        $M3 = $this->query_params["\151\144\137\x74\157\153\x65\156"];
        goto nrQ;
        y9n:
        $M3 = $this->query_params["\141\143\x63\x65\x73\x73\137\x74\157\x6b\x65\156"];
        nrQ:
        $wB = new JWTUtils($M3);
        if (!is_wp_error($wB)) {
            goto NxI;
        }
        MO_Oauth_Debug::mo_oauth_log($this->get_invalid_response_error("\x69\x6e\166\x61\x6c\151\144\x5f\152\x77\164", __("\103\141\156\x6e\157\164\x20\x50\x61\162\163\145\x20\x4a\127\124\x20\x66\x72\x6f\155\x20\x55\x52\x4c\x2e")));
        return $this->get_invalid_response_error("\151\x6e\166\x61\154\x69\x64\x5f\x6a\167\x74", __("\103\x61\156\156\x6f\164\40\120\141\x72\x73\x65\x20\112\127\124\40\146\162\x6f\155\40\125\122\x4c\x2e"));
        NxI:
        return $wB;
    }
}
