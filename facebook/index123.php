<?php

require 'facebook.php';

//create application instance

$facebook = new Facebook(array(
'appId' => '341506192613554',
'secret' => '457c40e865f6f26c41b58e0fe4765379',
'cookie' => true,
));

$session = $facebook->getSession();

echo "Hello";



?>


