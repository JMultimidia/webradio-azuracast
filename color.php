<?php
	
	function simple_color_thief($image) {
	  if ($original_image = @imagecreatefromstring(@file_get_contents($image))) {
		$shortend_image = imagecreatetruecolor(1, 1);
		imagecopyresampled($shortend_image, $original_image, 0, 0, 0, 0, 1, 1, imagesx($original_image), imagesy($original_image));
		return dechex(imagecolorat($shortend_image, 0, 0));
	  } else {
		return "000000";
	  }
	}

	$image = base64_decode($_GET['image']);
	
	$array = array ('color' => simple_color_thief($image));
	
	header('Content-type: application/json');
	echo json_encode($array);

?>