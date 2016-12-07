<?php
	$module_directory = drupal_get_path('module', 'curricular_module_handling');
	include $module_directory."/parsedown/Parsedown.php";
	include $module_directory."/parsedown-extra/ParsedownExtra.php";
	include $module_directory."/includes/time_elapsed.php";
?>