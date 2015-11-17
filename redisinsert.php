<?php
   //Connecting to Redis server on localhost
   $redis = new Redis();
   $redis->connect('redis://h:pfe2o6pqjl92sidbcgqbdtjaob5@ec2-54-83-59-218.compute-1.amazonaws.com:9969', 9969);
   echo "Connection to server sucessfully";
   //check whether server is running or not
   echo "Server is running: "+ $redis->ping();
?>