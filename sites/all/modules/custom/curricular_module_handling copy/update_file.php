<?php

//require_once 'vendor/autoload.php';
//require_once 'auth.php';


	  $response = $api->get($path);
	  
	  $my_file = $api->decode($response);
	  $sha = $my_file->sha;
	  $the_content = base64_encode($con);
	  $filename = $my_file->name;
	  $message = 'updated the file named: '.$filename;
	  
	  $parameters = [
	      'message' => $message,
	      'content' => $the_content,
	  	'sha' => $sha,
	  ];
   
	  $response = $api->put($path, $parameters);
	  //$str = $message;
?>



