<?php

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'contents/');

	
	$my_files = $api->decode($response);
	//print $my_files;
	//print_r($my_repos);
	if(!empty($my_files)){
		foreach($my_files as $file){
		 ?>
				<a href="#" onclick="submit_file('<?php echo $file->name; ?>', <?php echo $repo?>);return false;"><?php echo $file->name;?></a><br>
			<?php
		}
	}
	?>