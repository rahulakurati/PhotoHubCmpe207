<?php
function upload_video($video_temp, $video_ext) {
   

mysql_query("INSERT INTO videos VALUES('', '".$_SESSION['user_id']."', UNIX_TIMESTAMP(), '$video_ext')");
    
$video_id = mysql_insert_id();
    
$video_file = $video_id.'.'.$video_ext;
    
    
move_uploaded_file($video_temp, 'videouploads/'.$video_file);

}






function get_videos($user_id) {
$_SESSION['user_id'] = (int)$_SESSION['user_id'];

$videos = array();
$video_query = mysql_query("SELECT `video_id`, `timestamp`, `ext` FROM `videos` WHERE `user_id`=".$_SESSION['user_id']);

while ($videos_row = mysql_fetch_assoc($video_query)) {
$videos[] = array(
'id' => $videos_row['video_id'],
'timestamp' => $videos_row['timestamp'],
'ext' => $videos_row['ext']
);
}
return $videos; 
}





function video_check($video_id) {
$video_id = (int)$video_id;
$query = mysql_query("SELECT COUNT(`video_id`) FROM `videos` WHERE `user_id`=".$_SESSION['user_id']);
return (mysql_result($query, 0) == 0) ? false : true;




}

function delete_video($video_id) {
$video_id = (int)$video_id;

$video_query = mysql_query("SELECT `user_id`, `ext` FROM `videos` WHERE `video_id`=$video_id AND `user_id`=".$_SESSION['user_id']);

$video_result = mysql_fetch_assoc($video_query);

$user_id = $video_result['user_id'];;
$video_ext = $video_result['ext'];

unlink('videouploads/'.$video_id.'.'.$video_ext);

mysql_query("DELETE FROM `videos` WHERE `video_id`=$video_id AND `user_id`=".$_SESSION['user_id']);

}

?>