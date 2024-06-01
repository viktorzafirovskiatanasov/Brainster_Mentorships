<?php
include 'constants.php';
include 'functions.php';

checkRequest();

$username = $_POST['username'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];

checkUsernameMinLength($username);
checkUsernameUnique($username);
checkPasswordMinLength($password);
checkPasswordStrength($password);
checkPhoneNumber($phone_number);
$password = md5($password);

if(file_put_contents("users.txt", "$username|$password|$phone_number".PHP_EOL, FILE_APPEND)) {
    redirect(INDEX_PAGE, "success=register");
}

redirect(INDEX_PAGE, "error=general");