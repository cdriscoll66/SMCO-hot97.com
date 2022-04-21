<?php


namespace MoOauthClient;

class Customer
{
    public $email;
    public $phone;
    private $default_customer_key = "\61\66\x35\65\65";
    private $default_api_key = "\146\x46\x64\62\130\143\166\x54\107\x44\x65\x6d\x5a\166\142\x77\61\142\143\x55\145\x73\x4e\x4a\127\105\x71\113\142\x62\x55\x71";
    private $host_name = '';
    private $host_key = '';
    public function __construct()
    {
        global $vj;
        $this->host_name = $vj->mo_oauth_client_get_option("\150\157\163\164\x5f\x6e\141\155\145");
        $this->email = $vj->mo_oauth_client_get_option("\x6d\x6f\x5f\157\x61\x75\x74\150\137\x61\144\x6d\151\x6e\137\x65\155\141\151\154");
        $this->phone = $vj->mo_oauth_client_get_option("\155\x6f\x5f\157\x61\x75\x74\150\137\141\x64\155\151\156\137\x70\150\x6f\x6e\x65");
        $this->host_key = $vj->mo_oauth_client_get_option("\x70\x61\163\x73\x77\157\x72\x64");
    }
    public function create_customer()
    {
        global $vj;
        $im = $this->host_name . "\57\155\x6f\141\x73\57\162\x65\x73\164\57\x63\165\163\164\157\x6d\145\162\57\141\144\x64";
        $hF = $this->host_key;
        $yp = $vj->mo_oauth_client_get_option("\x6d\157\x5f\x6f\141\165\164\150\x5f\141\x64\x6d\151\156\x5f\146\x6e\141\x6d\145");
        $GK = $vj->mo_oauth_client_get_option("\155\x6f\x5f\x6f\141\x75\x74\x68\x5f\x61\x64\155\151\x6e\137\154\x6e\141\x6d\x65");
        $l8 = $vj->mo_oauth_client_get_option("\155\157\x5f\157\141\x75\x74\150\x5f\141\144\x6d\x69\156\137\143\157\x6d\x70\x61\x6e\171");
        $t7 = array("\143\157\x6d\x70\x61\x6e\171\x4e\x61\x6d\145" => $l8, "\141\x72\145\x61\x4f\146\x49\156\164\145\162\x65\163\164" => "\127\120\40\117\101\x75\164\x68\x20\103\154\x69\145\x6e\x74", "\x66\151\x72\x73\x74\x6e\141\x6d\x65" => $yp, "\x6c\x61\x73\164\x6e\x61\155\x65" => $GK, \MoOAuthConstants::EMAIL => $this->email, "\x70\x68\157\156\x65" => $this->phone, "\x70\x61\x73\163\x77\157\162\144" => $hF);
        $dg = wp_json_encode($t7);
        return $this->send_request([], false, $dg, [], false, $im);
    }
    public function get_customer_key()
    {
        global $vj;
        $im = $this->host_name . "\57\x6d\157\x61\163\x2f\162\145\x73\164\57\x63\x75\x73\x74\157\x6d\145\162\x2f\x6b\145\171";
        $zZ = $this->email;
        $hF = $this->host_key;
        $t7 = array(\MoOAuthConstants::EMAIL => $zZ, "\x70\141\x73\x73\167\157\162\x64" => $hF);
        $dg = wp_json_encode($t7);
        return $this->send_request([], false, $dg, [], false, $im);
    }
    public function add_oauth_application($nU, $Xr)
    {
        global $vj;
        $im = $this->host_name . "\x2f\155\x6f\141\163\57\162\145\163\164\x2f\141\160\160\154\151\x63\141\164\x69\x6f\x6e\57\x61\x64\144\x6f\141\165\164\x68";
        $ZR = $vj->mo_oauth_client_get_option("\155\157\x5f\157\x61\x75\164\150\x5f\141\x64\155\151\x6e\x5f\143\x75\163\164\157\155\x65\162\137\153\145\x79");
        $uJ = $vj->mo_oauth_client_get_option("\x6d\157\x5f\x6f\141\x75\164\x68\x5f" . $nU . "\137\x73\x63\157\x70\x65");
        $lY = $vj->mo_oauth_client_get_option("\x6d\157\x5f\x6f\141\x75\x74\150\137" . $nU . "\137\143\x6c\x69\x65\x6e\x74\x5f\151\x64");
        $mT = $vj->mo_oauth_client_get_option("\155\x6f\137\157\x61\x75\x74\x68\137" . $nU . "\137\143\x6c\x69\x65\x6e\x74\137\x73\145\x63\x72\x65\x74");
        if (false !== $uJ) {
            goto Sz;
        }
        $t7 = array("\x61\x70\x70\x6c\x69\143\x61\x74\x69\157\x6e\x4e\141\155\145" => $Xr, "\x63\165\163\164\x6f\x6d\145\x72\111\x64" => $ZR, "\x63\154\x69\x65\156\x74\111\x64" => $lY, "\x63\x6c\x69\x65\156\164\x53\x65\x63\x72\145\164" => $mT);
        goto eN;
        Sz:
        $t7 = array("\141\160\160\154\x69\143\141\164\x69\157\156\x4e\x61\155\x65" => $Xr, "\163\x63\157\160\145" => $uJ, "\143\165\x73\164\x6f\155\145\x72\x49\144" => $ZR, "\x63\154\151\145\x6e\x74\111\x64" => $lY, "\x63\x6c\x69\145\156\x74\123\x65\x63\x72\145\x74" => $mT);
        eN:
        $dg = wp_json_encode($t7);
        return $this->send_request([], false, $dg, [], false, $im);
    }
    public function submit_contact_us($zZ, $jb, $gC, $VJ = true)
    {
        global $current_user;
        global $vj;
        wp_get_current_user();
        $ty = $vj->export_plugin_config(true);
        $IZ = json_encode($ty, JSON_UNESCAPED_SLASHES);
        $ZR = $this->default_customer_key;
        $wA = $this->default_api_key;
        $Il = time();
        $im = $this->host_name . "\57\155\x6f\x61\163\57\141\160\x69\57\156\157\164\x69\146\171\57\x73\x65\156\144";
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\x68\x61\65\x31\62", $JD);
        $iZ = $zZ;
        $fN = \ucwords(\strtolower($vj->get_versi_str())) . "\x20\x2d\x20" . \mo_oauth_get_version_number();
        $pB = "\121\x75\145\162\171\x3a\x20\x57\157\x72\144\x50\x72\145\163\163\40\117\101\x75\x74\150\40" . $fN . "\x20\x50\x6c\x75\x67\151\x6e";
        $gC = "\133\x57\x50\x20\x4f\x41\x75\x74\150\x20\x43\x6c\x69\145\x6e\164\40" . $fN . "\x5d\40" . $gC;
        if (!$VJ) {
            goto W7;
        }
        $gC .= "\x3c\x62\162\x3e\74\142\x72\x3e\x43\157\x6e\x66\151\147\40\x53\x74\x72\151\x6e\x67\72\74\x62\162\76\x3c\160\x72\x65\x20\163\x74\171\154\x65\75\42\x62\157\162\x64\x65\x72\x3a\x31\x70\x78\x20\x73\x6f\154\x69\144\x20\x23\64\x34\x34\x3b\x70\x61\x64\144\151\156\x67\72\x31\60\x70\x78\73\42\x3e\74\143\x6f\144\x65\x3e" . $IZ . "\x3c\57\x63\157\144\x65\76\74\x2f\x70\x72\145\x3e";
        W7:
        $yP = isset($_SERVER["\123\105\x52\x56\105\122\x5f\116\101\x4d\105"]) ? sanitize_text_field(wp_unslash($_SERVER["\x53\105\x52\x56\x45\x52\x5f\x4e\101\x4d\105"])) : '';
        $lM = "\x3c\144\151\166\x20\76\110\145\x6c\154\157\x2c\40\x3c\x62\x72\76\74\142\x72\76\106\151\162\163\164\40\116\x61\x6d\x65\x20\72" . $current_user->user_firstname . "\x3c\142\x72\x3e\74\142\x72\76\114\x61\x73\164\40\40\116\x61\155\x65\x20\x3a" . $current_user->user_lastname . "\x20\40\40\74\x62\x72\x3e\x3c\x62\162\76\103\x6f\x6d\160\x61\156\x79\x20\x3a\74\141\40\150\x72\x65\146\75\x22" . $yP . "\42\x20\x74\141\162\x67\145\164\x3d\42\137\x62\x6c\141\x6e\x6b\42\x20\76" . $yP . "\74\57\141\x3e\74\x62\162\76\x3c\142\x72\x3e\120\150\x6f\156\x65\x20\116\x75\x6d\x62\x65\162\x20\x3a" . $jb . "\x3c\x62\x72\x3e\x3c\x62\162\76\105\155\x61\x69\154\x20\72\x3c\141\40\150\x72\145\146\x3d\x22\155\141\x69\154\x74\x6f\x3a" . $iZ . "\x22\x20\164\x61\162\x67\145\x74\75\x22\x5f\142\154\x61\x6e\x6b\x22\x3e" . $iZ . "\74\x2f\x61\x3e\x3c\x62\162\76\x3c\x62\162\76\x51\x75\x65\162\171\40\72" . $gC . "\x3c\57\144\151\166\76";
        $t7 = array("\143\165\x73\x74\x6f\x6d\145\x72\113\145\171" => $ZR, "\163\145\156\x64\105\155\x61\151\x6c" => true, \MoOAuthConstants::EMAIL => array("\x63\x75\x73\x74\157\155\x65\162\x4b\x65\x79" => $ZR, "\146\x72\x6f\x6d\105\155\x61\x69\x6c" => $iZ, "\142\x63\x63\105\x6d\141\x69\154" => "\151\x6e\x66\157\x40\170\x65\143\165\x72\151\146\x79\56\x63\x6f\x6d", "\146\162\x6f\155\116\x61\155\145" => "\155\151\156\x69\x4f\162\141\x6e\147\x65", "\x74\157\105\155\x61\x69\154" => "\x6f\x61\x75\164\150\163\165\x70\160\x6f\162\x74\100\170\145\x63\165\x72\151\x66\171\56\143\x6f\x6d", "\164\157\116\141\155\145" => "\157\141\165\164\150\163\165\160\160\x6f\162\164\x40\x78\x65\x63\x75\x72\151\x66\171\x2e\x63\157\x6d", "\x73\x75\142\x6a\145\x63\164" => $pB, "\x63\x6f\x6e\164\145\x6e\x74" => $lM));
        $dg = json_encode($t7, JSON_UNESCAPED_SLASHES);
        $rE = array("\103\x6f\x6e\x74\x65\156\x74\x2d\x54\171\x70\145" => "\141\160\160\154\x69\x63\x61\164\151\157\x6e\57\x6a\x73\x6f\156");
        $rE["\x43\165\163\164\157\x6d\145\162\55\113\145\x79"] = $ZR;
        $rE["\124\x69\x6d\x65\x73\164\141\155\x70"] = $Il;
        $rE["\x41\x75\164\150\x6f\x72\151\172\141\x74\151\157\x6e"] = $Wp;
        return $this->send_request($rE, true, $dg, [], false, $im);
    }
    public function submit_contact_us_upgrade($zZ, $vm, $V2, $EX)
    {
        global $vj;
        $ZR = $this->default_customer_key;
        $wA = $this->default_api_key;
        $Il = time();
        $im = $this->host_name . "\57\x6d\x6f\x61\163\x2f\x61\x70\151\57\156\x6f\164\x69\x66\171\x2f\163\x65\x6e\144";
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\x73\150\x61\65\x31\x32", $JD);
        $iZ = $zZ;
        $fN = \ucwords(\strtolower($vj->get_versi_str())) . "\x20\x2d\x20" . \mo_oauth_get_version_number();
        $pB = "\121\165\145\162\171\x3a\40\127\x6f\162\x64\x50\x72\x65\163\x73\x20\117\101\165\164\x68\40\125\x70\147\162\x61\x64\x65\40\x50\x6c\165\x67\x69\x6e";
        $yP = isset($_SERVER["\x53\x45\122\126\x45\122\137\116\101\x4d\x45"]) ? sanitize_text_field(wp_unslash($_SERVER["\123\x45\x52\126\105\122\x5f\x4e\101\115\105"])) : '';
        $lM = "\x3c\144\x69\x76\x20\x3e\110\x65\154\154\157\54\x20\40\40\x3c\x62\x72\x3e\x3c\142\x72\x3e\x43\157\x6d\x70\x61\156\x79\x20\72\74\141\x20\x68\162\145\146\75\x22" . $yP . "\42\40\164\x61\162\x67\x65\x74\75\42\x5f\142\154\141\156\153\x22\x20\76" . $yP . "\x3c\57\x61\76\x3c\x62\162\76\x3c\142\162\x3e\103\x75\162\162\145\156\164\x20\126\145\162\163\x69\x6f\156\40\x3a" . $vm . "\x3c\142\x72\x3e\x3c\x62\162\x3e\105\x6d\141\x69\154\x20\72\74\141\x20\150\162\145\146\x3d\x22\155\141\x69\x6c\164\x6f\72" . $iZ . "\x22\x20\x74\x61\162\147\x65\x74\x3d\42\137\142\154\141\156\x6b\x22\76" . $iZ . "\x3c\x2f\141\76\74\x62\162\x3e\x3c\142\x72\76\x56\x65\162\163\151\x6f\156\40\164\x6f\x20\x55\x70\147\162\141\x64\145\x20\x3a" . $V2 . "\74\142\162\x3e\74\142\162\x3e\106\145\x61\x74\x75\x72\145\x73\x20\122\x65\161\165\151\x72\x65\144\40\72" . $EX . "\x3c\57\144\151\166\76";
        $t7 = array("\143\x75\x73\164\x6f\x6d\x65\x72\x4b\145\x79" => $ZR, "\163\145\156\144\105\x6d\141\x69\x6c" => true, \MoOAuthConstants::EMAIL => array("\143\165\x73\164\x6f\155\145\162\x4b\145\171" => $ZR, "\x66\162\x6f\x6d\x45\x6d\141\151\x6c" => $iZ, "\142\x63\x63\x45\x6d\141\x69\x6c" => "\151\156\146\157\100\x78\145\x63\x75\162\151\x66\171\x2e\x63\157\155", "\x66\x72\157\x6d\x4e\141\x6d\145" => "\x6d\x69\x6e\151\117\162\141\x6e\x67\x65", "\164\157\105\155\x61\151\154" => "\157\141\165\x74\x68\x73\165\x70\x70\157\162\x74\100\x78\145\x63\x75\162\x69\x66\171\x2e\143\157\155", "\x74\x6f\116\141\155\145" => "\x6f\x61\165\x74\x68\x73\x75\x70\x70\157\162\164\x40\170\145\143\165\x72\151\x66\x79\56\x63\x6f\x6d", "\163\x75\142\152\x65\x63\164" => $pB, "\143\157\156\x74\145\156\164" => $lM));
        $dg = json_encode($t7, JSON_UNESCAPED_SLASHES);
        $rE = array("\x43\x6f\156\164\145\x6e\x74\55\x54\x79\160\145" => "\141\x70\x70\154\151\x63\x61\164\x69\x6f\x6e\57\x6a\x73\x6f\156");
        $rE["\x43\x75\x73\x74\x6f\x6d\145\162\x2d\x4b\x65\x79"] = $ZR;
        $rE["\124\x69\155\x65\x73\x74\141\155\x70"] = $Il;
        $rE["\101\165\164\150\157\x72\151\172\x61\164\x69\157\x6e"] = $Wp;
        return $this->send_request($rE, true, $dg, [], false, $im);
    }
    public function send_otp_token($zZ = '', $jb = '', $XL = true, $FA = false)
    {
        global $vj;
        $im = $this->host_name . "\57\155\x6f\141\163\x2f\141\x70\151\57\141\x75\x74\x68\x2f\x63\150\141\154\x6c\x65\x6e\x67\145";
        $ZR = $this->default_customer_key;
        $wA = $this->default_api_key;
        $Z3 = $this->email;
        $jb = $vj->mo_oauth_client_get_option("\155\157\137\157\x61\x75\x74\150\x5f\x61\144\x6d\x69\x6e\x5f\x70\x68\x6f\x6e\145");
        $Il = self::get_timestamp();
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\150\x61\65\61\62", $JD);
        $bJ = "\x43\165\163\164\x6f\155\145\162\x2d\x4b\x65\171\x3a\x20" . $ZR;
        $Ld = "\x54\151\x6d\145\x73\x74\x61\x6d\x70\72\x20" . $Il;
        $lA = "\x41\x75\164\x68\x6f\x72\x69\172\x61\164\151\157\x6e\72\40" . $Wp;
        if ($XL) {
            goto Zu;
        }
        $t7 = array("\143\x75\x73\164\157\155\x65\162\113\145\x79" => $ZR, "\160\150\x6f\156\x65" => $jb, "\x61\x75\x74\150\124\171\160\x65" => "\123\x4d\123");
        goto MZ;
        Zu:
        $t7 = array("\x63\165\163\x74\x6f\155\145\x72\113\145\171" => $ZR, \MoOAuthConstants::EMAIL => $Z3, "\x61\165\164\x68\124\x79\160\x65" => "\x45\115\101\x49\114");
        MZ:
        $dg = wp_json_encode($t7);
        $rE = array("\x43\x6f\x6e\x74\x65\156\164\x2d\124\x79\160\x65" => "\141\x70\x70\154\151\143\x61\164\x69\x6f\156\57\152\x73\157\x6e");
        $rE["\103\165\x73\x74\x6f\155\x65\162\55\113\x65\171"] = $ZR;
        $rE["\x54\x69\155\145\x73\x74\141\x6d\x70"] = $Il;
        $rE["\101\x75\x74\150\157\162\x69\172\x61\164\x69\157\156"] = $Wp;
        return $this->send_request($rE, true, $dg, [], false, $im);
    }
    public function get_timestamp()
    {
        global $vj;
        $im = $this->host_name . "\57\x6d\x6f\x61\x73\57\162\x65\163\164\x2f\155\157\x62\x69\154\145\x2f\147\145\x74\x2d\x74\151\x6d\x65\x73\164\x61\x6d\160";
        return $this->send_request([], false, '', [], false, $im);
    }
    public function validate_otp_token($GX, $UN)
    {
        global $vj;
        $im = $this->host_name . "\x2f\x6d\x6f\x61\163\57\141\160\x69\x2f\x61\x75\164\150\57\x76\x61\154\x69\144\141\164\x65";
        $ZR = $this->default_customer_key;
        $wA = $this->default_api_key;
        $Z3 = $this->email;
        $Il = self::get_timestamp();
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\150\141\x35\61\x32", $JD);
        $bJ = "\x43\x75\x73\x74\157\155\145\162\55\x4b\145\171\x3a\40" . $ZR;
        $Ld = "\124\151\155\x65\x73\164\141\155\160\x3a\40" . $Il;
        $lA = "\101\165\x74\150\157\162\x69\172\x61\164\x69\157\156\x3a\x20" . $Wp;
        $dg = '';
        $t7 = array("\164\170\111\x64" => $GX, "\164\x6f\153\145\x6e" => $UN);
        $dg = wp_json_encode($t7);
        $rE = array("\x43\x6f\x6e\x74\145\156\164\55\124\171\x70\x65" => "\141\160\160\154\x69\x63\x61\x74\x69\x6f\156\57\152\163\157\x6e");
        $rE["\103\x75\163\x74\157\155\145\x72\x2d\x4b\145\x79"] = $ZR;
        $rE["\124\151\155\x65\x73\164\141\155\x70"] = $Il;
        $rE["\101\x75\x74\150\x6f\162\x69\172\x61\164\x69\157\x6e"] = $Wp;
        return $this->send_request($rE, true, $dg, [], false, $im);
    }
    public function check_customer()
    {
        global $vj;
        $im = $this->host_name . "\57\x6d\x6f\141\x73\57\162\145\x73\164\x2f\143\165\163\x74\157\x6d\x65\x72\x2f\x63\150\145\143\x6b\x2d\151\x66\x2d\145\x78\151\163\164\163";
        $zZ = $this->email;
        $t7 = array(\MoOAuthConstants::EMAIL => $zZ);
        $dg = wp_json_encode($t7);
        return $this->send_request([], false, $dg, [], false, $im);
    }
    public function mo_oauth_send_email_alert($zZ, $jb, $CG)
    {
        global $vj;
        if ($this->check_internet_connection()) {
            goto qK;
        }
        return;
        qK:
        $im = $this->host_name . "\57\x6d\x6f\141\163\57\141\160\x69\57\x6e\157\164\x69\146\x79\57\163\145\x6e\x64";
        global $user;
        $ZR = $this->default_customer_key;
        $wA = $this->default_api_key;
        $Il = self::get_timestamp();
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\150\x61\65\x31\62", $JD);
        $iZ = $zZ;
        $pB = "\106\145\145\x64\142\141\143\153\72\x20\127\x6f\x72\144\120\x72\145\163\163\x20\117\x41\165\x74\150\40\x43\x6c\x69\x65\156\x74\x20\x50\154\x75\x67\x69\156";
        $qX = site_url();
        $user = wp_get_current_user();
        $fN = \ucwords(\strtolower($vj->get_versi_str())) . "\40\x2d\40" . \mo_oauth_get_version_number();
        $gC = "\x5b\x57\120\x20\117\x41\165\x74\150\x20\62\56\x30\x20\103\154\x69\x65\x6e\164\40" . $fN . "\135\x20\72\40" . $CG;
        $yP = isset($_SERVER["\123\105\x52\x56\105\122\137\116\x41\x4d\105"]) ? sanitize_text_field(wp_unslash($_SERVER["\123\x45\122\x56\x45\122\137\116\101\115\105"])) : '';
        $lM = "\74\x64\151\x76\x20\76\x48\x65\x6c\x6c\x6f\x2c\40\74\x62\x72\x3e\74\x62\162\76\x46\151\x72\x73\164\40\116\x61\155\145\40\72" . $user->user_firstname . "\74\x62\x72\76\x3c\x62\162\76\114\141\x73\x74\40\x20\x4e\141\155\145\x20\x3a" . $user->user_lastname . "\x20\x20\x20\74\142\162\76\74\142\162\76\103\157\x6d\x70\x61\156\x79\40\x3a\74\141\40\x68\x72\x65\x66\75\42" . $yP . "\42\x20\164\141\x72\147\x65\164\75\42\x5f\x62\154\x61\x6e\x6b\x22\x20\76" . $yP . "\74\57\141\x3e\x3c\x62\x72\x3e\74\x62\162\x3e\x50\150\x6f\156\x65\40\x4e\x75\x6d\x62\145\x72\40\x3a" . $jb . "\x3c\142\162\76\74\142\162\76\x45\x6d\x61\x69\x6c\40\72\74\141\40\x68\x72\x65\x66\x3d\42\155\x61\x69\x6c\164\157\x3a" . $iZ . "\42\40\x74\x61\162\x67\x65\x74\x3d\42\137\142\x6c\x61\156\x6b\x22\x3e" . $iZ . "\x3c\57\x61\x3e\74\x62\x72\76\74\142\x72\76\121\x75\x65\162\171\40\x3a" . $gC . "\x3c\x2f\x64\151\x76\76";
        $t7 = array("\143\x75\x73\164\157\155\145\162\x4b\145\x79" => $ZR, "\x73\145\x6e\144\x45\155\141\x69\x6c" => true, \MoOAuthConstants::EMAIL => array("\143\x75\163\164\157\x6d\x65\162\x4b\x65\171" => $ZR, "\x66\162\157\x6d\x45\x6d\x61\151\154" => $iZ, "\142\143\143\x45\155\x61\151\154" => "\157\x61\x75\164\x68\x73\165\160\x70\157\162\164\100\155\151\156\151\x6f\162\141\x6e\147\145\56\x63\157\x6d", "\146\162\x6f\155\x4e\141\155\x65" => "\x6d\151\156\x69\x4f\162\x61\x6e\147\x65", "\164\x6f\x45\155\141\x69\154" => "\x6f\x61\x75\x74\x68\x73\x75\160\x70\x6f\162\x74\100\155\151\156\151\x6f\162\x61\156\147\145\56\143\x6f\155", "\164\x6f\x4e\x61\155\x65" => "\157\141\165\164\150\163\165\160\160\157\162\164\x40\x6d\151\x6e\x69\157\162\x61\x6e\x67\x65\x2e\143\157\x6d", "\x73\165\x62\152\145\x63\164" => $pB, "\x63\157\x6e\164\145\156\164" => $lM));
        $dg = wp_json_encode($t7);
        $rE = array("\x43\157\156\164\x65\x6e\x74\x2d\124\x79\x70\145" => "\141\160\160\x6c\x69\x63\141\x74\x69\157\156\x2f\x6a\163\157\156");
        $rE["\x43\x75\x73\x74\x6f\155\x65\162\x2d\x4b\145\171"] = $ZR;
        $rE["\124\x69\155\145\163\x74\141\155\x70"] = $Il;
        $rE["\101\165\x74\150\x6f\x72\151\x7a\x61\164\x69\157\156"] = $Wp;
        return $this->send_request($rE, true, $dg, [], false, $im);
    }
    public function mo_oauth_send_demo_alert($zZ, $LN, $CG, $pB)
    {
        if ($this->check_internet_connection()) {
            goto pG;
        }
        return;
        pG:
        $im = $this->host_name . "\x2f\155\x6f\x61\x73\57\141\160\x69\57\156\x6f\164\x69\146\171\x2f\x73\x65\x6e\144";
        $ZR = $this->default_customer_key;
        $wA = $this->default_api_key;
        $Il = self::get_timestamp();
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\163\x68\x61\65\61\62", $JD);
        $iZ = $zZ;
        global $user;
        $user = wp_get_current_user();
        $lM = "\74\144\x69\x76\40\x3e\x48\145\x6c\154\x6f\54\x20\x3c\x2f\x61\x3e\74\x62\162\76\74\142\x72\76\105\x6d\141\x69\154\40\72\x3c\141\40\x68\162\145\x66\x3d\42\155\x61\151\x6c\164\x6f\72" . $iZ . "\42\x20\x74\141\162\x67\145\164\x3d\x22\137\x62\x6c\x61\x6e\153\42\76" . $iZ . "\x3c\57\x61\76\74\142\x72\76\74\142\x72\76\x52\145\x71\x75\x65\x73\164\x65\144\x20\x44\x65\155\x6f\40\x66\x6f\x72\x20\40\x20\40\x20\x3a\40" . $LN . "\x3c\x62\x72\x3e\x3c\x62\162\76\122\145\161\165\x69\162\145\x6d\145\156\x74\x73\40\40\x20\x20\x20\40\40\40\x20\40\x20\x3a\x20" . $CG . "\x3c\x2f\x64\x69\x76\76";
        $t7 = array("\143\165\x73\164\x6f\x6d\145\162\x4b\x65\171" => $ZR, "\163\x65\156\144\105\155\x61\151\x6c" => true, \MoOAuthConstants::EMAIL => array("\143\x75\x73\164\x6f\155\145\162\x4b\145\171" => $ZR, "\146\162\157\x6d\x45\155\141\151\154" => $iZ, "\142\x63\143\x45\155\141\151\154" => "\157\x61\x75\164\150\163\x75\x70\x70\x6f\x72\x74\100\155\151\156\x69\157\x72\x61\156\147\x65\56\143\x6f\x6d", "\146\162\157\155\116\x61\x6d\x65" => "\155\x69\x6e\x69\117\x72\x61\156\x67\145", "\164\157\x45\155\141\x69\154" => "\x6f\141\165\164\x68\x73\x75\160\160\157\x72\164\x40\155\151\x6e\151\157\162\141\156\147\x65\x2e\143\x6f\155", "\164\157\116\x61\x6d\x65" => "\x6f\x61\x75\x74\x68\163\x75\160\x70\x6f\x72\164\x40\155\x69\x6e\x69\157\x72\141\x6e\x67\145\56\x63\157\155", "\x73\x75\142\152\x65\x63\x74" => $pB, "\143\x6f\x6e\x74\145\156\164" => $lM));
        $dg = json_encode($t7);
        $rE = array("\x43\157\156\x74\x65\x6e\x74\55\x54\171\x70\x65" => "\141\x70\160\154\x69\143\x61\164\x69\x6f\156\57\152\x73\x6f\x6e");
        $rE["\103\x75\x73\164\x6f\x6d\x65\x72\55\x4b\x65\x79"] = $ZR;
        $rE["\x54\x69\155\145\163\164\x61\x6d\160"] = $Il;
        $rE["\101\165\164\x68\x6f\x72\x69\x7a\141\164\x69\157\156"] = $Wp;
        $gv = $this->send_request($rE, true, $dg, [], false, $im);
    }
    public function mo_oauth_forgot_password($zZ)
    {
        global $vj;
        $im = $this->host_name . "\x2f\x6d\157\x61\163\x2f\162\x65\x73\164\x2f\x63\x75\163\164\x6f\155\x65\x72\x2f\x70\x61\x73\163\x77\x6f\162\144\x2d\162\145\x73\x65\x74";
        $ZR = $vj->mo_oauth_client_get_option("\155\157\x5f\157\x61\x75\164\x68\x5f\x61\x64\155\151\x6e\137\x63\165\x73\164\157\x6d\x65\x72\x5f\153\x65\x79");
        $wA = $vj->mo_oauth_client_get_option("\x6d\x6f\137\x6f\x61\x75\x74\x68\137\x61\144\155\151\x6e\137\141\x70\151\x5f\153\x65\x79");
        $Il = self::get_timestamp();
        $JD = $ZR . $Il . $wA;
        $Wp = hash("\x73\x68\x61\x35\61\x32", $JD);
        $bJ = "\103\165\x73\x74\x6f\x6d\145\x72\55\113\145\x79\x3a\40" . $ZR;
        $Ld = "\124\151\x6d\x65\163\x74\x61\155\160\72\40" . number_format($Il, 0, '', '');
        $lA = "\101\x75\164\150\157\x72\x69\172\x61\164\151\x6f\156\72\x20" . $Wp;
        $dg = '';
        $t7 = array(\MoOAuthConstants::EMAIL => $zZ);
        $dg = wp_json_encode($t7);
        $rE = array("\103\x6f\156\x74\145\156\x74\x2d\124\171\160\145" => "\x61\160\160\x6c\x69\143\x61\x74\151\157\156\x2f\x6a\x73\x6f\156");
        $rE["\x43\x75\163\x74\x6f\x6d\x65\x72\x2d\x4b\145\x79"] = $ZR;
        $rE["\124\x69\155\x65\x73\x74\141\155\160"] = $Il;
        $rE["\101\165\x74\x68\157\x72\151\x7a\141\x74\x69\x6f\x6e"] = $Wp;
        return $this->send_request($rE, true, $dg, [], false, $im);
    }
    public function check_internet_connection()
    {
        return (bool) @fsockopen("\x6c\x6f\147\x69\x6e\56\x78\145\x63\x75\162\x69\x66\171\56\x63\x6f\155", 443, $X6, $qG, 5);
    }
    private function send_request($t6 = false, $DH = false, $dg = '', $Li = false, $qY = false, $im = '')
    {
        $rE = array("\103\157\x6e\x74\x65\x6e\x74\x2d\124\x79\x70\145" => "\x61\x70\160\x6c\151\143\141\x74\151\x6f\156\x2f\152\x73\157\156", "\143\x68\x61\x72\163\x65\x74" => "\125\124\106\x20\55\40\70", "\101\165\x74\x68\157\162\151\172\141\164\x69\157\156" => "\102\141\x73\151\143");
        $rE = $DH && $t6 ? $t6 : array_unique(array_merge($rE, $t6));
        $q1 = array("\x6d\145\164\x68\157\x64" => "\120\x4f\123\124", "\142\157\x64\x79" => $dg, "\164\151\x6d\x65\157\x75\x74" => "\65", "\x72\145\x64\151\x72\x65\143\164\151\157\x6e" => "\65", "\150\x74\x74\x70\x76\x65\x72\x73\151\157\156" => "\x31\x2e\60", "\142\x6c\157\143\x6b\151\x6e\147" => true, "\x68\x65\141\144\x65\x72\x73" => $rE, "\163\163\x6c\166\145\x72\151\x66\x79" => true);
        $q1 = $qY ? $Li : array_unique(array_merge($q1, $Li), SORT_REGULAR);
        $gv = wp_remote_post($im, $q1);
        if (!is_wp_error($gv)) {
            goto oC;
        }
        $vA = $gv->get_error_message();
        echo wp_kses("\123\x6f\x6d\x65\x74\150\151\156\x67\40\167\x65\x6e\164\x20\167\162\x6f\x6e\147\72\40{$vA}", \mo_oauth_get_valid_html());
        exit;
        oC:
        return wp_remote_retrieve_body($gv);
    }
}
