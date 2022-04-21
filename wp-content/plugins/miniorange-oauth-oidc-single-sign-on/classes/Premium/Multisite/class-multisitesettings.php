<?php


namespace MoOauthClient\Premium;

class MultisiteSettings
{
    private $versi;
    public function __construct()
    {
        $this->versi = VERSION;
    }
    public function render_ui()
    {
        global $vj;
        if (is_multisite()) {
            goto Kou;
        }
        return;
        Kou:
        $KX = get_sites();
        $nq = $vj->mo_oauth_client_get_option("\155\157\x5f\157\x61\x75\x74\x68\x5f\x63\63\x56\151\143\62\154\x30\132\x58\116\172\132\127\170\x6c\131\x33\122\x6c\x5a\101");
        $Vz = array();
        if (!isset($nq)) {
            goto Mb7;
        }
        $Vz = json_decode($vj->mooauthdecrypt($nq), true);
        Mb7:
        $lT = $vj->mo_oauth_client_get_option("\156\x6f\117\146\x53\x75\x62\x53\151\x74\x65\x73");
        echo "\15\xa\x9\x9\x3c\x64\x69\166\40\143\x6c\x61\x73\x73\x3d\x22\x6d\x6f\x5f\x74\x61\142\154\145\x5f\154\x61\x79\x6f\x75\164\42\x3e\15\12\11\x9\11\74\144\x69\166\40\x63\154\141\163\x73\75\42\x6d\157\137\x77\x70\x6e\x73\137\163\155\x61\154\x6c\x5f\x6c\x61\x79\x6f\x75\x74\x22\x3e\15\xa\11\x9\11\x9\x3c\x64\x69\x76\x20\x73\164\171\x6c\x65\75\x22\x62\141\x63\x6b\147\x72\157\165\x6e\x64\x2d\143\157\x6c\x6f\x72\x3a\x20\43\145\x30\145\66\145\145\73\x20\x62\157\x72\144\145\x72\x2d\x6c\145\x66\x74\72\40\x34\x70\170\40\163\x6f\x6c\151\x64\x20\x23\x31\x31\x38\66\x65\67\x3b\x20\167\x69\144\164\150\x3a\40\x39\x35\x25\x3b\x20\160\141\144\x64\x69\x6e\147\x3a\x20\65\160\170\x3b\42\x3e\x3c\163\x74\162\x6f\156\x67\76\116\x6f\x74\x65\x3a\x3c\57\163\x74\162\x6f\156\147\76\40\x53\x53\x4f\40\143\x61\156\x20\x62\x65\x20\x61\143\164\x69\x76\141\164\145\144\x20\157\x6e\154\x79\x20\146\157\162\40\x6e\x75\x6d\142\145\162\40\157\x66\x20\x73\165\142\x73\x69\164\x65\163\x20\x77\x69\164\150\40\164\150\145\x20\163\x65\x6c\x65\x63\164\x65\144\x20\x70\x6c\x61\x6e\56\x20\116\165\155\142\x65\x72\40\x6f\x66\x20\x73\x75\x62\x73\151\x74\x65\163\40\x66\157\162\x20\x74\150\x69\x73\40\163\x69\164\145\x20\151\163\40\x3c\x73\164\x72\x6f\156\x67\76";
        echo count($KX);
        echo "\x3c\x2f\163\164\x72\x6f\156\x67\76\x2e\40\x4e\165\155\x62\x65\x72\40\x6f\146\40\x73\165\142\163\x69\x74\x65\163\40\x61\x6c\x6c\157\167\145\x64\x20\167\151\164\x68\40\164\150\x69\x73\x20\155\165\154\164\151\163\151\x74\x65\x20\160\x6c\x61\x6e\40\x69\163\x3c\x73\164\x72\x6f\156\x67\x3e\40";
        echo $lT;
        echo "\x3c\x2f\x73\x74\162\157\x6e\147\76\x20\x3c\57\144\151\166\x3e\74\x62\x72\76\x3c\142\162\76\15\xa\11\11\x9\x9\x3c\x66\157\162\x6d\40\x61\x63\164\151\x6f\156\x3d\42\x22\40\x6d\x65\x74\x68\x6f\x64\75\42\160\157\x73\164\x22\76\15\xa\11\x9\x9\x9\x9\74\151\x6e\160\x75\x74\40\164\x79\x70\x65\75\42\150\151\x64\144\x65\x6e\x22\x20\x6e\x61\155\145\x3d\x22\x6f\x70\x74\x69\157\156\42\x20\x76\141\154\165\145\75\x22\x6d\x6f\137\x73\x61\x76\x65\x5f\x73\165\142\x73\151\164\145\163\137\157\x70\x74\151\157\x6e\x22\x20\x2f\76\15\12\x9\11\x9\x9\11";
        wp_nonce_field("\155\x6f\137\163\x61\166\145\x5f\x74\150\145\137\x73\x75\142\163\x69\164\145\163\x5f\157\x70\x74\151\x6f\x6e", "\155\x6f\x5f\x73\x61\166\x65\137\x74\150\x65\x5f\163\165\x62\163\151\x74\x65\x73\x5f\157\x70\164\151\x6f\x6e\137\156\x6f\x6e\x63\145");
        echo "\11\11\x9\x9\11\x3c\x74\x61\x62\x6c\x65\40\143\x6c\141\x73\163\75\42\155\x6f\x5f\x73\165\142\x73\x69\x74\145\163\137\x73\145\x74\164\151\x6e\147\x73\x5f\x74\141\142\x6c\145\42\76\15\12\11\11\11\11\x9\11\74\164\x72\x3e\x3c\164\150\76\x53\x69\164\145\40\116\141\x6d\x65\x3c\x2f\x74\150\x3e\74\x74\x68\76\123\151\x74\x65\40\125\x52\114\74\x2f\164\x68\x3e\74\164\150\x3e\105\156\x61\x62\154\145\x20\x53\x53\x4f\x3c\x2f\x74\150\76\x3c\57\164\162\x3e\xd\xa\11\11\11\11\x9";
        foreach ($KX as $Vi => $Nr) {
            $rh = get_blog_details(array("\142\x6c\x6f\x67\137\151\x64" => $Nr->blog_id))->blogname;
            echo "\x9\11\11\11\11\x20\74\x74\x72\76\74\164\x64\x3e";
            echo $rh;
            echo "\x3c\57\164\144\x3e\74\164\144\x3e";
            echo $Nr->domain;
            echo $Nr->path;
            echo "\x3c\x2f\164\x64\x3e\15\xa\11\11\x9\x9\11\40\74\x74\x64\76\74\151\x6e\x70\x75\x74\x20\164\x79\x70\x65\75\42\x63\x68\145\143\153\142\x6f\170\x22\x20";
            echo is_array($Vz) && in_array($Nr->blog_id, $Vz) ? "\x63\150\x65\143\x6b\145\x64" : '';
            echo "\x20\x6e\141\155\145\x3d\42\x73\165\x62\163\x69\x74\x65\x5b\x5d\42\x20\166\141\x6c\165\145\x3d\42";
            echo $Nr->domain;
            echo $Nr->path;
            echo "\42\76\x3c\x2f\164\144\76\74\57\164\x72\76\xd\xa\11\11\11\x9\11";
            rWM:
        }
        xJ3:
        echo "\11\x9\x9\x9\74\57\x74\141\142\x6c\145\x3e\15\xa\x9\x9\x9\11\x9\74\x62\162\x3e\74\x62\162\76\74\x69\156\x70\165\x74\40\143\x6c\x61\163\163\x3d\x22\142\x75\x74\x74\x6f\156\x20\142\x75\164\x74\157\156\x2d\160\x72\151\x6d\x61\x72\x79\x20\142\165\164\164\x6f\x6e\55\x6c\x61\x72\147\x65\42\x20\164\171\160\145\75\x22\x73\165\142\155\151\164\42\x20\x6e\141\x6d\145\x3d\x22\163\165\x62\155\151\164\42\40\x76\141\x6c\x75\x65\x3d\42\x53\141\x76\145\x22\76\15\12\x9\11\x9\11\74\x2f\x66\x6f\x72\x6d\x3e\15\12\11\11\11\74\57\144\151\166\76\xd\xa\11\x9\74\57\144\151\x76\76\xd\12\x9";
    }
    public function save_multisite_settings()
    {
        global $vj;
        $EB = get_sites();
        $NZ = array();
        $ea = intval($vj->mo_oauth_client_get_option("\156\157\x4f\146\123\165\142\x53\151\x74\x65\163"));
        $Wq = $vj->mo_oauth_client_get_option("\x6d\x6f\x5f\x6f\141\x75\x74\150\x5f\x63\x33\x56\x69\143\62\154\60\132\130\116\172\x5a\x57\170\154\x59\63\x52\154\x5a\x41");
        if (isset($_POST["\155\x6f\137\x73\141\166\145\137\x74\x68\145\137\x73\x75\142\163\151\164\145\163\137\x6f\x70\164\x69\157\x6e\137\x6e\x6f\x6e\x63\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\157\137\x73\x61\166\x65\137\164\150\145\137\x73\x75\x62\163\151\164\145\163\137\157\x70\x74\151\x6f\156\137\156\x6f\156\143\145"])), "\155\157\137\x73\x61\x76\x65\x5f\x74\150\145\x5f\163\x75\142\x73\x69\x74\x65\x73\x5f\x6f\x70\164\x69\157\156") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\x5f\x73\x61\x76\145\137\x73\165\142\163\x69\x74\x65\x73\137\157\160\164\x69\157\x6e" === $_POST[\MoOAuthConstants::OPTION] && isset($_POST["\x73\x75\142\163\x69\x74\145"])) {
            goto gK6;
        }
        if (!(!(bool) $Wq || empty($Wq) || $Wq == "\x66\x61\x6c\163\x65" && $vj->is_multisite_plan() && $ea)) {
            goto qsn;
        }
        $hn = 0;
        Kfl:
        if (!($hn < count($EB))) {
            goto q9N;
        }
        if (!($hn >= $ea + 1)) {
            goto RB7;
        }
        goto q9N;
        RB7:
        array_push($NZ, $EB[$hn]->blog_id);
        hPq:
        $hn++;
        goto Kfl;
        q9N:
        $mp = $vj->mooauthencrypt(json_encode($NZ));
        $vj->mo_oauth_client_update_option("\155\157\x5f\157\x61\165\164\x68\x5f\x63\x33\126\x69\x63\62\154\x30\132\x58\x4e\x7a\x5a\x57\x78\x6c\131\x33\x52\x6c\132\101", $mp);
        qsn:
        goto VyR;
        gK6:
        $l7 = $_POST["\x73\165\142\163\x69\x74\x65"];
        if (!($ea > 0 && is_array($l7) && count($l7) <= $ea + 1)) {
            goto Hut;
        }
        $hn = 0;
        xCr:
        if (!($hn < count($l7))) {
            goto sZC;
        }
        if (!($hn >= $ea + 1)) {
            goto P7g;
        }
        goto sZC;
        P7g:
        foreach ($EB as $al) {
            if (!($l7[$hn] == $al->domain . '' . $al->path)) {
                goto H1y;
            }
            $blog_id = $al->blog_id;
            goto ur_;
            H1y:
            vFV:
        }
        ur_:
        array_push($NZ, $blog_id);
        GH0:
        $hn++;
        goto xCr;
        sZC:
        $mp = $vj->mooauthencrypt(json_encode($NZ));
        $vj->mo_oauth_client_update_option("\x6d\157\x5f\x6f\x61\165\164\x68\137\x63\x33\x56\x69\x63\62\154\x30\132\130\116\172\132\127\170\154\131\63\122\x6c\132\101", $mp);
        Hut:
        VyR:
    }
}
