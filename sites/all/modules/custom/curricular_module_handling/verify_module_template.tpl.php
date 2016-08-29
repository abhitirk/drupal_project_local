<?php

	if(isset($_POST['yes'])){
		dpm(node_load(1));
		//curricular_module_handling_set_message('Yes clicked.');
		$node = node_load(1);
		$l = $node->language;
		$node->title = "Software Enterprise Something";
		$node->field_guidelines_for_instructors[$l][0]['value'] = "Interesting guidelines";
		$node->revision = TRUE; // Create new revision
		$node->revision_moderation = TRUE; // make the new revision pending review
		$node->log = "Update via verify update"; // Log message
		node_save($node);
		$noderevisions = node_revision_list($node); // or node_revision_list(node_load($nid));
		print_r($noderevisions);
		/*$node_wrapper = entity_metadata_wrapper('node', $node);
		$node_wrapper->title->set("Something's yo right");
		$node_wrapper->field_guidelines_for_instructors = "Something is right";
		$node_wrapper->save();*/
	}
	else if(isset($_POST['later'])){
		curricular_module_handling_set_message('Later clicked.');	}
	else if(isset($_POST['disregard'])){
		curricular_module_handling_set_message('Disregard clicked.');	}
/* The template file for verify module */
	try {
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/version_info.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/version_info.xml') or die("Error: Cannot create object");
			//$xml = new SimpleXMLElement($xml_file);
			$title = $xml[0]['title'];
			$version = $xml->subheading[0]->row[0];
			$date = $xml->subheading[0]->row[1];
			$time = $xml->subheading[0]->row[2];
			$str = "<h1>".$title."</h1><br><br>";
		}
		else {
			$str = drupal_get_path('module', 'curricular_module_handling') . '/version_info.xml';
		}	
		
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/general_info.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/general_info.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<table border='1'>";
			$str .= "<tr><td>Title</td><td>".$title."</td>";
			
			$submitted_by = $xml->subheading[0]->row[0];
			$str .= "<tr><td>Version Info</td><td>Version ".$version.", submitted by ".$submitted_by." on ".$date." at ".$time."</td>";
			$count = count($xml->subheading[0]->children());
			//echo "<tr><td>count: ".$count."</td></tr>"; 
			for($i = 1; $i < $count; $i++){
				$str .= "<tr>";
				$str .= "<td>".$xml->subheading[0]->row[$i]['title'].'</td>';
				$str .= "<td>".$xml->subheading[0]->row[$i].'</td>';
				$str .= "</tr>";
			}
			$str .= "</table><br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/learning_objectives.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/learning_objectives.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/topics.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/topics.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/preparation.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/preparation.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/discussion.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/discussion.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/practice.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/practice.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/reflection.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/reflection.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/other_resources.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/other_resources.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
			
			//$xml_version_info = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/version_info.xml') or die("Error: Cannot create object");
	  
			//print_r($xml);
			/*$str = "<h1>".$xml_version_info[0]['title']."</h1><br><br>";
			foreach($xml_version_info as $key0 => $value){
				echo "..1..[$key0] => $value";
				foreach($value->attributes() as $attributeskey0 => $attributesvalue1){
					echo "________[$attributeskey0] = $attributesvalue1";
					}
				echo '<br />';
			}*/
			//$version = $xml_version_info[]
			//$i = 0;
			/*if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/xml/general_info.xml')) {
				$xml_general_info = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/xml/general_info.xml') or die("Error: Cannot create object");
				foreach($xml->children() as $sub){
					$str .= "<h2>".$sub['title']."</h2><br>";
				}
			}*/
			/*foreach($xml->children() as $sub){
				if($sub['title']!='Version Info'){
				$str .= "<h2>".$sub['title']."</h2><br>";
	
					if($i == 0){
						$str .= "<table border='1'>";
						foreach ($sub->children() as $rows){
							$str .= "<tr>";
							$str .= "<td>".$rows['title'].'</td>';
							$str .= "<td>".$rows.'</td>';
							$str .= "</tr>";
						}
						$str .= "</table><br>";
						$i++;
					}
					else{
						$str .= "<ul>";
						foreach ($sub->children() as $rows){
							$str .= "<li>".$rows."</li>";
						}
						$str .= "</ul>";
					}
					$str .= "<br>";
				}
			}*/
	} 
	catch (Exception $e) {
	    $str = 'Caught exception: '.$e->getMessage()."\n";
	}
	echo $str;
?>
<h2 align="center">Verify Update?</h2>
	<form action="" method="post">
  		<button class="button" value="yes" name="yes" type="submit">Yes</button>
  <!-- <button class="button" value="later" name="later" onclick="window.location.href='../curricular_module_versioning/'" >Not Now</button> -->
  		<button class="button" value="later" name="later" type="submit">Not Now</button>
  		<button class="button" value="disregard" name="disregard" type="submit">Disregard</button>
	</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
/*$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        //alert(clickBtnValue+" has been clicked...");
        var ajaxurl = 'ajax_button_handler.php',
        dt =  {'action': clickBtnValue};

        $.ajax({
      		url: ajaxurl,
      		type: 'post',
      		data: {'action': clickBtnValue},
      		success: function(data) {
       		 	// alert(data);
     		 },
      		error: function(xhr, desc, err) {
       		 console.log(xhr);
       		 console.log("Details: " + desc + "\nError:" + err);
      		}
    	}); // end ajax call
    });

});*/
</script>
