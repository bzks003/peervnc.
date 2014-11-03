<?php
	header("Access-Control-Allow-Origin: *");
	session_start();
	foreach(array('video') as $type) {
		if (isset($_FILES["${type}-blob"])) {
	
			$fileName = $_POST["${type}-filename"];
			$uploadDirectory = "/var/www/workflow/uploads/$fileName";
	
			if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory)) {
				echo("problem moving uploaded file");
			} 
			
			echo($uploadDirectory);
		}
	}
?>
