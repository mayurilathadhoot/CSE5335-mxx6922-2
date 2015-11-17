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
if($line)
{
	echo $line;

//$query = "select title, imbdrating from friends where imbdid = '". $line. "';";
$sql = sprintf(
   "SELECT title, imbdrating FROM friends WHERE imbdid = '%s'", $line
);  
//echo $query;

$result = pg_query($dbconn, "SELECT * FROM friends WHERE imbdid = '".$line."'");

//$result = pg_query($dbconn, "select title, imbdrating from friends where imbdid =' ". $line. " '");	
while ($row = pg_fetch_row($result)){
  echo "title: $row[1] \n imbdrating: $row[2]\n";
 // echo "<br />\n";
//dump the result object
//var_dump($row);


}
}
else 
{
$result = pg_query($dbconn, "select title, imbdrating from friends");	
while ($row = pg_fetch_row($result)){
  echo "title: $row[0] \n imbdrating: $row[1]\n";
 // echo "<br />\n";
//dump the result object
//var_dump($row);
}
}



// Closing connection
pg_close($dbconn);
?>