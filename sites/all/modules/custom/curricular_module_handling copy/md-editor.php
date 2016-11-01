<?php 
$basepath = 'editor/';
$pagetype = 'view';
$before_preview = '<p class="edit-link"><a href="editor?rep='.$rep.'&file='.base64_encode($file).'">Edit this document</a></p>';
include('editor/index.php'); 
?>
  
