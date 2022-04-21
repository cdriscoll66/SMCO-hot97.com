<?php


namespace MoOauthClient\Free;

use MoOauthClient\AppUI;
use MoOauthClient\App\UpdateAppUI;
use MoOauthClient\AppGuider;
class ClientAppUI
{
    private $common_app_ui;
    public function __construct()
    {
        $this->common_app_ui = new AppUI();
    }
    public function render_free_ui()
    {
        $pl = $this->common_app_ui->get_apps_list();
        if (!($GLOBALS["\155\157\x5f\154\x6e\137\x65\x78\x70"] != 1)) {
            goto aj;
        }
        if (!(isset($_GET["\x61\143\164\151\x6f\156"]) && "\x64\x65\x6c\145\164\145" === $_GET["\x61\143\164\x69\x6f\x6e"])) {
            goto bz;
        }
        if (!isset($_GET["\x61\x70\160"])) {
            goto Xs;
        }
        $this->common_app_ui->delete_app($_GET["\x61\160\x70"]);
        return;
        Xs:
        bz:
        aj:
        if (!(isset($_GET["\141\x63\164\x69\157\x6e"]) && "\x69\156\163\x74\x72\x75\x63\164\151\x6f\x6e\x73" === $_GET["\x61\143\164\x69\x6f\x6e"] || isset($_GET["\x73\150\x6f\167"]) && "\x69\156\163\164\162\x75\x63\x74\151\157\x6e\x73" === $_GET["\163\150\157\167"])) {
            goto M5;
        }
        if (!(isset($_GET["\x61\x70\160\111\x64"]) && isset($_GET["\146\157\162"]))) {
            goto Cc;
        }
        $j6 = new AppGuider($_GET["\x61\160\160\111\x64"], $_GET["\x66\x6f\x72"]);
        $j6->show_guide();
        Cc:
        if (!(isset($_GET["\x73\x68\157\167"]) && "\x69\156\163\x74\162\x75\x63\164\151\157\156\163" === $_GET["\163\x68\x6f\167"])) {
            goto vE;
        }
        $j6 = new AppGuider($_GET["\x61\x70\x70\x49\x64"]);
        $j6->show_guide();
        $this->common_app_ui->add_app_ui();
        return;
        vE:
        M5:
        if (!(isset($_GET["\x61\x63\164\x69\x6f\x6e"]) && "\x61\144\144" === $_GET["\141\143\164\x69\x6f\156"])) {
            goto tD;
        }
        $this->common_app_ui->add_app_ui();
        return;
        tD:
        if (!(isset($_GET["\141\x63\164\151\x6f\156"]) && "\165\160\x64\141\x74\x65" === $_GET["\x61\143\x74\x69\x6f\x6e"])) {
            goto dN;
        }
        if (!isset($_GET["\141\x70\x70"])) {
            goto u_;
        }
        $kL = $this->common_app_ui->get_app_by_name($_GET["\x61\x70\x70"]);
        new UpdateAppUI($_GET["\x61\x70\x70"], $kL);
        return;
        u_:
        dN:
        if (!(isset($_GET["\141\143\164\x69\x6f\156"]) && "\141\x64\x64\137\x6e\145\167" === $_GET["\x61\143\164\151\157\x6e"])) {
            goto VS;
        }
        $this->common_app_ui->add_app_ui();
        return;
        VS:
        if (!(is_array($pl) && count($pl) > 0)) {
            goto eF;
        }
        $this->common_app_ui->show_apps_list_page();
        return;
        eF:
        $this->common_app_ui->add_app_ui();
    }
}
