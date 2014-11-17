<?php
include 'init.php';

if(!logged_in()) {
header('Location: indexp393.php');
exit();
}

include 'template/header.php';
?>




<h3>Albums</h3>



<?php
$albums = get_albums();

if (empty($albums)) {
echo '<p>No Albums</p>';
} else {
foreach ($albums as $album) {

echo '<p><a href="view_album.php?album_id=', $album['id'], '">', $album['name'], '</a> (', $album['count'], ' images)<br /><br />
', $album['description'], '....<br /><br />
<a href="edit_album.php?album_id=', $album['id'], '">Edit Album</a> / <a href="delete_album.php?album_id=', $album['id'], '">Delete Album</a>
</p><br /><br />';

}


}


include 'template/footer.php'
?>