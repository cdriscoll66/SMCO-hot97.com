<?php


if (defined("\101\x42\x53\x50\101\124\x48")) {
    goto dQ9;
}
exit;
dQ9:
define("\x4d\x4f\103\x5f\x44\111\x52", plugin_dir_path(__FILE__));
define("\115\117\103\137\x55\122\114", plugin_dir_url(__FILE__));
define("\x4d\117\x5f\125\111\104", "\x44\106\70\x56\x4b\112\117\65\x46\104\x48\x5a\101\122\102\x52\65\132\104\123\x32\126\x35\112\66\x36\x55\62\116\104\122");
define("\x56\105\x52\x53\x49\117\x4e", "\x6d\x6f\x5f\x70\162\x65\x6d\151\165\x6d\137\x76\x65\162\163\151\157\156");
mo_oauth_include_file(MOC_DIR . "\x2f\143\x6c\141\x73\163\x65\163\x2f\143\x6f\x6d\x6d\x6f\x6e");
mo_oauth_include_file(MOC_DIR . "\57\143\x6c\141\x73\163\145\163\x2f\x46\x72\x65\145");
mo_oauth_include_file(MOC_DIR . "\57\143\x6c\141\x73\163\x65\163\57\123\164\141\x6e\144\141\162\144");
mo_oauth_include_file(MOC_DIR . "\57\x63\x6c\x61\163\163\145\x73\x2f\120\162\145\x6d\151\165\155");
mo_oauth_include_file(MOC_DIR . "\x2f\x63\x6c\x61\x73\x73\145\x73\57\x45\156\164\145\162\x70\x72\151\x73\145");
function mo_oauth_get_dir_contents($VT, &$Ue = array())
{
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($VT, RecursiveDirectoryIterator::KEY_AS_PATHNAME), RecursiveIteratorIterator::CHILD_FIRST) as $B4 => $nY) {
        if (!($nY->isFile() && $nY->isReadable())) {
            goto cD6;
        }
        $Ue[$B4] = realpath($nY->getPathname());
        cD6:
        JQp:
    }
    pG7:
    return $Ue;
}
function mo_oauth_get_sorted_files($VT)
{
    $le = mo_oauth_get_dir_contents($VT);
    $ni = array();
    $q5 = array();
    foreach ($le as $B4 => $MH) {
        if (!(strpos($MH, "\56\x70\x68\x70") !== false)) {
            goto bG_;
        }
        if (strpos($MH, "\x49\x6e\164\x65\x72\x66\141\143\145") !== false) {
            goto hZR;
        }
        $q5[$B4] = $MH;
        goto T5q;
        hZR:
        $ni[$B4] = $MH;
        T5q:
        bG_:
        SUt:
    }
    EZV:
    return array("\151\156\x74\145\x72\x66\x61\143\x65\x73" => $ni, "\x63\154\x61\163\x73\x65\x73" => $q5);
}
function mo_oauth_include_file($VT)
{
    if (is_dir($VT)) {
        goto JPk;
    }
    return;
    JPk:
    $VT = mo_oauth_sane_dir_path($VT);
    $U5 = realpath($VT);
    if (!(false !== $U5 && !is_dir($VT))) {
        goto jZ7;
    }
    return;
    jZ7:
    $An = mo_oauth_get_sorted_files($VT);
    mo_oauth_require_all($An["\151\156\x74\145\x72\x66\141\x63\145\x73"]);
    mo_oauth_require_all($An["\x63\x6c\141\x73\x73\145\x73"]);
}
function mo_oauth_require_all($le)
{
    foreach ($le as $B4 => $MH) {
        require_once $MH;
        bSp:
    }
    R3z:
}
function mo_oauth_is_valid_file($a9)
{
    return '' !== $a9 && "\56" !== $a9 && "\56\x2e" !== $a9;
}
function mo_oauth_get_valid_html($q1 = array())
{
    $fV = array("\163\x74\x72\157\x6e\x67" => array(), "\x65\155" => array(), "\x62" => array(), "\151" => array(), "\x61" => array("\150\162\145\146" => array(), "\x74\141\x72\x67\145\x74" => array()));
    if (empty($q1)) {
        goto IAR;
    }
    return array_merge($q1, $fV);
    IAR:
    return $fV;
}
function mo_oauth_get_version_number()
{
    $pk = get_file_data(MOC_DIR . "\57\155\x6f\137\157\x61\x75\x74\x68\x5f\163\x65\164\164\x69\x6e\x67\163\56\160\x68\x70", ["\126\145\162\163\x69\x6f\x6e"], "\160\x6c\165\147\151\156");
    $jn = isset($pk[0]) ? $pk[0] : '';
    return $jn;
}
function mo_oauth_sane_dir_path($VT)
{
    return str_replace("\57", DIRECTORY_SEPARATOR, $VT);
}
if (!function_exists("\x6d\x6f\x5f\x6f\x61\165\x74\x68\137\151\x73\x5f\x72\145\x73\164")) {
    function mo_oauth_is_rest()
    {
        $ng = rest_get_url_prefix();
        if (!(defined("\122\x45\123\x54\137\122\x45\x51\x55\105\x53\x54") && REST_REQUEST || isset($_GET["\162\145\163\164\137\x72\157\165\x74\145"]) && strpos(trim($_GET["\x72\x65\x73\x74\137\162\157\x75\x74\x65"], "\x5c\x2f"), $ng, 0) === 0)) {
            goto ivA;
        }
        return true;
        ivA:
        global $XP;
        if (!($XP === null)) {
            goto YGi;
        }
        $XP = new WP_Rewrite();
        YGi:
        $TE = wp_parse_url(trailingslashit(rest_url()));
        $Ac = wp_parse_url(add_query_arg(array()));
        return strpos($Ac["\x70\141\164\x68"], $TE["\160\141\164\x68"], 0) === 0;
    }
}
