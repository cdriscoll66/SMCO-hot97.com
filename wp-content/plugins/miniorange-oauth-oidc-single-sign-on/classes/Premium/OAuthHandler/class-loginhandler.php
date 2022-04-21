<?php


namespace MoOauthClient\Premium;

use MoOauthClient\Standard\LoginHandler as StandardLoginHandler;
use MoOauthClient\GrantTypes\Implicit;
use MoOauthClient\GrantTypes\Password;
use MoOauthClient\GrantTypes\JWSVerify;
use MoOauthClient\GrantTypes\JWTUtils;
use MoOauthClient\Premium\MappingHandler;
use MoOauthClient\StorageManager;
use MoOauthClient\MO_Oauth_Debug;
class LoginHandler extends StandardLoginHandler
{
    private $implicit_handler;
    private $app_name = '';
    private $group_mapping_attr = false;
    private $resource_owner = false;
    public function __construct()
    {
        global $vj;
        parent::__construct();
        add_filter("\155\x6f\x5f\141\x75\x74\x68\x5f\165\162\154\137\x69\156\164\x65\x72\x6e\x61\x6c", array($this, "\x6d\x6f\x5f\x6f\x61\x75\x74\150\x5f\143\x6c\x69\145\156\x74\x5f\147\145\156\145\162\141\164\145\x5f\141\165\164\x68\x6f\162\x69\x7a\x61\164\x69\157\156\x5f\x75\x72\154"), 5, 2);
        add_action("\167\x70\137\146\157\157\x74\145\162", array($this, "\x6d\157\x5f\157\x61\x75\x74\150\x5f\x63\x6c\151\x65\156\164\x5f\x69\x6d\160\x6c\151\x63\151\164\137\x66\x72\x61\x67\155\x65\x6e\164\x5f\150\141\156\144\x6c\145\x72"));
        add_action("\155\157\137\157\141\165\164\150\137\162\145\163\164\162\x69\x63\x74\137\145\x6d\141\151\x6c\163", array($this, "\x6d\x6f\137\x6f\141\x75\x74\150\x5f\143\x6c\151\145\156\x74\x5f\162\145\163\x74\x72\x69\x63\x74\x5f\x65\x6d\x61\151\x6c\163"), 10, 2);
        add_action("\155\x6f\137\x6f\141\165\164\150\137\143\x6c\x69\x65\156\x74\x5f\x6d\141\x70\x5f\162\x6f\x6c\x65\163", array($this, "\x6d\x6f\x5f\x6f\x61\165\x74\x68\137\143\154\x69\x65\x6e\164\137\155\141\160\137\162\157\x6c\145\x73"), 10, 1);
        $Bz = $vj->mo_oauth_client_get_option("\155\x6f\x5f\157\x61\x75\x74\150\x5f\x65\x6e\141\x62\x6c\145\x5f\x6f\141\165\164\x68\x5f\167\160\x5f\154\157\x67\151\x6e");
        if (!$Bz) {
            goto hvv;
        }
        remove_filter("\x61\165\164\x68\145\156\164\x69\x63\141\164\x65", "\x77\x70\137\x61\165\x74\x68\145\156\x74\151\143\x61\164\145\x5f\165\x73\145\162\x6e\141\155\x65\137\x70\141\x73\163\x77\157\162\x64", 20, 3);
        $oO = new Password(true);
        add_filter("\141\165\x74\x68\x65\156\x74\151\x63\x61\164\145", array($oO, "\x6d\x6f\137\x6f\141\x75\164\x68\x5f\x77\160\x5f\x6c\x6f\x67\x69\156"), 20, 3);
        hvv:
    }
    public function mo_oauth_client_restrict_emails($zZ, $sC)
    {
        global $vj;
        $aP = isset($sC["\x72\145\163\x74\x72\151\x63\x74\x65\144\137\x64\x6f\155\141\x69\156\x73"]) ? $sC["\x72\x65\163\x74\162\x69\x63\x74\145\x64\x5f\144\x6f\155\141\151\156\x73"] : '';
        if (!empty($aP)) {
            goto wKV;
        }
        return;
        wKV:
        $L1 = isset($sC["\141\x6c\x6c\x6f\x77\x5f\162\145\x73\x74\162\x69\143\x74\145\144\137\144\x6f\155\141\x69\156\163"]) ? $sC["\x61\154\x6c\157\x77\137\162\145\x73\x74\x72\x69\143\164\x65\x64\x5f\x64\x6f\155\141\151\156\x73"] : '';
        if (!empty($L1)) {
            goto O8I;
        }
        $L1 = false;
        O8I:
        $L1 = intval($L1);
        $aP = explode("\x2c", $aP);
        $Gf = substr($zZ, strpos($zZ, "\x40") + 1);
        $G4 = in_array($Gf, $aP, false);
        $G4 = $L1 ? !$G4 : $G4;
        $Qh = !empty($aP) && $G4;
        if (!$Qh) {
            goto iU3;
        }
        $TM = "\x59\157\165\40\x64\x6f\x20\156\157\x74\x20\x68\x61\166\145\x20\x72\151\x67\x68\x74\163\40\164\157\40\141\x63\x63\x65\x73\163\x20\164\150\151\x73\x20\x70\141\147\x65\x2e\40\x50\x6c\x65\141\x73\145\x20\143\x6f\156\x74\141\x63\164\x20\164\x68\x65\40\x61\144\155\151\x6e\x69\163\164\x72\x61\164\x6f\x72\56";
        $vj->handle_error($TM);
        wp_die($TM);
        iU3:
    }
    public function mo_oauth_client_generate_authorization_url($dv, $Xr)
    {
        global $vj;
        $UT = $vj->parse_url($dv);
        $sC = $vj->get_app_by_name($Xr)->get_app_config();
        $NJ = md5(rand());
        setcookie("\155\x6f\x5f\x6f\x61\165\164\x68\137\x6e\x6f\x6e\143\145", $NJ, time() + 120);
        if (isset($sC["\147\162\x61\x6e\x74\x5f\164\171\x70\x65"]) && "\x49\155\160\154\x69\x63\151\164\x20\x47\162\141\x6e\164" === $sC["\x67\162\x61\156\164\137\x74\x79\160\145"]) {
            goto h6L;
        }
        if (!(isset($sC["\147\162\141\156\164\137\164\171\160\145"]) && "\110\171\142\162\151\x64\40\107\x72\x61\x6e\164" === $sC["\x67\162\141\x6e\164\137\x74\x79\160\145"])) {
            goto RYi;
        }
        MO_Oauth_Debug::mo_oauth_log("\x47\162\141\156\x74\72\x20\x48\171\x62\x72\x69\x64\x20\x47\162\141\x6e\x74");
        $UT["\161\x75\145\x72\x79"]["\x72\145\x73\160\x6f\156\x73\x65\137\x74\171\x70\145"] = "\x74\157\153\x65\x6e\45\x32\x30\151\144\137\x74\x6f\153\145\156\x25\62\60\143\157\x64\145";
        return $vj->generate_url($UT);
        RYi:
        goto u5a;
        h6L:
        $UT["\161\165\145\162\x79"]["\156\x6f\156\143\145"] = $NJ;
        $UT["\161\165\145\x72\171"]["\x72\x65\163\160\x6f\x6e\163\145\137\164\x79\160\145"] = "\x74\157\153\145\156";
        $Fa = isset($sC["\x6d\x6f\137\157\x61\165\164\150\137\162\145\163\160\157\x6e\163\x65\x5f\164\x79\160\x65"]) && !empty($sC["\x6d\x6f\137\x6f\x61\x75\x74\x68\x5f\x72\145\163\x70\157\x6e\163\x65\x5f\164\171\160\145"]) ? $sC["\155\157\x5f\157\141\x75\x74\x68\137\x72\x65\x73\160\157\156\x73\145\x5f\x74\171\x70\145"] : "\164\x6f\153\x65\156";
        $UT["\161\165\145\x72\x79"]["\x72\x65\x73\160\x6f\x6e\163\x65\137\x74\x79\160\x65"] = $Fa;
        return $vj->generate_url($UT);
        u5a:
        return $dv;
    }
    public function mo_oauth_client_map_roles($q1)
    {
        $BD = isset($q1["\x61\160\x70\x5f\143\x6f\x6e\146\151\147"]) && !empty($q1["\x61\x70\x70\137\x63\x6f\156\x66\x69\x67"]) ? $q1["\141\160\160\x5f\143\x6f\156\146\x69\147"] : [];
        $jo = isset($BD["\147\x72\x6f\x75\x70\156\x61\155\x65\137\x61\164\x74\x72\151\142\x75\164\x65"]) && '' !== $BD["\x67\162\x6f\x75\160\x6e\141\155\x65\x5f\x61\x74\164\x72\151\142\x75\x74\x65"] ? $BD["\147\162\x6f\165\x70\156\x61\x6d\x65\x5f\x61\164\164\x72\x69\142\165\164\x65"] : false;
        global $vj;
        $dS = false;
        if (isset($BD["\145\156\x61\142\154\x65\x5f\x72\157\154\x65\x5f\x6d\x61\x70\160\151\x6e\x67"])) {
            goto iXm;
        }
        $BD["\145\x6e\x61\142\154\x65\x5f\x72\x6f\x6c\145\x5f\155\141\x70\x70\151\x6e\147"] = true;
        $dS = true;
        iXm:
        if (isset($BD["\137\x6d\141\160\x70\151\156\147\x5f\x76\x61\x6c\165\x65\137\x64\145\x66\141\165\154\164"])) {
            goto hI7;
        }
        $BD["\x5f\155\x61\160\160\x69\156\x67\x5f\166\x61\x6c\x75\x65\x5f\x64\145\146\141\x75\154\x74"] = "\163\x75\142\x73\x63\x72\x69\142\x65\162";
        $dS = true;
        hI7:
        if (!boolval($dS)) {
            goto MZw;
        }
        if (!(isset($BD["\143\x6c\x69\x65\x6e\164\x5f\x63\x72\145\x64\163\x5f\145\156\143\x72\x70\171\164\145\x64"]) && boolval($BD["\x63\x6c\x69\145\x6e\164\x5f\x63\x72\x65\x64\x73\x5f\145\156\x63\x72\160\171\164\145\144"]))) {
            goto sNQ;
        }
        $BD["\x63\x6c\151\x65\x6e\x74\137\x69\x64"] = $vj->mooauthencrypt($BD["\143\x6c\x69\x65\156\x74\137\x69\x64"]);
        $BD["\x63\154\x69\x65\x6e\x74\137\163\x65\x63\x72\x65\164"] = $vj->mooauthencrypt($BD["\x63\154\x69\x65\156\164\137\163\145\x63\x72\x65\164"]);
        sNQ:
        $vj->set_app_by_name($q1["\141\160\x70\x5f\156\141\155\145"], $BD);
        MZw:
        $this->resource_owner = isset($q1["\162\145\x73\157\165\x72\143\x65\137\157\x77\156\145\162"]) && !empty($q1["\x72\145\163\157\x75\x72\143\x65\x5f\x6f\x77\156\145\162"]) ? $q1["\x72\x65\x73\x6f\x75\162\143\x65\x5f\x6f\x77\156\x65\162"] : [];
        $this->group_mapping_attr = $this->get_group_mapping_attribute($this->resource_owner, false, $jo);
        MO_Oauth_Debug::mo_oauth_log("\x47\x72\x6f\165\160\40\115\141\x70\160\151\156\147\x20\x41\164\x74\162\x69\x62\x75\x74\x65\x73\x20\x3d\x3e\40" . $jo);
        $fD = new MappingHandler(isset($q1["\165\163\145\162\x5f\x69\x64"]) && is_numeric($q1["\165\163\x65\162\137\151\144"]) ? intval($q1["\165\163\x65\162\137\x69\144"]) : 0, $BD, $this->group_mapping_attr ? $this->group_mapping_attr : '', isset($q1["\156\x65\167\x5f\x75\163\145\x72"]) ? \boolval($q1["\x6e\145\167\137\x75\163\145\x72"]) : true);
        $sC = $q1["\x63\157\x6e\x66\151\x67"];
        if (!(!isset($sC["\x6b\x65\x65\x70\x5f\x65\x78\x69\163\x74\151\156\x67\x5f\x75\163\x65\162\x73"]) || 1 !== intval($sC["\x6b\145\x65\160\137\x65\170\x69\x73\x74\151\156\x67\137\165\163\x65\162\x73"]))) {
            goto St3;
        }
        $fD->apply_custom_attribute_mapping(is_array($this->resource_owner) ? $this->resource_owner : []);
        St3:
        $H_ = false;
        $H_ = apply_filters("\155\157\137\157\x61\x75\164\x68\x5f\x63\154\x69\145\x6e\164\137\x75\x70\x64\141\164\x65\x5f\x61\144\x6d\x69\x6e\x5f\162\x6f\x6c\145", $H_);
        if (!$H_) {
            goto Iyt;
        }
        MO_Oauth_Debug::mo_oauth_log("\x41\144\x6d\x69\x6e\x20\x52\157\x6c\145\x20\x77\x69\x6c\154\40\x62\x65\x20\x75\160\144\x61\x74\145\144");
        Iyt:
        if (!(user_can($q1["\165\x73\x65\x72\x5f\151\x64"], "\141\x64\x6d\x69\x6e\151\x73\x74\162\141\x74\157\162") && !$H_)) {
            goto Ixz;
        }
        return;
        Ixz:
        $fD->apply_role_mapping(is_array($this->resource_owner) ? $this->resource_owner : []);
    }
    public function mo_oauth_client_implicit_fragment_handler()
    {
        echo "\x9\11\x9\x3c\163\143\162\x69\x70\x74\x3e\xd\12\x9\x9\11\11\146\165\x6e\143\x74\x69\157\x6e\x20\143\157\156\166\x65\x72\x74\137\164\157\x5f\x75\162\x6c\x28\x6f\142\x6a\x29\40\173\xd\xa\11\x9\11\x9\x9\x72\x65\164\x75\162\156\40\x4f\142\x6a\x65\x63\x74\xd\12\11\11\x9\11\11\x2e\x6b\x65\x79\x73\50\157\142\152\x29\xd\xa\x9\x9\x9\x9\x9\x2e\155\x61\160\50\153\40\75\x3e\x20\140\44\x7b\x65\x6e\x63\157\x64\145\125\122\x49\103\157\x6d\x70\157\x6e\145\156\x74\x28\153\51\x7d\75\x24\173\x65\156\x63\157\144\145\x55\x52\111\103\157\155\160\x6f\x6e\145\156\x74\50\x6f\142\x6a\133\x6b\135\x29\175\140\51\15\12\x9\x9\x9\11\11\x2e\x6a\x6f\151\x6e\50\47\x26\47\51\73\xd\xa\11\x9\11\x9\175\15\12\xd\xa\x9\x9\11\x9\x66\x75\x6e\x63\x74\x69\x6f\156\x20\x70\141\163\x73\x5f\x74\157\137\x62\x61\143\153\145\156\144\x28\51\40\x7b\xd\xa\x9\11\11\x9\11\151\146\50\167\151\156\x64\x6f\167\56\x6c\x6f\x63\141\x74\x69\x6f\156\x2e\x68\x61\163\x68\51\40\173\15\xa\11\x9\11\11\11\x9\x76\x61\x72\x20\x68\x61\163\x68\40\75\x20\167\x69\x6e\144\x6f\x77\56\154\x6f\143\141\x74\x69\x6f\156\x2e\150\141\163\x68\73\15\12\x9\x9\11\11\11\x9\x76\141\162\x20\x65\154\x65\155\145\156\x74\x73\x20\75\x20\173\x7d\x3b\15\12\11\11\x9\x9\x9\11\150\141\x73\x68\x2e\x73\160\x6c\151\x74\x28\42\x23\x22\x29\133\61\x5d\56\x73\160\154\151\x74\50\x22\46\x22\51\56\146\x6f\162\105\x61\x63\150\50\x65\x6c\145\x6d\145\x6e\x74\40\x3d\76\x20\x7b\15\xa\x9\11\11\x9\x9\x9\11\166\141\x72\x20\x76\141\162\163\40\75\40\x65\154\x65\155\x65\156\164\56\163\160\154\x69\164\x28\42\75\42\51\x3b\15\12\11\x9\11\x9\x9\x9\11\x65\154\145\155\x65\x6e\x74\163\x5b\166\141\x72\163\x5b\x30\x5d\x5d\40\75\40\x76\141\x72\163\133\x31\135\73\15\xa\x9\11\11\x9\11\x9\175\x29\x3b\15\xa\11\x9\x9\x9\11\x9\x69\146\x28\x28\42\141\143\x63\145\x73\x73\x5f\x74\157\153\145\x6e\x22\x20\x69\x6e\x20\145\154\145\x6d\x65\156\164\163\x29\x20\x7c\x7c\40\50\42\151\144\x5f\x74\157\153\x65\156\42\40\x69\x6e\x20\145\154\145\x6d\x65\x6e\164\163\51\40\x7c\x7c\40\x28\x22\x74\157\x6b\x65\x6e\42\x20\x69\x6e\40\x65\154\145\x6d\145\156\164\x73\x29\x29\x20\173\xd\12\11\x9\11\11\x9\x9\x9\151\146\x28\x77\151\156\144\157\167\56\x6c\157\143\141\x74\x69\157\x6e\56\150\x72\145\x66\56\151\x6e\144\145\x78\117\146\x28\x22\x3f\x22\51\40\x21\75\75\x20\55\x31\x29\x20\173\15\12\x9\11\11\x9\11\11\x9\11\x77\151\156\x64\157\167\56\154\x6f\x63\141\164\151\x6f\x6e\40\x3d\x20\50\x77\x69\x6e\x64\x6f\167\x2e\x6c\x6f\143\x61\164\x69\x6f\156\x2e\x68\x72\145\146\56\x73\160\154\x69\164\50\42\x3f\42\x29\x5b\60\135\40\x2b\x20\167\151\x6e\x64\157\x77\56\x6c\x6f\143\x61\x74\151\x6f\156\x2e\150\x61\163\150\x29\x2e\x73\160\154\x69\x74\50\47\x23\x27\51\133\60\x5d\x20\53\x20\x22\x3f\42\x20\x2b\x20\x63\157\x6e\x76\145\x72\x74\x5f\x74\157\x5f\x75\162\x6c\50\145\154\145\155\x65\x6e\164\x73\51\73\xd\12\11\11\11\11\x9\11\11\x7d\x20\x65\154\x73\145\40\x7b\xd\12\x9\11\x9\11\11\x9\11\11\x77\x69\156\144\157\x77\56\x6c\x6f\143\x61\x74\151\157\x6e\40\x3d\40\167\151\156\144\x6f\167\56\154\157\143\x61\164\151\157\156\x2e\150\x72\145\x66\56\163\x70\x6c\x69\x74\50\47\x23\47\x29\133\60\135\x20\x2b\40\42\x3f\42\x20\x2b\40\143\157\x6e\166\145\x72\164\x5f\164\157\x5f\x75\162\154\50\145\x6c\145\155\x65\x6e\164\x73\x29\73\15\xa\x9\11\x9\x9\11\x9\x9\x7d\15\12\x9\11\11\11\11\11\175\xd\12\11\11\x9\11\11\x7d\15\12\x9\11\x9\11\x7d\xd\xa\15\xa\11\11\11\11\x70\x61\163\163\137\164\x6f\137\142\x61\x63\x6b\x65\x6e\144\50\51\x3b\15\12\11\11\11\74\x2f\x73\x63\162\x69\x70\164\x3e\15\xa\xd\12\11\11";
    }
    private function check_state($na)
    {
        global $vj;
        $SC = str_replace("\x25\x33\x64", "\75", urldecode($na->get_query_param("\x73\164\141\x74\x65")));
        $YR = new StorageManager($SC);
        $gW = $YR->get_value("\x61\x70\x70\x6e\x61\155\145");
        $BD = $vj->get_app_by_name($gW)->get_app_config();
        $Mg = $BD["\x61\160\x70\111\144"];
        $kL = $vj->get_app_by_name($Mg);
        if (empty($SC)) {
            goto Y3E;
        }
        $SC = isset($_GET["\x73\164\141\x74\145"]) ? wp_unslash($_GET["\163\164\x61\x74\145"]) : false;
        goto Riv;
        Y3E:
        $SC = $YR->get_state();
        $SC = apply_filters("\x73\x74\x61\x74\145\137\151\156\x74\x65\162\156\141\154", $SC);
        setcookie("\163\164\141\x74\145\x5f\160\x61\162\141\x6d", $SC, time() + 60);
        $YR = new StorageManager($SC);
        Riv:
        if (!isset($_COOKIE["\x73\164\x61\x74\x65\137\x70\x61\x72\x61\x6d"])) {
            goto O7N;
        }
        $SC = $_COOKIE["\x73\x74\x61\x74\145\137\160\141\x72\141\x6d"];
        O7N:
        if (!is_wp_error($YR)) {
            goto Yun;
        }
        wp_die(wp_kses($YR->get_error_message(), \mo_oauth_get_valid_html()));
        Yun:
        $dK = $YR->get_value("\x75\151\x64");
        if (!($dK && MO_UID === $dK)) {
            goto YiU;
        }
        $this->appname = $YR->get_value("\x61\x70\160\x6e\x61\155\145");
        return $YR;
        YiU:
        return false;
    }
    public function mo_oauth_login_validate()
    {
        if (isset($_REQUEST["\155\157\137\x6c\x6f\x67\x69\x6e\137\x70\157\160\165\160"]) && 1 == sanitize_text_field($_REQUEST["\155\157\137\x6c\x6f\x67\x69\156\x5f\x70\157\160\x75\x70"])) {
            goto d9k;
        }
        parent::mo_oauth_login_validate();
        global $vj;
        if (!(isset($_REQUEST["\x74\x6f\x6b\x65\x6e"]) && !empty($_REQUEST["\x74\x6f\x6b\145\156"]) || isset($_REQUEST["\151\x64\137\164\x6f\x6b\145\156"]) && !empty($_REQUEST["\x69\144\137\x74\x6f\x6b\145\x6e"]))) {
            goto AOq;
        }
        if (!(isset($_REQUEST["\x74\157\153\x65\x6e"]) && !empty($_REQUEST["\x74\x6f\153\x65\156"]))) {
            goto Hyb;
        }
        $j2 = $vj->is_valid_jwt(urldecode($_REQUEST["\x74\157\153\x65\156"]));
        if ($j2) {
            goto ke5;
        }
        return;
        ke5:
        Hyb:
        if (!(isset($_REQUEST["\x6e\x6f\156\x63\x65"]) && (isset($_COOKIE["\155\x6f\x5f\157\x61\165\x74\150\137\156\157\156\x63\145"]) && $_COOKIE["\x6d\157\137\x6f\x61\165\164\x68\x5f\x6e\x6f\156\x63\x65"] != $_REQUEST["\156\157\x6e\x63\x65"]))) {
            goto hCO;
        }
        wp_die("\x4e\x6f\156\143\x65\x20\166\x65\x72\x69\146\151\x63\x61\x74\x69\157\156\x20\151\163\40\x66\x61\x69\x6c\x65\144\56\40\120\154\145\x61\163\x65\x20\x63\157\156\x74\x61\143\164\x20\164\157\x20\171\x6f\165\162\40\141\x64\155\x69\156\x69\163\164\162\141\x74\157\162\x2e");
        exit;
        hCO:
        $na = new Implicit(isset($_SERVER["\121\x55\x45\x52\131\137\x53\124\x52\111\x4e\107"]) ? $_SERVER["\121\x55\x45\122\131\x5f\x53\x54\122\x49\116\107"] : '');
        if (!is_wp_error($na)) {
            goto wN3;
        }
        $vj->handle_error($na->get_error_message());
        wp_die(wp_kses($na->get_error_message(), \mo_oauth_get_valid_html()));
        MO_Oauth_Debug::mo_oauth_log("\120\x6c\x65\x61\x73\x65\x20\x74\162\x79\40\114\157\x67\147\151\x6e\147\x20\151\x6e\40\x61\x67\x61\151\156\56");
        exit("\x50\x6c\145\x61\163\145\40\x74\x72\x79\40\x4c\x6f\x67\147\x69\156\147\40\x69\x6e\x20\x61\x67\141\151\x6e\56");
        wN3:
        $M3 = $na->get_jwt_from_query_param();
        if (!is_wp_error($M3)) {
            goto Xxl;
        }
        $vj->handle_error($M3->get_error_message());
        MO_Oauth_Debug::mo_oauth_log($M3->get_error_message());
        wp_die(wp_kses($M3->get_error_message(), \mo_oauth_get_valid_html()));
        Xxl:
        MO_Oauth_Debug::mo_oauth_log("\112\127\124\40\124\157\x6b\145\x6e\x20\x75\163\x65\x64\40\x66\x6f\162\x20\157\142\x74\141\151\156\151\x6e\147\40\162\145\163\157\165\162\143\x65\x20\x6f\167\x6e\145\162\x20\75\76\x20");
        MO_Oauth_Debug::mo_oauth_log($M3);
        $YR = $this->check_state($na);
        if ($YR) {
            goto o4b;
        }
        $zp = "\x53\x74\x61\164\145\40\120\x61\x72\x61\155\x65\164\x65\162\x20\144\151\x64\x20\x6e\x6f\x74\40\x76\145\162\151\146\x79\x2e\40\x50\154\x65\141\x73\x65\40\x54\162\x79\40\x4c\157\147\147\151\x6e\147\x20\151\156\40\141\147\141\151\x6e\56";
        $vj->handle_error($zp);
        MO_Oauth_Debug::mo_oauth_log("\123\164\141\164\x65\40\x50\141\162\x61\x6d\x65\164\145\x72\40\x64\x69\144\x20\x6e\x6f\164\x20\166\x65\162\x69\x66\x79\x2e\40\120\154\145\141\163\145\x20\124\x72\171\40\x4c\x6f\147\x67\x69\156\147\x20\151\x6e\x20\141\147\x61\x69\156\61\x2e");
        wp_die($zp);
        o4b:
        $BD = $vj->get_app_by_name($this->app_name);
        $BD = $BD ? $BD->get_app_config() : false;
        $Nm = $this->handle_jwt($M3);
        MO_Oauth_Debug::mo_oauth_log("\x52\145\163\157\x75\x72\x63\145\x20\x4f\x77\156\145\162\40\75\x3e\x20");
        MO_Oauth_Debug::mo_oauth_log($Nm);
        if (!is_wp_error($Nm)) {
            goto KRo;
        }
        $vj->handle_error($Nm->get_error_message());
        wp_die(wp_kses($Nm->get_error_message(), \mo_oauth_get_valid_html()));
        KRo:
        if ($BD) {
            goto yPM;
        }
        $JO = "\123\x74\141\x74\145\x20\120\141\162\141\155\145\164\x65\x72\x20\x64\x69\x64\40\x6e\157\164\x20\166\x65\162\151\146\x79\x2e\40\120\154\x65\x61\163\x65\x20\x54\162\171\40\x4c\157\147\x67\x69\156\147\40\151\156\x20\x61\x67\x61\151\156\x32\x2e";
        $vj->handle_error($JO);
        MO_Oauth_Debug::mo_oauth_log("\123\x74\141\x74\145\x20\x50\x61\162\x61\x6d\145\x74\145\x72\x20\144\151\x64\40\156\x6f\x74\x20\166\145\x72\151\x66\x79\x2e\x20\120\x6c\x65\141\163\145\x20\x54\162\171\x20\114\x6f\147\147\x69\x6e\147\x20\x69\x6e\40\x61\147\141\151\x6e\56");
        wp_die($JO);
        yPM:
        if ($Nm) {
            goto a2q;
        }
        $Ro = "\112\x57\x54\40\123\x69\x67\156\x61\x74\165\x72\x65\40\144\x69\144\40\x6e\157\x74\x20\166\x65\x72\151\146\x79\x2e\x20\120\x6c\145\141\163\x65\x20\x54\x72\x79\40\114\x6f\147\x67\x69\156\x67\x20\x69\x6e\40\141\x67\141\x69\x6e\x2e";
        $vj->handle_error($Ro);
        MO_Oauth_Debug::mo_oauth_log("\x4a\127\x54\40\123\x69\147\156\x61\x74\x75\162\x65\x20\144\x69\144\40\156\x6f\x74\40\166\x65\162\x69\x66\171\x2e\40\120\154\x65\141\163\x65\40\x54\162\x79\x20\x4c\x6f\147\x67\x69\156\147\40\x69\x6e\x20\x61\x67\x61\x69\156\x2e");
        wp_die($Ro);
        a2q:
        $af = $YR->get_value("\x74\145\x73\x74\137\x63\x6f\156\146\151\x67");
        $this->resource_owner = $Nm;
        $this->handle_group_details($na->get_query_param("\141\x63\143\145\163\x73\x5f\x74\x6f\153\x65\156"), isset($BD["\x67\x72\157\165\160\x64\145\x74\141\x69\154\163\x75\x72\x6c"]) ? $BD["\147\x72\x6f\165\160\x64\x65\x74\x61\151\x6c\163\165\162\x6c"] : '', isset($BD["\147\x72\157\165\x70\156\141\x6d\x65\x5f\141\164\164\x72\x69\142\165\x74\x65"]) ? $BD["\x67\162\x6f\x75\x70\x6e\141\155\x65\137\x61\164\x74\x72\x69\x62\165\x74\145"] : '', $af);
        $qP = [];
        $hy = $this->dropdownattrmapping('', $Nm, $qP);
        $vj->mo_oauth_client_update_option("\x6d\x6f\137\157\141\165\x74\150\137\141\164\164\162\137\156\141\155\x65\137\154\151\x73\x74" . $BD["\141\160\x70\111\x64"], $hy);
        if (!($af && '' !== $af)) {
            goto MpA;
        }
        $this->render_test_config_output($Nm);
        exit;
        MpA:
        MO_Oauth_Debug::mo_oauth_log("\x42\x65\x66\x6f\x72\x65\x20\150\x61\x6e\144\x6c\145\40\163\163\157\61");
        $this->handle_sso($this->app_name, $BD, $Nm, $YR->get_state(), $na->get_query_param());
        AOq:
        if (!(isset($_REQUEST["\x68\x75\142\x6c\x65\x74"]) || isset($_REQUEST["\x70\x6f\x72\164\x61\x6c\x5f\144\x6f\x6d\x61\151\156"]))) {
            goto haW;
        }
        return;
        haW:
        if (!(isset($_REQUEST["\141\x63\143\x65\163\x73\x5f\164\x6f\x6b\145\x6e"]) && '' !== $_REQUEST["\141\x63\143\145\163\163\137\x74\x6f\x6b\x65\x6e"])) {
            goto wBX;
        }
        $na = new Implicit(isset($_SERVER["\x51\x55\105\122\131\137\123\x54\x52\x49\116\107"]) ? $_SERVER["\121\125\105\122\x59\x5f\x53\x54\x52\x49\x4e\x47"] : '');
        $YR = $this->check_state($na);
        if ($YR) {
            goto aJH;
        }
        $zp = "\x53\x74\141\164\145\x20\x50\x61\162\141\155\145\x74\145\x72\x20\x64\x69\x64\x20\x6e\157\164\x20\166\145\162\151\x66\x79\x2e\40\120\154\145\x61\163\x65\40\x54\x72\171\40\x4c\x6f\x67\147\x69\x6e\x67\40\x69\x6e\40\141\147\141\x69\156\x2e";
        $vj->handle_error($zp);
        MO_Oauth_Debug::mo_oauth_log("\x53\x74\x61\164\x65\x20\x50\x61\162\x61\155\145\x74\145\x72\40\144\151\144\x20\156\x6f\164\40\166\x65\162\x69\146\171\56\40\x50\x6c\145\141\x73\x65\x20\124\162\x79\40\x4c\157\x67\x67\151\x6e\147\x20\x69\156\40\141\147\141\151\x6e\62\x2e");
        wp_die($zp);
        aJH:
        $BD = $vj->get_app_by_name($YR->get_value("\141\160\160\x6e\141\155\145"));
        $BD = $BD->get_app_config();
        $Nm = [];
        if (!(isset($BD["\162\145\x73\157\x75\162\143\145\157\167\156\x65\162\144\145\x74\x61\x69\x6c\x73\165\x72\154"]) && !empty($BD["\162\145\163\157\165\x72\x63\145\x6f\167\x6e\145\162\144\145\x74\141\x69\154\x73\x75\x72\x6c"]))) {
            goto cIf;
        }
        $Nm = $this->oauth_handler->get_resource_owner($BD["\162\x65\163\157\x75\x72\143\x65\157\167\156\x65\x72\x64\145\164\141\151\154\x73\x75\162\154"], $na->get_query_param("\141\x63\143\145\163\163\137\x74\x6f\x6b\x65\x6e"));
        cIf:
        MO_Oauth_Debug::mo_oauth_log("\x41\x63\x63\x65\x73\163\x20\x54\157\x6b\145\x6e\x20\75\76\x20");
        MO_Oauth_Debug::mo_oauth_log($na->get_query_param("\x61\143\x63\145\x73\x73\137\164\x6f\x6b\145\x6e"));
        $b_ = [];
        if (!$vj->is_valid_jwt($na->get_query_param("\141\143\143\145\x73\x73\137\x74\157\x6b\145\x6e"))) {
            goto b1a;
        }
        $M3 = $na->get_jwt_from_query_param();
        $b_ = $this->handle_jwt($M3);
        b1a:
        if (empty($b_)) {
            goto UdG;
        }
        $Nm = array_merge($Nm, $b_);
        UdG:
        if (!(empty($Nm) && !$vj->is_valid_jwt($na->get_query_param("\141\143\x63\x65\x73\163\137\164\157\x6b\145\x6e")))) {
            goto HGa;
        }
        $vj->handle_error("\111\156\166\141\154\x69\x64\40\122\x65\x73\x70\157\x6e\x73\145\x20\x52\x65\143\145\x69\x76\145\144\56");
        MO_Oauth_Debug::mo_oauth_log("\111\156\x76\x61\154\x69\x64\x20\x52\x65\163\160\157\156\163\x65\40\122\x65\x63\x65\151\x76\x65\x64");
        wp_die("\111\156\x76\141\154\151\144\x20\122\x65\x73\x70\157\156\163\145\40\x52\145\143\x65\x69\x76\x65\x64\56");
        exit;
        HGa:
        $this->resource_owner = $Nm;
        MO_Oauth_Debug::mo_oauth_log("\x52\x65\x73\x6f\165\162\x63\145\40\117\167\x6e\145\162\40\x3d\x3e\40");
        MO_Oauth_Debug::mo_oauth_log($this->resource_owner);
        $af = $YR->get_value("\164\145\163\164\137\x63\157\x6e\x66\151\x67");
        $this->handle_group_details($na->get_query_param("\x61\143\143\x65\x73\x73\137\x74\157\153\145\156"), isset($BD["\147\162\x6f\165\160\x64\x65\164\141\151\x6c\163\165\162\x6c"]) ? $BD["\x67\162\x6f\165\160\144\x65\164\141\x69\154\163\x75\x72\154"] : '', isset($BD["\x67\162\x6f\165\160\x6e\141\x6d\x65\137\x61\x74\x74\x72\151\x62\165\x74\145"]) ? $BD["\x67\x72\x6f\x75\x70\x6e\x61\x6d\x65\137\x61\x74\x74\162\x69\x62\x75\x74\145"] : '', $af);
        $qP = [];
        $hy = $this->dropdownattrmapping('', $Nm, $qP);
        $vj->mo_oauth_client_update_option("\155\157\137\157\141\x75\x74\x68\137\x61\x74\164\162\137\x6e\141\x6d\145\x5f\x6c\151\163\x74" . $BD["\141\160\160\111\144"], $hy);
        if (!($af && '' !== $af)) {
            goto HrF;
        }
        $this->render_test_config_output($Nm);
        exit;
        HrF:
        $SC = str_replace("\x25\63\x44", "\x3d", rawurldecode($na->get_query_param("\x73\x74\x61\164\x65")));
        $this->handle_sso($this->app_name, $BD, $Nm, $SC, $na->get_query_param());
        wBX:
        if (!(isset($_REQUEST["\154\157\147\x69\156"]) && "\x70\167\x64\x67\x72\x6e\164\x66\162\155" === $_REQUEST["\154\157\x67\x69\x6e"])) {
            goto AWI;
        }
        $oO = new Password();
        $sN = isset($_REQUEST["\x63\141\154\154\x65\162"]) && !empty($_REQUEST["\x63\141\154\x6c\145\162"]) ? $_REQUEST["\x63\141\x6c\154\145\162"] : false;
        $jK = isset($_REQUEST["\x74\x6f\x6f\x6c"]) && !empty($_REQUEST["\x74\157\x6f\x6c"]) ? $_REQUEST["\164\x6f\157\x6c"] : false;
        $Xr = isset($_REQUEST["\x61\160\x70\x5f\156\x61\x6d\x65"]) && !empty($_REQUEST["\x61\x70\x70\x5f\x6e\141\155\x65"]) ? $_REQUEST["\x61\x70\x70\x5f\x6e\141\x6d\x65"] : '';
        if (!($Xr == '')) {
            goto ziK;
        }
        $Ha = "\x4e\x6f\x20\163\x75\x63\150\40\141\x70\160\40\146\x6f\165\156\144\x20\x63\x6f\156\146\x69\x67\x75\x72\145\x64\56\40\x50\154\145\141\x73\145\40\143\150\x65\x63\153\x20\x69\146\x20\171\x6f\165\40\x61\x72\145\x20\163\145\x6e\144\x69\x6e\x67\40\164\x68\x65\40\143\157\162\x72\x65\143\164\x20\141\x70\x70\154\151\x63\x61\164\x69\157\156\x20\x6e\141\155\x65";
        $vj->handle_error($Ha);
        wp_die(wp_kses($Ha, \mo_oauth_get_valid_html()));
        exit;
        ziK:
        $G5 = $vj->mo_oauth_client_get_option("\x6d\x6f\x5f\x6f\x61\165\x74\150\x5f\x61\x70\160\x73\x5f\x6c\x69\163\164");
        if (is_array($G5) && isset($G5[$Xr])) {
            goto o5I;
        }
        $Ha = "\x4e\x6f\40\x73\x75\143\150\40\141\x70\x70\x20\x66\157\165\156\x64\40\143\x6f\156\146\151\147\165\x72\145\144\56\x20\120\154\x65\x61\163\145\x20\143\x68\145\x63\153\x20\x69\146\x20\x79\x6f\x75\40\x61\x72\145\40\x73\x65\156\144\151\156\147\x20\164\x68\x65\40\x63\x6f\162\x72\x65\x63\x74\40\141\x70\x70\137\x6e\141\x6d\x65";
        $vj->handle_error($Ha);
        wp_die(wp_kses($Ha, \mo_oauth_get_valid_html()));
        exit;
        o5I:
        $cs = isset($_REQUEST["\x6c\157\143\141\x74\x69\157\156"]) && !empty($_REQUEST["\x6c\x6f\143\x61\164\x69\x6f\156"]) ? $_REQUEST["\154\157\x63\x61\164\151\x6f\x6e"] : site_url();
        $cv = isset($_REQUEST["\164\x65\x73\164"]) && !empty($_REQUEST["\x74\145\x73\164"]);
        if (!(!$sN || !$jK || !$Xr)) {
            goto xy_;
        }
        $vj->redirect_user(urldecode($cs));
        xy_:
        do_action("\155\x6f\x5f\157\x61\165\164\150\137\x63\x75\x73\164\x6f\155\x5f\x73\x73\157", $sN, $jK, $Xr, $cs, $cv);
        $oO->behave($sN, $jK, $Xr, $cs, $cv);
        AWI:
        goto rAz;
        d9k:
        echo "\11\11\x9\74\x73\x63\x72\151\x70\164\40\x74\171\x70\x65\x3d\42\164\x65\170\164\x2f\152\x61\x76\x61\163\143\x72\151\x70\164\42\x3e\15\12\11\x9\11\166\141\162\x20\x62\141\x73\x65\137\165\x72\154\x20\x3d\40\42";
        echo site_url();
        echo "\x22\73\15\xa\11\11\x9\x76\x61\162\40\x61\160\x70\x5f\156\141\x6d\x65\40\75\x20\42";
        echo sanitize_text_field($_REQUEST["\x61\x70\x70\137\x6e\141\155\145"]);
        echo "\x22\73\xd\12\11\11\x9\11\166\141\162\40\155\171\x57\x69\156\x64\157\167\40\75\x20\x77\x69\156\x64\x6f\167\x2e\157\160\145\x6e\50\x20\142\x61\x73\145\137\165\162\x6c\40\53\x20\x27\x2f\x3f\157\x70\164\x69\x6f\x6e\x3d\157\141\165\164\x68\162\x65\144\151\162\145\143\164\46\x61\x70\x70\137\156\141\155\x65\75\47\x20\x2b\40\141\x70\160\x5f\156\141\x6d\145\54\40\47\47\x2c\40\47\167\151\144\164\x68\x3d\x35\60\60\54\150\x65\x69\x67\150\164\x3d\65\60\60\x27\51\73\xd\12\x9\11\x9\x9\74\57\x73\143\x72\x69\x70\x74\76\15\xa\11\11\11\x9";
        rAz:
    }
    public function handle_group_details($u1 = '', $Z_ = '', $j7 = '', $af = false)
    {
        $VP = [];
        if (!('' === $u1 || '' === $j7)) {
            goto vm0;
        }
        return;
        vm0:
        if (!('' !== $Z_)) {
            goto c_Y;
        }
        $VP = $this->oauth_handler->get_resource_owner($Z_, $u1);
        if (!(isset($_COOKIE["\x6d\157\137\x6f\x61\x75\x74\x68\137\x74\x65\x73\x74"]) && $_COOKIE["\155\157\x5f\x6f\x61\x75\x74\x68\137\164\145\163\164"])) {
            goto sQk;
        }
        if (!(is_array($VP) && !empty($VP))) {
            goto SZH;
        }
        $this->render_test_config_output($VP, true);
        SZH:
        return;
        sQk:
        c_Y:
        $jo = $this->get_group_mapping_attribute($this->resource_owner, $VP, $j7);
        $this->group_mapping_attr = '' !== $jo ? false : $jo;
    }
    public function get_group_mapping_attribute($Nm = array(), $VP = array(), $j7 = '')
    {
        global $vj;
        $G6 = '';
        if (!('' === $j7)) {
            goto UtU;
        }
        return '';
        UtU:
        if (isset($VP) && !empty($VP)) {
            goto ny0;
        }
        if (isset($Nm) && !empty($Nm)) {
            goto dfG;
        }
        goto Y4O;
        ny0:
        $G6 = $vj->getnestedattribute($VP, $j7);
        goto Y4O;
        dfG:
        $G6 = $vj->getnestedattribute($Nm, $j7);
        Y4O:
        return !empty($G6) ? $G6 : '';
    }
    public function handle_jwt($M3)
    {
        global $vj;
        $kL = $vj->get_app_by_name($this->app_name);
        $u7 = $kL->get_app_config("\152\167\x74\137\163\x75\x70\x70\x6f\162\164");
        if ($u7) {
            goto o6c;
        }
        return $M3->get_decoded_payload();
        o6c:
        $K3 = $kL->get_app_config("\x6a\167\164\137\141\154\147\x6f");
        if ($M3->check_algo($K3)) {
            goto tHY;
        }
        return new \WP_Error("\x69\156\166\x61\154\x69\x64\137\163\151\147\156", __("\112\127\x54\x20\x53\151\x67\x6e\x69\156\147\x20\141\154\x67\157\162\151\164\150\155\40\151\163\40\156\x6f\164\x20\x61\x6c\x6c\157\167\145\144\x20\x6f\162\x20\x75\x6e\163\165\160\x70\x6f\162\x74\x65\144\x2e"));
        tHY:
        $YU = "\x52\123\101" === $K3 ? $kL->get_app_config("\170\x35\x30\71\137\x63\x65\x72\x74") : $kL->get_app_config("\143\154\x69\145\x6e\164\137\163\x65\143\x72\145\x74");
        $ii = $kL->get_app_config("\152\x77\x6b\x73\165\x72\154");
        $p2 = $ii ? $M3->verify_from_jwks($ii) : $M3->verify($YU);
        return !$p2 ? $p2 : $M3->get_decoded_payload();
    }
    public function get_resource_owner_from_app($xk, $kL)
    {
        global $vj;
        $this->app_name = $kL;
        $M3 = new JWTUtils($xk);
        if (!is_wp_error($M3)) {
            goto Rnv;
        }
        $vj->handle_error($M3->get_error_message());
        wp_die($M3);
        Rnv:
        $Nm = $this->handle_jwt($M3);
        if (!is_wp_error($Nm)) {
            goto Zjr;
        }
        $vj->handle_error($Nm->get_error_message());
        wp_die($Nm);
        Zjr:
        if (!(false === $Nm)) {
            goto ix3;
        }
        $TM = "\106\141\151\x6c\x65\x64\40\164\x6f\x20\x76\145\162\x69\146\171\40\112\x57\124\x20\124\157\x6b\x65\x6e\x2e\40\120\154\145\141\x73\145\40\143\x68\145\143\153\x20\171\157\165\x72\40\143\x6f\156\x66\x69\x67\165\162\x61\164\151\x6f\x6e\x20\157\x72\x20\143\157\156\164\141\143\164\x20\x79\157\x75\162\x20\x41\144\x6d\151\x6e\x69\x73\164\162\x61\164\157\162\56";
        $vj->handle_error($TM);
        MO_Oauth_Debug::mo_oauth_log("\x46\x61\151\154\x65\x64\40\x74\157\40\x76\x65\162\151\146\x79\x20\112\127\124\x20\124\157\x6b\x65\156\56\40\120\154\x65\x61\x73\145\x20\143\x68\145\143\153\40\x79\x6f\165\162\x20\x63\x6f\156\146\x69\147\x75\x72\x61\164\151\157\156\x20\x6f\162\40\143\157\x6e\164\141\143\164\40\171\157\165\x72\40\x41\x64\155\151\x6e\151\163\164\x72\141\x74\x6f\162\56");
        wp_die($TM);
        ix3:
        return $Nm;
    }
}
