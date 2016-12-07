<?php
// Theme template file for the pending modules section of the CM Handling module.

	//dpm(node_load(1));
	if(isset($_POST['module_no'])){
		$module_no = $_POST['module_no'];
		include "verify_module_template.tpl.php";
	}
	else{
		if(isset($_POST['yes'])){
			$module_no = $_POST['form_module_no'];
			$tag = $_POST['tag'];
			
			include "cm_make_update_site.php";
			
			$dir = drupal_get_path('module', 'curricular_module_handling').DIRECTORY_SEPARATOR. "pull_folder".DIRECTORY_SEPARATOR.$module_no;
			$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
			$files = new RecursiveIteratorIterator($it,
			             RecursiveIteratorIterator::CHILD_FIRST);
			foreach($files as $file) {
			    if ($file->isDir()){
			        rmdir($file->getRealPath());
			    } else {
			        unlink($file->getRealPath());
			    }
			}
			rmdir($dir);
			
			include "write_tag.php";
			
		  	$node = node_load($module_no+49);
			$node_wrapper = entity_metadata_wrapper('node', $node);
			
			$msg = 'Successfully updated the Curricular Module named: '.$node_wrapper->title->value();
			echo '<div class="messages status">'.$msg.'</div>';
		}
		else if(isset($_POST['later'])){
			//echo "later clicked. : ".$_POST['form_module_no'];
		}
		else if(isset($_POST['disregard'])){
			$module_no = $_POST['form_module_no'];
			try{
				
				$dir = drupal_get_path('module', 'curricular_module_handling').DIRECTORY_SEPARATOR. "pull_folder".DIRECTORY_SEPARATOR.$module_no;
				$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
				$files = new RecursiveIteratorIterator($it,
				             RecursiveIteratorIterator::CHILD_FIRST);
				foreach($files as $file) {
				    if ($file->isDir()){
				        rmdir($file->getRealPath());
				    } else {
				        unlink($file->getRealPath());
				    }
				}
				rmdir($dir);
				
				include "reset_to_last_commit.php";
				
			  	$node = node_load($module_no+49);
				$node_wrapper = entity_metadata_wrapper('node', $node);
			
				$msg = 'Discarded pending changes to Curricular Module named: '.$node_wrapper->title->value();
				echo '<div class="messages status">'.$msg.'</div>';
			} catch (Exception $e){
				 echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			
		}
		$content_type = 'curricular_modules';
		
	    $query = "SELECT COUNT(*) amount FROM {node} n ".
	                 "WHERE n.type = :type";
	        $result = db_query($query, array(':type' => $content_type))->fetch();
			$count = $result->amount;
			
		$flag = 'N';
			echo '<ul class="admin-list">';
			for($i = 1; $i < $count; $i++){
				$directory = drupal_get_path('module', 'curricular_module_handling') . "/pull_folder"."/".$i;
				if(file_exists($directory)){
					$flag = 'Y';
				  	$node = node_load($i+49);
					$node_wrapper = entity_metadata_wrapper('node', $node);
					echo '<li class="leaf">';
					echo '<a href="#" onclick="Submit_to_form('.$i.');return false;" target="_blank">'.$node_wrapper->title->value().'</a>';
					echo '</li>';
				}
			}
		echo '</ul>';
		if ($flag=='N'){
			echo "<h2>No pending modules to be verified.</h2>";
		}
?>
	<form id="pending_form" action="" method="post">
  		<input type="hidden" name="module_no" id="module_no" value="">
	</form>
<script>
	function Submit_to_form(module_no) {
	     document.getElementById("module_no").value = module_no;
		 document.getElementById("pending_form").submit();
	}
</script>
<?php }?>