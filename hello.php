<? php
$redisClient = new Redis();

$redisClient -> connect(“ec2-54-83-59-218.compute-1.amazonaws.com”, “9969”  );
$redisClient -> get('key');
$arrKeys = array(“keyA”, “keyB”, “keyC”);
$redisClient -> mget($arrKeys);

//$redisClient -> set('key', 'value');

 try{
  if( $socket = fsockopen( $host, $port, $errorNo, $errorStr )){
  	if( $errorNo ){
  	  throw new RedisException(“Socket cannot be opened”);
  	}	
  }
}catch( Exception $e ){
  echo $e -> getMessage( );
}
?>
