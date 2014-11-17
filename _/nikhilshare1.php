<?php

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


include 'template/header1.php';


?>
<h3>Nikhil Images</h3>
<?php
 

$images=mysql_query("SELECT image FROM nikhil");


    while($image_row=mysql_fetch_assoc($images))
    {
        $image_name=$image_row['image'];
        
create_thumb('nikhilshare/',$image_name,'nikhilshare/thumbs/');




echo '<a href="nikhilshare/', $image_name, '"><img src="nikhilshare/thumbs/', $image_name, '" /></a> ';
        




    }



include 'template/footer.php';
?>
