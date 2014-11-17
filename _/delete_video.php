<?php

include 'init.php';

if (!logged_in()) {
header('Location: indexp.php');
exit();
}

if (video_check($_GET['video_id']) === false) {
header('Location: index.php');
exit();
}

if (isset($_GET['video_id']) || empty($_GET['video_id'])) {
delete_image($_GET['video_id']);
header('Location: '.$_SERVER['HTTP_REFERER']);
exit();
}


?>