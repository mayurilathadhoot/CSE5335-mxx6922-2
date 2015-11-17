<?php

// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-21-223-147.compute-1.amazonaws.com dbname=d43brbvbt6ugl9 user=ywhsrpfxdaknkl password=dnYTje6Tvi_vDyGq9Z1Qsf5yhY")
        or die('Could not connect: ' . pg_last_error());
		
header('Content-Type: application/javascript;');

echo "Please enter imbdid : ";

$handle = fopen ("php://stdin","r");
$line = fgets($handle);
$line = str_replace("\n", "", $line);
$line = str_replace("\r", "", $line);
$x="'".$line."'";
if($x)
{
	echo $x;
	$result = pg_query($dbconn, "SELECT title, imbdrating FROM friends WHERE imbdid = $x ");
	while ($row = pg_fetch_row($result)){
    echo "title: $row[0] \n imbdrating: $row[1]\n";}
}
// Closing connection
pg_close($dbconn);
?>