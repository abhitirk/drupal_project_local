<?php

// Set Variables
$LOCAL_ROOT         = '../';
$LOCAL_REPO_NAME    = "1";
$LOCAL_REPO         = "../pull_folder/";
$REMOTE_REPO        = "https://github.com/software-enterprise-asu/1.git";
$BRANCH             = "master";

if ($_SERVER['HTTP_X_GITHUB_EVENT'] == 'push') {

  $payload = json_decode( file_get_contents('php://input') );
  $repo = $payload->repository->name;
  $last_sha = trim($payload->before);
  $current_sha = trim($payload->after);
  
  $file_path = 'last_commits/'.$repo.'.txt';
  $handle = fopen($file_path, "rw") or die("can't open file");
  $file_content = fread($handle, filesize($file_path));
  $file_content = trim($file_content);
  fclose($handle);
  
  $LOCAL_REPO = "../pull_folder/".$repo;
	  if(file_exists($LOCAL_REPO) ) {
		$cmd = "cd ".$repo." && git pull";
	    // If there is already a repo, just run a git pull to grab the latest changes
	    shell_exec($cmd);
		/*$file_path = 'last_commits/'.$repo.'.txt';
		$file_md = fopen($file_path, 'w') or die("can't open file");
		fclose($file_md);
	    file_put_contents($file_path, $current_sha);
	    die("done " . mktime());*/
	  } else {
	    // If the repo does not exist, then clone it into the parent directory
			$cmd = "git clone https://github.com/software-enterprise-asu/".$repo.".git ".$repo;
			shell_exec($cmd); 
			/*$file_path = 'last_commits/'.$repo.'.txt';
			$file_md = fopen($file_path, 'w') or die("can't open file");
			fclose($file_md);
		    file_put_contents($file_path, $current_sha);*/
	
	    die("done " . mktime());
	 }
}
?>