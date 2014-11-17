<?php
include 'init.php';

if (!logged_in()) {
header('Location: index.php');
exit();
}



include 'template/header.php';
?>

<h3>Upload Video</h3>

<?php


if (isset($_FILES['video'])) {

$video_name = $_FILES['video']['name'];
$video_size = $_FILES['video']['size'];
$video_temp = $_FILES['video']['tmp_name'];


$allowed_ext = array('mpg', 'avi', 'flv', 'mp4', 'wmv');

$video_ext = strtolower(end(explode('.',$video_name)));


$errors = array();

if (empty($video_name)) {
$errors[] = 'Missing Something';
} else {

if (in_array($video_ext, $allowed_ext) === false) {
$errors[] = 'File type not supported';
}
if ($video_size > 2097152) {
$errors[] = 'Video size too large to upload. Max allowed size is 2 MB.';
}
}

if (!empty($errors)) {
foreach ($errors as $errors) {
echo '<font color="red">', $errors, '</font><br />';

}



} else {

mysql_query("INSERT INTO videos VALUES('', '".$_SESSION['user_id']."', UNIX_TIMESTAMP(), '$video_ext')");
    
$video_id = mysql_insert_id();
    
$video_file = $video_id.'.'.$video_ext;
    
    
move_uploaded_file($video_temp, 'videouploads/'.$video_file);

}
echo 'Video Uploaded';

}

?>

<form action="" method="post" enctype="multipart/form-data">

<p>Choose Video to Upload:<br /><input type="file" name="video" /></p>
<p><input type="submit" value="Upload Video"/></p>
</form>



<?php
include 'template/footer.php';
?>