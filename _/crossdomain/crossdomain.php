

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
</br>
</br>
<INPUT TYPE="BUTTON" VALUE="My Images" ONCLICK="window.location.href='myshare.php'">


<INPUT TYPE="BUTTON" VALUE=" Rahul Images" ONCLICK="window.location.href='rahulshare1.php'">


<INPUT TYPE="BUTTON" VALUE="Pallavi Images" ONCLICK="window.location.href='pallavishare1.php'">


<INPUT TYPE="BUTTON" VALUE="Anusha Images" ONCLICK="window.location.href='anushashare.php'">


<INPUT TYPE="BUTTON" VALUE="All Images" ONCLICK="window.location.href='commonshare.php'">
</br>
</br>
</br>
</br>


<a href="http://www.nikhilvermaphotohub.com/crossdomain.php"><img src="images/crossdomain1.jpg" /></a>


<?php

include 'template/footer.php';


?>



