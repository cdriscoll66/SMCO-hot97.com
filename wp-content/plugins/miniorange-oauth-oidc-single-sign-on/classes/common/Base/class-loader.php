<?php


namespace MoOauthClient\Base;

use MoOauthClient\Licensing;
use MoOauthClient\MoAddons;
use MoOauthClient\Base\InstanceHelper;
class Loader
{
    private $instance_helper;
    public function __construct()
    {
        add_action("\x61\x64\x6d\151\x6e\x5f\x65\156\x71\x75\x65\x75\x65\x5f\163\143\x72\151\x70\x74\x73", array($this, "\160\154\x75\147\151\156\x5f\x73\x65\164\x74\x69\x6e\x67\163\137\163\x74\171\x6c\x65"));
        add_action("\x61\144\155\151\156\x5f\x65\x6e\161\165\145\x75\x65\137\163\143\162\151\160\x74\163", array($this, "\160\154\x75\x67\x69\156\137\163\x65\164\164\x69\156\147\163\137\x73\143\x72\x69\160\164"));
        $this->instance_helper = new InstanceHelper();
    }
    public function plugin_settings_style()
    {
        wp_enqueue_style("\155\x6f\137\157\x61\x75\x74\x68\137\x61\144\155\151\x6e\x5f\163\x65\164\164\151\156\x67\163\x5f\163\164\x79\154\145", MOC_URL . "\x72\145\x73\157\x75\162\x63\x65\163\x2f\x63\x73\x73\57\163\x74\x79\x6c\145\137\163\x65\x74\164\x69\x6e\147\163\x2e\143\x73\163", array(), $n2 = null, $Bv = false);
        wp_enqueue_style("\155\x6f\x5f\x6f\x61\x75\164\150\x5f\141\144\x6d\x69\156\x5f\x73\145\164\164\151\156\x67\163\137\x70\x68\x6f\x6e\145\x5f\163\164\x79\x6c\x65", MOC_URL . "\x72\x65\x73\157\x75\x72\x63\x65\x73\x2f\x63\163\163\57\160\150\157\156\x65\x2e\x63\x73\163", array(), $n2 = null, $Bv = false);
        wp_enqueue_style("\x6d\157\x5f\x6f\x61\x75\164\150\x5f\x61\x64\x6d\x69\x6e\137\x73\145\x74\164\151\x6e\147\x73\x5f\144\141\x74\141\164\141\142\154\x65", MOC_URL . "\x72\x65\163\x6f\165\162\143\145\163\57\143\x73\163\57\x6a\161\x75\145\162\171\56\x64\x61\x74\141\x54\x61\142\x6c\x65\x73\56\x6d\151\x6e\x2e\x63\163\x73", array(), $n2 = null, $Bv = false);
        wp_enqueue_style("\x6d\x6f\55\167\x70\x2d\x62\157\x6f\164\163\x74\162\141\160\55\x73\157\x63\151\141\154", MOC_URL . "\x72\145\x73\157\x75\x72\x63\145\x73\x2f\143\163\163\57\142\x6f\157\164\163\x74\162\141\x70\x2d\x73\157\143\151\x61\154\56\x63\163\163", array(), $n2 = null, $Bv = false);
        wp_enqueue_style("\x6d\x6f\x2d\167\x70\x2d\142\x6f\x6f\x74\163\x74\162\x61\x70\55\155\141\x69\156", MOC_URL . "\x72\x65\x73\x6f\165\x72\x63\x65\163\x2f\143\x73\163\x2f\x62\x6f\x6f\164\163\164\x72\141\x70\x2e\x6d\x69\156\x2d\x70\x72\145\166\x69\145\167\56\x63\x73\163", array(), $n2 = null, $Bv = false);
        wp_enqueue_style("\x6d\157\x2d\x77\x70\x2d\x66\x6f\156\x74\55\141\x77\145\x73\157\x6d\x65", MOC_URL . "\x72\x65\x73\157\x75\x72\x63\145\x73\57\143\163\x73\x2f\x66\157\x6e\x74\55\141\x77\145\x73\157\x6d\x65\56\155\x69\156\x2e\143\163\163\x3f\166\x65\162\x73\x69\x6f\x6e\x3d\x34\56\70", array(), $n2 = null, $Bv = false);
        wp_enqueue_style("\x6d\x6f\x2d\x77\160\x2d\x66\157\x6e\x74\x2d\x61\x77\x65\x73\157\x6d\x65", MOC_URL . "\162\145\x73\157\165\162\143\x65\x73\57\143\163\163\57\146\157\x6e\x74\55\141\167\145\163\x6f\x6d\x65\x2e\x63\163\163\x3f\166\145\162\x73\151\157\x6e\75\x34\x2e\70", array(), $n2 = null, $Bv = false);
        if (!(isset($_REQUEST["\x74\x61\x62"]) && "\154\151\x63\145\x6e\163\x69\x6e\147" === $_REQUEST["\164\x61\142"])) {
            goto L3;
        }
        wp_enqueue_style("\155\x6f\137\x6f\x61\165\164\150\137\x62\x6f\157\164\x73\164\162\x61\160\x5f\x63\x73\163", MOC_URL . "\162\145\163\x6f\x75\x72\x63\x65\163\57\x63\x73\x73\x2f\x62\157\x6f\164\x73\x74\162\x61\160\x2f\142\157\157\x74\163\164\x72\141\160\56\x6d\151\x6e\56\x63\163\163", array(), $n2 = null, $Bv = false);
        wp_enqueue_style("\x6d\157\x5f\157\141\x75\164\x68\x5f\x6c\x69\x63\x65\x6e\x73\145\x5f\x70\141\147\x65\137\163\x74\x79\154\145", MOC_URL . "\x72\145\163\157\165\x72\143\145\163\57\x63\x73\x73\57\155\157\55\157\x61\165\x74\150\55\x6c\151\143\x65\x6e\163\151\156\x67\56\143\163\163");
        L3:
    }
    public function plugin_settings_script()
    {
        wp_enqueue_script("\155\x6f\x5f\157\x61\165\164\x68\x5f\141\144\155\151\156\x5f\163\x65\x74\164\151\x6e\x67\163\137\x73\x63\162\151\160\x74", MOC_URL . "\x72\x65\163\157\165\x72\x63\x65\x73\57\x6a\x73\57\x73\145\x74\x74\x69\156\x67\x73\x2e\x6a\x73", array(), $n2 = null, $Bv = false);
        wp_enqueue_script("\155\157\x5f\x6f\x61\x75\164\150\137\141\144\x6d\x69\x6e\137\163\x65\164\x74\151\156\147\163\x5f\160\150\157\156\145\x5f\x73\143\x72\x69\x70\164", MOC_URL . "\x72\x65\x73\x6f\165\x72\x63\x65\163\x2f\152\x73\57\160\150\x6f\x6e\x65\56\152\x73", array(), $n2 = null, $Bv = false);
        wp_enqueue_script("\155\x6f\137\157\x61\165\164\150\137\141\144\155\151\156\x5f\163\145\164\x74\151\x6e\x67\x73\137\144\141\x74\x61\x74\141\x62\154\145", MOC_URL . "\x72\145\163\x6f\165\x72\x63\145\163\57\152\163\x2f\152\x71\x75\145\x72\x79\56\144\141\x74\x61\124\x61\142\154\x65\163\56\x6d\151\x6e\x2e\152\163", array(), $n2 = null, $Bv = false);
        if (!(isset($_REQUEST["\x74\141\142"]) && "\154\151\x63\145\156\x73\151\x6e\x67" === $_REQUEST["\x74\141\142"])) {
            goto G7;
        }
        wp_enqueue_script("\x6d\x6f\137\x6f\x61\x75\164\x68\137\x6d\x6f\144\145\x72\156\x69\172\162\x5f\x73\x63\162\x69\160\164", MOC_URL . "\162\145\163\x6f\165\162\x63\x65\x73\57\x6a\x73\x2f\x6d\157\144\145\x72\x6e\x69\x7a\162\56\152\163", array(), $n2 = null, $Bv = true);
        wp_enqueue_script("\x6d\157\137\x6f\x61\x75\x74\x68\x5f\x70\x6f\x70\x6f\166\x65\162\137\163\143\162\151\x70\x74", MOC_URL . "\x72\x65\x73\x6f\x75\x72\x63\145\x73\x2f\x6a\x73\57\x62\157\157\164\x73\x74\162\x61\160\57\x70\x6f\160\160\x65\162\x2e\x6d\x69\x6e\x2e\x6a\163", array(), $n2 = null, $Bv = true);
        wp_enqueue_script("\155\x6f\137\x6f\141\x75\164\x68\x5f\x62\x6f\157\164\163\x74\162\x61\x70\x5f\163\143\162\x69\x70\x74", MOC_URL . "\162\145\163\157\165\162\143\x65\x73\x2f\x6a\163\57\x62\x6f\157\x74\x73\164\162\x61\160\x2f\142\x6f\157\164\163\164\162\x61\x70\56\155\x69\156\56\152\x73", array(), $n2 = null, $Bv = true);
        G7:
    }
    public function load_current_tab($sD)
    {
        global $vj;
        $l_ = 0 === $vj->get_versi();
        $tH = false;
        if ($l_) {
            goto T2;
        }
        $tH = $vj->mo_oauth_client_get_option("\x6d\157\x5f\x6f\x61\x75\164\150\x5f\143\x6c\x69\x65\156\x74\x5f\x6c\x6f\x61\x64\137\141\x6e\x61\154\171\x74\x69\143\x73");
        $tH = boolval($tH) ? boolval($tH) : false;
        $l_ = $vj->check_versi(1) && $vj->mo_oauth_is_clv();
        T2:
        if ("\141\x63\143\157\165\156\x74" === $sD || !$l_) {
            goto mo;
        }
        if ("\x63\165\x73\x74\157\x6d\x69\x7a\141\x74\151\157\156" === $sD && $l_) {
            goto YL;
        }
        if ("\163\x69\147\x6e\151\x6e\x73\145\164\164\151\x6e\147\163" === $sD && $l_) {
            goto Jo;
        }
        if ("\163\x75\x62\163\151\x74\x65\x73\x65\x74\x74\151\x6e\147\163" === $sD && $l_) {
            goto QA;
        }
        if ($tH && "\141\x6e\141\x6c\171\164\151\x63\163" === $sD && $l_) {
            goto zO;
        }
        if ("\154\x69\x63\x65\156\x73\151\156\x67" === $sD) {
            goto zR;
        }
        if ("\162\x65\161\x75\x65\163\x74\x66\x6f\162\x64\x65\155\157" === $sD && $l_) {
            goto Hp;
        }
        if ("\141\144\x64\x6f\x6e\163" === $sD) {
            goto Zl;
        }
        $this->instance_helper->get_clientappui_instance()->render_free_ui();
        goto Ur;
        mo:
        $YO = $this->instance_helper->get_accounts_instance();
        if ($vj->mo_oauth_client_get_option("\x76\x65\x72\151\146\171\137\x63\x75\x73\164\157\x6d\x65\162") === "\x74\x72\x75\x65") {
            goto bA;
        }
        if (trim($vj->mo_oauth_client_get_option("\x6d\x6f\x5f\x6f\x61\165\164\150\x5f\x61\x64\x6d\151\156\137\x65\x6d\x61\x69\x6c")) !== '' && trim($vj->mo_oauth_client_get_option("\155\x6f\137\x6f\x61\x75\164\x68\x5f\141\x64\155\151\156\x5f\x61\160\151\x5f\153\x65\171")) === '' && $vj->mo_oauth_client_get_option("\156\x65\x77\137\x72\x65\147\x69\x73\164\x72\141\x74\x69\157\156") !== "\164\x72\165\145") {
            goto I6;
        }
        if (!$vj->mo_oauth_is_clv() && $vj->check_versi(1) && $vj->mo_oauth_is_customer_registered()) {
            goto ah;
        }
        $YO->register();
        goto Kj;
        bA:
        $YO->verify_password_ui();
        goto Kj;
        I6:
        $YO->verify_password_ui();
        goto Kj;
        ah:
        $YO->mo_oauth_lp();
        Kj:
        goto Ur;
        YL:
        $this->instance_helper->get_customization_instance()->render_free_ui();
        goto Ur;
        Jo:
        $this->instance_helper->get_sign_in_settings_instance()->render_free_ui();
        goto Ur;
        QA:
        $this->instance_helper->get_subsite_settings()->render_ui();
        goto Ur;
        zO:
        $this->instance_helper->get_user_analytics()->render_ui();
        goto Ur;
        zR:
        (new Licensing())->show_licensing_page();
        goto Ur;
        Hp:
        $this->instance_helper->get_requestdemo_instance()->render_free_ui();
        goto Ur;
        Zl:
        (new MoAddons())->addons_page();
        Ur:
    }
}
