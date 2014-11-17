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



?>
<body>

<h3>My Images</h3>

<?php
$albums=mysql_query("SELECT album_id FROM albums");


while($album_row=mysql_fetch_assoc($albums))
{
    $album_id=$album_row['album_id'];
    $images=mysql_query("SELECT image_id,ext FROM images where album_id='$album_id'");


    while($image_row=mysql_fetch_assoc($images))
    {
        $image_id=$image_row['image_id'];
        $ext=$image_row['ext'];
        
        echo '<img src="http://www.nikhilvermaphotohub.com/first/uploads/thumbs/'.$album_id.'/'.$image_id.'.'.$ext.'"/>' ; 
        
    }
}
?>

<?php




echo "<h3>Rahul Images</h3><br/>";


$ch = curl_init("http://www.gateway18.com/domainimages.php");



curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);

curl_close($ch);

fclose($fp);

include 'template/footer.php';

?>




</body>