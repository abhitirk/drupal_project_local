<?php

// Theme template file for the make changes section of the CM Handling module.
//$module_path = drupal_get_path('module', 'curricular_module_handling');
$module_path = drupal_get_path('module', 'curricular_module_handling');
require_once $module_path.'/includes/includes.php';
require_once $module_path.'/vendor/autoload.php';
require_once 'auth.php';

if(isset($_POST['c_blob_sha'])){
	$repo = $_POST['repo_c_blob'];
	$sha = $_POST['c_blob_sha'];
	//echo "Commit clicked, repo: ".$repo;
	require_once 'commits_files/get_blob.php';
}
else if(isset($_POST['c_tree_cm_msg'])){
	$repo = $_POST['repo_c_tree_cm'];
	$sha = $_POST['c_tree_cm_sha'];
	$msg = $_POST['c_tree_cm_msg'];
	//echo "Commit clicked, repo: ".$repo;
	require_once 'commits_files/view_commit_cm.php';
}
else if(isset($_POST['c_tree_sha'])){
	$repo = $_POST['repo_c_tree'];
	$sha = $_POST['c_tree_sha'];
	//echo "Commit clicked, repo: ".$repo;
	require_once 'commits_files/get_tree.php';
}
else if(isset($_POST['c_sha'])){
	$repo = $_POST['repo_c_sha'];
	$sha = $_POST['c_sha'];
	//echo "Commit clicked, repo: ".$repo;
	require_once 'commits_files/get_commit.php';
}
else if(isset($_POST['commit'])){
	$repo = $_POST['repo_c'];
	//echo "Commit clicked, repo: ".$repo;
	require_once 'commits_files/get_all_commits.php';
}
else if(isset($_POST['branch'])){
	$repo = $_POST['repo_b'];
	//echo "Branch clicked, repo: ".$repo;
	require_once 'branches_files/get_all_branches.php';
}
else{
	require_once 'get_repos_c_b.php';
}
?>	
	<form id="c_blob_form" action="" method="post">
  		<input type="hidden" name="repo_c_blob" id="repo_c_blob" value="">
		<input type="hidden" name="c_blob_sha" id="c_blob_sha" value="">
	</form>
	<form id="c_tree_cm_form" action="" method="post">
	  		<input type="hidden" name="repo_c_tree_cm" id="repo_c_tree_cm" value="">
			<input type="hidden" name="c_tree_cm_msg" id="c_tree_cm_msg" value="">
			<input type="hidden" name="c_tree_cm_sha" id="c_tree_cm_sha" value="">
		</form>
	<form id="c_tree_form" action="" method="post">
  		<input type="hidden" name="repo_c_tree" id="repo_c_tree" value="">
		<input type="hidden" name="c_tree_sha" id="c_tree_sha" value="">
	</form>
	<form id="c_sha_form" action="" method="post">
  		<input type="hidden" name="repo_c_sha" id="repo_c_sha" value="">
		<input type="hidden" name="c_sha" id="c_sha" value="">
	</form>
	<form id="commit_form" action="" method="post">
  		<input type="hidden" name="repo_c" id="repo_c" value="">
		<input type="hidden" name="commit" id="commit" value="">
	</form>
	<form id="branch_form" action="" method="post">
  		<input type="hidden" name="repo_b" id="repo_b" value="">
		<input type="hidden" name="branch" id="branch" value="">
	</form>
<script>
	
	function submit_c_blob(sha, repo) {
		//alert("clicked repo submit");
	     document.getElementById("repo_c_blob").value = repo;
		 document.getElementById("c_blob_sha").value = sha;
		 document.getElementById("c_blob_form").submit();
	}
	function submit_c_tree_cm(sha, msg, repo) {
		//alert("clicked repo submit");
	     document.getElementById("repo_c_tree_cm").value = repo;
		 document.getElementById("c_tree_cm_msg").value = msg;
		 document.getElementById("c_tree_cm_sha").value = sha;
		 document.getElementById("c_tree_cm_form").submit();
	}
	function submit_c_tree(sha, repo) {
		//alert("clicked repo submit");
	     document.getElementById("repo_c_tree").value = repo;
		 document.getElementById("c_tree_sha").value = sha;
		 document.getElementById("c_tree_form").submit();
	}
	function submit_c_sha(sha, repo_c_sha) {
		//alert("clicked repo submit");
	     document.getElementById("repo_c_sha").value = repo_c_sha;
		 document.getElementById("c_sha").value = sha;
		 document.getElementById("c_sha_form").submit();
	}
	function submit_commit(repo) {
		//alert("clicked repo submit");
	     document.getElementById("repo_c").value = repo;
		 document.getElementById("commit").value = "Y";
		 document.getElementById("commit_form").submit();
	}
	function submit_branch(repo) {
		//alert("clicked file submit");
     document.getElementById("repo_b").value = repo;
	 document.getElementById("branch").value = "Y";
	 document.getElementById("branch_form").submit();
	}
</script>
<?php ?>