<?php


namespace MoOauthClient\Premium;

use MoOauthClient\Config;
use MoOauthClient\Standard\SignInSettingsSettings as StandardSignInSettingsSettings;
class SignInSettingsSettings extends StandardSignInSettingsSettings
{
    public function change_current_config($post, $sC)
    {
        global $vj;
        $sC = parent::change_current_config($post, $sC);
        $sC->add_config("\162\145\163\164\x72\151\x63\164\145\144\x5f\144\157\155\x61\x69\x6e\x73", isset($post["\x72\145\163\x74\162\x69\143\164\x65\144\x5f\144\x6f\x6d\141\151\156\163"]) ? stripslashes(wp_unslash($post["\162\x65\x73\x74\162\151\143\164\x65\x64\x5f\144\x6f\155\141\151\156\163"])) : '');
        $sC->add_config("\162\145\163\x74\162\x69\x63\164\137\x74\157\x5f\154\157\147\x67\145\x64\137\x69\156\x5f\165\x73\x65\x72\163", isset($post["\162\145\x73\x74\162\x69\x63\x74\137\x74\157\x5f\154\157\x67\x67\x65\x64\x5f\151\x6e\x5f\x75\163\145\162\x73"]) ? stripslashes(wp_unslash($post["\x72\x65\163\164\162\x69\143\164\137\x74\x6f\x5f\154\157\147\147\x65\144\x5f\x69\x6e\x5f\x75\163\145\x72\x73"])) : '');
        $sC->add_config("\146\157\x72\143\145\144\x5f\x6d\145\163\163\x61\147\x65", isset($post["\146\x6f\x72\143\145\144\137\155\x65\x73\x73\141\147\145"]) ? sanitize_text_field(wp_unslash($post["\146\157\162\143\x65\x64\137\155\x65\x73\163\x61\147\x65"])) : '');
        $sC->add_config("\153\x65\x65\x70\137\145\170\x69\163\x74\151\156\147\137\165\163\x65\x72\163", isset($post["\x6b\145\x65\160\x5f\145\170\x69\x73\164\x69\x6e\147\x5f\165\163\145\162\x73"]) ? stripslashes(wp_unslash($post["\153\145\145\160\137\145\170\151\163\164\x69\156\147\137\165\163\145\x72\x73"])) : '');
        $sC->add_config("\x6b\145\x65\160\137\145\x78\x69\163\164\151\x6e\147\x5f\145\155\141\x69\x6c\137\x61\164\x74\162", isset($post["\x6b\x65\145\160\x5f\x65\170\151\163\x74\x69\x6e\147\x5f\x65\x6d\141\151\x6c\x5f\x61\164\x74\x72"]) ? stripslashes(wp_unslash($post["\x6b\x65\145\160\x5f\145\170\151\163\164\x69\156\x67\x5f\145\x6d\x61\151\x6c\x5f\141\164\x74\x72"])) : '');
        $sC->add_config("\141\154\154\x6f\167\x5f\x72\x65\x73\164\x72\x69\143\164\145\x64\137\x64\157\x6d\x61\151\156\x73", isset($post["\x61\154\154\x6f\x77\x5f\x72\x65\x73\164\162\x69\143\164\x65\144\x5f\144\157\155\x61\x69\x6e\x73"]) ? stripslashes(wp_unslash($post["\x61\x6c\x6c\157\167\x5f\162\x65\163\164\162\151\x63\x74\x65\144\137\144\157\155\141\x69\156\163"])) : '');
        $sC->add_config("\141\x75\x74\x6f\x5f\162\x65\x64\151\x72\145\x63\x74\x5f\145\x78\x63\x6c\x75\144\x65\x5f\165\162\154\x73", isset($post["\141\165\x74\157\137\162\x65\x64\151\x72\145\x63\164\x5f\145\x78\143\154\165\x64\x65\x5f\x75\x72\154\163"]) ? stripslashes(wp_unslash($post["\x61\x75\x74\x6f\137\x72\145\144\151\x72\x65\x63\164\137\145\x78\x63\x6c\165\x64\145\137\x75\162\x6c\x73"])) : '');
        return $sC;
    }
}
