<?php


namespace MoOauthClient;

class StorageHandler
{
    private $storage;
    public function __construct($FI = '')
    {
        $ut = empty($FI) || '' === $FI ? json_encode([]) : sanitize_text_field(wp_unslash($FI));
        $this->storage = json_decode($ut, true);
    }
    public function add_replace_entry($Vi, $GT)
    {
        $this->storage[$Vi]["\x56"] = $GT;
        $this->storage[$Vi]["\110"] = md5($GT);
    }
    public function get_value($Vi)
    {
        if (isset($this->storage[$Vi])) {
            goto tA;
        }
        return false;
        tA:
        $GT = $this->storage[$Vi];
        if (!(!is_array($GT) || !isset($GT["\126"]) || !isset($GT["\x48"]))) {
            goto g5;
        }
        return false;
        g5:
        if (!(md5($GT["\126"]) !== $GT["\110"])) {
            goto uG;
        }
        return false;
        uG:
        return $GT["\126"];
    }
    public function remove_key($Vi)
    {
        if (!isset($this->storage[$Vi])) {
            goto QF;
        }
        unset($this->storage[$Vi]);
        QF:
    }
    public function stringify()
    {
        global $vj;
        $fi = $this->storage;
        $fi[\bin2hex("\x75\x69\144")]["\x56"] = bin2hex(MO_UID);
        $fi[\bin2hex("\x75\x69\144")]["\110"] = md5($fi[\bin2hex("\165\x69\144")]["\x56"]);
        return $vj->base64url_encode(wp_json_encode($fi));
    }
    public function get_storage()
    {
        return $this->storage;
    }
}
