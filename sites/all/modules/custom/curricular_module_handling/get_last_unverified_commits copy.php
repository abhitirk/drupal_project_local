<?php

require_once 'vendor/autoload.php';
require_once 'auth.php';

$repo = $module_no;
$format2 = 'c';
// $result2 = db_query("SELECT title, changed FROM '1' ORDER BY changed DESC");
$node = node_load($repo);
$output2 = date($format2, $node->changed);
$since_datetime = substr($output2, 0, 19)."Z";

$parameters = ['since' => $since_datetime,];

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'commits/', $parameters);


	$my_commits = $api->decode($response);
	if(!empty($my_commits) && count($my_commits)>1){
		echo "<h2>Last Unverified Commits</h2>";
		foreach(array_slice($my_commits,1) as $com){
			
			$html_url = $com->html_url;
			echo '<li class="leaf">';
			echo '<b>'.$com->sha.'</b>';
			echo '<div class="description">';?>
			<a href="<?php echo $html_url?>">View commit on GitHub</a>
			<?php 
			echo '</div>';
			echo '</li>';
		}
	}
	?>