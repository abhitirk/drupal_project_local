<?php
$module_path = drupal_get_path('module', 'curricular_module_handling');
require_once $module_path.'/vendor/autoload.php';
require_once 'auth.php';

	$repo = $module_no;
	$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'commits/');

	$my_commits = $api->decode($response);
	//print $my_files;
	//print_r($my_repos);
	$sha = $my_commits[1]->sha;
	
	$parameters = ['sha' => $sha,
					'force' => TRUE,];

	$response = $api->patch('repos/software-enterprise-asu/'.$repo.'/'.'git/refs/heads/master', $parameters);
	
?>