<?php
require "predis/autoload.php";
PredisAutoloader::register();
try {
$redis = new PredisClient('redis://h:pfe2o6pqjl92sidbcgqbdtjaob5@ec2-54-83-59-218.compute-1.amazonaws.com:9969');
$host = 'ec2-54-83-59-218.compute-1.amazonaws.com';
$port = 9969;
$password = 'pfe2o6pqjl92sidbcgqbdtjaob5';
$db = 1;
    echo "Successfully connected to Redis<br />";
} catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}
if (isset($_POST['firstname'])) {
$firstname = $_POST['firstname'];
$redis->set('firstname',$firstname);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title>Redis Tutorial</title>
</head>
<body>
	<strong>Redis First Form</strong>
	<br />
	<form action="form_1_foreign.php" method="post">
	<input type="text" size="35" name="firstname" />
	<input type="submit" value="Set Firstname" />
</form>
<?php
	$redis_name = $redis->get('firstname');
	echo("this is reading from the Redis Database: " . $redis_name);
?>
</body>
</html>