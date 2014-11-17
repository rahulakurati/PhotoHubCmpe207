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
<h3>My Images</h3>
<?php
 

$images=mysql_query("SELECT image_id, ext FROM images");


    while($image_row=mysql_fetch_assoc($images))
    {
        $image_name=$image_row['image_id'];
        $image_ext=$image_row['ext'];
        $image_file=$image_name.'.'.$image_ext;



echo '<a href="pictures1/', $image_file, '"><img src="pictures1/thumbs/', $image_file, '" /></a> ';
        




    }



include 'template/footer.php';
?>
