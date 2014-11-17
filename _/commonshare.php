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
</br>
</br>
<INPUT TYPE="BUTTON" VALUE="My Images" ONCLICK="window.location.href='myshare.php'">
<INPUT TYPE="BUTTON" VALUE=" Nikhil Images" ONCLICK="window.location.href='nikhilshare1.php'">
<INPUT TYPE="BUTTON" VALUE="Pallavi Images" ONCLICK="window.location.href='pallavishare1.php'">
<INPUT TYPE="BUTTON" VALUE="Anusha Images" ONCLICK="window.location.href='anushashare1.php'">
<INPUT TYPE="BUTTON" VALUE="Iphone App Images" ONCLICK="window.location.href='iphoneshare1.php'">
<INPUT TYPE="BUTTON" VALUE="Desktop App Images" ONCLICK="window.location.href='desktopshare1.php'">
<INPUT TYPE="BUTTON" VALUE="All Images" ONCLICK="window.location.href='commonshare.php'">
</br>
</br>
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
?>
<h3>Pallavi Images</h3>
<?php
$images=mysql_query("SELECT imagename FROM pallavi");
while($image_row=mysql_fetch_assoc($images))
{
$image_name=$image_row['imagename'];

create_thumb('nikhilshare/pallavishare/',$image_name,'nikhilshare/pallavishare/thumbs/');
echo '<a href="nikhilshare/pallavishare/', $image_name, '"><img src="nikhilshare/pallavishare/thumbs/', $image_name, '" /></a> ';

}
?>
<h3>Anusha Images</h3>
<?php
$images=mysql_query("SELECT image FROM anusha");
while($image_row=mysql_fetch_assoc($images))
{
$image_name=$image_row['image'];

create_thumb('nikhilshare/pallavishare/anushashare/',$image_name,'nikhilshare/pallavishare/anushashare/thumbs/');
echo '<a href="nikhilshare/pallavishare/anushashare/', $image_name, '"><img src="nikhilshare/pallavishare/anushashare/thumbs/', $image_name, '" /></a> ';

}
?>
<h3>Iphone App Images</h3>
<?php
$images=mysql_query("SELECT image FROM iphone");
while($image_row=mysql_fetch_assoc($images))
{
$image_name=$image_row['image'];

create_thumb('nikhilshare/pallavishare/anushashare/iphoneshare/',$image_name,'nikhilshare/pallavishare/anushashare/iphoneshare/thumbs/');
echo '<a href="nikhilshare/pallavishare/anushashare/iphoneshare/', $image_name, '"><img src="nikhilshare/pallavishare/anushashare/iphoneshare/thumbs/', $image_name, '" /></a> ';
}
?>
<h3>Desktop App Images</h3>
<?php
$images=mysql_query("SELECT image FROM desktop");
while($image_row=mysql_fetch_assoc($images))
{
$image_name=$image_row['image'];

create_thumb('nikhilshare/pallavishare/anushashare/iphoneshare/desktopshare/',$image_name,'nikhilshare/pallavishare/anushashare/iphoneshare/desktopshare/thumbs/');
echo '<a href="nikhilshare/pallavishare/anushashare/iphoneshare/desktopshare/', $image_name, '"><img src="nikhilshare/pallavishare/anushashare/iphoneshare/desktopshare/thumbs/', $image_name, '" /></a> ';
}
include 'template/footer.php';
?>