<?php

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'contents/');

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
	
	$my_files = $api->decode($response);
	//print $my_files;
	//print_r($my_repos);
	if(!empty($my_files)){
		echo '<ul class="admin-list">';
		foreach($my_files as $file){
			if($file->name == 'README.md' || $file->name == 'files')
				continue;
			echo '<li class="leaf">';
		 ?><?php echo $files_names[$file->name];?>
		 <div class="description"><a href="#" onclick="submit_file('<?php echo $file->name; ?>', <?php echo $repo?>, 'view');return false;">View</a>&nbsp;|&nbsp;<a href="#" onclick="submit_file('<?php echo $file->name; ?>', <?php echo $repo?>, 'edit');return false;">Edit</a>&nbsp;|&nbsp;<a href="#" onclick="submit_file('<?php echo $file->name; ?>', <?php echo $repo?>, 'delete');return false;">Delete</a>&nbsp;</div>
				
			<?php
			echo '</li>';
		}
		echo '</ul>';
	}
	?>