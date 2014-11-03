<?php 
	header("Access-Control-Allow-Origin: *");
	session_start();
	
	if ($_POST['dir']!="") {
		$upload_dir = '/var/www/workflow/uploads/tmp/';
	} else {
 		$upload_dir = '/var/www/workflow/uploads/';
	}
	
	$img = $_POST['base64data'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = $upload_dir.$_POST['filename'];
	$success = file_put_contents($file, $data);
	echo "SUCCESS => ".$success."\n";
	echo "file => ".$file."\n";
?>