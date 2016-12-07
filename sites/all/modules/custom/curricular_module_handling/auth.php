<?php

//require_once 'vendor/autoload.php';
use Milo\Github;

//$token = new Milo\Github\OAuth\Token('2d6bd3c2e5d54603d6d88f866fd16a499c72b942');
$token = new Milo\Github\OAuth\Token('f19a01dc7667654ace884e3293a132f2bdfa1c28');
$api = new Github\Api;
$api->setToken($token);

?>