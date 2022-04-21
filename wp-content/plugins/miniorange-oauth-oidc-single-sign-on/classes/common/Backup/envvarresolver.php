<?php


namespace MoOauthClient\Backup;

use MoOauthClient\App;
class EnvVarResolver
{
    public static function resolve_var($Vi, $GT)
    {
        switch ($Vi) {
            case "\155\157\137\157\x61\x75\x74\x68\137\x61\160\160\x73\137\154\151\x73\164":
                $GT = self::resolve_apps_list($GT);
                goto Jl;
            default:
                goto Jl;
        }
        ls:
        Jl:
        return $GT;
    }
    private static function resolve_apps_list($GT)
    {
        if (!is_array($GT)) {
            goto yg;
        }
        return $GT;
        yg:
        $GT = json_decode($GT, true);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto iJ;
        }
        return [];
        iJ:
        $Ap = [];
        foreach ($GT as $Xr => $BD) {
            if (!$BD instanceof App) {
                goto Gk;
            }
            $Ap[$Xr] = $BD;
            goto jd;
            Gk:
            if (!(!isset($BD["\143\154\151\145\x6e\x74\x5f\151\x64"]) || empty($BD["\143\154\x69\x65\156\164\137\x69\144"]))) {
                goto Vo;
            }
            $BD["\x63\x6c\x69\x65\156\164\137\x69\144"] = isset($BD["\143\154\151\x65\156\164\x69\x64"]) ? $BD["\x63\x6c\151\145\x6e\x74\x69\144"] : '';
            Vo:
            if (!(!isset($BD["\143\x6c\x69\145\156\x74\137\163\x65\x63\162\145\x74"]) || empty($BD["\x63\154\151\145\156\x74\x5f\x73\x65\143\x72\x65\x74"]))) {
                goto x4;
            }
            $BD["\x63\154\x69\145\156\x74\137\x73\145\143\162\145\164"] = isset($BD["\x63\x6c\151\145\x6e\164\x73\x65\143\x72\x65\x74"]) ? $BD["\x63\x6c\151\x65\x6e\164\x73\145\x63\x72\x65\x74"] : '';
            x4:
            unset($BD["\x63\x6c\151\x65\156\164\x69\144"]);
            unset($BD["\143\154\x69\x65\156\x74\x73\145\143\162\145\164"]);
            $kL = new App();
            $kL->migrate_app($BD, $Xr);
            $Ap[$Xr] = $kL;
            jd:
        }
        cr:
        return $Ap;
    }
}
