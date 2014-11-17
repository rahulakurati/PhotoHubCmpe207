<?php
include 'init.php';

if (!logged_in()) {
header('Location: indexp393.php');
exit();
}



include 'template/header.php';
?>

<h3>Upload Image</h3>

<?php

if (isset($_FILES['image'], $_POST['album_id'])) {

$image_name = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_temp = $_FILES['image']['tmp_name'];

$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', 'mp4');

$image_ext = strtolower(end(explode('.', $image_name)));

$album_id = $_POST['album_id'];


$errors = array();

if (empty($image_name) || empty($album_id)) {
$errors[] = 'Missing Something';
} else {

if (in_array($image_ext, $allowed_ext) === false) {
$errors[] = 'File type not supported';
}
if ($image_size > 2097152) {
$errors[] = 'Image size too large to upload. Max allowed size is 2 MB.';
}
if (album_check($album_id) === false) {

$errors[] = 'Image can not be uploaded';


}
}

if (!empty($errors)) {
foreach ($errors as $errors) {
echo '<font color="red">', $errors, '</font><br />';

}

} else {

upload_image($image_temp, $image_ext, $album_id);
header('Location: view_album.php?album_id='.$album_id);
exit();
}

}



$albums = get_albums();

if (empty($albums)) {
echo '<p>No Album. First <a href="create_album.php">Create an Album</a></p>';
} else {
?>

<form action="" method="post" enctype="multipart/form-data">
<p>Choose an Image to upload:<br /><input type="file" name="image" /></p>
<p>
Choose an Album:<br />
<select name="album_id">
<?php
foreach ($albums as $album) {
echo '<option value="', $album['id'], '">', $album['name'], '</option>';
}

?>
</select>

</p>
<p><input type="submit" value="Upload Image"/></p>

</form>
<?php
}


include 'template/footer.php';
?>