<?php

include 'init.php';
include 'template/header.php';

if (logged_in()) {
echo 'Welcome to Gateway 18. An online platform where you can share your cherished moments with your loved ones. 
</br> </br> You can now start to <a href="create_album.php">Create albums</a> and <a href="upload_image.php">Upload images</a> ';
} else {
include 'slideshow.html';
//echo '<img src="images/smile45.jpg" alt="SmileBook" />';
}

include 'template/footer.php';
?>




