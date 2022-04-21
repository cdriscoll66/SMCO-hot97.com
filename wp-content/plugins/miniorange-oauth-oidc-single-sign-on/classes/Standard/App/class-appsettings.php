<?php


namespace MoOauthClient\Standard;

use MoOauthClient\App;
use MoOauthClient\Free\AppSettings as FreeAppSettings;
class AppSettings extends FreeAppSettings
{
    public function __construct()
    {
        parent::__construct();
        add_action("\x6d\157\x5f\x6f\141\165\164\150\137\143\154\x69\x65\156\164\137\163\x61\x76\x65\137\141\x70\160\137\163\x65\x74\x74\151\x6e\147\x73\137\x69\156\164\145\162\x6e\141\x6c", array($this, "\x73\x61\166\x65\x5f\162\x6f\154\x65\137\155\141\x70\x70\151\156\147"));
    }
    public function change_app_settings($post, $T8)
    {
        $T8 = parent::change_app_settings($post, $T8);
        $T8["\x64\151\x73\x70\x6c\141\x79\141\x70\160\156\141\x6d\145"] = isset($post["\x6d\x6f\137\157\141\165\164\x68\x5f\x64\151\x73\160\x6c\x61\171\x5f\x61\160\160\x5f\x6e\x61\x6d\145"]) ? trim(stripslashes($post["\155\157\137\157\x61\x75\x74\x68\x5f\144\x69\x73\x70\x6c\141\x79\x5f\x61\x70\x70\137\156\x61\155\145"])) : '';
        return $T8;
    }
    public function change_attribute_mapping($post, $T8)
    {
        $T8 = parent::change_attribute_mapping($post, $T8);
        $T8["\145\155\141\x69\154\137\141\164\x74\x72"] = isset($post["\x6d\157\137\x6f\141\x75\164\x68\137\x65\x6d\x61\x69\x6c\137\141\x74\x74\x72"]) ? stripslashes($post["\155\x6f\x5f\157\x61\x75\x74\x68\x5f\x65\x6d\x61\x69\x6c\137\141\x74\x74\x72"]) : '';
        $T8["\146\x69\162\163\164\156\x61\155\145\x5f\141\164\164\x72"] = isset($post["\155\157\137\157\x61\x75\x74\x68\x5f\146\151\x72\163\164\156\x61\x6d\145\137\141\x74\164\162"]) ? trim(stripslashes($post["\x6d\x6f\x5f\x6f\x61\165\164\x68\x5f\146\x69\x72\163\164\156\141\x6d\x65\137\x61\x74\x74\162"])) : '';
        $T8["\x6c\x61\x73\x74\x6e\x61\x6d\x65\x5f\141\164\164\x72"] = isset($post["\x6d\x6f\x5f\x6f\141\165\x74\150\137\x6c\x61\x73\x74\156\x61\155\x65\137\x61\x74\164\162"]) ? trim(stripslashes($post["\x6d\157\137\x6f\141\x75\164\x68\137\x6c\141\x73\164\x6e\141\155\145\x5f\141\164\x74\x72"])) : '';
        $T8["\145\x6e\x61\x62\154\145\137\x72\157\154\x65\137\155\x61\160\x70\x69\x6e\147"] = isset($post["\145\156\x61\142\x6c\145\x5f\162\x6f\154\145\137\x6d\141\160\x70\151\x6e\147"]) ? sanitize_text_field(wp_unslash($_POST["\x65\156\x61\142\154\x65\137\162\157\154\x65\137\155\x61\160\x70\x69\x6e\147"])) : false;
        $T8["\x61\154\154\x6f\x77\x5f\x64\x75\160\x6c\x69\x63\141\164\145\137\145\155\141\x69\x6c\163"] = isset($post["\141\x6c\154\x6f\x77\x5f\x64\x75\160\x6c\151\x63\141\164\x65\137\x65\x6d\141\151\154\x73"]) ? sanitize_text_field(wp_unslash($_POST["\x61\x6c\154\157\167\137\x64\165\x70\x6c\x69\143\141\x74\x65\x5f\x65\155\x61\x69\154\x73"])) : false;
        $T8["\144\x69\163\160\x6c\x61\x79\137\x61\x74\x74\162"] = isset($post["\157\141\x75\164\x68\x5f\143\154\x69\x65\x6e\164\x5f\141\x6d\x5f\144\x69\x73\160\154\x61\x79\x5f\x6e\141\x6d\x65"]) ? trim(stripslashes($post["\x6f\x61\x75\164\150\x5f\x63\154\x69\x65\x6e\x74\x5f\141\155\137\144\151\x73\x70\x6c\141\171\137\x6e\x61\x6d\145"])) : '';
        return $T8;
    }
    public function save_role_mapping()
    {
        global $vj;
        if (!($GLOBALS["\155\x6f\137\154\156\x5f\x65\x78\x70"] != 1)) {
            goto vI1;
        }
        if (!(isset($_POST["\x6d\x6f\137\x6f\x61\x75\164\x68\137\x63\x6c\151\x65\156\x74\x5f\x73\141\x76\145\137\x72\157\154\x65\x5f\155\x61\160\160\151\156\x67\137\156\x6f\156\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\157\x5f\157\x61\165\x74\150\x5f\x63\x6c\151\x65\156\x74\x5f\x73\x61\166\x65\137\x72\x6f\154\x65\x5f\155\141\x70\x70\151\156\x67\x5f\156\157\x6e\143\x65"])), "\155\x6f\137\x6f\x61\165\x74\x68\137\x63\154\x69\145\156\164\137\x73\x61\166\x65\137\162\x6f\x6c\x65\137\155\141\160\160\151\156\147") && isset($_POST[\MoOAuthConstants::OPTION]) && "\155\157\x5f\157\141\165\164\x68\137\x63\154\x69\x65\x6e\x74\x5f\x73\x61\166\145\x5f\162\157\x6c\145\137\x6d\141\x70\x70\x69\156\x67" === $_POST[\MoOAuthConstants::OPTION])) {
            goto Ix8;
        }
        error_log("\x53\x61\166\x69\x6e\147\x20\162\157\x6c\x65\40\x6d\x61\160\160\151\x6e\147\x20\151\x6e\40\x73\164\141\156\x64\x61\162\x64");
        $Mg = sanitize_text_field(wp_unslash(isset($_POST[\MoOAuthConstants::POST_APP_NAME]) ? $_POST[\MoOAuthConstants::POST_APP_NAME] : ''));
        $kL = $vj->get_app_by_name($Mg);
        $BD = $kL->get_app_config('', false);
        $BD["\x5f\155\x61\160\160\x69\156\x67\137\x76\x61\154\x75\x65\x5f\x64\x65\146\x61\x75\x6c\164"] = isset($_POST["\155\x61\x70\160\x69\x6e\147\137\x76\x61\x6c\165\x65\137\x64\x65\146\x61\165\154\164"]) ? sanitize_text_field(wp_unslash($_POST["\155\x61\160\x70\x69\156\x67\x5f\166\x61\154\x75\145\137\144\145\x66\x61\165\x6c\x74"])) : false;
        $BD["\153\x65\145\160\x5f\x65\170\x69\163\164\x69\156\x67\x5f\165\163\145\162\137\162\157\x6c\145\163"] = isset($_POST["\x6b\x65\x65\x70\137\x65\x78\x69\163\x74\x69\x6e\147\x5f\x75\x73\x65\162\137\162\157\x6c\145\163"]) ? sanitize_text_field(wp_unslash($_POST["\153\145\145\160\137\x65\x78\x69\163\164\x69\156\x67\x5f\x75\163\145\x72\x5f\162\157\x6c\x65\x73"])) : 0;
        $NX = $vj->set_app_by_name($Mg, $BD);
        Ix8:
        vI1:
    }
}
