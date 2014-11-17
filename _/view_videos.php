<body>
<?php
include 'init.php';

if (!logged_in()) {
header('Location: index.php');
exit();
}

include 'template/header.php';
?>

<h3>Videos</h3>

<?php
$videos = mysql_query("SELECT video_id, ext FROM videos where user_id=".$_SESSION['user_id']);
while($video_row=mysql_fetch_assoc($videos))
    {
        $video_id=$video_row['video_id'];
        $ext=$video_row['ext'];
        
echo '
<video width="320" height="240" controls="controls">
  <source src="http://www.gateway18.com/videouploads/'.$video_id.'.'.$ext.'" type="video/'.$ext.'">
  <object data="http://www.gateway18.com/videouploads/'.$video_id.'.'.$ext.'" width="320" height="240">
    <embed src="http://www.gateway18.com/videouploads/'.$video_id.'.'.$ext.'" width="320" height="240">
  </object> 
</video>';




/*
<video controls="controls">
<object width="170px" height="144px">
	<param name="allowFullScreen" value="true"/>
	<param name="wmode" value="transparent"/>
	<param name="movie" value="http://www.nikhilvermaphotohub.com/first/videouploads/'.$video_id.'.'.$ext.'"/>
	<embed src="http://www.nikhilvermaphotohub.com/first/videouploads/'.$video_id.'.'.$ext.'" width="170px" height="144px" allowFullScreen="true" type="application/x-shockwave-flash" wmode="transparent"/>

</object>
</video>';
*/
}
include 'template/footer.php';
?>
</body>