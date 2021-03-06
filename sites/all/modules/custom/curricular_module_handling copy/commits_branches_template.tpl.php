<?php

// Theme template file for the make changes section of the CM Handling module.
//$module_path = drupal_get_path('module', 'curricular_module_handling');
require_once 'vendor/autoload.php';
require_once 'auth.php';

if(isset($_POST['repos'], $_POST['filename'], $_POST['con'])){
	$file = $_POST['filename'];
	$repo = $_POST['repos'];
	$con = $_POST['con'];
	//echo $con."<br>";
	//echo $file." ".$rep;
	$path = 'repos/software-enterprise-asu/'.$repo.'/contents'.'/'.$file;
	//echo $path;
	try{
		require_once 'update_file.php';
		$msg = 'Successfully updated file named '.$file;
		echo '<div class="messages status">'.$msg.'</div>';
	}
	catch (Exception $e) {
		$msg = 'Error! Unable to update file named '.$file;
    	echo '<div class="messages error">'.$msg.'</div>';
	}
	require_once 'get_repo_files.php';
}
else if(isset($_POST['rep'], $_POST['file'])){
	//require_once 'get_repos.php';
	$file = $_POST['file'];
	$rep = $_POST['rep'];
	//echo $file." ".$rep;
	$path = 'repos/software-enterprise-asu/'.$rep.'/contents'.'/'.$file;
	require_once 'get_file_contents.php';
	//require_once 'md-editor.php';
	require_once 'simple_mde.php';
}
else if(isset($_POST['repo'])){
	$repo = $_POST['repo'];
	require_once 'get_repo_files.php';
}
else{
	require_once 'get_repos.php';
}
?>
	<form id="level_form" action="" method="post">
  		<input type="hidden" name="repo" id="repo" value="">
	</form>
	<form id="level2_form" action="" method="post">
		<input type="hidden" name="file" id="file" value="">
		<input type="hidden" name="rep" id="rep" value="">
	</form>
<script>
	function submit_repo(repo) {
		//alert("clicked repo submit");
	     document.getElementById("repo").value = repo;
		 document.getElementById("level_form").submit();
	}
	function submit_file(file, rep) {
		//alert("clicked file submit");
	     document.getElementById("file").value = file;
		 document.getElementById("rep").value = rep;
		 document.getElementById("level2_form").submit();
	}
</script>
<?php ?>