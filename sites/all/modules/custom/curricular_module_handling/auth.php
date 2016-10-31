<?php

//require_once 'vendor/autoload.php';
use Milo\Github;

$token = new Milo\Github\OAuth\Token('14d427e72089c1f77bccdfd1b20d3dfc329f7eca');
$api = new Github\Api;
$api->setToken($token);

?>