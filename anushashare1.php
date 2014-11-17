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
<h3>Anusha Images</h3>
<?php
 

$images=mysql_query("SELECT image FROM anusha");


    while($image_row=mysql_fetch_assoc($images))
    {
        $image_name=$image_row['image'];
        
create_thumb('rahulshare/pallavishare/anushashare/',$image_name,'rahulshare/pallavishare/anushashare/thumbs/');

echo '<a href="rahulshare/pallavishare/anushashare/', $image_name, '"><img src="rahulshare/pallavishare/anushashare/thumbs/', $image_name, '" /></a> ';
        
}

include 'template/footer.php';
?>
