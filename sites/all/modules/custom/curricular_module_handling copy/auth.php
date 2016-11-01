<?php

//require_once 'vendor/autoload.php';
use Milo\Github;

$token = new Milo\Github\OAuth\Token('aa87cc35211f10b1553ea32cc900a51120a363b1');
$api = new Github\Api;
$api->setToken($token);

?>