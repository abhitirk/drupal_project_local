<?php

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'branches/');

	
	$my_branches = $api->decode($response);
	//print $my_files;
	//print_r($my_repos);
	if(!empty($my_branches)){
		foreach($my_branches as $branch){
			$sha = $branch->commit->sha;
			echo '<li class="leaf">';
			echo '<h4>'.$branch->name.'</h4>';
			echo '<div class="description">';?>
			<a href="#" onclick="submit_c_sha('<?php echo $sha;?>', <?php echo $repo;?>);return false;">View branch</a>
			<?php 
			echo '</div>';
			echo '</li>';
		}
	}
	?>