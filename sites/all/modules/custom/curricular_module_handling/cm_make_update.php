<?php
	
	//dpm(node_load($module_no));
	//curricular_module_handling_set_message('Yes clicked.');
	//$node = node_load($module_no);
	$yourtable = array(
	    'cell_0_0' => "",
	    'cell_0_1' => "",
	    'cell_1_0' => "Title",
	    'cell_1_1' => "rowA",
	    'cell_2_0' => "Version Info",
	    'cell_2_1' => "rowB",
	    'cell_3_0' => "Author",
	    'cell_3_1' => "rowC",
	    'cell_4_0' => "Mapping to Content Taxonomy",
	    'cell_4_1' => "rowD",
	    'cell_5_0' => "Abstract",
	    'cell_5_1' => "rowE",
	    'cell_6_0' => "Size",
	    'cell_6_1' => "rowF",
	    'cell_7_0' => "Comments",
	    'cell_7_1' => "rowG",
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
	  
   
	  $node = node_load($module_no);
	  $foo = serialize($yourtable);
	  $l = $node->language;
	  $node->field_general_information[$l][0]['value'] = $foo;
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