<?php
$basepath = drupal_get_path('module', 'curricular_module_handling');
$pagetype = 'view';
$filename = drupal_get_path('module', 'curricular_module_handling')."/sample.txt";
$handle = fopen($filename, "rw");

if(isset($_POST['submit'])){
  $the_file = $_REQUEST['file'];
  $repo = $_REQUEST['repo'];
  $the_path = 'repos/software-enterprise-asu/'.$repo.'/contents'.'/'.$the_file;
  
	if(isset($_POST['content'])){
	  $c=stripslashes($_POST['content']);
	  if(file_put_contents($filename, $c)){
		  //require_once '../vendor/autoload.php';
		  //require_once '../auth.php';
		  /*
		  $response = $api->get($the_path);
		  
		  $my_file = $api->decode($response);
		  $sha = $my_file->sha;
		  $the_content = base64_encode($c);

		  $message = 'Updated the file named: '.$my_file->name;

		  $parameters = [
		      'message' => $message,
		      'content' => $the_content,
		  	'sha' => $sha,
		  ];
	   
		  $response = $api->put($the_path, $parameters);
		  $str = $message;*/
	  }
	}
}


$content = fread($handle, filesize($filename));
fclose($handle);
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>online markdown editor</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link type="text/css" rel="stylesheet" href="<?php echo $basepath ?>/editor/wmd/docs/wmd.css"/>
  <link type="text/css" rel="stylesheet" href="<?php echo $basepath ?>/editor/screen.css"/>
  <link type="text/css" rel="stylesheet" href="<?php echo $basepath ?>/editor/preview.css"/>  
	<script type="text/javascript" src="<?php echo $basepath ?>/editor/wmd/lib/showdown.js"></script>
	<script type="text/javascript" src="<?php echo $basepath ?>/editor/wmd/docs/wmd.js"></script>    

    <script type="text/javascript">
	window.onload = function() {
	    new WMD("input", "toolbar", { preview: "preview" });
	};
    </script>
    
  </head>
  <body class="<?php echo $pagetype ?>">

  <div class="pg">
    <div class="bd">
      <div class="editor">
		  <?php echo $str; ?>
        <form method="POST" action="index.php">
	        <div id="toolbar" class="wmd-toolbar"></div>
			<input type="hidden" name="repo" value="<?php echo $_GET['rep'];?>">
			<input type="hidden" name="file" value="<?php echo base64_decode($_GET['file']);?>">
	        <textarea name="content" id="input" class="wmd-input" rows="20" cols="100"><?php echo $content ?></textarea>
          <input type="submit" name="submit" value="Save" />
        </form>
	    </div>
	    
            <?php echo $before_preview ?>
	    <div id="preview" class="wmd-preview"></div>
    </div>  
  </div>

  </body>
</html>

