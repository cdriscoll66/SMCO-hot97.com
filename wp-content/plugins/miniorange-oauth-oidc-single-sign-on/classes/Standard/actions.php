<?php


use MoOauthClient\MO_Oauth_Debug;
function mo_oauth_client_auto_redirect_external_after_wp_logout($he)
{
    MO_Oauth_Debug::mo_oauth_log("\x49\x6e\163\151\x64\145\x20\x77\160\40\x6c\157\x67\x6f\165\x74");
    global $vj;
    $sC = $vj->get_plugin_config();
    if (!(!empty($sC->get_config("\141\146\x74\145\x72\x5f\x6c\157\x67\157\165\x74\137\x75\162\x6c")) && (isset($_COOKIE["\x6d\x6f\x5f\157\141\165\x74\x68\137\154\x6f\147\151\x6e\137\x61\x70\160\x5f\x73\145\163\x73\151\157\156"]) && $_COOKIE["\155\x6f\137\x6f\141\x75\x74\150\137\x6c\157\147\151\156\x5f\x61\160\x70\137\x73\145\x73\x73\x69\157\156"] != "\x6e\x6f\x6e\x65"))) {
        goto Gc1;
    }
    $P5 = $sC->get_config("\x61\146\x74\x65\x72\137\154\157\x67\157\x75\x74\x5f\x75\162\x6c");
    MO_Oauth_Debug::mo_oauth_log("\x75\x73\x65\162\x20\75\x3d\x3e\40");
    MO_Oauth_Debug::mo_oauth_log($he);
    $xk = get_user_meta($he, "\x6d\157\137\157\x61\x75\x74\x68\137\x63\x6c\151\x65\x6e\164\137\x6c\x61\x73\x74\x5f\151\144\137\164\157\153\x65\x6e", true);
    MO_Oauth_Debug::mo_oauth_log("\151\144\40\x74\157\x6b\x65\x6e\40\x3d\75\x3e\x20");
    MO_Oauth_Debug::mo_oauth_log($xk);
    $P5 = str_replace("\43\x23\151\144\137\164\x6f\x6b\x65\156\x23\43", $xk, $P5);
    do_action("\x6d\157\x5f\157\141\x75\x74\150\137\x72\145\x64\151\x72\145\143\164\x5f\157\x61\x75\164\x68\x5f\165\x73\145\x72\163", $user, $P5);
    wp_redirect($P5);
    exit;
    Gc1:
    setcookie("\155\157\137\x6f\x61\165\164\150\137\154\157\147\151\156\x5f\x61\160\x70\137\x73\145\163\163\x69\x6f\x6e", "\156\x6f\x6e\x65");
}
function mo_oauth_client_auto_redirect_external_after_logout($LY, $JC, $user)
{
    $vj = new \MoOauthClient\Standard\MOUtils();
    $sC = $vj->get_plugin_config();
    if (!(!empty($sC->get_config("\x61\x66\x74\x65\162\137\154\x6f\147\x6f\x75\x74\x5f\x75\162\x6c")) && (isset($_COOKIE["\x6d\x6f\x5f\157\x61\x75\x74\x68\x5f\154\x6f\147\x69\156\137\141\160\x70\x5f\x73\x65\163\163\x69\157\x6e"]) && $_COOKIE["\155\x6f\137\157\141\165\164\150\137\154\157\x67\x69\156\x5f\141\160\x70\x5f\x73\145\163\163\x69\x6f\156"] != "\x6e\x6f\x6e\x65"))) {
        goto BJS;
    }
    $P5 = $sC->get_config("\x61\x66\164\145\x72\x5f\x6c\157\147\157\x75\x74\x5f\x75\x72\x6c");
    $he = $user->ID;
    $xk = get_user_meta($he, "\x6d\157\x5f\x6f\141\165\x74\150\137\143\154\151\145\156\x74\x5f\154\x61\x73\x74\x5f\151\x64\x5f\x74\157\x6b\x65\156", true);
    $P5 = str_replace("\43\x23\151\144\137\164\157\153\145\x6e\43\x23", $xk, $P5);
    do_action("\x6d\157\137\x6f\x61\165\x74\x68\137\162\145\144\x69\x72\145\x63\x74\137\x6f\x61\x75\x74\150\137\x75\163\x65\x72\163", $user, $P5);
    wp_redirect($P5);
    exit;
    BJS:
    setcookie("\155\157\x5f\x6f\141\165\x74\x68\x5f\154\x6f\x67\x69\156\x5f\141\160\160\137\x73\145\163\x73\x69\157\156", "\156\157\x6e\x65");
    return $LY;
}
add_filter("\167\160\x5f\154\157\x67\x6f\x75\164", "\x6d\157\x5f\x6f\141\165\x74\x68\137\x63\154\x69\145\x6e\x74\137\x61\165\x74\x6f\137\162\x65\144\151\162\x65\x63\164\137\x65\x78\164\145\162\156\141\154\x5f\x61\x66\x74\x65\162\x5f\167\160\137\154\x6f\x67\157\165\164", 10, 1);
add_filter("\x6c\x6f\x67\x6f\165\x74\x5f\x72\x65\144\x69\162\145\143\x74", "\x6d\x6f\137\157\141\x75\x74\150\137\x63\x6c\x69\145\x6e\x74\x5f\x61\x75\164\x6f\x5f\x72\145\x64\151\162\x65\x63\164\x5f\145\x78\164\x65\x72\x6e\x61\x6c\x5f\141\146\164\x65\x72\x5f\x6c\x6f\147\157\165\164", 10, 3);
