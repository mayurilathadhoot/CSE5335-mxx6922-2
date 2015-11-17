<?php

// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-21-223-147.compute-1.amazonaws.com dbname=d43brbvbt6ugl9 user=ywhsrpfxdaknkl password=dnYTje6Tvi_vDyGq9Z1Qsf5yhY")
        or die('Could not connect: ' . pg_last_error());
		
header('Content-Type: application/javascript;');

echo "Please enter the minimum value between 7.5 to 9 : ";

$handle = fopen ("php://stdin","r");
$line = fgets($handle);
$line = str_replace("\n", "", $line);
$line = str_replace("\r", "", $line);
$x="'".$line."'";

echo "Please enter the maximum value between 7.5 to 9 : ";
$handle = fopen ("php://stdin","r");
$line1 = fgets($handle);
$line1 = str_replace("\n", "", $line1);
$line1 = str_replace("\r", "", $line1);
$y="'".$line1."'";

if ((!empty($x))&& (!empty($y))){
	$result = pg_query($dbconn, "select imbdid, title, imbdrating from friends where imbdrating between $x and $y ")
or die("Error in query: $result." . pg_last_error($dbconn));
	if (!empty($result)){
	while ($row = pg_fetch_row($result)){
    echo "Title: $row[0] --- imbdrating: $row[1]\n";}
	}
	else{
		echo "please enter a correct imbdid";
	}
}
else{
	echo "/n enter proper imbdid";
}
// Closing connection

// Closing connection
pg_close($dbconn);
?>