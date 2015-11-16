<?php
/*
 * PHP PGSQL - How to insert rows into PostgreSQL table
 */
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-21-223-147.compute-1.amazonaws.com dbname=d43brbvbt6ugl9 user=ywhsrpfxdaknkl password=dnYTje6Tvi_vDyGq9Z1Qsf5yhY")
        or die('Could not connect: ' . pg_last_error());
		
header('Content-Type: application/javascript;');

for ($i=1; $i<=9; $i++)
{
	$page = (file_get_contents("http://www.omdbapi.com/?t=friends&season=".$i));
	$data = json_decode($page, true);
	
	//echo "season = " . $data['Season']. "\n";
	
	for ($j=0; $j<=20; $j++){
	  //echo " imbdID = " . $data['Episodes'][$j]['imdbID']. "\n";
	  $imbdid = $data['Episodes'][$j]['imdbID'] ;
	  //echo "Title = " . $data['Episodes'][$j]['Title']. "\n" ; 
	  $title = $data['Episodes'][$j]['Title'] ;
	  $title = str_replace( array( '\'', '.' ), '', $title);
	  //echo "imbdRating = " . $data['Episodes'][$j]['imdbRating']. "\n"; 
	  $imbdrating = $data['Episodes'][$j]['imdbRating'];

//perform the insert using pg_query
$result = pg_query($dbconn, "INSERT INTO friends 
                  VALUES( '$imbdid', '$title', $imbdrating  );");
//dump the result object
var_dump($result);
}
}
// Closing connection
pg_close($dbconn);
?>