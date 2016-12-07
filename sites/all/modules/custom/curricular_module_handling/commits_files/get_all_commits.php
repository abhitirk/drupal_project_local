<?php
$format2 = 'c';
// $result2 = db_query("SELECT title, changed FROM '1' ORDER BY changed DESC");
$node = node_load($repo);
 $output2 = date($format2, $node->changed);
 $since_datetime = substr($output2, 0, 19)."Z";

$parameters = ['since' => $since_datetime,];

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'commits/', $parameters);


	$my_commits = $api->decode($response);
	//print $my_files;
	//print_r($my_repos);
	if(!empty($my_commits)){
		foreach($my_commits as $com){
			$datetime = rtrim($com->commit->committer->date, ",");
			$datetime = $datetime.'+00:00';
			$time_elapsed = time_elapsed_string($datetime);
			$sha = $com->sha;
			echo '<li class="leaf">';
			echo '<h4>'.$com->commit->message.'</h4>';
			echo '<div class="description">';?>
			Committer: <?php echo $com->commit->committer->name; ?>&nbsp;|&nbsp; Datetime: <?php echo $time_elapsed;?>&nbsp;<a href="#" onclick="submit_c_sha('<?php echo $sha;?>', <?php echo $repo;?>);return false;">View commit</a>
			<?php 
			echo '</div>';
			echo '</li>';
		}
	}
	?>