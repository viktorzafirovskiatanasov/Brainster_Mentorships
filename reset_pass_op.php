<?php

include 'constants.php';
include 'functions.php';


checkRequest();

$username = $_POST['username'];
$phone_number = $_POST['phone_number'];

resetPass($username, $phone_number);

