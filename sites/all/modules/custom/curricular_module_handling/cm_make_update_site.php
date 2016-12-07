<?php
// This file peforms update on the respective CM node while reading from the xml's.
	
$module_directory = drupal_get_path('module', 'curricular_module_handling');
include $module_directory."/parsedown/Parsedown.php";
include $module_directory."/parsedown-extra/ParsedownExtra.php";
$parsedown = new ParsedownExtra();

	//dpm(node_load($module_no));
	//curricular_module_handling_set_message('Yes clicked.');
	//$node = node_load($module_no);
	//echo "Module being updated: ".$module_no;
	try{
		//echo "Module being updated: ".$module_no;
	  	$node = node_load($module_no+49);
		
		$node_wrapper = entity_metadata_wrapper('node', $node);
	
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/title.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/title.txt';
			$file_contents = file_get_contents($file);
			
			$node_wrapper->title->set($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/general_info.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/general_info.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);


			$node_wrapper->field_cm_general_information->set((array('value' => $formatted_text)));
		}
		
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/guidelines_for_instructors.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/guidelines_for_instructors.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);

			$node_wrapper->field_cm_guidelines_for_instructors->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/learning_objectives.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/learning_objectives.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_cm_learning_objectives->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/topics.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/topics.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);

			$node_wrapper->field_cm_topics->set((array('value' => $formatted_text)));
		}
	  	
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/preparation.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/preparation.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_cm_preparation->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/discussion.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/discussion.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_cm_discussion->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/practice.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/practice.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_cm_practice->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/projects.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/projects.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_cm_projects->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/reflection.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/reflection.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_cm_reflection->set((array('value' => $formatted_text)));
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/other_resources.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/other_resources.txt';
			$file_contents = file_get_contents($file);
			$formatted_text = $parsedown->text($file_contents);
			
			$node_wrapper->field_cm_other_resources->set((array('value' => $formatted_text)));
		}		
		
	 $node_wrapper->save();
	}
	catch (Exception $e){
		echo 'Caught exception: '.$e->getMessage()."\n";
	}

?>