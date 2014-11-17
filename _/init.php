<?php
ob_start();
session_start();
$con = mysql_connect("mysql","rahul","123");
 if (!$con)  
 {
   die('Could not connect: ' . mysql_error());  
 }
  mysql_select_db("mysql", $con);
include 'func/user.func.php';
include 'func/album.func.php';
include 'func/image.func.php';
include 'func/thumb.func.php';
?>