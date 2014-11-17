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


include 'template/header1.php';


?>
<h3>Rahul Images</h3>
<?php
 

$images=mysql_query("SELECT image FROM rahul");


    while($image_row=mysql_fetch_assoc($images))
    {
        $image_name=$image_row['image'];
        
create_thumb('rahulshare/',$image_name,'rahulshare/thumbs/');




echo '<a href="rahulshare/', $image_name, '"><img src="rahulshare/thumbs/', $image_name, '" /></a> ';
        




    }



include 'template/footer.php';
?>
