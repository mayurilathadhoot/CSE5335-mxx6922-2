<?php
/*
 * PHP PGSQL - How to insert rows into PostgreSQL table
 */
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-21-223-147.compute-1.amazonaws.com dbname=d43brbvbt6ugl9 user=ywhsrpfxdaknkl password=dnYTje6Tvi_vDyGq9Z1Qsf5yhY")
        or die('Could not connect: ' . pg_last_error());
		
header('Content-Type: application/javascript;');

echo "Please enter imbdid : ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
if(isset($line))
{
$result = pg_query($dbconn, "select title, imbdrating from friends where imbdrating = 8.5");	
}
else
{
$result = pg_query($dbconn, "select title, imbdrating from friends");	
}

while ($row = pg_fetch_row($result)){
  echo "title: $row[0] \n imbdrating: $row[1]\n";
 // echo "<br />\n";
//dump the result object
//var_dump($row);


}

// Closing connection
pg_close($dbconn);
?>