<?php

//require_once 'vendor/autoload.php';
//require_once 'auth.php';

$response = $api->get($path);

	$files_names = array(
	"title.txt"    => "Title",
	"general_info.txt"  => "General Information",
	"guidelines_for_instructors.txt"  => "Guidelines for instructors",
	"learning_objectives.txt" => "Learning Objectives",
	"topics.txt"    => "Topics",
	"preparation.txt"  => "Preperation",
	"discussion.txt"  => "Discussion",
	"practice.txt" => "Practice",
	"projects.txt"    => "Projects",
	"reflection.txt"  => "Reflection",
	"other_resources.txt"  => "Other Resources",
	);
	$my_file = $api->decode($response);
	//print "Filename: ".$my_file->name."<br>";
	//print "Content: <br>";
	//print base64_decode($my_file->content);
	$content = base64_decode($my_file->content);
	//echo $content;
	$parsedown = new ParsedownExtra();
	$str = '';
		try{
			$str .= "<h2>Viewing: ".$files_names[$my_file->name]."</h2>";
			$str .= $parsedown->text($content);
		}			
		catch (Exception $e) {
		    $str = 'Caught exception: '.$e->getMessage()."\n";
		}
		echo $str;
	?>
