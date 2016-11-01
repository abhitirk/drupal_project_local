<?php 
$filename = drupal_get_path('module', 'curricular_module_handling')."/sample.txt";
$handle = fopen($filename, "rw");
$content = fread($handle, filesize($filename));
//echo " sdfasdfasd: ".$content;
fclose($handle);

/*if(isset($_POST['submit'])){
  $the_file = $_REQUEST['file'];
  $repo = $_REQUEST['repo'];
  $the_path = 'repos/software-enterprise-asu/'.$repo.'/contents'.'/'.$the_file;
  
	if(isset($_POST['content'])){
	  $c=stripslashes($_POST['content']);
	  if(file_put_contents($filename, $c)){
		  //require_once '../vendor/autoload.php';
		  //require_once '../auth.php';
		  
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
		  $str = $message;
	  }
	}
}*/
?>
        
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <form id="level3_form" method="POST" action="">
		<input type="hidden" name="repos" id="repos" value="<?php echo $rep;?>">
		<input type="hidden" name="filename" id="filename" value="<?php echo $file;?>">
		<input type="hidden" name="con" id="con" value="<?php echo $content;?>">
		<textarea name="textinput" id="textinput"></textarea>
      <input type="button" name="submit_markdown" id="submit_markdown" value="Save" class="form-submit" onclick="submitFunction();"/>
    </form>
<script>
	var simplemde = new SimpleMDE();
	var con = document.getElementById('con').value;
	simplemde.value(con);
	
	function submitFunction(){
		var file_contents = simplemde.value();
		if(file_contents==null){
			alert("Textfield is empty.");
		}
		document.getElementById('con').value = file_contents;
		document.getElementById('level3_form').submit();
	}
</script>