<?php


namespace MoOauthClient\Base;

class InstanceHelper
{
    private $current_version = "\106\122\x45\105";
    private $utils;
    public function __construct()
    {
        $this->utils = new \MoOauthClient\MOUtils();
        $this->current_version = $this->utils->get_versi_str();
    }
    public function get_sign_in_settings_instance()
    {
        if (class_exists("\x4d\x6f\117\x61\x75\164\x68\x43\x6c\151\x65\x6e\x74\134\105\x6e\164\145\x72\x70\x72\151\163\x65\x5c\123\151\147\156\111\x6e\x53\145\x74\164\x69\x6e\x67\163") && $this->utils->check_versi(4)) {
            goto bS;
        }
        if (class_exists("\115\157\117\x61\165\164\x68\x43\154\x69\145\x6e\164\x5c\120\x72\145\x6d\151\x75\155\x5c\123\x69\x67\x6e\x49\156\123\x65\164\x74\151\x6e\147\x73") && $this->utils->check_versi(2)) {
            goto AU;
        }
        if (class_exists("\x4d\x6f\x4f\141\x75\x74\150\x43\154\x69\x65\x6e\164\x5c\x53\164\141\x6e\144\141\162\x64\134\123\x69\x67\x6e\111\156\123\x65\164\164\151\x6e\147\163") && $this->utils->check_versi(1)) {
            goto z3;
        }
        if (class_exists("\x5c\115\x6f\x4f\141\165\x74\x68\103\x6c\151\x65\156\164\134\106\x72\145\145\x5c\123\151\x67\156\111\x6e\x53\x65\x74\164\x69\x6e\147\x73") && $this->utils->check_versi(0)) {
            goto Tu;
        }
        wp_die("\120\x6c\145\141\163\x65\x20\103\x68\141\x6e\147\x65\x20\x54\150\x65\40\x76\x65\x72\163\151\157\156\40\x62\141\143\x6b\x20\164\157\x20\167\x68\141\x74\x20\x69\164\40\162\145\x61\x6c\x6c\171\40\x77\x61\x73");
        exit;
        goto Ny;
        bS:
        return new \MoOauthClient\Enterprise\SignInSettings();
        goto Ny;
        AU:
        return new \MoOauthClient\Premium\SignInSettings();
        goto Ny;
        z3:
        return new \MoOauthClient\Standard\SignInSettings();
        goto Ny;
        Tu:
        return new \MoOauthClient\Free\SignInSettings();
        Ny:
    }
    public function get_requestdemo_instance()
    {
        if (!class_exists("\x5c\x4d\157\117\141\x75\164\150\x43\154\151\x65\156\x74\x5c\x46\162\x65\145\x5c\122\145\161\165\x65\x73\164\146\157\162\144\145\x6d\x6f")) {
            goto zQ;
        }
        return new \MoOauthClient\Free\Requestfordemo();
        zQ:
    }
    public function get_customization_instance()
    {
        if (class_exists("\115\x6f\x4f\141\165\164\x68\x43\154\x69\145\156\x74\134\105\156\164\145\162\160\x72\x69\163\x65\134\x43\x75\163\x74\x6f\x6d\x69\172\x61\x74\x69\x6f\x6e") && $this->utils->check_versi(4)) {
            goto vx;
        }
        if (class_exists("\115\x6f\117\x61\x75\x74\150\x43\154\x69\145\156\164\x5c\x50\162\x65\155\x69\165\x6d\134\x43\x75\x73\x74\157\x6d\151\x7a\x61\x74\x69\157\x6e") && $this->utils->check_versi(2)) {
            goto vP;
        }
        if (class_exists("\115\157\x4f\141\x75\x74\150\103\x6c\x69\145\x6e\164\134\x53\x74\141\156\144\x61\x72\x64\x5c\x43\x75\x73\164\x6f\155\151\x7a\x61\x74\151\157\156") && $this->utils->check_versi(1)) {
            goto rN;
        }
        if (class_exists("\134\x4d\x6f\117\141\x75\164\x68\x43\x6c\x69\x65\156\x74\x5c\106\x72\x65\145\134\x43\x75\x73\x74\157\x6d\151\172\x61\x74\x69\157\x6e") && $this->utils->check_versi(0)) {
            goto Q9;
        }
        wp_die("\120\154\x65\x61\163\145\x20\x43\x68\141\156\147\x65\40\124\x68\x65\40\x76\145\162\x73\151\157\156\40\x62\141\143\x6b\40\164\x6f\40\x77\x68\141\x74\x20\x69\164\40\x72\x65\x61\x6c\154\171\40\x77\x61\x73");
        exit;
        goto Fv;
        vx:
        return new \MoOauthClient\Enterprise\Customization();
        goto Fv;
        vP:
        return new \MoOauthClient\Premium\Customization();
        goto Fv;
        rN:
        return new \MoOauthClient\Standard\Customization();
        goto Fv;
        Q9:
        return new \MoOauthClient\Free\Customization();
        Fv:
    }
    public function get_clientappui_instance()
    {
        if (class_exists("\115\x6f\x4f\x61\165\164\x68\103\154\x69\145\156\164\134\x45\156\x74\145\x72\x70\x72\x69\163\x65\x5c\x43\x6c\151\145\156\x74\x41\160\160\x55\111") && $this->utils->check_versi(4)) {
            goto Hn;
        }
        if (class_exists("\115\x6f\x4f\141\x75\x74\x68\x43\x6c\151\x65\x6e\x74\134\x50\162\145\155\151\x75\x6d\x5c\x43\x6c\151\145\x6e\164\101\160\x70\125\111") && $this->utils->check_versi(2)) {
            goto NS;
        }
        if (class_exists("\115\x6f\117\x61\165\164\150\x43\x6c\x69\x65\156\164\x5c\x53\164\x61\156\x64\141\162\144\x5c\103\154\151\x65\x6e\x74\101\x70\160\125\x49") && $this->utils->check_versi(1)) {
            goto gy;
        }
        if (class_exists("\134\115\x6f\117\x61\165\x74\150\x43\x6c\x69\x65\x6e\164\134\x46\x72\x65\145\x5c\x43\154\151\145\x6e\164\x41\160\160\125\111") && $this->utils->check_versi(0)) {
            goto Cm;
        }
        wp_die("\120\x6c\x65\141\163\x65\x20\103\150\141\156\x67\x65\40\124\x68\145\40\x76\145\x72\163\151\x6f\156\40\142\x61\x63\153\x20\164\157\x20\x77\x68\141\164\x20\151\164\40\162\145\x61\x6c\154\x79\x20\x77\x61\163");
        exit;
        goto qL;
        Hn:
        return new \MoOauthClient\Enterprise\ClientAppUI();
        goto qL;
        NS:
        return new \MoOauthClient\Premium\ClientAppUI();
        goto qL;
        gy:
        return new \MoOauthClient\Standard\ClientAppUI();
        goto qL;
        Cm:
        return new \MoOauthClient\Free\ClientAppUI();
        qL:
    }
    public function get_login_handler_instance()
    {
        if (class_exists("\x4d\157\117\141\x75\164\x68\x43\154\151\x65\x6e\x74\x5c\105\x6e\x74\145\x72\x70\x72\151\163\x65\134\114\157\x67\151\x6e\x48\141\156\x64\154\x65\x72") && $this->utils->check_versi(4)) {
            goto DD;
        }
        if (class_exists("\x4d\157\117\141\165\x74\x68\x43\154\151\145\156\x74\134\x50\162\145\x6d\x69\165\x6d\134\114\157\x67\x69\x6e\110\141\156\x64\154\145\162") && $this->utils->check_versi(2)) {
            goto sj;
        }
        if (class_exists("\115\157\x4f\x61\x75\164\x68\x43\154\151\x65\156\164\134\123\164\141\156\144\x61\162\x64\134\114\x6f\x67\x69\x6e\110\x61\x6e\x64\x6c\x65\162") && $this->utils->check_versi(1)) {
            goto Dt;
        }
        if (class_exists("\134\115\157\x4f\x61\165\x74\x68\x43\154\151\x65\x6e\x74\x5c\114\157\147\151\x6e\x48\x61\x6e\x64\x6c\x65\162") && $this->utils->check_versi(0)) {
            goto yW;
        }
        wp_die("\120\154\145\141\163\145\40\x43\x68\x61\156\147\x65\x20\124\x68\x65\40\166\145\162\x73\x69\157\156\40\x62\x61\x63\x6b\40\164\x6f\40\167\150\141\x74\x20\151\x74\x20\x72\145\x61\154\x6c\x79\x20\x77\x61\x73");
        exit;
        goto Uq;
        DD:
        return new \MoOauthClient\Enterprise\LoginHandler();
        goto Uq;
        sj:
        return new \MoOauthClient\Premium\LoginHandler();
        goto Uq;
        Dt:
        return new \MoOauthClient\Standard\LoginHandler();
        goto Uq;
        yW:
        return new \MoOauthClient\LoginHandler();
        Uq:
    }
    public function get_settings_instance()
    {
        if (class_exists("\x4d\x6f\117\x61\x75\164\150\x43\154\x69\145\156\x74\134\x45\x6e\x74\x65\x72\160\x72\x69\163\145\x5c\105\156\164\x65\x72\x70\162\x69\x73\x65\123\145\x74\x74\151\156\x67\163") && $this->utils->check_versi(4)) {
            goto QP;
        }
        if (class_exists("\115\x6f\117\x61\x75\x74\x68\103\x6c\151\145\x6e\x74\x5c\x50\x72\145\x6d\151\x75\x6d\134\x50\162\x65\155\151\165\x6d\123\x65\x74\x74\x69\x6e\x67\163") && $this->utils->check_versi(2)) {
            goto Dk;
        }
        if (class_exists("\115\157\117\141\165\164\x68\103\154\x69\x65\156\164\x5c\x53\164\141\156\144\141\162\144\134\x53\x74\x61\x6e\x64\x61\162\144\123\x65\164\164\x69\156\x67\x73") && $this->utils->check_versi(1)) {
            goto fX;
        }
        if (class_exists("\x4d\x6f\117\x61\x75\164\150\x43\x6c\151\x65\156\164\x5c\x46\162\145\x65\x5c\106\162\145\x65\x53\145\164\x74\151\x6e\147\x73") && $this->utils->check_versi(0)) {
            goto gJ;
        }
        wp_die("\120\x6c\145\x61\163\145\40\103\x68\x61\x6e\147\145\x20\124\x68\x65\40\x76\x65\x72\x73\151\157\x6e\x20\x62\141\x63\x6b\40\164\x6f\x20\x77\150\141\x74\40\x69\x74\40\162\145\x61\x6c\x6c\x79\40\x77\141\x73");
        exit;
        goto eq;
        QP:
        return new \MoOauthClient\Enterprise\EnterpriseSettings();
        goto eq;
        Dk:
        return new \MoOauthClient\Premium\PremiumSettings();
        goto eq;
        fX:
        return new \MoOauthClient\Standard\StandardSettings();
        goto eq;
        gJ:
        return new \MoOauthClient\Free\FreeSettings();
        eq:
    }
    public function get_accounts_instance()
    {
        if (class_exists("\x4d\x6f\x4f\141\x75\164\x68\103\154\x69\145\x6e\164\x5c\120\141\x69\144\x5c\x41\x63\x63\157\x75\156\164\x73") && $this->utils->check_versi(1)) {
            goto U_;
        }
        return new \MoOauthClient\Accounts();
        goto f3;
        U_:
        return new \MoOauthClient\Paid\Accounts();
        f3:
    }
    public function get_subsite_settings()
    {
        if (class_exists("\115\157\x4f\x61\165\164\150\x43\154\x69\145\156\164\x5c\120\x72\x65\155\x69\x75\x6d\x5c\115\165\154\x74\151\x73\x69\164\x65\123\x65\164\x74\151\x6e\x67\x73") && $this->utils->is_multisite_versi(5)) {
            goto nm;
        }
        wp_die("\120\x6c\x65\x61\163\145\x20\x43\x68\141\x6e\x67\x65\40\x54\150\x65\x20\x76\145\162\163\x69\157\156\x20\142\141\x63\153\x20\x74\x6f\40\x77\150\x61\164\40\x69\164\x20\162\145\x61\x6c\x6c\x79\x20\x77\x61\163");
        exit;
        goto Dv;
        nm:
        return new \MoOauthClient\Premium\MultisiteSettings();
        Dv:
    }
    public function get_user_analytics()
    {
        if (class_exists("\115\x6f\117\x61\x75\164\150\x43\x6c\x69\x65\156\164\x5c\105\x6e\164\x65\x72\x70\162\151\x73\x65\x5c\125\163\x65\x72\x41\x6e\141\x6c\171\x74\151\143\163") && $this->utils->check_versi(4)) {
            goto Y6;
        }
        wp_die("\x50\154\145\141\x73\145\x20\x43\150\x61\156\147\145\40\124\150\145\x20\x76\145\x72\x73\x69\157\156\x20\x62\x61\x63\153\x20\x74\x6f\x20\x77\x68\141\164\40\151\164\x20\162\x65\x61\x6c\x6c\171\40\x77\141\163");
        exit;
        goto nG;
        Y6:
        return new \MoOauthClient\Enterprise\UserAnalytics();
        nG:
    }
    public function get_utils_instance()
    {
        if (!(class_exists("\x4d\x6f\117\141\x75\164\x68\103\154\x69\x65\156\x74\134\x53\x74\x61\x6e\x64\141\x72\144\x5c\x4d\117\x55\164\x69\154\x73") && $this->utils->check_versi(1))) {
            goto GC;
        }
        return new \MoOauthClient\Standard\MOUtils();
        GC:
        return $this->utils;
    }
}
