<?php
// This file peforms update on the respective CM node while reading from the xml's.
	
$module_directory = drupal_get_path('module', 'curricular_module_handling');
include $module_directory."/parsedown/Parsedown.php";
include $module_directory."/parsedown-extra/ParsedownExtra.php";
$parsedown = new ParsedownExtra();

	//dpm(node_load($module_no));
	//curricular_module_handling_set_message('Yes clicked.');
	//$node = node_load($module_no);
	try{
	  	$node = node_load($module_no);
	  	$l = $node->language;
	
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/title.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/title.txt';
			$file_contents = file_get_contents($file);
			
			$node->title = $file_contents;
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/general_info.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/general_info.txt';
			$file_contents = file_get_contents($file);

			$node->field_general_information[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/guidelines_for_instructors.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/guidelines_for_instructors.txt';
			$file_contents = file_get_contents($file);
			
			
			$node->field_guidelines_for_instructors[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/learning_objectives.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/learning_objectives.txt';
			$file_contents = file_get_contents($file);
			
			$node->field_learning_objectives[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/topics.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/topics.txt';
			$file_contents = file_get_contents($file);

			$node->field_topics[$l][0]['value'] = $parsedown->text($file_contents);
		}
	  	
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/preparation.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/preparation.txt';
			$file_contents = file_get_contents($file);
			
			$node->field_preperation[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/discussion.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/discussion.txt';
			$file_contents = file_get_contents($file);
			
			$node->field_discussion[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/practice.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/practice.txt';
			$file_contents = file_get_contents($file);
			
			$node->field_practice[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/projects.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/projects.txt';
			$file_contents = file_get_contents($file);
			
			$node->field_projects[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/reflection.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/reflection.txt';
			$file_contents = file_get_contents($file);
			
			$node->field_reflection[$l][0]['value'] = $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/other_resources.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/other_resources.txt';
			$file_contents = file_get_contents($file);
			
			$node->field_other_resources[$l][0]['value'] = $parsedown->text($file_contents);
		}		
		
	 node_save($node);
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