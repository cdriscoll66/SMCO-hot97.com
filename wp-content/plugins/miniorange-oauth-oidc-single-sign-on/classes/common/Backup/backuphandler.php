<?php


namespace MoOauthClient\Backup;

use MoOauthClient\App;
use MoOauthClient\Config;
class BackupHandler
{
    private $plugin_config;
    private $apps_list;
    public static function restore_settings($vC = '')
    {
        if (!(!is_array($vC) || empty($vC))) {
            goto OB;
        }
        return false;
        OB:
        $NX = false;
        $ty = isset($vC["\160\154\165\x67\x69\x6e\x5f\x63\157\x6e\x66\151\147"]) ? $vC["\160\x6c\x75\x67\151\x6e\x5f\x63\x6f\x6e\146\x69\x67"] : false;
        $uA = isset($vC["\141\x70\160\137\x63\157\x6e\146\151\147\x73"]) ? $vC["\x61\160\160\x5f\143\157\x6e\146\151\147\x73"] : false;
        if (!$ty) {
            goto Fd;
        }
        $NX = self::restore_plugin_config($ty);
        Fd:
        if (!$uA) {
            goto LT;
        }
        return $NX && self::restore_apps_config($uA);
        LT:
        return false;
    }
    private static function restore_plugin_config($ty)
    {
        global $vj;
        if (!empty($ty)) {
            goto TJ;
        }
        return false;
        TJ:
        $sC = new Config($ty);
        if (empty($sC)) {
            goto sJ;
        }
        $vj->mo_oauth_client_update_option("\x6d\157\x5f\157\x61\165\164\x68\137\x63\154\x69\145\x6e\164\137\143\x6f\x6e\x66\151\x67", $sC);
        return true;
        sJ:
        return false;
    }
    private static function restore_apps_config($uA)
    {
        global $vj;
        if (!(!is_array($uA) && empty($uA))) {
            goto GT;
        }
        return false;
        GT:
        $Ur = [];
        foreach ($uA as $Xr => $BD) {
            $kL = new App($BD);
            $kL->set_app_name($Xr);
            $Ur[$Xr] = $kL;
            ms:
        }
        BO:
        $vj->mo_oauth_client_update_option("\x6d\157\137\157\x61\165\164\x68\137\141\x70\160\163\137\x6c\x69\x73\x74", $Ur);
        return true;
    }
    public static function get_backup_json()
    {
        global $vj;
        $BM = $vj->export_plugin_config();
        return json_encode($BM, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
