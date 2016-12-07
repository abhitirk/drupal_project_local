<?php

$module_path = drupal_get_path('module', 'curricular_module_handling');
require_once $module_path.'/vendor/autoload.php';
require_once 'auth.php';

$repo = $module_no;

$file_path = drupal_get_path('module', 'curricular_module_handling').DIRECTORY_SEPARATOR."last_synced_commits".DIRECTORY_SEPARATOR.$repo.'.txt';
$handle = fopen($file_path, "rw") or die("can't open file");
$last_synced_sha = fread($handle, filesize($file_path));
$last_synced_sha = trim($last_synced_sha);
fclose($handle);

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'commits/');
$my_commits = $api->decode($response);
	
$header_flag = 0;	
	foreach(array_slice($my_commits,1) as $com){
		
		if($com->sha == $last_synced_sha)
			break;
		if($header_flag == 0){
			echo "<h2>Last Unverified Commits</h2>";
			$header_flag = 1;
		}
			
		$html_url = $com->html_url;
		echo '<li class="leaf">';
		echo '<b>'.$com->commit->message.'</b>&nbsp;|&nbsp;<i>'.substr($com->sha, 0, 6).'...</i>';
		echo '<div class="description">';?>
		<a href="<?php echo $html_url?>" target="_blank">View commit on GitHub</a>
		<?php 
		echo '</div>';
		echo '</li>';
	}
	?>