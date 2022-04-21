<?php


namespace MoOauthClient\Free;

class CustomizationSettings
{
    public function save_customization_settings()
    {
        global $vj;
        if (!($GLOBALS["\x6d\x6f\137\x6c\156\x5f\145\x78\160"] != 1)) {
            goto Ps;
        }
        if (!(isset($_POST["\x6d\157\137\x6f\x61\x75\164\150\137\x61\160\160\x5f\x63\x75\163\x74\157\155\151\x7a\141\164\151\157\x6e\x5f\156\157\x6e\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\155\x6f\x5f\157\x61\165\164\x68\x5f\x61\160\160\x5f\143\165\163\x74\x6f\155\151\x7a\x61\x74\x69\157\156\137\x6e\157\156\x63\x65"])), "\x6d\x6f\x5f\x6f\x61\x75\x74\x68\x5f\141\x70\160\x5f\143\165\163\x74\x6f\155\151\172\141\x74\151\x6f\x6e") && isset($_POST[\MoOAuthConstants::OPTION]) && "\x6d\157\137\157\141\165\164\150\137\x61\160\160\x5f\x63\x75\163\x74\x6f\155\x69\172\141\x74\x69\x6f\156" === $_POST[\MoOAuthConstants::OPTION])) {
            goto nK;
        }
        $vj->mo_oauth_client_update_option("\x6d\157\137\157\141\165\164\x68\x5f\151\x63\157\x6e\137\x77\151\144\164\150", stripslashes($_POST["\155\157\137\157\x61\x75\164\150\x5f\151\x63\x6f\156\137\x77\x69\x64\x74\150"]));
        $vj->mo_oauth_client_update_option("\x6d\157\137\157\141\165\x74\150\137\x69\143\157\x6e\137\150\x65\151\147\x68\x74", stripslashes($_POST["\155\157\x5f\157\x61\x75\164\150\137\x69\143\157\156\137\x68\145\151\147\x68\x74"]));
        $vj->mo_oauth_client_update_option("\155\x6f\137\157\x61\165\x74\x68\x5f\151\x63\157\156\x5f\155\x61\162\x67\151\x6e", stripslashes($_POST["\155\x6f\137\157\141\x75\164\x68\137\151\x63\157\x6e\137\x6d\x61\162\147\x69\156"]));
        $vj->mo_oauth_client_update_option("\x6d\157\x5f\x6f\x61\165\164\x68\x5f\x69\x63\157\156\137\143\x6f\156\x66\x69\147\165\x72\x65\137\143\x73\x73", stripcslashes(stripslashes($_POST["\x6d\x6f\137\x6f\x61\x75\164\150\137\151\x63\157\156\137\143\157\156\146\x69\147\165\162\145\x5f\143\163\163"])));
        $vj->mo_oauth_client_update_option("\x6d\157\x5f\x6f\141\x75\164\x68\x5f\x63\165\163\x74\157\x6d\x5f\x6c\x6f\147\157\165\164\137\x74\145\170\x74", stripslashes($_POST["\155\x6f\x5f\157\141\165\164\150\x5f\x63\x75\x73\164\157\x6d\x5f\154\x6f\147\157\165\x74\x5f\164\x65\x78\x74"]));
        $vj->mo_oauth_client_update_option(\MoOAuthConstants::PANEL_MESSAGE_OPTION, "\131\157\165\162\40\x73\145\x74\x74\x69\156\x67\x73\40\167\145\162\x65\x20\x73\141\x76\x65\x64");
        $vj->mo_oauth_show_success_message();
        nK:
        Ps:
    }
}
