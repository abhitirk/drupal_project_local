<?php

//require_once 'vendor/autoload.php';
use Milo\Github;

$token = new Milo\Github\OAuth\Token('5a7819f987eae28b83d4d00d17f7e42e5de2c0d9');
$api = new Github\Api;
$api->setToken($token);

?>