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
<INPUT TYPE="BUTTON" VALUE=" Nihil Images" ONCLICK="window.location.href='nikhilshare1.php'">
<INPUT TYPE="BUTTON" VALUE="Pallavi Images" ONCLICK="window.location.href='pallavishare1.php'">
<INPUT TYPE="BUTTON" VALUE="Anusha Images" ONCLICK="window.location.href='anushashare1.php'">
<INPUT TYPE="BUTTON" VALUE="Iphone App Images" ONCLICK="window.location.href='iphoneshare1.php'">
<INPUT TYPE="BUTTON" VALUE="Desktop App Images" ONCLICK="window.location.href='desktopshare1.php'">
<INPUT TYPE="BUTTON" VALUE="All Images" ONCLICK="window.location.href='commonshare.php'">
</br>
</br>
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