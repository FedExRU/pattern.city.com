<?php 
	
	if($_GET['source'] == 'app'){
		$code = file_get_contents($_GET['actionSource'].".php");
	}
	if($_GET['pattern'] == 'app'){
		$code = file_get_contents('../class/'.$_GET['actionSource'].".php");
	}

	highlight_string($code);

?>