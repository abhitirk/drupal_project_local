<?php

require_once 'vendor/autoload.php';
require_once 'auth.php';

$str = "This file was added via github api.";
$content = base64_encode($str);

$parameters = [
    'message' => 'Created a new file',
    'content' => $content,
];

$response = $api->put('/repos/abhitirk/design_overview/contents/newfile_api2.txt', $parameters);
//$html = $api->decode($response);
