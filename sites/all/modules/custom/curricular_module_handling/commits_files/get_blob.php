<?php

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'git/blobs/'.$sha);


	$my_blob = $api->decode($response);
	//print "Filename: ".$my_file->name."<br>";
	//print "Content: <br>";
	//print base64_decode($my_file->content);
	$content = base64_decode($my_blob->content);
	//echo $content;
	/*$file_path = drupal_get_path('module', 'curricular_module_handling').'/sample.txt';
	$file_md = fopen($file_path, 'w') or die("can't open file");
	fclose($file_md);
    file_put_contents($file_path, $content);*/
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <form id="level3_form" method="POST" action="">
		<input type="hidden" name="repos" id="repos" value="<?php echo $rep;?>">
		<input type="hidden" name="filename" id="filename" value="<?php echo $file;?>">
		<input type="hidden" name="con" id="con" value="<?php echo $content;?>">
		<textarea name="textinput" id="textinput"></textarea>
    </form>
<script>
	var simplemde = new SimpleMDE({toolbar: ["preview"],});
	var con = document.getElementById('con').value;
	simplemde.value(con);
</script>