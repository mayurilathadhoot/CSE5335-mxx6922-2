
<?php

// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-21-223-147.compute-1.amazonaws.com dbname=d43brbvbt6ugl9 user=ywhsrpfxdaknkl password=dnYTje6Tvi_vDyGq9Z1Qsf5yhY")
        or die('Could not connect: ' . pg_last_error());
		
header('Content-Type: application/javascript;');

parse_str(implode('&', array_slice($argv, 1)), $_GET);
if (isset($_GET['imbdid']))
{
$result = pg_query($dbconn, "select imbdid, title, imbdrating from friends where imbdid = $_GET['imbdid']")	;
}
else
{
$result = pg_query($dbconn, "select imbdid, title, imbdrating from friends");
}
	
while ($row = pg_fetch_row($result)){
  echo "imbdid: $row[0] \n title: $row[1]\n imbdrating: $row[2]\n";
}
// Closing connection
pg_close($dbconn);
?>