<?php

$module_path = drupal_get_path('module', 'curricular_module_handling');
require_once $module_path.'/vendor/autoload.php';
require_once 'auth.php';

	$repo = $module_no;
	$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'commits/');

	$my_commits = $api->decode($response);
	//print $my_files;
	//print_r($my_repos);
	$sha = $my_commits[0]->sha;
	
	$file_path = drupal_get_path('module', 'curricular_module_handling').DIRECTORY_SEPARATOR."last_synced_commits".DIRECTORY_SEPARATOR.$repo.'.txt';

	$file_md = fopen($file_path, 'w') or die("can't open file");
	fclose($file_md);
	file_put_contents($file_path, $sha);
	
	date_default_timezone_set('America/Phoenix');
	$date = date('M j, Y');
	$time = date('g:i A');
	$date_time =  $date.", ".$time." MST";
	$message = "Synced with website contents at ".$date_time;
	
	$parameters = [
		'tag' => $tag,
	    'message' => $message,
	    'object' => $sha,
		'type' => 'commit',
	];
	
	$path_tag = 'repos/software-enterprise-asu/'.$repo.'/git/tags';
	$response = $api->post($path_tag, $parameters);
	
	$parameters = [
		'ref' => 'refs/tags/'.$tag,
	    'sha' => $sha,
	];
	
	$path_ref = 'repos/software-enterprise-asu/'.$repo.'/git/refs';
	$response = $api->post($path_ref, $parameters);
	  //$str = $message;
?>



