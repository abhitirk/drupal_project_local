<?php
// This file peforms update on the respective CM node while reading from the xml's.
	
$module_directory = drupal_get_path('module', 'curricular_module_handling');
include $module_directory."/parsedown/Parsedown.php";
include $module_directory."/parsedown-extra/ParsedownExtra.php";
$parsedown = new ParsedownExtra();

	dpm(node_load($module_no));
	//curricular_module_handling_set_message('Yes clicked.');
	//$node = node_load($module_no);
	echo "Module being updated: ".$module_no;
	try{
		//echo "Module being updated: ".$module_no;
	  	$node = node_load($module_no);
		
		$node_wrapper = entity_metadata_wrapper('node', $node);
	
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/title.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/title.txt';
			$file_contents = file_get_contents($file);
			
			echo $file_contents;
			$node_wrapper->title->set($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/general_info.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/general_info.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);


			$node_wrapper->field_general_information->set((array('value' => $formatted_text)));
		}
		
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/guidelines_for_instructors.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/guidelines_for_instructors.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);

			$node_wrapper->field_guidelines_for_instructors->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/learning_objectives.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/learning_objectives.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_learning_objectives->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/topics.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/topics.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);

			$node_wrapper->field_topics->set((array('value' => $formatted_text)));
		}
	  	
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/preparation.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/preparation.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_preparation->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/discussion.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/discussion.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_discussion->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/practice.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/practice.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_practice->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/projects.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/projects.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_projects->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/reflection.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/reflection.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_reflection->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/other_resources.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/other_resources.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_other_resources_->set((array('value' => $formatted_text)));
		}		
		
	 $node_wrapper->save();
	}
	catch (Exception $e){
		echo 'Caught exception: '.$e->getMessage()."\n";
	}
  	
	/*$l = $node->language;
	$node->title = "Software Enterprise Something";
	$node->field_guidelines_for_instructors[$l][0]['value'] = "Interesting guidelines";
	$node->revision = TRUE; // Create new revision
	$node->revision_moderation = TRUE; // make the new revision pending review
	$node->log = "Update via verify update"; // Log message
	node_save($node);
	$noderevisions = node_revision_list($node); // or node_revision_list(node_load($nid));
	print_r($noderevisions);*/
?>