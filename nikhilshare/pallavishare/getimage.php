<?php


$con = mysql_connect("mysql","nikvrm","0hitlerverma"); 
if (!$con) 
  { 
  die('Could not connect: ' . mysql_error()); 
  } 
 
mysql_select_db("cmpe207", $con);


$result = mysql_query("SELECT image_id, ext FROM images");

      $i = 0;
$par ="";
      while ($row = mysql_fetch_array($result))
      {
          $arr[$i] = $row['image_id'].'.'.$row['ext'];
          $par = $par.$arr[$i].' ';
          $i++;

      }

      $num = count($arr);

      echo $par= $num.' '.$par;


?>