<?php
// Template file to display the details of the specific pending module.

$module_directory = drupal_get_path('module', 'curricular_module_handling');
include $module_directory."/parsedown/Parsedown.php";
include $module_directory."/parsedown-extra/ParsedownExtra.php";
echo $text_one;
$parsedown = new ParsedownExtra();
		
// Main code for the template starts here.
	try {
		
		if (file_exists($module_directory.'/cm_files'.'/'.$module_no.'/general_information.txt')) {
			$file = $module_directory.'/cm_files'.'/'.$module_no.'/general_information.txt';
			$file_contents = file_get_contents($file);
			
			$str = $parsedown->text($file_contents);
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/version_info.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/version_info.xml') or die("Error: Cannot create object");
			//$xml = new SimpleXMLElement($xml_file);
			$title = $xml[0]['title'];
			$version = $xml->subheading[0]->row[0];
			$date = $xml->subheading[0]->row[1];
			$time = $xml->subheading[0]->row[2];
			$str = "<h1>".$title."</h1><br><br>";
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/general_info.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/general_info.xml') or die("Error: Cannot create object");
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
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/learning_objectives.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/learning_objectives.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/topics.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/topics.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/preparation.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/preparation.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/discussion.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/discussion.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/practice.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/practice.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/reflection.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/reflection.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/other_resources.xml')) {
			
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/other_resources.xml') or die("Error: Cannot create object");
			$sub_title = $xml->subheading[0]['title'];
			$str .= "<h2>".$sub_title."</h2>";
			
			$str .= "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".$rows."</li>";
			}
			$str .= "</ul>";
			$str .= "<br>";
			
		}
	} 
	catch (Exception $e) {
	    $str = 'Caught exception: '.$e->getMessage()."\n";
	}
	echo $str;
?>
<h2 align="center">Verify Update?</h2>
	<form action="" method="post">
		<input type="hidden" value="<?php echo $module_no;?>" name="form_module_no">
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
