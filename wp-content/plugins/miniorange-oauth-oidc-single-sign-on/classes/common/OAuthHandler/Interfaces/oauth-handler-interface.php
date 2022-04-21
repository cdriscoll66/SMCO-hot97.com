<?php


namespace MoOauthClient;

interface OauthHandlerInterface
{
    public function get_token($w7, $q1, $ET, $zg);
    public function get_access_token($w7, $q1, $ET, $zg);
    public function get_id_token($w7, $q1, $ET, $zg);
    public function get_resource_owner_from_id_token($xk);
    public function get_resource_owner($lQ, $u1);
    public function get_response($im);
}
