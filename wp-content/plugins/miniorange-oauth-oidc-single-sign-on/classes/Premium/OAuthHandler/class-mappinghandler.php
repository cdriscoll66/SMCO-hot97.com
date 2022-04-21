<?php


namespace MoOauthClient\Premium;

use MoOauthClient\Mo_Oauth_Debug;
class MappingHandler
{
    private $user_id = 0;
    private $app_config = array();
    private $group_name = '';
    private $is_new_user = false;
    public function __construct($he = 0, $BD = array(), $j7 = '', $RV = false)
    {
        if (!(!array($BD) || empty($BD))) {
            goto lbW;
        }
        return;
        lbW:
        $of = is_array($j7) ? $j7 : $this->get_group_array($j7);
        $this->group_name = $of;
        $this->user_id = $he;
        $this->app_config = $BD;
        $this->is_new_user = $RV;
    }
    private function get_group_array($kq)
    {
        $SB = json_decode($kq, true);
        return is_array($SB) && json_last_error() === JSON_ERROR_NONE ? $SB : explode("\73", $kq);
    }
    public function apply_custom_attribute_mapping($Nm)
    {
        if (!(!isset($this->app_config["\x63\x75\163\164\x6f\155\137\141\x74\x74\162\x73\x5f\x6d\141\x70\x70\x69\x6e\147"]) || empty($this->app_config["\x63\x75\163\164\x6f\x6d\x5f\141\x74\164\162\163\137\155\x61\x70\160\151\x6e\x67"]))) {
            goto QVX;
        }
        return;
        QVX:
        global $vj;
        $hn = -1;
        $J2 = $this->app_config["\143\165\x73\x74\157\155\x5f\x61\164\164\x72\x73\x5f\155\x61\160\x70\151\x6e\x67"];
        $J3 = [];
        foreach ($J2 as $Vi => $GT) {
            $bU = $vj->getnestedattribute($Nm, $GT);
            $J3[$Vi] = $bU;
            update_user_meta($this->user_id, $Vi, $bU);
            TiC:
        }
        N3R:
        update_user_meta($this->user_id, "\155\157\137\157\x61\165\164\150\137\143\165\x73\164\157\x6d\137\x61\164\164\x72\x69\x62\165\x74\x65\163", $J3);
    }
    public function apply_role_mapping($Nm)
    {
        if (!has_filter("\x6d\157\137\163\x75\142\163\151\x74\x65\x5f\x63\x68\x65\x63\153\x5f\x61\154\154\157\x77\137\x6c\x6f\147\x69\x6e")) {
            goto r7e;
        }
        $Ib = apply_filters("\x6d\157\137\x73\x75\142\163\151\164\x65\x5f\x63\x68\x65\x63\153\137\145\x78\151\163\164\151\x6e\x67\137\x72\157\154\145\x73", $this->app_config, $this->is_new_user);
        if (!($Ib === true)) {
            goto KxP;
        }
        return;
        KxP:
        goto vmH;
        r7e:
        if (!(!$this->is_new_user && isset($this->app_config["\x6b\145\x65\x70\x5f\145\170\x69\x73\164\x69\156\x67\x5f\165\x73\x65\x72\137\162\157\154\x65\x73"]) && 1 === intval($this->app_config["\153\145\145\160\x5f\145\x78\151\163\x74\x69\x6e\147\x5f\165\163\x65\x72\x5f\162\157\x6c\x65\x73"]))) {
            goto Fa4;
        }
        return;
        Fa4:
        vmH:
        $B8 = new \WP_User($this->user_id);
        if (!(isset($this->app_config["\x65\x6e\x61\x62\x6c\x65\137\162\157\x6c\x65\x5f\x6d\141\x70\x70\151\x6e\147"]) && !boolval($this->app_config["\145\156\x61\x62\154\x65\x5f\162\x6f\x6c\x65\x5f\x6d\x61\x70\x70\151\156\x67"]))) {
            goto XuY;
        }
        $B8->set_role('');
        return;
        XuY:
        if (!has_filter("\155\157\x5f\x6f\141\165\x74\x68\137\162\x61\x76\x65\x6e\x5f\x62\171\x5f\160\x61\x73\163\137\x72\x6f\x6c\x65\x5f\x6d\141\x70\160\x69\x6e\x67")) {
            goto HKY;
        }
        $Zj = apply_filters("\x6d\x6f\x5f\157\x61\x75\x74\150\x5f\162\141\x76\x65\x6e\137\x62\171\x5f\x70\x61\x73\x73\x5f\x72\157\x6c\x65\x5f\x6d\141\160\x70\151\x6e\147", $B8);
        if (!($Zj === true)) {
            goto ncn;
        }
        return;
        ncn:
        HKY:
        $w_ = 0;
        if (!has_filter("\x6d\x6f\x5f\163\145\164\x5f\143\x75\x72\x72\145\156\x74\x5f\x73\x69\164\145\x5f\x72\x6f\154\x65\163")) {
            goto G2x;
        }
        $e3 = apply_filters("\155\157\137\163\x65\x74\137\x63\x75\162\x72\x65\x6e\x74\x5f\163\x69\x74\x65\x5f\162\x6f\x6c\145\163", $this->app_config, $this->group_name, $w_, $B8);
        goto FY4;
        G2x:
        $cb = isset($this->app_config["\x72\x6f\154\145\x5f\155\141\160\x70\151\x6e\147\x5f\143\x6f\x75\x6e\x74"]) ? intval($this->app_config["\162\157\x6c\x65\137\155\141\160\x70\151\x6e\147\x5f\143\157\x75\156\164"]) : 0;
        $f9 = [];
        $hn = 1;
        aC4:
        if (!($hn <= $cb)) {
            goto zBg;
        }
        $qg = isset($this->app_config["\x5f\x6d\x61\x70\x70\151\x6e\147\137\x6b\x65\171\137" . $hn]) ? $this->app_config["\x5f\x6d\141\x70\x70\x69\156\x67\137\x6b\x65\171\137" . $hn] : '';
        array_push($f9, $qg);
        foreach ($this->group_name as $ky) {
            $lz = explode("\x2c", $qg);
            if (!in_array($ky, $lz)) {
                goto rUQ;
            }
            $ZW = isset($this->app_config["\x5f\155\x61\160\x70\x69\x6e\x67\137\x76\141\154\x75\145\137" . $hn]) ? $this->app_config["\137\155\x61\x70\x70\x69\156\x67\x5f\166\141\154\x75\x65\x5f" . $hn] : '';
            if (!$ZW) {
                goto IW0;
            }
            if (!(0 === $w_)) {
                goto vgL;
            }
            $B8->set_role('');
            vgL:
            $B8->add_role($ZW);
            $w_++;
            IW0:
            rUQ:
            MHg:
        }
        PKN:
        ynQ:
        $hn++;
        goto aC4;
        zBg:
        FY4:
        if (empty($this->group_name[0])) {
            goto Umg;
        }
        $Mg = '';
        $uA = get_site_option("\x6d\157\x5f\157\141\165\x74\x68\x5f\x61\160\160\163\x5f\x6c\151\x73\x74");
        $EI = isset($this->app_config["\165\156\151\x71\x75\x65\x5f\141\160\x70\x69\144"]) ? $this->app_config["\165\x6e\151\x71\165\x65\137\x61\x70\x70\x69\144"] : '';
        if (!is_array($uA)) {
            goto llf;
        }
        foreach ($uA as $Xr => $sC) {
            $eW = $sC->get_app_config();
            if (!($this->app_config["\141\x70\x70\x49\144"] == $eW["\141\160\160\x49\x64"] && $EI === $Xr)) {
                goto nzg;
            }
            MO_Oauth_Debug::mo_oauth_log("\x63\x6f\155\x70\x61\x72\x65\144\x20\141\156\x64\40\x66\157\165\156\x64\x20\x63\x75\162\162\145\156\164\x20\x61\x70\160\40\55\x20" . $Xr);
            $Mg = $Xr;
            nzg:
            VGf:
        }
        NhD:
        llf:
        global $vj;
        $Zf = isset($this->app_config["\165\163\x65\162\x6e\x61\155\145\137\141\164\164\162"]) ? $this->app_config["\165\163\145\162\156\141\x6d\145\x5f\141\x74\x74\162"] : '';
        $QO = isset($this->app_config["\x65\155\141\151\154\137\141\x74\164\162"]) ? $this->app_config["\x65\x6d\x61\x69\154\x5f\141\x74\x74\x72"] : '';
        $nW = isset($this->app_config["\146\x69\162\x73\x74\156\141\155\145\x5f\141\x74\164\x72"]) ? $this->app_config["\146\151\162\163\164\x6e\x61\x6d\x65\x5f\x61\164\x74\162"] : '';
        $Vq = isset($this->app_config["\154\141\163\164\156\x61\155\145\137\x61\x74\x74\162"]) ? $this->app_config["\x6c\141\x73\x74\156\141\x6d\x65\x5f\141\164\x74\162"] : '';
        $Z3 = $vj->getnestedattribute($Nm, $Zf);
        $zZ = $vj->getnestedattribute($Nm, $QO);
        $yp = $vj->getnestedattribute($Nm, $nW);
        $GK = $vj->getnestedattribute($Nm, $Vq);
        Mo_Oauth_Debug::mo_oauth_log("\123\145\x6e\x74\40\x64\x65\x74\141\151\154\x73\40\164\157\x20\154\x65\141\162\156\x64\141\163\150\x3a\x20");
        Mo_Oauth_Debug::mo_oauth_log($Z3);
        Mo_Oauth_Debug::mo_oauth_log(json_encode($this->group_name));
        Mo_Oauth_Debug::mo_oauth_log($Mg);
        do_action("\x6d\x6f\137\157\x61\165\164\150\x5f\x61\164\164\162\x69\x62\165\164\x65\163", $Z3, $zZ, $yp, $GK, $this->group_name, $Mg);
        Umg:
        if (!has_filter("\155\x6f\x5f\x73\145\164\137\x63\165\162\x72\145\156\164\x5f\163\x69\x74\x65\x5f\x72\157\154\145\x73")) {
            goto BW7;
        }
        $blog_id = get_current_blog_id();
        if (0 === $e3["\162\x6f\154\x65\163"] && isset($this->app_config["\155\157\x5f\x73\165\x62\x73\x69\164\x65\137\162\x6f\154\145\x5f\x6d\x61\160\x70\151\156\147"][$blog_id]["\137\x6d\141\x70\160\151\x6e\x67\137\x76\x61\x6c\165\145\137\x64\145\x66\141\x75\154\164"]) && '' !== $this->app_config["\155\157\137\x73\165\142\163\151\x74\x65\137\x72\x6f\154\145\137\x6d\x61\x70\x70\x69\156\147"][$blog_id]["\137\x6d\x61\160\x70\x69\x6e\x67\137\x76\141\x6c\165\x65\x5f\x64\x65\x66\x61\165\x6c\x74"]) {
            goto rL4;
        }
        if (!(0 === $e3["\162\157\x6c\x65\x73"] && empty($this->app_config["\x6d\x6f\x5f\163\165\142\163\x69\x74\x65\x5f\162\x6f\x6c\145\137\155\x61\x70\160\x69\156\x67"][$blog_id]["\137\155\x61\160\160\151\156\x67\x5f\166\x61\154\x75\145\x5f\144\x65\x66\141\165\154\164"]))) {
            goto cjv;
        }
        $B8->set_role("\163\x75\142\x73\x63\162\151\x62\x65\x72");
        cjv:
        goto z0R;
        rL4:
        $B8->set_role($this->app_config["\x6d\x6f\137\163\165\142\163\151\164\145\x5f\x72\x6f\x6c\145\137\155\x61\160\x70\151\156\x67"][$blog_id]["\x5f\x6d\141\x70\x70\151\156\x67\137\x76\141\x6c\x75\145\x5f\144\x65\x66\141\165\154\x74"]);
        z0R:
        goto BrH;
        BW7:
        if (!(0 === $w_ && isset($this->app_config["\x5f\x6d\141\x70\160\151\156\147\x5f\x76\x61\154\165\145\137\x64\x65\x66\141\165\154\164"]) && '' !== $this->app_config["\137\155\141\x70\160\x69\x6e\x67\x5f\x76\x61\x6c\165\x65\137\144\x65\146\x61\165\x6c\164"])) {
            goto N2W;
        }
        $B8->set_role($this->app_config["\x5f\x6d\x61\160\160\x69\x6e\x67\x5f\x76\141\154\165\x65\137\x64\x65\x66\x61\165\154\164"]);
        N2W:
        BrH:
        if (!has_filter("\x6d\157\x5f\163\x75\142\x73\x69\164\x65\137\x63\x68\x65\143\153\137\x61\x6c\x6c\157\167\137\154\157\x67\x69\156")) {
            goto q1h;
        }
        $FB = apply_filters("\x6d\x6f\x5f\163\165\142\x73\x69\164\x65\137\143\150\145\143\x6b\137\141\154\154\x6f\x77\137\154\157\147\x69\x6e", $this->app_config, $this->group_name, $e3["\x6d\x61\160\160\145\144\137\162\157\x6c\x65\163"]);
        goto ral;
        q1h:
        $dS = 0;
        if (!(isset($this->app_config["\162\145\163\x74\162\x69\x63\x74\x5f\x6c\x6f\147\x69\x6e\x5f\146\x6f\162\x5f\x6d\x61\x70\x70\x65\x64\137\x72\x6f\154\x65\x73"]) && boolval($this->app_config["\x72\x65\x73\x74\162\151\143\x74\137\x6c\x6f\x67\151\156\x5f\x66\x6f\162\x5f\x6d\141\x70\160\x65\x64\x5f\162\157\x6c\145\163"]))) {
            goto JVm;
        }
        foreach ($this->group_name as $BE) {
            if (!in_array($BE, $f9, true)) {
                goto ROo;
            }
            $dS = 1;
            ROo:
            WqU:
        }
        ISk:
        if (!($dS !== 1)) {
            goto aLI;
        }
        require_once ABSPATH . "\167\x70\x2d\141\144\155\x69\x6e\57\x69\156\x63\x6c\165\144\145\163\57\165\x73\x65\162\56\160\150\x70";
        \wp_delete_user($this->user_id);
        global $vj;
        $TM = "\x59\x6f\x75\40\144\157\x20\156\x6f\x74\40\x68\141\166\145\40\x70\x65\162\155\151\163\x73\151\157\x6e\163\40\164\157\x20\154\x6f\147\x69\x6e\40\167\x69\164\150\x20\171\x6f\165\162\x20\x63\x75\x72\162\145\x6e\164\40\162\157\x6c\x65\x73\x2e\x20\x50\154\x65\141\163\x65\40\143\157\156\x74\141\143\164\x20\164\x68\x65\x20\x41\144\155\151\x6e\x69\163\164\162\141\164\x6f\x72\56";
        $vj->handle_error($TM);
        wp_die($TM);
        aLI:
        JVm:
        ral:
    }
}
