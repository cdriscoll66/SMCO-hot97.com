<?php
/**
 * Plugin Name: OAuth Single Sign On - SSO (OAuth client)
 * Plugin URI: http://miniorange.com
 * Description: This plugin enables login to your WordPress site using OAuth apps like Google, Facebook, EVE Online and other.
 * Version: 28.4.5
 * Author: miniOrange
 * Author URI: https://www.miniorange.com
 * License: miniOrange
 */


require "\x5f\141\x75\x74\x6f\154\157\x61\144\x2e\160\150\x70";
require_once "\155\157\55\x6f\141\x75\164\x68\x2d\x63\x6c\151\x65\156\164\55\x70\x6c\x75\147\151\x6e\x2d\x76\x65\162\163\x69\x6f\156\x2d\x75\160\x64\x61\x74\x65\x2e\x70\x68\160";
use MoOauthClient\Base\BaseStructure;
use MoOauthClient\MOUtils;
use MoOauthClient\Base\InstanceHelper;
use MoOauthClient\MoOauthClientWidget;
use MoOauthClient\Free\MOCVisualTour;
global $vj;
$C0 = new InstanceHelper();
$vj = $C0->get_utils_instance();
$sC = $vj->get_plugin_config()->get_current_config();
!empty($sC["\154\151\143\x65\x6e\163\x65\x5f\x65\170\160\x69\x72\x79\x5f\x64\x61\164\x65"]) ? $GLOBALS["\154\x6e\137\145\170\137\144\x61\164\x65"] = $sC["\x6c\151\143\145\156\163\x65\x5f\x65\170\160\x69\x72\x79\x5f\144\x61\x74\x65"] : ($GLOBALS["\x6c\156\137\145\170\x5f\x64\141\x74\x65"] = "\x66\x61\154\x73\x65");
!empty($sC["\x6d\x6f\137\x62\x72\x65\141\x6b\x6f\x66\x66"]) ? $ja = $vj->mooauthdecrypt($sC["\155\x6f\x5f\x62\x72\145\141\153\157\x66\146"]) : ($ja = "\146\x61\154\x73\x65");
$ja === "\x74\162\x75\x65" ? $GLOBALS["\155\x6f\137\154\x6e\x5f\x65\x78\160"] = 1 : ($GLOBALS["\155\x6f\x5f\x6c\x6e\x5f\145\170\x70"] = 0);
$VR = new BaseStructure();
$vC = $C0->get_settings_instance();
$A9 = $C0->get_login_handler_instance();
function register_mo_oauth_widget()
{
    register_widget("\x5c\115\x6f\x4f\x61\165\x74\x68\x43\x6c\x69\x65\156\x74\134\x4d\x6f\117\141\x75\x74\150\x43\154\151\x65\x6e\x74\127\x69\144\147\x65\x74");
}
function mo_oauth_shortcode_login($em)
{
    global $vj;
    $FX = new MoOauthClientWidget();
    if ($vj->check_versi(4) && $vj->mo_oauth_client_get_option("\155\x6f\x5f\x6f\141\x75\x74\150\x5f\x61\143\164\151\166\x61\x74\145\x5f\163\x69\x6e\x67\x6c\x65\x5f\x6c\157\147\x69\156\x5f\x66\x6c\x6f\x77")) {
        goto oWp;
    }
    if (empty($em["\x72\x65\144\151\x72\x65\x63\164\x5f\165\162\154"])) {
        goto E3l;
    }
    return $em && isset($em["\141\x70\x70\x6e\x61\x6d\x65"]) && !empty($em["\141\160\x70\x6e\141\x6d\x65"]) ? $FX->mo_oauth_login_form($WB = true, $s5 = $em["\x61\160\x70\156\x61\155\145"], $bc = $em["\162\145\144\151\x72\145\143\x74\x5f\x75\x72\x6c"]) : $FX->mo_oauth_login_form($WB = false, $s5 = '', $bc = $em["\162\145\144\x69\162\x65\143\x74\x5f\x75\x72\x6c"]);
    E3l:
    return $em && isset($em["\141\x70\x70\156\141\155\x65"]) && !empty($em["\141\x70\160\156\141\x6d\145"]) ? $FX->mo_oauth_login_form($WB = true, $s5 = $em["\x61\x70\160\156\x61\155\145"]) : $FX->mo_oauth_login_form(false);
    goto Rzp;
    oWp:
    return $FX->mo_activate_single_login_flow_form();
    Rzp:
}
add_action("\167\151\144\147\x65\164\x73\137\x69\x6e\x69\x74", "\162\145\x67\151\163\x74\145\x72\x5f\155\157\137\x6f\x61\x75\x74\x68\x5f\x77\151\x64\x67\145\x74");
add_shortcode("\155\157\x5f\x6f\141\165\164\x68\137\154\157\147\x69\x6e", "\155\x6f\x5f\x6f\x61\165\164\150\x5f\x73\x68\x6f\x72\x74\143\157\144\x65\137\154\157\x67\151\x6e");
add_action("\x69\156\x69\164", "\x6d\x6f\137\147\145\164\x5f\166\x65\x72\163\x69\157\x6e\x5f\156\x75\x6d\142\x65\162");
function mo_get_version_number()
{
    if (!(isset($_GET["\141\x63\x74\x69\157\156"]) && $_GET["\x61\143\164\x69\157\x6e"] === "\x6d\157\137\x76\x65\162\x73\x69\x6f\156\x5f\156\165\155\x62\145\x72" && isset($_GET["\x61\160\151\x4b\145\x79"]) && $_GET["\141\x70\x69\113\x65\x79"] === "\143\x32\x30\141\67\x64\x66\x38\x36\x62\x33\x64\x34\x64\61\141\x62\x65\62\144\x34\67\144\60\145\61\142\61\x66\70\64\x37")) {
        goto co3;
    }
    echo mo_oauth_client_options_plugin_constants::Version;
    exit;
    co3:
}
function miniorange_oauth_visual_tour()
{
    $tm = new MOCVisualTour();
}
if (!($vj->get_versi() === 0)) {
    goto Hok;
}
add_action("\x61\144\155\151\x6e\x5f\x69\156\151\x74", "\155\x69\x6e\x69\x6f\x72\141\156\147\145\137\157\x61\165\164\x68\x5f\166\151\163\165\x61\x6c\x5f\164\x6f\165\x72");
Hok:
function mo_oauth_deactivate()
{
    global $vj;
    do_action("\155\x6f\137\143\x6c\145\x61\162\137\x70\154\x75\147\x5f\x63\x61\143\150\x65");
    $vj->deactivate_plugin();
}
register_deactivation_hook(__FILE__, "\x6d\157\x5f\x6f\141\x75\164\x68\137\x64\145\x61\x63\164\151\166\141\x74\145");
