<?php

// Theme template file for the pending modules section of the CM Handling module.

	//dpm(node_load(1));
	if(isset($_POST['module_no'])){
		//echo "hahahaha ".$_POST['module_no'];
		/*$tpl_data = array(
		    'module_no' => $_POST['module_no'],
		);*/
		//return theme('verify_module_template', $tpl_data);
		$module_no = $_POST['module_no'];
		include "verify_module_template.tpl.php";
	}
	else{
		if(isset($_POST['yes'])){
			$module_no = $_POST['form_module_no'];
			echo "yes clicked. : ".$module_no;
			include "cm_make_update2.php";
		}
		else if(isset($_POST['later'])){
			echo "later clicked. : ".$_POST['form_module_no'];
		}
		else if(isset($_POST['disregard'])){
			$module_no = $_POST['form_module_no'];
			echo "disregard clicked. : ".$_POST['form_module_no'];
			// Delete directory specific to the module_no
			$dir = drupal_get_path('module', 'curricular_module_handling').DIRECTORY_SEPARATOR. "cm_files".DIRECTORY_SEPARATOR.$module_no;
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
		}
		echo '<ul class="admin-list">';
		for($i = 1; $i < 10; $i++){
			$directory = drupal_get_path('module', 'curricular_module_handling') . "/cm_files"."/".$i;
			if(file_exists($directory)){
				echo '<li class="leaf">';
				echo '<a href="#" onclick="Submit_to_form('.$i.');return false;">Module '.$i.'</a>';
				echo '</li>';
			}
		}
	echo '</ul>';
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