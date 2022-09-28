<?php

	ob_start();
	session_start();
	
	$br_GET = ($_GET['br'] == "" ? "64" : ((in_array($_GET['br'], array("64", "128"))) ? $_GET['br'] : "64"));
	$br_SESSION = ($_SESSION['bitrate_wrh'] == "" ? "64" : ((in_array($_SESSION['bitrate_wrh'], array("64", "128"))) ? $_SESSION['bitrate_wrh'] : "64"));
	$bitrate = ($_GET['br'] != "" ? ((in_array($_GET['br'], array("64", "128"))) ? $br_GET : $br_SESSION) : $br_SESSION);
	
	$_SESSION['bitrate_wrh'] = $bitrate;
	
	$array = array ('bitrate' => $bitrate);
	header('Content-type: application/json');
	echo json_encode($array);

?>