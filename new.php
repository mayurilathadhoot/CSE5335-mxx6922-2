<?php
require "predis/autoload.php";
Predis\Autoloader::register();

try {
	$redis = new PredisClient();

	// This connection is for a remote server
	
		$redis = new PredisClient(array(
		    "host" => "ec2-54-83-59-218.compute-1.amazonaws.com",
		    "port" => 9969
		));
	
}
catch (Exception $e) {
	die($e->getMessage());
}
?>