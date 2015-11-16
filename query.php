<?php
/*
 * PHP PGSQL - How to insert rows into PostgreSQL table
 */
// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=webdata2 user=postgres password=webdata23")
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
	}
}
	

//perform the insert using pg_query
$result = pg_query($dbconn, "select title, imbdrating from friends where imbdrating = 8.5")
or die("Error in query: $result." . pg_last_error($dbconn));
	
while ($row = pg_fetch_row($result)){
  echo "title: $row[0] \n imbdrating: $row[1]\n";
 // echo "<br />\n";
//dump the result object
//var_dump($row);


}

// Closing connection
pg_close($dbconn);
?>