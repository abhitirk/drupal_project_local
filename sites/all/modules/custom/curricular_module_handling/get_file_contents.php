<?php

//require_once 'vendor/autoload.php';
//require_once 'auth.php';

$response = $api->get($path);

	$my_file = $api->decode($response);
	//print "Filename: ".$my_file->name."<br>";
	//print "Content: <br>";
	//print base64_decode($my_file->content);
	$content = base64_decode($my_file->content);
	//echo $content;
	$file_path = drupal_get_path('module', 'curricular_module_handling').'/sample.txt';
	$file_md = fopen($file_path, 'w') or die("can't open file");
	fclose($file_md);
    file_put_contents($file_path, $content);
?>
