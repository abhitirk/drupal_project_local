<?php
// This file peforms update on the respective CM node while reading from the xml's.
	
	
	//dpm(node_load($module_no));
	//curricular_module_handling_set_message('Yes clicked.');
	//$node = node_load($module_no);
  	$node = node_load($module_no);
  	$l = $node->language;
	
	$version = "";
	$date = "";
	$time = "";
	
	if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/version_info.xml')) {
	
		$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/version_info.xml') or die("Error: Cannot create object");
		//$xml = new SimpleXMLElement($xml_file);
		$title = (string)$xml[0]['title'];
		$version = (string)$xml->subheading[0]->row[0];
		$date = (string)$xml->subheading[0]->row[1];
		$time = (string)$xml->subheading[0]->row[2];
	
		$node->title = $title;
	}
	
	if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/general_info.xml')) {
	
		$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/general_info.xml') or die("Error: Cannot create object");
	
		$submitted_by = (string)$xml->subheading[0]->row[0];
		$version_info = "Version ".$version.", submitted by ".$submitted_by." on ".$date." at ".$time;
		$count = count($xml->subheading[0]->children());
		//echo "<tr><td>count: ".$count."</td></tr>"; 
		for($i = 1; $i < $count; $i++){
			$field_values[$i] = (string)$xml->subheading[0]->row[$i];
		}
	
	
		$yourtable = array(
		    'cell_0_0' => "",
		    'cell_0_1' => "",
		    'cell_1_0' => "Title",
		    'cell_1_1' => $title,
		    'cell_2_0' => "Version Info",
		    'cell_2_1' => $version_info,
		    'cell_3_0' => "Author",
		    'cell_3_1' => $field_values[1],
		    'cell_4_0' => "Mapping to Content Taxonomy",
		    'cell_4_1' => $field_values[2],
		    'cell_5_0' => "Abstract",
		    'cell_5_1' => $field_values[3],
		    'cell_6_0' => "Size",
		    'cell_6_1' => $field_values[4],
		    'cell_7_0' => "Comments",
		    'cell_7_1' => $field_values[5],
		    'rebuild' =>
		      array(
		        'count_cols' => '2',
		        'count_rows' => '8',
		        'rebuild' => 'Rebuild Table',
		      ),
		    'import' =>
		      array (
		      'tablefield_csv_field_mytablefield_0' => '',
		      'rebuild_field_mytablefield_0' => 'Upload CSV',
		      ),
		  );
	 
		  $foo = serialize($yourtable);
		  
		  $node->field_general_information[$l][0]['value'] = $foo;
	  }
	  
	if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/guidelines_for_instructors.xml')) {
	
		$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/guidelines_for_instructors.xml') or die("Error: Cannot create object");
		
		$str = "<ul>";
		foreach ($xml->subheading[0]->children() as $rows){
			$str .= "<li>".(string)$rows."</li>";
		}
		$str .= "</ul>";
		
		$node->field_guidelines_for_instructors[$l][0]['value'] = $str;
 	}
	  
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/learning_objectives.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/learning_objectives.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_learning_objectives[$l][0]['value'] = $str;
	 	}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/topics.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/topics.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_topics[$l][0]['value'] = $str;
	 	}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/preperation.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/preperation.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_preperation[$l][0]['value'] = $str;
	 	}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/discussion.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/discussion.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_discussion[$l][0]['value'] = $str;
	 	}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/practice.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/practice.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_practice[$l][0]['value'] = $str;
	 	}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/projects.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/projects.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_projects[$l][0]['value'] = $str;
	 	}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/reflection.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/reflection.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_reflection[$l][0]['value'] = $str;
	 	}
		
		if (file_exists(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/other_resources.xml')) {
		
			$xml = simplexml_load_file(drupal_get_path('module', 'curricular_module_handling') . '/cm_files'.'/'.$module_no.'/other_resources.xml') or die("Error: Cannot create object");
			
			$str = "<ul>";
			foreach ($xml->subheading[0]->children() as $rows){
				$str .= "<li>".(string)$rows."</li>";
			}
			$str .= "</ul>";
			
			$node->field_other_resources[$l][0]['value'] = $str;
	 	}
	  node_save($node);
	/*$l = $node->language;
	$node->title = "Software Enterprise Something";
	$node->field_guidelines_for_instructors[$l][0]['value'] = "Interesting guidelines";
	$node->revision = TRUE; // Create new revision
	$node->revision_moderation = TRUE; // make the new revision pending review
	$node->log = "Update via verify update"; // Log message
	node_save($node);
	$noderevisions = node_revision_list($node); // or node_revision_list(node_load($nid));
	print_r($noderevisions);*/
?>