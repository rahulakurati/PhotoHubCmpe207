<?php

$con = mysql_connect("mysql","nikvrm","0hitlerverma"); 
if (!$con) 
  { 
  die('Could not connect: ' . mysql_error()); 
  } 
 
mysql_select_db("cmpe207", $con);


include 'func/user.func.php';
include 'func/album.func.php';
include 'func/image.func.php';
include 'func/thumb.func.php';



echo "<h3>Nikhil Images</h3><br/>";




$ch = curl_init("http://www.nikhilvermaphotohub.com/first/myshare.php");



curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_exec($ch);

curl_close($ch);

fclose($fp);



?>


