<style>
.verify-buttons {
	border: 1px solid #ccc;
	    margin-bottom: .5em;
	    margin-right: 1em;
	    font: bold 12px/32px 'Open Sans', 'Lucida Sans', 'Lucida Grande', verdana sans-serif;
	    text-decoration: none;
	    height: 33px;
	    color: #666;
	    cursor: pointer;
	    outline: none;
	    -moz-border-radius: 3px;
	    -khtml-border-radius: 3px;
	    -webkit-border-radius: 3px;
	    border-radius: 3px;
	    background: #FAFAFA;
	    background-image: linear-gradient(bottom, #E9EAEC 0%, #FAFAFA 100%);
	    background-image: -o-linear-gradient(bottom, #E9EAEC 0%, #FAFAFA 100%);
	    background-image: -moz-linear-gradient(bottom, #E9EAEC 0%, #FAFAFA 100%);
	    background-image: -webkit-linear-gradient(bottom, #E9EAEC 0%, #FAFAFA 100%);
	    background-image: -ms-linear-gradient(bottom, #E9EAEC 0%, #FAFAFA 100%);
	    background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, #E9EAEC), color-stop(1, #FAFAFA) );
	    -webkit-box-shadow: 0 3px 3px 0 #d2d2d2;
	    -moz-box-shadow: 0 3px 3px 0 #d2d2d2;
	    box-shadow: 0 3px 3px 0 #d2d2d2;
	    padding: 0 13px 1px;
}
</style>
<?php

// Template file to display the details of the specific pending module.

$module_directory = drupal_get_path('module', 'curricular_module_handling');
include $module_directory."/parsedown/Parsedown.php";
include $module_directory."/parsedown-extra/ParsedownExtra.php";
//include $module_directory."/includes/includes.php";?>
<h3>Verify Update?</h3>
	<form action="" method="post" id="verify_form">
		<input type="hidden" value="<?php echo $module_no;?>" name="form_module_no">
		<input type="hidden" value="" id = "tag" name="tag">
  		<button value="yes" id="yes" name="yes" type="submit" onclick="return set_tag();" class="verify-buttons">Yes</button>
  <!-- <button class="button" value="later" name="later" onclick="window.location.href='../curricular_module_versioning/'" >Not Now</button> -->
  		<button value="later" name="later" type="submit" class="verify-buttons">Not Now</button>
  		<button value="disregard" name="disregard" type="submit" class="verify-buttons" onclick="return discard_confirm();">Disregard</button>
	</form>
<br>
<script type="text/javascript">
	function set_tag(){
		var tag = prompt("Please enter the tag", "");
		if(tag != null){
			document.getElementById("tag").value = tag;
			return true;
		}
		return false;
	}
	
	function discard_confirm(){
		
		var r = confirm("Are you sure you want to discard this update?");
		return r;
	}
</script>
<div>
<?php
include "get_last_unverified_commits.php";
?>
</div>
<h2 align="center">Pending Curricular Module Content</h2>
<div style='font-family: Arial, Helvetica, sans-serif;'>
<?php
$parsedown = new ParsedownExtra();
		
// Main code for the template starts here.
$str = '';
	try {
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/title.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/title.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h1>".$parsedown->text($file_contents)."</h1>";
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/general_info.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/general_info.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>General Information</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/guidelines_for_instructors.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/guidelines_for_instructors.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Guidelines For Instructors</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/learning_objectives.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/learning_objectives.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Learning Objectives</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/topics.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/topics.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Topics</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/preparation.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/preparation.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Preparation</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/discussion.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/discussion.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Discussion</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/practice.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/practice.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Practice</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/projects.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/projects.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Projects</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/reflection.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/reflection.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Reflection</h2>";
			$str .= $parsedown->text($file_contents);
		}
		
		if (file_exists($module_directory.'/pull_folder'.'/'.$module_no.'/other_resources.txt')) {
			$file = $module_directory.'/pull_folder'.'/'.$module_no.'/other_resources.txt';
			$file_contents = file_get_contents($file);
			
			$str .= "<h2>Other Resources</h2>";
			$str .= $parsedown->text($file_contents);
		}			
	} 
	catch (Exception $e) {
	    $str = 'Caught exception: '.$e->getMessage()."\n";
	}
	echo $str;
		

?>
