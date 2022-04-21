<?php


namespace MoOauthClient;

use MoOauthClient\StorageHandler;
class StorageManager
{
    private $storage_handler;
    const PRETTY = "\160\x72\145\x74\x74\x79";
    const JSON = "\152\163\x6f\156";
    const RAW = "\x72\141\167";
    public function __construct($FI = '')
    {
        $this->storage_handler = new StorageHandler(empty($FI) ? $FI : base64_decode($FI));
    }
    private function decrypt($hC)
    {
        return empty($hC) || '' === $hC ? $hC : strtolower(hex2bin($hC));
    }
    private function encrypt($hC)
    {
        return empty($hC) || '' === $hC ? $hC : strtoupper(bin2hex($hC));
    }
    public function get_state()
    {
        return $this->storage_handler->stringify();
    }
    public function add_replace_entry($Vi, $GT)
    {
        if ($GT) {
            goto QJ;
        }
        return;
        QJ:
        $GT = is_string($GT) ? $GT : wp_json_encode($GT);
        $this->storage_handler->add_replace_entry(bin2hex($Vi), bin2hex($GT));
    }
    public function get_value($Vi)
    {
        $GT = $this->storage_handler->get_value(bin2hex($Vi));
        if ($GT) {
            goto Tv;
        }
        return false;
        Tv:
        $X0 = json_decode(hex2bin($GT), true);
        return json_last_error() === JSON_ERROR_NONE ? $X0 : hex2bin($GT);
    }
    public function remove_key($Vi)
    {
        $GT = $this->storage_handler->remove_key(bin2hex($Vi));
    }
    public function validate()
    {
        return $this->storage_handler->validate();
    }
    public function dump_all_storage($co = self::RAW)
    {
        $fi = $this->storage_handler->get_storage();
        $AM = [];
        foreach ($fi as $Vi => $GT) {
            $qp = \hex2bin($Vi);
            if ($qp) {
                goto er;
            }
            goto Rx;
            er:
            $AM[$qp] = $this->get_value($qp);
            Rx:
        }
        lM:
        switch ($co) {
            case self::PRETTY:
                echo "\74\160\162\145\x3e";
                print_r($AM);
                echo "\x3c\57\160\x72\145\x3e";
                goto qs;
            case self::JSON:
                echo \json_encode($AM);
                goto qs;
            default:
            case self::RAW:
                print_r($AM);
                goto qs;
        }
        QZ:
        qs:
    }
}
