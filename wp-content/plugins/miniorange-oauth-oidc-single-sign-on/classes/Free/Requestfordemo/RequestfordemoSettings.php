<?php


namespace MoOauthClient\Free;

use MoOauthClient\Customer;
class RequestfordemoSettings
{
    public function save_requestdemo_settings()
    {
        global $vj;
        if (!(isset($_POST["\x6d\x6f\x5f\157\141\165\164\150\x5f\141\160\x70\137\162\145\x71\x75\145\x73\x74\144\145\155\x6f\137\x6e\157\156\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\x6f\x5f\x6f\141\165\164\x68\137\x61\x70\x70\x5f\162\x65\161\165\145\x73\164\x64\145\x6d\157\x5f\x6e\157\156\x63\145"])), "\x6d\x6f\x5f\x6f\x61\x75\164\150\x5f\141\x70\x70\137\162\145\x71\x75\145\163\164\x64\x65\x6d\x6f") && isset($_POST[\MoOAuthConstants::OPTION]) && "\155\157\137\x6f\x61\x75\164\x68\137\141\160\x70\137\162\145\161\x75\x65\163\x74\x64\x65\155\157" === $_POST[\MoOAuthConstants::OPTION])) {
            goto wz;
        }
        $zZ = $_POST["\155\x6f\137\x6f\141\x75\x74\x68\x5f\143\154\151\145\156\x74\x5f\x64\145\155\x6f\x5f\x65\155\141\151\x6c"];
        $LN = $_POST["\155\157\137\x6f\141\x75\164\150\x5f\143\x6c\151\145\156\164\137\x64\x65\x6d\x6f\137\160\154\141\x6e"];
        $gC = $_POST["\x6d\x6f\137\x6f\x61\165\164\x68\137\x63\x6c\x69\x65\x6e\164\x5f\x64\x65\155\157\137\x64\145\x73\x63\162\151\x70\x74\151\x6f\156"];
        $qa = new Customer();
        if ($vj->mo_oauth_check_empty_or_null($zZ) || $vj->mo_oauth_check_empty_or_null($LN)) {
            goto uA;
        }
        $m4 = json_decode($qa->mo_oauth_send_demo_alert($zZ, $LN, $gC, "\127\x50\x20\117\x41\x75\164\x68\x20\123\151\156\x67\154\145\x20\123\x69\147\156\x20\x4f\156\40\x44\145\155\157\x20\x52\145\x71\x75\x65\x73\x74\40\55\40" . $zZ), true);
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\124\x68\x61\x6e\x6b\x73\x20\x66\157\162\x20\147\145\164\164\x69\x6e\x67\40\151\x6e\40\164\157\x75\143\x68\x21\x20\x57\x65\40\163\150\141\154\x6c\40\x67\145\164\40\x62\x61\143\153\40\164\x6f\x20\171\x6f\165\x20\163\150\157\x72\x74\x6c\171\x2e");
        $vj->mo_oauth_show_success_message();
        goto mY;
        uA:
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\x50\x6c\145\141\x73\145\x20\x66\x69\154\154\40\x75\x70\40\105\155\x61\x69\x6c\40\x66\x69\145\x6c\144\x20\164\x6f\x20\x73\x75\x62\x6d\x69\x74\40\x79\x6f\165\x72\x20\x71\165\x65\x72\171\x2e");
        $vj->mo_oauth_show_success_message();
        mY:
        wz:
    }
}
