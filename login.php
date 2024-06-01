<?php
include 'constants.php';
include 'functions.php';

checkButtonPressed();
checkRequest();

$username = $_POST['username'];
$password = $_POST['password'];




$data = file_get_contents("users.txt");
// $users = explode("\n", $data); 
$users = explode(PHP_EOL, $data); 
//['john|123456', 'jane|jane123']

foreach($users as $user) {
    
    $temp = explode( '|' , $user);
    if($password == $temp[1]){
    $phone_number = $temp[2];
    if($user == "$username|$password|$phone_number") {
        redirect(INDEX_PAGE, "success=login");
    }
}
else if($temp[1] = md5($password)){
    $phone_number = $temp[2];
    $password = md5($password);
    if($user == "$username|$password|$phone_number") {
        redirect(INDEX_PAGE, "success=login");
    }
}
}

redirect(INDEX_PAGE, "error=notfound");