<?php


function mo_oauth_client_page_restriction()
{
    ob_start();
    global $vj;
    $sC = $vj->get_plugin_config();
    $Re = $sC->get_config("\162\145\163\164\162\x69\143\x74\137\x74\x6f\137\x6c\157\x67\147\x65\x64\137\x69\156\137\165\163\x65\x72\x73");
    $Re = '' !== $Re ? $Re : false;
    $ZP = $sC->get_config("\x61\x75\164\x6f\137\162\x65\x64\151\x72\145\143\164\x5f\145\x78\143\154\x75\x64\145\x5f\x75\x72\x6c\x73");
    if (!(!is_user_logged_in() && boolval($Re) && !strpos($vj->get_current_url(), "\x2f\163\143\151\x6d"))) {
        goto nXw;
    }
    if (!("\x50\x4f\x53\x54" === $_SERVER["\122\105\121\125\x45\x53\124\137\x4d\105\x54\x48\117\x44"])) {
        goto fKg;
    }
    return;
    fKg:
    if (!(isset($_REQUEST["\157\141\x75\164\x68\154\157\147\x69\156"]) && "\x66\141\x6c\163\145" === $_REQUEST["\x6f\x61\165\164\150\x6c\x6f\x67\x69\x6e"] && strpos($vj->get_current_url(), "\x2f\167\160\55\154\x6f\147\151\x6e\x2e\160\x68\x70"))) {
        goto HVC;
    }
    return;
    HVC:
    if (!(isset($_REQUEST[\MoOAuthConstants::OPTION]) && "\157\x61\165\164\x68\162\145\144\151\x72\145\x63\164" === $_REQUEST[\MoOAuthConstants::OPTION])) {
        goto eU3;
    }
    return;
    eU3:
    if (!(isset($_REQUEST["\x63\x6f\x64\x65"]) && '' !== $_REQUEST["\x63\x6f\x64\x65"])) {
        goto G1D;
    }
    return;
    G1D:
    if (!(isset($_REQUEST["\x61\x63\x63\145\163\x73\137\164\x6f\x6b\145\156"]) && '' !== $_REQUEST["\141\x63\x63\145\x73\163\x5f\164\157\153\x65\x6e"])) {
        goto ERj;
    }
    return;
    ERj:
    if (!(isset($_REQUEST["\x6c\x6f\147\x69\156"]) && "\160\x77\144\147\x72\x6e\x74\x66\x72\x6d" === $_REQUEST["\154\157\x67\x69\x6e"])) {
        goto e7N;
    }
    return;
    e7N:
    if (!(isset($_REQUEST["\x65\x72\162\157\x72"]) && '' !== $_REQUEST["\x65\162\162\157\162"] || isset($_REQUEST["\145\162\x72\x6f\x72\x5f\144\145\x73\143\x72\151\x70\164\x69\x6f\156"]) && '' !== $_REQUEST["\145\x72\162\157\162\137\x64\145\163\143\162\151\160\164\151\x6f\x6e"])) {
        goto rZm;
    }
    return;
    rZm:
    $rE = $vj->get_all_headers();
    if (!(isset($rE["\x41\x43\x43\105\x50\x54"]) && "\x61\160\x70\154\x69\143\141\164\x69\157\x6e\x2f\x6a\x73\x6f\x6e" === $rE["\x41\103\103\x45\120\x54"])) {
        goto CYP;
    }
    return;
    CYP:
    if (empty($ZP)) {
        goto IlV;
    }
    $DZ = $vj->get_current_url();
    $DZ = trim($DZ, "\x2f");
    $Ca = apply_filters("\155\x6f\137\157\x61\x75\164\x68\137\x63\x6c\151\x65\156\164\x5f\146\x6f\x72\x63\x65\144\137\x6c\157\x67\x69\x6e\x5f\145\170\143\154\x75\144\x65\137\165\162\154\x73", $ZP, $DZ);
    if (!($Ca === true)) {
        goto hpC;
    }
    return;
    hpC:
    $ZP = explode("\12", $ZP);
    foreach ($ZP as $hS) {
        if (!ctype_space(substr($hS, -1))) {
            goto gfl;
        }
        $hS = substr_replace($hS, '', -1);
        gfl:
        $hS = trim(trim($hS), "\x2f");
        if (!(substr($hS, -1) == "\52")) {
            goto ZWX;
        }
        $hS = substr_replace($hS, '', -1);
        $hS = trim($hS, "\57");
        if (!(strpos($DZ, $hS) !== false)) {
            goto mKK;
        }
        return;
        mKK:
        ZWX:
        if (empty($hS)) {
            goto h7u;
        }
        if (!($DZ === $hS)) {
            goto SV9;
        }
        return;
        SV9:
        h7u:
        JMt:
    }
    kbA:
    IlV:
    $u5 = $vj->get_app_by_name();
    if ($u5) {
        goto znI;
    }
    return;
    znI:
    $Jd = $u5->get_app_config("\x61\x66\164\145\162\137\x6c\x6f\x67\151\156\x5f\x75\x72\154");
    $DZ = $Jd ? $Jd : $vj->get_current_url();
    if (!empty($vj->mo_oauth_client_get_option("\155\157\x5f\157\141\x75\x74\x68\137\143\x6c\x69\145\156\x74\x5f\146\157\162\x63\145\x64\137\155\x65\x73\x73\141\x67\145")) && $vj->mo_oauth_client_get_option("\155\157\x5f\x6f\141\165\164\x68\x5f\143\x6c\151\145\156\164\x5f\x66\157\x72\143\145\144\137\x6d\x65\x73\163\141\147\x65") != '') {
        goto gxh;
    }
    echo "\x52\145\144\x69\162\145\x63\x74\151\156\147\40\x74\x6f\40\144\x65\146\141\x75\x6c\x74\40\154\157\x67\151\156\56\56";
    goto RZv;
    gxh:
    echo $vj->mo_oauth_client_get_option("\155\157\137\x6f\141\x75\x74\x68\137\143\154\x69\145\x6e\164\x5f\x66\157\162\143\x65\144\x5f\155\x65\x73\x73\141\x67\145");
    RZv:
    echo "\x9\11\74\163\x63\x72\151\x70\x74\76\15\xa\11\11\x9\x69\x66\50\40\167\151\x6e\144\x6f\167\x2e\x6c\x6f\143\141\x74\x69\157\156\x2e\150\162\x65\x66\56\x69\156\144\145\170\117\146\50\42\43\141\143\143\145\163\163\x5f\164\157\x6b\145\x6e\42\51\76\55\x31\x20\174\x7c\40\x77\151\156\x64\x6f\x77\56\154\x6f\143\141\x74\151\157\x6e\x2e\150\162\145\146\x2e\x69\156\144\145\170\x4f\146\x28\42\x23\143\x6f\144\x65\42\x29\76\x2d\61\x20\174\174\x20\x77\151\156\144\x6f\167\x2e\x6c\157\143\141\164\x69\x6f\156\56\150\162\145\x66\x2e\151\x6e\144\145\170\x4f\146\50\x22\x23\x69\144\x5f\x74\157\x6b\145\x6e\42\x29\76\x2d\x31\40\x29\x20\173\11\xd\12\x9\x9\x9\x9\x77\x69\x6e\x64\x6f\x77\56\154\157\x63\x61\164\x69\157\156\x2e\162\x65\160\x6c\x61\x63\145\x28\x20\44\x61\x63\x74\165\141\154\137\x6c\151\x6e\x6b\40\51\73\xd\xa\x9\11\x9\175\40\15\xa\11\x9\x9\145\x6c\163\145\40\151\x66\x28\50\x77\x69\156\x64\157\167\x2e\x6c\157\143\141\164\x69\157\x6e\56\150\x72\x65\x66\56\x69\156\x64\x65\170\x4f\x66\x28\42\43\163\x74\141\x74\x65\42\51\76\55\x31\x20\x26\x26\x20\50\167\x69\x6e\144\x6f\167\56\x6c\157\x63\x61\x74\x69\157\x6e\x2e\150\x72\x65\146\x2e\151\x6e\x64\145\170\x4f\x66\50\x22\145\x72\162\x6f\162\42\51\76\x2d\61\40\174\174\x20\x77\151\156\144\x6f\x77\x2e\154\x6f\143\141\x74\x69\x6f\156\x2e\150\x72\x65\146\x2e\151\x6e\144\145\170\x4f\x66\50\x22\145\162\162\x6f\162\x5f\x64\145\x73\143\x72\151\160\164\x69\x6f\x6e\x22\x29\76\x2d\61\x29\x29\x20\174\x7c\40\x77\151\156\x64\157\167\x2e\x6c\157\x63\x61\164\151\x6f\x6e\x2e\x68\162\x65\x66\x2e\x69\x6e\144\145\170\117\146\x28\42\43\145\x72\162\157\x72\42\51\76\55\61\40\x7c\x7c\x20\167\151\x6e\144\157\x77\56\x6c\157\143\x61\x74\151\x6f\x6e\x2e\150\x72\145\x66\56\x69\x6e\144\145\170\117\146\50\x22\x23\x65\x72\162\x6f\x72\137\x64\145\163\x63\162\x69\x70\x74\151\x6f\x6e\42\x29\76\55\61\x20\51\40\x7b\11\15\xa\x9\11\x9\x9\x76\141\x72\40\165\x72\154\x20\x3d\40\x77\151\156\x64\x6f\x77\x2e\154\157\143\x61\x74\151\x6f\156\x2e\164\x6f\123\164\x72\x69\156\x67\x28\51\73\xd\xa\11\11\11\x9\167\x69\156\x64\x6f\x77\56\154\157\143\x61\164\x69\157\156\x20\x3d\x20\x75\x72\x6c\x2e\x72\145\160\154\x61\143\145\50\x22\43\42\x2c\40\47\77\47\x29\73\15\12\11\x9\11\x7d\40\x65\154\x73\145\x20\x7b\xd\12\x9\11\x9\11\x76\141\x72\40\165\162\x6c\40\x3d\x20\42";
    echo site_url();
    echo "\x22\x3b\xd\12\x9\x9\x9\11\165\162\154\x20\x3d\x20\x75\162\154\x20\53\x20\47\57\77\157\160\x74\x69\157\156\75\x6f\x61\x75\164\x68\162\x65\x64\151\162\x65\143\x74\x26\x61\160\160\137\x6e\x61\x6d\145\75\x27\40\x2b\x20\42";
    echo wp_kses($u5->get_app_name(), \mo_oauth_get_valid_html());
    echo "\x22\40\53\40\47\46\162\145\144\151\x72\145\x63\x74\137\x75\162\x6c\x3d\47\40\x2b\x20\x22";
    echo rawurlencode($DZ);
    echo "\42\40\53\40\x27\46\162\145\163\164\162\151\x63\x74\x72\145\144\x69\162\x65\143\164\x3d\164\162\165\x65\47\73\15\xa\11\x9\x9\11\x77\x69\156\x64\157\x77\x2e\154\x6f\x63\x61\164\x69\x6f\156\x2e\162\x65\x70\154\x61\143\x65\50\x20\x75\x72\x6c\40\x29\73\15\xa\11\x9\x9\175\15\xa\x9\11\x3c\x2f\163\x63\162\151\x70\164\x3e\15\xa\11\x9";
    nXw:
}
add_action("\151\x6e\x69\x74", "\x6d\x6f\137\157\x61\x75\164\150\137\x63\x6c\x69\145\156\164\137\x70\141\147\145\x5f\x72\145\x73\164\162\x69\143\164\151\157\x6e");
