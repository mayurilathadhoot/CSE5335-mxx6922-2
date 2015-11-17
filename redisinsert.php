<?php
require "predis/autoload.php";
Predis\Autoloader::register();

try {
	$redis = new PredisClient();

	// This connection is for a remote server
	/*
		$redis = new PredisClient(array(
		    "scheme" => "redis://h:pfe2o6pqjl92sidbcgqbdtjaob5@ec2-54-83-59-218.compute-1.amazonaws.com:9969",
		    "host" => "ec2-54-83-59-218.compute-1.amazonaws.com",
		    "port" => 9969
		));
	*/
}
catch (Exception $e) {
	die($e->getMessage());
}