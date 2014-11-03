<?php
	header("Access-Control-Allow-Origin: *");	
	// ffmpeg -i "concat:input1.mpg|input2.mpg|input3.mpg" -c copy output.mpg
	// ffmpeg -f concat -i <(for f in ./*.wav; do echo "file '$f'"; done) -c copy output.wav
	// ffmpeg -f concat -i <(printf "file '%s'\n" ./*.wav) -c copy output.wav
	// ffmpeg -f concat -i <(find . -name '*.wav' -printf "file '%p'\n") -c copy output.wav
	
	$randomId = $_POST["randomId"];
	$slices_count = $_POST["slices_count"];
	$filename = $_POST["filename"];
	
	$ffmpeg_cmd_path = "/var/www/workflow/ffmpeg/ffmpeg";	
	$upload_dir = "/var/www/workflow/uploads/";
	$video_src_path = $upload_dir."vid_slice_".$randomId."_";
	
	$cmd = $ffmpeg_cmd_path.' -i "concat:';
	for ($i=0; $i<$slices_count; $i++) {
		$cmd .= $video_src_path.$i.".webm|";
		$vid_slice_file[] = $video_src_path.$i.".webm";
	}
	$cmd = substr($cmd, 0, strlen($cmd)-1);
	$cmd .= '" -c copy '.$upload_dir.$filename." 2>&1";
	
	$last_line = exec($cmd, $output);
	
	for ($i=0; $i<$slices_count; $i++) {
		unlink($vid_slice_file[$i]);
	}
	
	$tmpStr = $cmd."\n\n".implode("\n",  $output);
	
	//$cmd = $ffmpeg_cmd_path." -y -i ".$upload_dir.$filename." -c:v libvpx ".$upload_dir.$filename;
				
	//$last_line = exec($cmd, $output);	
?>