<?php


namespace MoOauthClient\Standard;

use MoOauthClient\Customer as NormalCustomer;
class Customer extends NormalCustomer
{
    public $email;
    public $phone;
    private $default_customer_key = "\x31\x36\65\x35\65";
    private $default_api_key = "\x66\106\144\62\130\x63\x76\124\107\x44\x65\155\132\166\x62\x77\x31\x62\x63\125\145\163\x4e\x4a\x57\105\x71\x4b\142\142\x55\x71";
    public function check_customer_ln()
    {
        global $vj;
        $im = $vj->mo_oauth_client_get_option("\150\157\163\164\x5f\x6e\141\x6d\x65") . "\x2f\x6d\157\x61\163\x2f\162\x65\163\164\57\143\165\163\164\x6f\x6d\145\x72\57\x6c\151\x63\145\x6e\163\145";
        $ZR = $vj->mo_oauth_client_get_option("\155\x6f\137\x6f\x61\165\x74\x68\137\x61\144\155\151\156\x5f\143\x75\163\x74\x6f\155\145\x72\x5f\153\x65\x79");
        $wA = $vj->mo_oauth_client_get_option("\x6d\x6f\137\x6f\x61\165\164\150\x5f\141\x64\x6d\151\x6e\137\141\x70\151\137\x6b\145\x79");
        $Z3 = $vj->mo_oauth_client_get_option("\x6d\157\x5f\x6f\141\165\164\x68\x5f\x61\144\155\151\156\x5f\145\x6d\141\151\154");
        $jb = $vj->mo_oauth_client_get_option("\x6d\x6f\137\x6f\141\165\164\150\x5f\x61\144\x6d\x69\156\x5f\160\150\x6f\156\x65");
        $Il = self::get_timestamp();
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\x68\141\65\x31\62", $JD);
        $bJ = "\103\165\x73\x74\x6f\x6d\x65\x72\55\113\145\171\72\x20" . $ZR;
        $Ld = "\x54\x69\155\x65\163\x74\141\155\160\72\x20" . $Il;
        $lA = "\x41\165\164\x68\157\162\151\172\x61\x74\151\x6f\156\x3a\40" . $Wp;
        $t7 = '';
        $t7 = array("\143\x75\163\x74\157\155\x65\162\x49\144" => $ZR, "\141\x70\x70\154\151\143\x61\x74\151\157\156\x4e\141\x6d\x65" => "\x77\x70\137\x6f\141\165\164\150\137\x63\x6c\x69\145\x6e\164\x5f" . \strtolower($vj->get_versi_str()) . "\x5f\160\154\x61\156");
        $dg = wp_json_encode($t7);
        $rE = array("\103\157\156\x74\x65\156\x74\55\124\x79\x70\145" => "\x61\160\x70\154\151\143\141\x74\x69\157\156\57\x6a\x73\x6f\x6e");
        $rE["\x43\165\x73\164\157\155\x65\x72\55\113\x65\171"] = $ZR;
        $rE["\x54\151\x6d\x65\x73\164\141\x6d\160"] = $Il;
        $rE["\101\x75\x74\x68\x6f\x72\151\172\141\x74\151\157\156"] = $Wp;
        $q1 = array("\x6d\145\164\150\157\x64" => "\x50\117\x53\124", "\142\157\144\x79" => $dg, "\x74\151\x6d\x65\x6f\165\x74" => "\65", "\x72\x65\x64\x69\162\x65\x63\164\x69\157\156" => "\65", "\150\x74\164\x70\x76\145\162\163\x69\157\156" => "\61\x2e\60", "\142\154\x6f\x63\x6b\x69\x6e\147" => true, "\x68\145\141\144\145\162\163" => $rE);
        $gv = wp_remote_post($im, $q1);
        if (!is_wp_error($gv)) {
            goto SCv;
        }
        $vA = $gv->get_error_message();
        echo "\123\x6f\x6d\145\x74\x68\x69\156\x67\40\167\x65\x6e\x74\x20\x77\x72\x6f\x6e\147\72\x20{$vA}";
        exit;
        SCv:
        return wp_remote_retrieve_body($gv);
    }
    public function XfskodsfhHJ($Yt)
    {
        global $vj;
        $im = $vj->mo_oauth_client_get_option("\x68\157\163\164\137\x6e\x61\155\x65") . "\x2f\x6d\157\141\x73\x2f\141\160\x69\x2f\x62\x61\x63\x6b\x75\x70\x63\157\144\145\57\166\x65\162\151\x66\x79";
        $ZR = $vj->mo_oauth_client_get_option("\x6d\x6f\137\x6f\141\165\164\x68\x5f\x61\x64\155\151\156\137\143\x75\x73\164\x6f\x6d\145\162\x5f\x6b\145\171");
        $wA = $vj->mo_oauth_client_get_option("\x6d\x6f\137\x6f\x61\x75\164\150\x5f\x61\144\155\151\156\x5f\141\x70\151\x5f\153\x65\x79");
        $Z3 = $vj->mo_oauth_client_get_option("\155\x6f\x5f\x6f\x61\165\x74\x68\x5f\x61\144\155\x69\156\x5f\x65\155\141\x69\154");
        $jb = $vj->mo_oauth_client_get_option("\155\157\137\157\141\165\164\x68\137\x61\144\x6d\x69\x6e\x5f\160\x68\x6f\156\145");
        $Il = self::get_timestamp();
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\150\x61\65\61\x32", $JD);
        $bJ = "\x43\x75\163\164\x6f\x6d\x65\162\x2d\x4b\145\171\72\40" . $ZR;
        $Ld = "\124\151\155\145\163\x74\x61\x6d\x70\x3a\x20" . $Il;
        $lA = "\101\x75\164\x68\x6f\162\x69\172\141\164\151\x6f\x6e\x3a\40" . $Wp;
        $t7 = '';
        $t7 = array("\x63\157\x64\x65" => $Yt, "\x63\165\x73\x74\157\x6d\145\x72\x4b\145\x79" => $ZR, "\141\x64\x64\151\164\151\x6f\x6e\x61\154\106\x69\145\x6c\144\163" => array("\x66\x69\145\154\144\61" => site_url()));
        $dg = wp_json_encode($t7);
        $rE = array("\x43\157\156\x74\x65\x6e\x74\55\x54\171\160\x65" => "\141\x70\x70\154\x69\x63\x61\164\x69\x6f\x6e\57\x6a\x73\x6f\156");
        $rE["\103\165\163\164\157\x6d\145\x72\55\113\145\x79"] = $ZR;
        $rE["\x54\151\x6d\145\163\164\141\x6d\160"] = $Il;
        $rE["\x41\165\164\x68\157\162\x69\x7a\x61\x74\151\x6f\156"] = $Wp;
        $q1 = array("\x6d\x65\x74\x68\157\x64" => "\120\x4f\123\x54", "\142\157\144\x79" => $dg, "\x74\x69\155\145\157\x75\x74" => "\65", "\x72\145\144\151\x72\145\143\164\x69\x6f\156" => "\65", "\150\x74\x74\x70\166\x65\162\x73\151\157\156" => "\61\x2e\x30", "\142\154\x6f\143\x6b\x69\x6e\147" => true, "\150\x65\141\144\145\x72\163" => $rE);
        $gv = wp_remote_post($im, $q1);
        if (!is_wp_error($gv)) {
            goto uQy;
        }
        $vA = $gv->get_error_message();
        echo "\x53\x6f\x6d\145\164\150\x69\x6e\147\40\x77\x65\x6e\x74\x20\167\162\157\156\x67\72\x20{$vA}";
        exit;
        uQy:
        return wp_remote_retrieve_body($gv);
    }
}
