
<INPUT TYPE="BUTTON" VALUE="Home" ONCLICK="window.location.href='indexp393.php'">


<?php
if (!logged_in()) {
?>

<INPUT TYPE="BUTTON" VALUE="Register" ONCLICK="window.location.href='register.php'">

<?php
} else {
?>

<INPUT TYPE="BUTTON" VALUE="Create Album" ONCLICK="window.location.href='create_album.php'"> 

<INPUT TYPE="BUTTON" VALUE="View Albums" ONCLICK="window.location.href='albums.php'">

<INPUT TYPE="BUTTON" VALUE="View Videos" ONCLICK="window.location.href='view_videos.php'">

<INPUT TYPE="BUTTON" VALUE="Upload Image" ONCLICK="window.location.href='upload_image.php'">

<INPUT TYPE="BUTTON" VALUE="Upload Video" ONCLICK="window.location.href='upload_video.php'">

<INPUT TYPE="BUTTON" VALUE="Logout" ONCLICK="window.location.href='logout.php'">

<span class="right">

<INPUT TYPE="BUTTON" VALUE="Enter Cross Domain" ONCLICK="window.location.href='crossdomain1.php'">

</span>





 
<?php
}
?>

