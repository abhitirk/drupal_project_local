<?php

require_once 'vendor/autoload.php';
require_once 'auth.php';

if(isset($_GET['rep'], $_GET['file'])){
	$file = base64_decode($_GET['file']);
	$rep = $_GET['rep'];
	echo $file." ".$rep;
	$path = 'repos/software-enterprise-asu/'.$rep.'/contents'.'/'.$file;
	require_once 'get_file_contents.php';
	require_once 'md-editor.php';
}
else if(isset($_GET['repo'])){
	$repo = $_GET['repo'];
	require_once 'get_repo_files.php';
}
else{
	require_once 'get_repos.php';
}

/*if(!isset($_GET['repo'], $_GET['file'], $_GET['rep'])){
	require_once 'get_repos.php';
}
else if(isset($_GET['file'], $_GET['repo'])){
	$file = $_GET['file'];
	$rep = $_GET['repo']
	require_once 'get_file_contents.php';
}
else{
	$repo = $_GET['repo'];
	require_once 'get_repo_files.php';
}*/