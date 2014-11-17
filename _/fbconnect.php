<?
if(!isset($_SESSION['user'])) {
$app_id = "739766842777526";
$app_secret = "34eff1a506f762416679e96f52996343";
$site_url = "http://www.nikhilvermaphotohub.com"; 





include 'src/facebook.php';
$facebook = new Facebook(array(
    'appId' => $app_id,
    'secret' => $app_secret,
    ));
$user = $facebook -> getUser();






if($user){
    // Get logout URL
    $logoutUrl = $facebook -> getLogoutUrl();
}else{
    // Get login URL
    $loginUrl = $facebook->getLoginUrl(array(
        'scope' => 'read_stream, publish_stream, user_about_me, email',
        'redirect_uri' => $site_url,
        ));
}




if($user){
    
        $user_profile = $facebook -> api('/me/photos');




print_r('$user_profile');
}

}

?>

