<?php

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'git/trees/'.$sha);

	
	$my_tree = $api->decode($response);
	$trees = $my_tree->tree;
	//print $my_files;
	//print_r($my_repos);
	if(!empty($trees)){
		foreach($trees as $blob){
		 ?>
				<a href="#" onclick="submit_c_blob('<?php echo $blob->sha; ?>', <?php echo $repo?>);return false;"><?php echo $blob->path;?></a><br>
			<?php
		}
	}
	?>