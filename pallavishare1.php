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
<h3>Pallavi Images</h3>
<?php
 

$images=mysql_query("SELECT imagename FROM pallavi");


    while($image_row=mysql_fetch_assoc($images))
    {
        $image_name=$image_row['imagename'];
        
create_thumb('rahulshare/pallavishare/',$image_name,'rahulshare/pallavishare/thumbs/');

echo '<a href="rahulshare/pallavishare/', $image_name, '"><img src="rahulshare/pallavishare/thumbs/', $image_name, '" /></a> ';
        
}

include 'template/footer.php';
?>
