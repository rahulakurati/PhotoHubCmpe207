<?php


function logged_in() {
return isset($_SESSION['user_id']);
}

function login_check($email, $password) {
$email = mysql_real_escape_string($email);
$login_query = mysql_query("SELECT COUNT(`user_id`) as `count`, `user_id` FROM `users` WHERE `email`='$email' AND `password`='".md5($password)."'");

return (mysql_result($login_query, 0) == 1) ? mysql_result($login_query, 0, 'user_id') : false; 

}

function user_data() {
$args = func_get_args();
$fields = '`'.implode('`, `', $args).'`';

$query = mysql_query("SELECT $fields FROM `users` WHERE `user_id`=".$_SESSION['user_id']);
$query_result = mysql_fetch_assoc($query);
foreach ($args as $field) {
$args[$field] = $query_result[$field];
}
return $args;
}


function user_register($register_email, $register_name, $register_password) {
$register_email = mysql_real_escape_string($register_email);
$register_name = mysql_real_escape_string($register_name);
mysql_query("INSERT INTO users VALUES ('', '$register_email', '$register_name', '".md5($register_password)."')");
return mysql_insert_id();


}

function user_exists($register_email) {
$email = mysql_real_escape_string($register_email);
$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email`='$register_email'");

return (mysql_result($query, 0) == 1) ? true : false;


}
?>

