<?php


$response = $api->get('users/software-enterprise-asu/repos');
$my_repos = $api->decode($response);

if(!empty($my_repos)){
	echo '<ul class="admin-list">';
	foreach($my_repos as $repo){
		echo '<li class="leaf">';
		echo '<a href="#" onclick="submit_repo('.$repo->name.');return false;">'.$repo->description.'</a>';
		echo '</li>';
	}
	echo '</ul>';
}

?>
