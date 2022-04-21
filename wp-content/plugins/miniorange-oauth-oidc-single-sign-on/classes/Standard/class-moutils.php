<?php


namespace MoOauthClient\Standard;

use MoOauthClient\MOUtils as CommonUtils;
class MOUtils extends CommonUtils
{
    private function manage_deactivate_cache()
    {
        global $vj;
        $xh = $vj->mo_oauth_client_get_option("\155\x6f\x5f\x6f\141\x75\164\150\137\154\153");
        if (!(!$vj->mo_oauth_is_customer_registered() || false === $xh || empty($xh))) {
            goto zX7;
        }
        return;
        zX7:
        $I6 = $vj->mo_oauth_client_get_option("\150\x6f\x73\x74\x5f\x6e\x61\155\x65");
        $im = $I6 . "\x2f\x6d\x6f\x61\x73\57\141\x70\x69\x2f\142\x61\143\x6b\x75\160\x63\x6f\x64\x65\57\165\160\x64\141\164\145\163\164\141\x74\x75\x73";
        $ZR = $vj->mo_oauth_client_get_option("\155\157\x5f\x6f\x61\x75\164\150\137\x61\144\155\x69\x6e\x5f\143\165\x73\x74\157\x6d\145\x72\x5f\x6b\x65\171");
        $wA = $vj->mo_oauth_client_get_option("\x6d\157\x5f\157\x61\165\164\150\137\x61\144\155\x69\x6e\137\141\x70\x69\x5f\153\145\x79");
        $Yt = $vj->mooauthdecrypt($xh);
        $Il = round(microtime(true) * 1000);
        $Il = number_format($Il, 0, '', '');
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\150\141\x35\x31\x32", $JD);
        $bJ = "\x43\165\163\164\157\155\x65\x72\55\113\x65\x79\x3a\40" . $ZR;
        $Ld = "\124\151\155\x65\163\x74\141\155\x70\72\x20" . $Il;
        $lA = "\101\165\164\150\x6f\162\151\172\141\x74\151\x6f\x6e\x3a\x20" . $Wp;
        $t7 = '';
        $t7 = array("\x63\x6f\144\145" => $Yt, "\143\x75\x73\164\157\x6d\145\x72\113\145\171" => $ZR, "\x61\x64\144\x69\164\x69\x6f\156\141\x6c\x46\x69\145\x6c\x64\163" => array("\x66\151\x65\x6c\144\61" => site_url()));
        $dg = wp_json_encode($t7);
        $rE = array("\103\157\x6e\x74\x65\x6e\164\x2d\x54\x79\x70\145" => "\141\160\160\x6c\x69\143\x61\x74\x69\157\156\57\152\x73\157\156");
        $rE["\103\x75\x73\x74\157\x6d\145\x72\x2d\x4b\x65\x79"] = $ZR;
        $rE["\x54\151\x6d\145\x73\x74\141\155\160"] = $Il;
        $rE["\x41\165\164\x68\x6f\x72\151\172\141\164\151\x6f\x6e"] = $Wp;
        $q1 = array("\x6d\145\x74\150\x6f\x64" => "\120\117\123\124", "\142\157\x64\171" => $dg, "\x74\151\155\x65\x6f\x75\x74" => "\65", "\x72\x65\x64\x69\162\x65\143\x74\151\x6f\x6e" => "\65", "\150\164\x74\160\166\x65\162\x73\151\x6f\x6e" => "\x31\x2e\x30", "\x62\154\157\x63\x6b\151\x6e\147" => true, "\150\145\141\144\145\x72\x73" => $rE);
        $gv = wp_remote_post($im, $q1);
        if (!is_wp_error($gv)) {
            goto jb4;
        }
        $vA = $gv->get_error_message();
        echo "\x53\x6f\x6d\x65\164\150\151\x6e\147\40\x77\x65\156\x74\x20\167\x72\x6f\156\147\x3a\40{$vA}";
        exit;
        jb4:
        return wp_remote_retrieve_body($gv);
    }
    public function deactivate_plugin()
    {
        $this->manage_deactivate_cache();
        parent::deactivate_plugin();
        $this->mo_oauth_client_delete_option("\x6d\157\137\x6f\x61\x75\x74\x68\137\x6c\153");
        $this->mo_oauth_client_delete_option("\x6d\157\x5f\157\x61\165\x74\150\x5f\154\x76");
    }
    public function is_url($im)
    {
        $gv = [];
        if (empty($im)) {
            goto v2L;
        }
        $gv = @get_headers($im) ? @get_headers($im) : [];
        v2L:
        $RW = preg_grep("\57\x28\56\52\51\x32\x30\60\x20\x4f\x4b\57", $gv);
        return (bool) (sizeof($RW) > 0);
    }
}
