<?php

include 'constants.php';
include 'functions.php';



$username = $_POST['username'];
$password = $_POST['password'];
$newPassword = $_POST['newPassword'];


checkPasswordMinLengthChange($newPassword);

checkPasswordStrengthChange($newPassword);

changePassword($username, $password, $newPassword);
