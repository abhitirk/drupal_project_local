<?php
// Template file to display the details of the specific pending module.

$module_directory = drupal_get_path('module', 'curricular_module_handling');
include $module_directory."/parsedown/Parsedown.php";
include $module_directory."/parsedown-extra/ParsedownExtra.php";
$parsedown = new ParsedownExtra();
		
// Main code for the template starts here.
$str = '';
	try {
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/title.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/title.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/general_info.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/general_info.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/guidelines_for_instructors.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/guidelines_for_instructors.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/learning_objectives.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/learning_objectives.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/topics.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/topics.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/preparation.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/preparation.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/discussion.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/discussion.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/practice.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/practice.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/projects.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/projects.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/reflection.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/reflection.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/other_resources.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/other_resources.txt';
			$file_contents = file_get_contents($file);
			
			$str .= $parsedown->text($file_contents);
		}			
	} 
	catch (Exception $e) {
	    $str = 'Caught exception: '.$e->getMessage()."\n";
	}
	echo $str;
?>