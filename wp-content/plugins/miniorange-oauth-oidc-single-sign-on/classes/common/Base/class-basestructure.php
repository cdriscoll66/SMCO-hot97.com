<?php


namespace MoOauthClient\Base;

use MoOauthClient\Backup;
use MoOauthClient\Support;
use MoOauthClient\Debug;
use MoOauthClient\MO_Oauth_Debug;
require_once "\x63\154\141\x73\163\55\154\157\141\144\x65\x72\56\x70\x68\x70";
class BaseStructure
{
    private $loader;
    public function __construct()
    {
        global $vj;
        $jZ = is_multisite() && $vj->is_multisite_versi() ? "\x6e\145\x74\167\x6f\x72\153\137" : '';
        add_action("{$jZ}\x61\144\155\x69\x6e\137\155\x65\156\x75", array($this, "\x61\144\x6d\151\x6e\x5f\x6d\145\156\165"));
        $this->loader = new Loader();
    }
    public function admin_menu()
    {
        $ny = add_menu_page("\115\117\x20\117\x41\165\x74\150\x20\123\x65\x74\164\x69\x6e\147\x73\x20" . __("\103\x6f\x6e\x66\x69\x67\165\x72\x65\40\x4f\101\165\164\x68", "\155\x6f\137\x6f\x61\165\x74\x68\137\x73\145\164\x74\151\x6e\147\163"), "\155\151\x6e\x69\117\162\x61\x6e\147\145\40\117\x41\x75\x74\150", "\x61\x64\x6d\x69\x6e\x69\163\164\x72\141\164\157\162", "\155\x6f\x5f\x6f\141\x75\164\x68\x5f\163\x65\x74\164\151\156\147\163", array($this, "\155\x65\x6e\165\137\157\160\164\151\157\156\x73"), MOC_URL . "\x72\x65\x73\157\x75\162\x63\x65\x73\x2f\x69\155\x61\x67\x65\x73\57\x6d\x69\156\x69\x6f\x72\141\156\x67\x65\x2e\x70\x6e\x67");
        $ny = add_submenu_page("\x6d\x6f\137\157\141\x75\164\x68\x5f\x73\145\x74\164\x69\156\147\x73", "\x6d\151\x6e\x69\117\x72\141\156\x67\x65\x20\117\101\165\x74\150", __("\x3c\144\x69\166\x20\151\144\75\42\155\x6f\x5f\x6f\141\165\x74\150\x5f\141\144\144\157\156\x73\137\163\x75\142\155\145\x6e\x75\x22\76\101\x64\144\x2d\117\156\x73\74\57\x64\151\166\x3e", "\155\x69\x6e\x69\157\x72\141\x6e\147\145\x2d\x6f\141\x75\x74\x68\x2d\x6f\151\144\143\x2d\x73\x69\156\x67\x6c\x65\x2d\x73\x69\x67\x6e\55\157\x6e"), "\155\141\156\x61\147\145\137\x6f\x70\164\151\157\x6e\x73", "\x6d\157\137\157\141\x75\x74\x68\x5f\163\145\164\164\x69\x6e\x67\163\46\x74\141\x62\75\141\144\144\x6f\x6e\163", array($this, "\x6d\x65\156\x75\x5f\x6f\160\x74\151\x6f\x6e\163"));
        global $uy;
        if (!(is_array($uy) && isset($uy["\x6d\x6f\x5f\157\x61\165\164\x68\x5f\163\145\164\164\x69\x6e\x67\x73"]))) {
            goto LA;
        }
        $uy["\x6d\x6f\x5f\x6f\141\x75\164\150\137\163\145\x74\x74\x69\x6e\x67\x73"][0][0] = __("\x43\157\156\x66\151\x67\x75\x72\145\x20\x4f\x41\x75\x74\150", "\155\157\137\157\141\x75\164\150\x5f\154\x6f\147\151\156");
        LA:
    }
    public function menu_options()
    {
        $sD = isset($_GET["\x74\x61\x62"]) ? $_GET["\164\141\142"] : '';
        echo "\11\x9\x3c\144\x69\166\40\x69\x64\75\42\155\157\x5f\157\x61\165\164\x68\x5f\x73\145\164\x74\151\156\147\x73\x22\76\xd\12\11\11\11\74\144\151\166\40\151\x64\75\x27\155\x6f\142\154\157\x63\153\x27\40\143\154\x61\163\x73\x3d\x27\155\x6f\143\55\157\x76\x65\x72\154\141\171\40\x64\x61\163\x68\x62\x6f\x61\x72\x64\x27\x3e\74\x2f\x64\x69\x76\76\15\12\11\x9\11\74\144\151\x76\40\x63\x6c\x61\x73\163\75\42\x6d\x69\x6e\x69\157\162\x61\156\147\x65\137\x63\x6f\x6e\164\x61\x69\156\x65\x72\x22\x3e\xd\12\x9\11\11\11";
        $this->content_navbar($sD);
        echo "\11\x9\11\11\74\164\x61\142\154\145\40\163\164\171\x6c\x65\x3d\42\x77\151\x64\164\150\72\61\x30\60\45\73\42\76\xd\12\x9\x9\11\11\11\x3c\164\162\76\15\xa\11\x9\11\x9\x9\x9\x3c\x74\x64\x20\163\164\171\154\145\75\42\166\x65\162\164\151\x63\141\154\x2d\x61\x6c\x69\x67\156\x3a\164\157\x70\73\x77\151\144\164\x68\x3a\x36\65\x25\73\42\x20\143\154\141\163\163\x3d\42\x6d\x6f\137\157\x61\165\x74\x68\x5f\143\157\156\164\145\156\x74\x22\x3e\15\xa\11\x9\x9\x9\x9\x9\x9";
        $this->loader->load_current_tab($sD);
        echo "\x9\11\x9\x9\11\x9\x3c\57\164\144\76\15\12\11\x9\x9\11\x9\11";
        if (!("\154\x69\143\x65\x6e\x73\151\x6e\x67" !== $sD && "\141\144\x64\157\156\x73" !== $sD)) {
            goto WB;
        }
        echo "\11\11\x9\11\11\x9\x9\74\164\144\40\x73\x74\x79\x6c\x65\x3d\42\166\145\x72\164\151\x63\141\x6c\55\x61\x6c\x69\x67\x6e\x3a\x74\x6f\x70\x3b\160\141\144\144\x69\156\147\x2d\154\x65\146\x74\72\x31\45\73\x22\x20\x63\154\x61\163\x73\x3d\42\x6d\157\x5f\157\141\165\164\x68\x5f\163\151\144\145\x62\x61\162\x22\x3e\15\12\x9\11\11\x9\x9\11\x9";
        $ER = new Support();
        $ER->support();
        echo "\x20\40\x20\40\x20\40\40\40\40\x20\40\x20\x20\x20\40\40\40\40\x20\40\40\40\x20\x20\40\x20\x20\40\74\142\x72\76\15\12\x20\x20\40\x20\40\x20\40\40\40\40\x20\40\x20\40\x20\x20\40\x20\x20\x20\40\x20\x20\40\x20\40\40\40\x3c\142\162\x3e\xd\12\x20\x20\x20\x20\40\x20\40\40\x20\x20\40\40\x20\40\x9\11\x9\11";
        $I5 = new Debug();
        $I5->debug();
        echo "\x20\x20\40\40\x20\x20\x20\x20\40\x20\40\40\x20\40\40\x20\40\x20\40\x20\x20\40\x20\x20\40\40\40\40";
        $BM = new Backup();
        $BM->backup();
        echo "\11\x9\11\11\x9\11\x9\x3c\x2f\164\x64\x3e\xd\xa\11\11\11\11\x9\11";
        WB:
        echo "\11\x9\x9\11\x9\74\x2f\x74\162\x3e\15\xa\11\x9\x9\11\74\x2f\164\141\x62\x6c\x65\x3e\xd\xa\11\x9\11\74\57\x64\x69\166\x3e\xd\xa\xd\12\11\11\x3c\57\144\x69\166\x3e\15\12\11\11";
    }
    public function logfile_delete()
    {
        global $vj;
        $wY = dirname(__DIR__) . DIRECTORY_SEPARATOR . "\x4f\x41\x75\x74\150\110\141\x6e\x64\x6c\x65\x72" . DIRECTORY_SEPARATOR . $vj->mo_oauth_client_get_option("\x6d\157\x5f\x6f\x61\165\164\x68\137\x64\x65\x62\x75\147") . "\56\154\x6f\147";
        if (!file_exists($wY)) {
            goto zh;
        }
        unlink($wY);
        zh:
    }
    public function content_navbar($sD)
    {
        global $vj;
        if (!$vj->mo_oauth_client_get_option("\155\157\x5f\x64\145\x62\165\x67\137\143\150\145\x63\x6b")) {
            goto A2;
        }
        $vj->mo_oauth_client_update_option("\x6d\157\137\x64\145\142\x75\147\x5f\x63\150\x65\x63\x6b", 0);
        A2:
        $NL = dirname(__DIR__) . DIRECTORY_SEPARATOR . "\x4f\101\x75\164\x68\x48\141\x6e\144\154\145\x72" . DIRECTORY_SEPARATOR . $vj->mo_oauth_client_get_option("\x6d\x6f\x5f\x6f\141\x75\x74\150\137\x64\x65\x62\x75\147") . "\56\x6c\157\147";
        $AG = $vj->mo_oauth_client_get_option("\155\x6f\137\x64\x65\x62\x75\147\137\x65\156\141\x62\154\x65");
        $dt = $vj->mo_oauth_client_get_option("\155\157\137\x6f\141\165\164\x68\x5f\x64\145\142\165\147");
        if ($AG) {
            goto jk;
        }
        $this->logfile_delete();
        $vj->mo_oauth_client_delete_option("\x6d\x6f\x5f\x6f\x61\x75\164\150\x5f\144\x65\142\x75\x67");
        goto hS;
        jk:
        $Vi = 604800;
        $tA = $vj->mo_oauth_client_get_option("\x6d\157\137\x64\145\142\165\147\137\164\x69\155\145");
        $Cu = current_time("\164\151\x6d\x65\x73\x74\x61\155\x70");
        $De = (int) (($Cu - $tA) / $Vi);
        if (!($De >= 1)) {
            goto Yx;
        }
        $vj->mo_oauth_client_update_option("\155\x6f\137\x64\x65\x62\x75\147\x5f\164\x69\155\x65", $tA + $De * $Vi);
        $vj->mo_oauth_client_update_option("\155\157\x5f\144\145\x62\165\147\137\145\x6e\x61\x62\x6c\145", 0);
        $this->logfile_delete();
        $vj->mo_oauth_client_delete_option("\x6d\157\137\x6f\x61\165\164\x68\137\x64\x65\x62\165\x67");
        Yx:
        hS:
        if (!($AG && !$dt || $AG && !file_exists($NL))) {
            goto R3;
        }
        $vj->mo_oauth_client_update_option("\155\157\137\x6f\141\x75\164\150\x5f\144\x65\142\165\147", "\155\157\x5f\x6f\x61\x75\164\x68\137\x64\x65\142\x75\x67" . uniqid());
        $Q6 = $vj->mo_oauth_client_get_option("\x6d\157\137\x6f\x61\x75\x74\150\137\144\145\x62\165\x67");
        $fz = dirname(__DIR__) . DIRECTORY_SEPARATOR . "\117\x41\165\164\x68\110\141\x6e\x64\x6c\145\162" . DIRECTORY_SEPARATOR . $Q6 . "\56\x6c\157\x67";
        $cL = fopen($fz, "\167");
        chmod($fz, 0644);
        $vj->mo_oauth_client_update_option("\155\x6f\x5f\144\145\142\x75\x67\137\x63\x68\145\x63\x6b", 1);
        MO_Oauth_Debug::mo_oauth_log('');
        $vj->mo_oauth_client_update_option("\x6d\x6f\x5f\144\145\142\x75\147\x5f\x63\x68\145\x63\x6b", 0);
        R3:
        echo "\x9\x9\x3c\144\x69\166\x20\143\154\141\163\x73\75\x22\167\162\x61\x70\42\76\xd\12\11\11\x9\74\144\151\x76\40\143\x6c\x61\x73\x73\x3d\42\x68\x65\x61\x64\145\162\55\167\141\x72\160\42\76\xd\xa\11\11\x9\11";
        if (!($sD != "\x6c\x69\x63\145\x6e\163\151\156\147")) {
            goto fP;
        }
        echo "\x9\11\x9\11\x3c\x68\x31\76\x6d\151\156\151\117\x72\x61\x6e\147\145\40\x4f\x41\x75\164\150\57\117\160\x65\x6e\x49\104\x20\103\157\156\156\145\x63\x74\40\123\x69\x6e\x67\154\145\x20\123\x69\147\156\x20\117\x6e\xd\12\11\x9\11\x9\46\x65\x6d\x73\x70\x3b\74\141\x20\151\x64\75\42\x6c\x69\x63\145\156\163\151\156\x67\x5f\142\x75\164\164\x6f\x6e\137\x69\144\42\40\x63\154\x61\x73\163\x3d\42\154\151\x6e\153\137\x62\x75\164\164\x6f\x6e\x20\x74\x6f\160\x5f\x6c\x69\x63\x65\156\x73\x65\42\x20\150\x72\145\x66\75\42\141\x64\x6d\x69\x6e\x2e\160\150\x70\x3f\x70\141\x67\145\x3d\155\157\x5f\x6f\x61\165\x74\150\137\x73\x65\x74\x74\x69\x6e\147\x73\46\x74\x61\x62\75\x6c\151\143\x65\156\x73\x69\x6e\147\42\x3e\120\x72\x65\155\151\165\155\40\120\x6c\141\156\163\x3c\x2f\141\x3e\15\12\x9\x9\x9\11\x26\x6e\142\x73\x70\x3b\x3c\141\40\x69\x64\75\x22\146\141\x71\137\x62\x75\164\164\157\156\x5f\151\144\x22\x20\143\154\141\163\163\75\x22\154\151\156\153\137\x62\x75\164\x74\157\156\42\40\x68\162\x65\x66\x3d\42\x68\164\x74\x70\x73\x3a\x2f\x2f\146\x61\x71\x2e\x6d\151\x6e\151\x6f\x72\x61\156\x67\145\x2e\143\157\x6d\57\x6b\142\x2f\157\x61\165\164\150\55\157\x70\145\156\x69\144\x2d\x63\157\x6e\x6e\x65\x63\164\57\x22\40\164\x61\x72\147\x65\x74\75\x22\137\x62\154\x61\156\153\x22\76\106\101\x51\x73\x3c\57\141\x3e\15\xa\x9\x9\x9\x9\46\x6e\x62\x73\x70\x3b\x3c\x61\x20\x69\144\75\42\146\141\161\137\142\x75\x74\x74\x6f\156\x5f\151\144\42\40\x63\x6c\141\163\x73\x3d\42\154\x69\x6e\153\x5f\x62\x75\164\164\x6f\156\x22\x20\150\162\x65\146\75\42\150\x74\x74\x70\163\x3a\x2f\x2f\x66\157\x72\x75\x6d\x2e\x6d\x69\156\151\x6f\162\x61\x6e\147\x65\x2e\143\x6f\x6d\x2f\42\40\x74\x61\162\147\145\164\75\x22\x5f\x62\x6c\x61\156\153\42\x3e\x41\x73\x6b\x20\161\165\x65\x73\164\x69\x6f\x6e\x73\x20\157\x6e\40\157\165\162\40\x66\157\x72\x75\155\74\x2f\141\x3e\xd\12\40\x20\x20\40\40\40\x20\x20\x20\40\40\40\40\40\40\x20\x20\40\40\x20\x3c\141\x20\x69\x64\75\x22\146\x65\141\164\x75\162\145\x73\x5f\x62\165\x74\x74\x6f\x6e\137\151\x64\42\40\x63\x6c\x61\x73\x73\75\x22\141\144\144\55\x6e\145\167\55\x68\62\x22\40\150\x72\145\x66\x3d\x22\x68\164\164\x70\163\x3a\57\x2f\144\145\166\x65\x6c\157\160\x65\162\163\56\155\151\x6e\151\x6f\162\x61\x6e\x67\145\56\x63\x6f\155\x2f\x64\157\x63\x73\57\157\x61\165\164\150\57\x77\157\x72\x64\160\x72\x65\x73\163\57\143\154\x69\x65\156\x74\42\40\x74\x61\162\x67\145\164\x3d\42\137\x62\154\x61\156\x6b\42\76\x46\x65\141\x74\165\x72\145\x20\x44\x65\164\141\151\154\x73\74\x2f\x61\x3e\xd\xa\x20\x20\x20\40\x20\40\x20\x20\40\40\x20\x20\x20\40\x20\40\x3c\57\x68\61\x3e\15\12\40\x20\40\x20\40\40\40\40\x20\40\x20\40\40\40\40\x20";
        if (!("\x61\144\x64\x6f\x6e\x73" == $sD)) {
            goto Ka;
        }
        echo "\74\x73\143\x72\151\x70\x74\40\x74\x79\160\145\75\x27\x74\145\170\164\x2f\152\x61\x76\141\x73\x63\x72\x69\x70\164\x27\76\xd\12\x20\40\40\x20\40\40\40\40\40\x20\40\x20\x20\x20\x20\x20\x9\x6a\x51\165\145\162\171\50\144\157\x63\x75\x6d\145\x6e\164\51\56\x72\145\141\x64\171\x28\146\165\x6e\x63\164\151\157\x6e\x28\x29\xd\12\40\x20\40\x20\x20\40\x20\x20\x20\40\x20\40\x20\x20\x20\40\11\x7b\xd\12\x20\x20\x20\40\40\x20\x20\40\40\40\x20\x20\x20\x20\x20\40\11\x9\x6a\121\x75\x65\162\x79\50\47\x23\155\x6f\137\x6f\141\165\164\x68\x5f\141\x64\x64\157\x6e\x73\137\x73\165\x62\x6d\145\156\165\x27\51\x2e\x70\141\x72\x65\x6e\164\50\x29\x2e\x70\141\x72\145\156\164\50\x29\56\160\x61\x72\145\x6e\164\x28\51\x2e\x66\x69\156\x64\50\x27\154\151\47\51\56\162\x65\x6d\x6f\x76\x65\x43\x6c\141\163\x73\x28\x27\x63\165\x72\x72\145\x6e\x74\47\x29\x3b\xd\12\x20\40\40\40\x20\x20\40\40\40\x20\40\x20\x20\x20\x20\40\11\11\152\x51\165\x65\x72\171\50\47\43\155\x6f\x5f\157\141\165\164\x68\137\x61\144\x64\x6f\156\x73\137\x73\x75\142\155\145\156\165\47\x29\x2e\160\x61\162\145\156\164\50\x29\56\160\x61\162\145\x6e\x74\x28\x29\x2e\x61\144\144\x43\154\x61\163\x73\50\x27\x63\x75\162\162\145\156\x74\47\51\x3b\15\12\40\x20\x20\x20\x20\x20\x20\40\40\x20\x20\40\40\40\40\x20\11\175\51\x3b\15\xa\40\40\x20\x20\40\40\40\x20\40\40\x20\x20\40\x20\x20\x20\11\74\57\163\143\x72\151\x70\164\76";
        echo "\x9\x9\x9\11\74\x68\x31\x3e\x3c\x64\x69\166\x20\163\164\x79\x6c\145\75\x22\x66\154\157\141\164\x3a\154\x65\146\x74\73\x20\155\141\162\x67\x69\x6e\55\x72\151\x67\x68\x74\72\x20\65\160\170\x3b\x22\x3e\x3c\141\x20\x20\143\x6c\141\x73\163\x3d\42\x61\144\144\x2d\156\x65\167\x2d\150\x32\42\40\163\164\171\154\145\75\42\x66\x6f\x6e\x74\x2d\x73\151\x7a\145\72\40\61\x34\x70\x78\x3b\x22\x20\150\162\x65\146\75\42\141\144\x6d\x69\x6e\x2e\x70\150\x70\x3f\160\141\x67\x65\x3d\x6d\157\137\x6f\x61\165\164\150\x5f\x73\x65\164\164\151\156\147\163\x26\x74\x61\x62\x3d\143\x6f\156\146\x69\147\x22\76\x3c\163\160\x61\156\40\143\154\x61\x73\163\x3d\x22\144\141\163\x68\x69\143\x6f\x6e\x73\x20\144\141\x73\150\151\x63\x6f\x6e\163\55\141\x72\x72\x6f\x77\x2d\x6c\x65\x66\164\x2d\141\154\x74\x22\40\x73\164\171\x6c\145\x3d\42\x76\145\162\164\x69\143\141\154\x2d\x61\x6c\151\x67\156\x3a\40\142\157\x74\164\157\x6d\73\42\x3e\x3c\57\x73\160\x61\156\x3e\x20\x42\141\143\x6b\40\x54\x6f\x20\120\154\165\147\151\x6e\40\103\x6f\x6e\x66\x69\x67\x75\162\x61\164\x69\x6f\x6e\x3c\x2f\141\x3e\x3c\x2f\x64\x69\x76\76\x3c\57\150\x31\x3e\40";
        Ka:
        echo "\11\11\11\11\xd\12\11\11\11\11";
        if (!("\x61\x64\144\x6f\x6e\163" !== $sD)) {
            goto Xa;
        }
        if (!($GLOBALS["\x6d\157\137\154\x6e\x5f\145\170\160"] == 1)) {
            goto h8;
        }
        echo "\x9\x9\11\x9\x9\x9\74\144\151\166\x20\151\144\75\42\155\x65\x73\x73\x61\x67\x65\42\x20\x73\x74\171\154\145\75\42\142\x61\143\x6b\x67\x72\157\x75\x6e\x64\x3a\43\x66\146\x65\70\145\x38\73\x20\142\157\162\x64\145\x72\x2d\162\141\144\x69\x75\x73\72\x34\x70\170\x3b\x20\x66\157\156\x74\55\163\x69\x7a\145\x3a\61\63\160\x78\73\x20\x62\x6f\162\144\145\162\72\40\x31\x70\x78\x20\163\157\x6c\151\144\x20\162\x65\x64\x22\x20\40\143\154\x61\x73\x73\x3d\x22\x6e\157\x74\x69\143\x65\x20\x6e\x6f\x74\151\x63\145\40\x6e\x6f\x74\151\143\145\55\167\141\x72\x6e\151\x6e\x67\x22\76\x3c\160\x20\163\x74\x79\154\145\x20\x3d\x20\x22\146\x6f\x6e\x74\x2d\163\151\172\145\72\61\x34\160\x78\x3b\x20\x66\157\x6e\x74\55\x77\x65\151\147\x68\164\72\40\x35\x30\x30\x3b\x22\76\x20\74\142\40\163\x74\x79\154\145\x20\x3d\x20\42\x20\146\x6f\x6e\164\x2d\167\145\x69\147\x68\x74\x3a\40\x37\x30\x30\73\x22\76\40\x4e\x4f\124\105\72\x20\x3c\x2f\x62\76\x20\x59\157\x75\x72\x20\155\x69\x6e\x69\117\162\141\x6e\147\145\x20\x3c\141\x20\x68\162\145\x66\75\42\150\x74\164\x70\163\x3a\57\x2f\x70\154\x75\x67\151\156\x73\56\x6d\x69\156\151\157\162\141\x6e\x67\145\x2e\143\x6f\155\57\x77\157\162\144\160\162\145\163\x73\55\x73\x73\x6f\42\40\164\x61\162\147\145\x74\75\42\137\x62\x6c\141\156\x6b\x22\76\117\x41\165\164\x68\40\x2f\40\x4f\x70\145\x6e\111\x44\x20\x43\x6f\156\156\145\x63\164\40\123\151\x6e\147\154\x65\40\x53\x69\147\156\55\x4f\156\x3c\57\x61\76\x20\160\x72\x65\155\x69\165\155\x20\154\151\143\145\156\x73\145\40\151\163\x20\145\170\x70\x69\x72\x65\x64\56\x20\124\150\151\x73\40\155\x65\141\156\163\x20\x79\x6f\165\40\x63\141\x6e\x6e\157\164\40\x61\144\144\x20\x6f\x72\40\145\144\x69\x74\x20\x74\x68\145\x20\x61\x70\x70\154\151\143\x61\x74\x69\x6f\156\x73\40\165\x6e\164\151\x6c\x6c\40\171\157\x75\162\40\160\x6c\x61\156\x20\151\163\40\x72\145\156\x65\x77\145\144\x2e\x3c\57\x70\x3e\xd\xa\11\11\11\11\11";
        h8:
        echo "\15\12\11\11\11\x9\x3c\144\151\166\76\x3c\151\x6d\x67\40\163\164\171\x6c\x65\75\x22\x66\154\157\141\x74\x3a\154\x65\x66\164\73\40\160\157\x73\151\x74\151\157\x6e\x3a\162\145\x6c\x61\164\151\166\x65\x3b\40\x6d\141\x72\147\x69\156\x3a\61\x34\160\170\40\60\160\170\x20\x30\160\170\40\x2d\x31\64\160\170\x3b\42\40\x73\162\143\75\42";
        echo MOC_URL . "\x2f\162\145\x73\157\165\x72\x63\145\x73\x2f\x69\x6d\x61\x67\x65\163\x2f\154\157\x67\x6f\56\160\156\x67";
        echo "\42\x3e\x3c\57\x64\151\166\x3e\15\xa\x9\11\x9\x9";
        if (!($vj->get_versi() === 0)) {
            goto sW;
        }
        echo "\x9\x9\x9\11\11\74\144\x69\x76\x20\x63\154\141\163\x73\75\42\x62\165\164\163\x22\x20\x73\164\x79\154\145\75\42\x66\x6c\x6f\141\164\72\x72\151\x67\150\x74\73\x22\76\15\12\x9\11\x9\11\x9\x9\74\144\x69\x76\x20\x69\144\75\x22\x72\145\163\x74\x61\x72\164\x5f\164\157\165\x72\x5f\x62\165\x74\x74\157\156\x22\x20\143\154\141\x73\163\x3d\x22\x6d\x6f\x2d\x6f\164\160\55\150\x65\154\x70\55\x62\x75\164\164\157\156\x20\163\164\x61\164\151\x63\x22\40\163\x74\171\154\145\x3d\42\x6d\x61\x72\x67\x69\x6e\x2d\162\151\x67\x68\164\x3a\61\x30\160\170\x3b\x7a\55\151\156\144\x65\170\72\x31\60\x22\x3e\xd\xa\11\x9\x9\11\11\x9\11\11\74\141\x20\x63\x6c\x61\x73\163\75\42\x62\x75\x74\164\x6f\x6e\x20\x62\165\x74\164\157\156\x2d\x70\162\151\155\x61\162\171\x20\x62\x75\164\164\x6f\x6e\55\154\141\x72\x67\x65\42\76\15\12\11\11\11\x9\11\11\x9\11\11\74\x73\160\141\x6e\x20\x63\x6c\x61\x73\163\75\42\x64\x61\x73\x68\151\x63\157\x6e\163\x20\x64\x61\163\x68\151\143\x6f\156\163\x2d\x63\157\x6e\x74\162\157\154\x73\55\162\x65\x70\x65\x61\x74\x22\x20\x73\x74\x79\x6c\x65\x3d\x22\x6d\x61\x72\147\x69\156\72\65\x25\x20\x30\x20\60\40\60\73\42\76\x3c\57\163\x70\141\156\x3e\xd\12\11\11\11\x9\x9\11\x9\x9\11\x9\122\145\163\164\x61\x72\164\x20\124\157\165\162\xd\xa\11\x9\x9\x9\11\x9\x9\x9\74\x2f\141\76\xd\xa\x9\11\11\x9\11\11\x3c\x2f\x64\x69\166\x3e\15\12\x9\x9\x9\11\x9\x3c\57\144\151\x76\x3e\15\12\x9\11\11\11";
        sW:
        echo "\11\11\x3c\x2f\144\151\166\76\x9\x9\15\12\x9\x9\x9\x3c\144\151\x76\x20\x69\x64\x3d\x22\164\141\x62\42\x20\163\164\171\x6c\x65\x3d\x22\x6d\141\162\147\151\x6e\72\x31\66\160\x78\x22\76\xd\12\11\x9\x9\x3c\150\x32\x20\x63\154\141\163\x73\75\x22\x6e\x61\x76\x2d\164\x61\142\55\x77\x72\x61\x70\x70\x65\162\42\76\15\12\x9\x9\11\11\74\141\x20\151\x64\x3d\x22\164\141\x62\x2d\x63\x6f\156\146\151\x67\x22\40\x63\154\141\x73\163\x3d\42\x6e\x61\166\x2d\164\x61\x62\40";
        echo "\143\157\156\x66\x69\x67" === $sD ? "\x6e\x61\166\x2d\x74\x61\142\x2d\x61\x63\x74\x69\166\145" : '';
        echo "\x22\x20\x68\x72\x65\146\x3d\x22\x61\x64\155\151\x6e\56\x70\150\x70\x3f\x70\141\147\145\75\x6d\157\137\x6f\x61\x75\164\x68\137\x73\145\x74\164\151\156\147\163\46\164\141\x62\x3d\x63\157\x6e\146\x69\x67\x22\76\x43\157\156\x66\151\x67\165\x72\x65\40\117\x41\x75\164\x68\74\x2f\141\x3e\xd\xa\x9\x9\x9\11\74\x61\40\x69\x64\75\x22\x74\x61\x62\x2d\143\165\x73\164\157\x6d\x69\172\x61\164\x69\x6f\156\42\40\143\x6c\x61\x73\163\75\42\156\141\x76\x2d\x74\x61\x62\x20";
        echo "\x63\x75\163\164\157\155\x69\172\x61\x74\x69\x6f\x6e" === $sD ? "\x6e\x61\x76\55\x74\x61\142\55\141\143\164\x69\x76\x65" : '';
        echo "\42\x20\x68\162\x65\x66\75\42\141\144\x6d\x69\x6e\x2e\x70\x68\160\x3f\160\141\147\x65\75\x6d\157\x5f\157\x61\165\x74\150\x5f\163\145\x74\164\x69\x6e\147\x73\x26\x74\141\x62\x3d\143\165\163\x74\157\x6d\x69\172\x61\164\151\x6f\156\42\76\103\x75\163\164\x6f\155\151\172\x61\x74\x69\x6f\156\x73\74\x2f\141\76\xd\xa\11\11\x9\x9";
        if (!($vj->mo_oauth_client_get_option("\155\157\x5f\157\x61\x75\164\x68\137\x65\166\x65\157\x6e\x6c\151\156\x65\137\x65\156\x61\142\x6c\x65") === 1)) {
            goto Nk;
        }
        echo "\x9\11\x9\x9\x9\x3c\x61\x20\151\x64\75\42\164\141\x62\55\x65\166\145\42\40\143\x6c\141\163\x73\x3d\42\x6e\x61\166\x2d\164\x61\142\40";
        echo "\x6d\157\x5f\x6f\141\x75\x74\x68\x5f\145\166\145\x5f\157\x6e\x6c\x69\x6e\x65\x5f\163\x65\x74\165\160" === $sD ? "\156\141\166\x2d\x74\141\142\55\141\143\x74\151\166\145" : '';
        echo "\x22\x20\150\162\x65\146\x3d\42\141\144\155\x69\x6e\56\x70\150\x70\x3f\x70\141\147\145\x3d\155\x6f\137\x6f\x61\x75\x74\150\x5f\145\166\145\137\157\156\x6c\x69\156\x65\137\163\145\164\165\x70\x22\76\101\144\x76\141\156\x63\x65\x64\40\x45\x56\105\40\117\x6e\154\151\x6e\145\x20\123\145\x74\164\151\156\147\x73\x3c\57\141\x3e\15\12\x9\x9\x9\x9";
        Nk:
        echo "\11\x9\x9\11\x3c\141\40\151\x64\x3d\x22\164\141\x62\55\163\151\x67\x6e\151\x6e\x73\x65\164\x74\151\156\147\163\x22\40\143\154\141\163\x73\75\x22\x6e\x61\166\x2d\x74\x61\x62\x20";
        echo "\x73\x69\147\x6e\151\156\163\145\164\x74\151\156\x67\x73" === $sD ? "\156\141\x76\55\x74\141\142\55\141\x63\x74\x69\166\x65" : '';
        echo "\x22\40\x68\162\145\146\75\x22\141\x64\155\151\x6e\x2e\160\150\x70\x3f\160\141\147\145\75\x6d\157\137\157\x61\x75\164\150\137\x73\145\x74\x74\x69\156\147\163\46\164\141\142\75\163\x69\x67\x6e\x69\156\x73\x65\164\x74\151\156\x67\163\x22\x3e\123\151\147\x6e\x20\111\x6e\40\x53\145\x74\x74\x69\156\x67\x73\74\57\x61\x3e\xd\xa\11\11\11\11";
        do_action("\155\x6f\137\157\x61\x75\164\x68\137\143\x6c\x69\145\156\x74\137\x61\x64\x64\137\156\141\166\x5f\164\141\142\x73\x5f\x75\x69\x5f\151\x6e\x74\145\x72\156\x61\154", $sD);
        echo "\x9\11\x9\11";
        if (!(is_multisite() && $vj->is_multisite_plan())) {
            goto jL;
        }
        do_action("\155\157\137\157\141\x75\x74\x68\x5f\x63\x6c\151\145\156\x74\137\x61\144\144\x5f\156\141\x76\137\x74\141\x62\163\x5f\155\165\x6c\x74\151\163\x69\164\145\137\165\151\137\x69\x6e\x74\145\162\x6e\x61\154", $sD);
        jL:
        echo "\x9\x9\11\x9";
        if (!($vj->get_versi() === 0)) {
            goto K2;
        }
        echo "\x9\x9\11\11\x9\74\141\x20\151\144\75\42\164\141\x62\x2d\162\145\x71\165\x65\x73\x74\x64\145\155\x6f\42\40\143\x6c\141\x73\x73\75\42\156\141\x76\55\x74\x61\x62\40";
        echo "\162\145\161\165\145\163\164\146\157\162\144\145\155\x6f" === $sD ? "\x6e\x61\166\55\x74\x61\x62\55\x61\x63\164\x69\166\145" : '';
        echo "\x22\40\150\x72\x65\x66\75\42\x61\144\155\x69\x6e\x2e\160\x68\160\77\x70\x61\147\x65\x3d\155\x6f\137\157\x61\165\x74\150\137\x73\145\x74\164\151\x6e\x67\163\46\164\141\142\x3d\x72\145\x71\x75\x65\163\x74\146\157\x72\x64\145\x6d\x6f\x22\x3e\122\145\161\165\145\x73\164\40\106\157\x72\x20\104\x65\155\x6f\74\x2f\141\x3e\15\12\11\11\x9\x9";
        K2:
        echo "\x9\x9\11\11\x3c\141\x20\x69\x64\x3d\42\x61\143\143\x5f\x73\145\164\x75\160\x5f\x62\165\164\164\157\x6e\x5f\151\x64\x22\x20\x63\154\141\x73\x73\x3d\42\156\141\x76\55\x74\x61\142\40";
        echo "\141\143\143\157\x75\x6e\164" === $sD ? "\x6e\141\x76\x2d\164\x61\142\55\141\x63\164\151\166\x65" : '';
        echo "\42\x20\150\162\x65\x66\75\42\141\144\x6d\151\x6e\x2e\x70\150\160\x3f\x70\141\147\145\75\155\157\x5f\x6f\x61\165\164\x68\x5f\163\x65\x74\164\x69\x6e\147\x73\x26\x74\141\x62\x3d\x61\143\143\x6f\x75\156\x74\42\x3e\x41\143\143\157\165\156\164\x20\x53\x65\164\165\160\74\x2f\141\x3e\15\12\x9\x9\11\x3c\x2f\150\x32\76\15\xa\x9\11\x9\x3c\x2f\x64\151\166\76\15\xa\11\x9\x9";
        Xa:
        fP:
        if (!("\x6c\151\x63\x65\156\x73\151\x6e\x67" === $sD)) {
            goto EZ;
        }
        echo "\x9\x9\11\x9\x3c\144\x69\x76\40\x73\x74\171\154\x65\x3d\42\142\x61\x63\x6b\x67\x72\157\165\x6e\x64\55\143\157\154\157\x72\72\43\x66\71\x66\x39\146\71\73\x20\x20\x64\151\163\x70\x6c\x61\x79\72\146\x6c\145\170\73\x20\x6a\165\x73\164\151\x66\171\x2d\143\x6f\x6e\x74\x65\x6e\164\72\x63\x65\x6e\164\x65\162\73\x20\160\141\x64\144\151\156\x67\55\142\157\x74\x74\157\x6d\x3a\x37\160\x78\x3b\x70\141\x64\144\x69\156\147\x2d\164\157\x70\x3a\63\65\160\170\73\x22\x20\151\x64\75\x22\156\x61\166\55\x63\157\x6e\x74\x61\151\x6e\145\x72\x22\x3e\15\xa\40\x20\x20\40\40\x20\40\40\x20\x20\x20\x20\74\x64\151\x76\x3e\15\xa\40\40\x20\x20\x20\x20\40\40\x20\40\40\40\40\x20\40\40\x3c\141\x20\x73\x74\171\154\x65\x3d\42\x66\x6f\x6e\164\x2d\163\151\172\145\x3a\40\x31\x36\x70\170\73\x20\143\x6f\154\157\162\72\40\43\x30\60\60\73\x74\x65\170\164\x2d\x61\154\x69\x67\x6e\x3a\40\143\145\x6e\164\145\x72\x3b\164\145\x78\x74\x2d\144\x65\x63\x6f\x72\141\x74\151\157\156\x3a\x20\x6e\x6f\156\x65\x3b\x64\x69\x73\x70\154\x61\171\x3a\40\x69\156\154\x69\x6e\x65\55\x62\154\157\143\153\x3b\x22\x20\150\162\145\146\x3d\x22";
        echo add_query_arg(array("\x74\x61\x62" => "\x64\x65\146\141\165\154\x74"), htmlentities($_SERVER["\x52\x45\121\125\x45\x53\124\x5f\125\x52\x49"]));
        echo "\x22\76\xd\xa\40\x20\40\40\40\40\40\40\x20\x20\40\x20\40\x20\x20\x20\x20\x20\x20\x20\74\142\165\164\x74\157\156\x20\151\x64\75\x22\102\x61\x63\153\55\x54\157\x2d\120\154\165\x67\x69\156\x2d\103\x6f\x6e\x66\151\147\165\x72\x61\x74\151\157\156\x22\40\x74\171\x70\x65\x3d\x22\x62\x75\x74\164\157\156\42\40\x76\x61\x6c\165\145\x3d\42\102\x61\x63\x6b\x2d\124\x6f\x2d\x50\x6c\x75\147\151\156\x2d\103\x6f\156\x66\151\147\x75\162\141\164\151\x6f\x6e\42\40\x63\x6c\141\163\163\x3d\x22\142\x75\x74\164\157\x6e\40\x62\x75\164\164\x6f\x6e\x2d\160\x72\151\155\x61\x72\171\40\142\x75\x74\x74\157\x6e\x2d\154\141\162\147\145\x22\x20\x73\164\171\x6c\x65\75\x22\160\157\x73\151\x74\x69\157\x6e\72\x61\142\x73\x6f\154\x75\x74\145\x3b\x6c\x65\x66\164\x3a\61\60\160\x78\73\142\141\x63\153\147\162\x6f\165\156\144\55\x63\x6f\154\157\x72\72\40\43\60\71\x33\65\65\x33\73\42\76\xd\xa\x20\40\40\40\x20\x20\x20\40\40\x20\x20\40\40\40\x20\40\40\40\40\40\x20\x20\x20\40\x3c\x73\160\x61\156\40\143\x6c\x61\163\163\x3d\42\x64\x61\163\150\x69\x63\x6f\156\163\40\144\141\163\150\x69\143\157\x6e\163\55\141\162\162\157\x77\55\x6c\x65\146\164\x2d\141\x6c\x74\x22\40\x73\x74\x79\154\145\x3d\42\x76\145\x72\164\151\x63\141\x6c\x2d\141\x6c\x69\x67\156\x3a\x20\x6d\151\x64\x64\x6c\145\73\x22\76\74\x2f\163\160\x61\x6e\x3e\x20\15\xa\40\40\x20\40\40\x20\40\x20\x20\40\x20\40\x20\x20\40\40\40\40\40\x20\40\x20\40\x20\120\x6c\x75\147\151\x6e\x20\x43\x6f\x6e\146\151\147\x75\x72\x61\164\151\157\156\15\xa\40\x20\x20\40\x20\40\x20\x20\40\x20\x20\x20\40\x20\40\40\40\40\x20\x20\74\57\142\x75\x74\x74\157\156\76\x20\xd\xa\40\40\x20\40\40\40\40\40\40\x20\40\x20\x20\x20\40\40\x3c\57\x61\76\x20\15\xa\40\40\40\40\x20\x20\40\x20\x20\40\x20\x20\x3c\x2f\x64\151\x76\76\xd\xa\x20\x20\40\40\x20\x20\40\40\40\x20\40\40\x3c\x64\x69\166\x20\163\164\171\x6c\145\x3d\x22\x64\151\x73\160\x6c\x61\171\x3a\142\x6c\157\x63\153\73\x20\164\145\x78\164\55\x61\154\151\x67\x6e\72\x6c\x65\x66\164\x3b\40\155\x61\162\147\151\x6e\72\65\x70\170\x3b\40\42\x3e\xd\12\11\11\11\11\x3c\150\x32\40\163\164\171\154\145\x3d\x22\x66\x6f\156\x74\55\163\151\172\145\72\62\62\x70\170\73\40\x74\145\170\x74\x2d\141\x6c\x69\147\156\x3a\143\145\x6e\x74\145\162\73\160\141\x64\144\151\156\x67\x2d\142\157\164\x74\157\155\x3a\x31\x70\x78\x22\76\155\151\156\x69\x4f\x72\x61\156\x67\145\40\117\x41\x75\164\x68\40\x26\x20\117\x49\104\103\40\x53\151\156\147\154\145\x20\123\x69\147\156\55\x4f\x6e\x3c\57\150\x32\x3e\15\xa\40\x20\40\x20\x20\40\x20\40\40\x20\40\40\74\57\x64\151\x76\76\15\12\40\40\40\x20\40\40\40\x20\74\x2f\144\x69\x76\76\15\12\11\11\x9";
        EZ:
    }
}
