<?php
include 'init.php';


if (logged_in()) {
header('Location: index.php');
exit();
}


include 'template/header.php';
?>

<h3>Register</h3>
<?php
if (isset($_POST['register_email'], $_POST['register_name'], $_POST['register_password'], $_POST['confirm_password'])) {

$register_email = $_POST['register_email'];
$register_name = $_POST['register_name'];
$register_password = $_POST['register_password'];
$confirm_password = $_POST['confirm_password'];


$errors = array();

if(empty($register_email) || empty($register_name) || empty($register_password)){
$errors[] = 'All fields required';
} else {


if($_POST['register_password'] !== $_POST['confirm_password']) {
$errors[] = 'Passwords did not match. Re-enter Password.';

}




if(filter_var($register_email, FILTER_VALIDATE_EMAIL) === false ) {
$errors[] = 'Invalid Email Address';
}




if (strlen($register_email) > 255 || strlen($register_name) > 35 || strlen($register_password) > 35) {
$errors[] = 'One or more fields contains too many characters';
}

if (user_exists($register_email) === true) {
$errors[] = 'Email already registered';
}


}

if (!empty($errors)) {

foreach($errors as $errors) {
echo '<font color="red">', $errors, '</font><br />';


}

} else {


if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
	
$register = user_register($register_email, $register_name, $register_password); 
$_SESSION['user_id'] = $register;
header('Location: index.php');
exit();










 
} else {
	echo '<font color="red">Security Code Mismatch. Enter Again</font><br />';
}






}

}
?>

<form action="" method="post">
<p>Email: <br /><input type="email" name="register_email" size="35" maxlength="255" /></p>

<p>Full Name: <br /><input type="text" name="register_name" maxlength="35" /></p>

<p>Password: <br /><input type="password" name="register_password" maxlength="35" /></p>

<p> Confirm Password: <br /><input type="password" name="confirm_password" maxlength="35" /></p>

<img src="CaptchaSecurityImages.php" alt="" />
Security Code:
<input id="security_code" name="security_code" type="text" />

<p><input type="submit" value="Register" /></p>
</form>

<?php
include 'template/footer.php';
?>