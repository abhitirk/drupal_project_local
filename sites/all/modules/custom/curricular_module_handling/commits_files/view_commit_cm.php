<?php
$module_directory = drupal_get_path('module', 'curricular_module_handling');
require_once $module_directory.'/includes/includes.php';

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'git/trees/'.$sha);

	$files_contents = array(
    "title.txt"    => "",
    "general_info.txt"  => "",
    "guidelines_for_instructors.txt"  => "",
    "learning_objectives.txt" => "",
    "topics.txt"    => "",
    "preparation.txt"  => "",
    "discussion.txt"  => "",
    "practice.txt" => "",
    "projects.txt"    => "",
    "reflection.txt"  => "",
    "other_resources.txt"  => "",
	);
	
	$files_names = array(
    "title.txt"    => "",
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
	
	echo "<h1>Viewing commit: ".$msg."</h1>";
	echo "<h2>Sha: ".$sha."</h2>";
	$my_tree = $api->decode($response);
	$trees = $my_tree->tree;
	//print $my_files;
	//print_r($my_repos);
	if(!empty($trees)){
		foreach($trees as $blob){
			if($blob->path == 'README.md' || $blob->path == 'files')
				continue;
		 	$filename = $blob->path;
			//echo $filename;
			$response_blob = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'git/blobs/'.$blob->sha);
			$my_blob = $api->decode($response_blob);
			$content = base64_decode($my_blob->content);
			$files_contents[$filename] = $content;

		}
	}
	
	$parsedown = new ParsedownExtra();
	
	$str = '';
		try {
			$str .= "<h2>".$parsedown->text($files_contents['title.txt'])."</h2>";
		
			foreach($files_contents as $file => $contents){
				if($file == 'title.txt' || $contents=='')
					continue;
				$str .= "<h3>".$files_names[$file]."</h3>";
				$str .= $parsedown->text($contents);
			}			
		} 
		catch (Exception $e) {
		    $str = 'Caught exception: '.$e->getMessage()."\n";
		}
		echo $str;
	?>