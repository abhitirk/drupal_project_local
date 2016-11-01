<?php

require_once 'vendor/autoload.php';
use Milo\Github;

$token = new Milo\Github\OAuth\Token('b18382833e9cdf4db443af79342181cd78aec363');
$api = new Github\Api;
$api->setToken($token);
$response = $api->get('repos/abhitirk/embedded_c/contents/raspberry_pi_guitar_effects/guitar_effects.raw');
/*$my_repos = $api->decode($response);

//print_r($my_repos);
if(!empty($my_repos)){
	foreach($my_repos as $repo){
		print '<a href="'.$repo->html_url.'">'.$repo->name.'</a><br>';
	}*/
	
	$my_files = $api->decode($response);
	print $my_files;
	//print_r($my_repos);
	/*if(!empty($my_files)){
		foreach($my_files as $file){
			print '<a href="'.$file->html_url.'">'.$file->name.'</a><br>';
	}	*/
}