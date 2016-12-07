<?php

$response = $api->get('repos/software-enterprise-asu/'.$repo.'/'.'compare/'.$base.'...'$head);
	
//$my_file = $api->decode($response);	
	//$my_commits = $api->decode($response);
	//var_dump($response->getContent());
	$my_commit = $api->decode($response);
	$files = $my_commit->files;
	?>
	<!--<link rel="stylesheet" type="text/css" href=">view_commit.css">-->
	<style>
	.line-type-removed {background-color: #FFBDBD;}
	.line-type-added   {background-color: #BDFFD0;}
	.full-commit {
	    padding: 8px 8px 0;
	    margin: 10px 0;
	    font-size: 14px;
	    background: #e6f1f6;
	    border: 1px solid #c5d5dd;
	    border-radius: 3px;
	}
	.float-right {
	    float: right !important;
	}
	.btn {
	    position: relative;
	    display: inline-block;
	    padding: 2px 12px;
	    font-size: 14px;
	    font-weight: 600;
	    line-height: 20px;
	    color: #333;
	    white-space: nowrap;
	    vertical-align: middle;
	    cursor: pointer;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	    background-color: #eee;
	    background-image: -webkit-linear-gradient(#fcfcfc, #eee);
	    background-image: linear-gradient(#fcfcfc, #eee);
	    border: 1px solid #d5d5d5;
	    border-radius: 3px;
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    appearance: none;
	}
	.btn-outline {
	    color: #4078c0;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #e5e5e5;
	}
	.full-commit .btn-outline, .full-commit .btn-outline:disabled {
	    background-color: transparent;
	    border: 1px solid #cedee5;
	}
	.full-commit p.commit-title {
	    margin: 0 0 8px;
	    font-size: 18px;
	    font-weight: bold;
	    color: #213f4d;
	}
	.full-commit .commit-meta {
	    padding: 8px;
	    margin-right: -8px;
	    margin-left: -8px;
	    background: #fff;
	    border-top: 1px solid #d8e6ec;
	    border-bottom-right-radius: 3px;
	    border-bottom-left-radius: 3px;
	}
	.commit-author-section {
	    color: #333;
	}
	.user-mention, .team-mention {
	    font-weight: 600;
	    color: #333;
	    white-space: nowrap;
	}
	</style>
	<?php
	//echo "<h3>No of changed files :".sizeof($files)."</h3>";
	foreach($files as $file){
		//echo "<h3>Filename: ".$file->filename."</h3>";
		$file_patch = $file->patch;
		?>
		<div><h4><?php echo $file->filename;?></h4>
		           <?php
		            $firstLine = true;
		            $patch = explode("@@",$file_patch);
		            $lines_info = explode(",",$patch[1]);
		            $st_ln_num = substr($lines_info[0], 2);
		            $start_line['original'] = $st_ln_num;
		            $start_line['left'] = $st_ln_num;
		            $start_line['right'] = $st_ln_num;
		            $lines = explode("\n",$file_patch);
		            ?>
		            <div style="overflow: auto">
		            <table class="parseDiff" cellpadding="0" cellspacing="0">
		                <?php foreach ($lines as $line) {
		                    if (! $firstLine) {
		                            $line_left = "";
		                            $line_right = "";
		                            $char = strlen($line) ? $line[0] : '~';
		                            $type = "neutral";
		                            switch ($char) {
		                                case '-':
		                                    $line_left = $start_line['left']++;
		                                    $type = "removed";
		                                    $line = $line;
		                                    break;
		                                case '+':
		                                    $line_right = $start_line['right']++;
		                                    $type = "added";
		                                    $line = $line;
		                                    break;
		                                default:
		                                    $line_left = $start_line['left']++;
		                                    $line_right = $start_line['right']++;
		                                    $type = "neutral";
		                                    break;
		                            }
		                    ?>
		                    <tr class="line-type-<?=$type?>">
		                        <td class="line-number line-number-left"><?=$line_left?></td>
		                        <td class="line-number line-number-right"><?=$line_right?></td>
		                        <td class="line-code"><pre><?=htmlspecialchars($line)?></pre></td>
		                    </tr>
		                <?php
		                    } else {
		                ?>
		                    <tr class="line-type-first">
		                        <td class="line-number  line-number-left">&middot;&middot;&middot;</td>
		                        <td class="line-number  line-number-right">&middot;&middot;&middot;</td>
		                        <td class="line-code"><pre><?=htmlspecialchars($line)?></pre></td>
		                    </tr>
		                <?php
		                        $firstLine = false;
		                    } // end if firstLine
		                } // end foreach
		                ?>
		            </table>
		            </div>
		        </div>
		<?php 
	}
	//echo $file_patch;
	//$content = base64_decode($my_file->content);
	//var_dump($response->getHeader('Accept-Encoding', 'application/vnd.github.VERSION.diff'));
	//echo $content;
	//print $my_files;
	//print_r($my_repos);
	/*if(!empty($my_commits)){
		foreach($my_commits as $com){
			//print '<a href="main.php?rep='.$repo.'&file='.$file->name'">'.$file->name.'</a><br>';
			print '<a href="#">'.$com->commit->message.'</a><br>';
		}
	}*/
		?>
		