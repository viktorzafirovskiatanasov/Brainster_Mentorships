<?php

function checkRequest()
{
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        redirect(INDEX_PAGE);
    }
}

function checkButtonPressed()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['change_pass'])) {
            redirect(CHANGE_PASSWORD_PAGE);
        } else if (isset($_POST['reset_pass'])) {
            redirect(RESET_PASSWORRD_PAGE);
        } else return true;
    } else redirect(INDEX_PAGE);
}

function checkUsernameMinLength($username, $minLenght = 4)
{
    if (strlen($username) < $minLenght) {
        redirect(INDEX_PAGE, 'error=usernametooshort');
    }
}

function checkPasswordMinLength($password, $minLenght = 6)
{
    if (strlen($password) < $minLenght) {
        redirect(INDEX_PAGE, "error=passwordtooshort");
    }
}

function checkPasswordStrength($password)
{
    if (
        !preg_match('/[a-z]+/', $password)
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        redirect(INDEX_PAGE, "error=passwordnotvalid");
    }
}

function checkPasswordMinLengthChange($password, $minLenght = 6)
{
    if (strlen($password) < $minLenght) {
        redirect(CHANGE_PASSWORD_PAGE, "error=passwordtooshort");
    }
}

function checkPasswordStrengthChange($password)
{
    if (
        !preg_match('/[a-z]+/', $password)
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        redirect(CHANGE_PASSWORD_PAGE, "error=passwordnotvalid");
    }
}

function checkUsernameUnique($username)
{
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    //['john|john123', 'jane|jane123']
    foreach ($users as $user) {
        $userData = explode("|", $user);
        //['john', 'john123']
        //['jane', 'jane123']
        if (strtolower($userData[0]) == strtolower($username)) {
            redirect(INDEX_PAGE, "error=usernametaken");
        }
    }
}
function checkAndPrintSuccessMessage()
{
    $successMsg = [
        'login' => 'Successful login.',
        'register' => 'Successful registration. You can login now.',
        'success' => 'Password Changed',
        'reset' => 'reset success'
    ];
    if (isset($_GET['success'])) {
        // If the success is for password reset and there's a new password, display it as well.
        if ($_GET['success'] === 'reset') {
            $data = file_get_contents('password_reset_log.txt');
            $users = explode(PHP_EOL, $data);
            
            foreach ($users as $key => $user) {
                if (++$key == count($users)-1) {
                    $userData = explode("|", $user);
                    $successMsg['reset'] = $userData[1];

                    echo '<p class="alert alert-success">Your new password is: ' . $successMsg[$_GET['success']] . '</p>';
                }
            }
        } else echo '<p class="alert alert-success">' . $successMsg[$_GET['success']] . '</p>';
    }
}


function checkPhoneNumber($phoneNumber)
{
    if (strlen($phoneNumber) < 9 || strlen($phoneNumber) > 15 || !ctype_digit($phoneNumber)) {
        redirect(INDEX_PAGE, "error=incorrectnumber");
    }
}

function checkAndPrintErrorMessage()
{
    $errorMsg = [
        'usernametooshort' => 'Username must be at least 4 characters.',
        'passwordtooshort' => 'Password must be at least 6 characters.',
        'notfound' => 'User not found.',
        'passwordnotvalid' => 'Password must contain at least 1 lowercase, uppercase, number and special character.',
        'general' => 'An error occured. Please try again later.',
        'usernametaken' => 'Username taken, choose another one.',
        'incorrectnumber' => 'wrong phone number',
        'error' => 'Password Change Failed',
        'resetFailed' => 'Reset failed'
    ];

    if (isset($_GET['error'])) {
        echo '<p class="alert alert-danger">' . $errorMsg[$_GET['error']]  . '</p>';
    }
}

function redirect($url, $queryString = '')
{
    if ($queryString != '') {
        $url .= "?$queryString";
    }

    header("Location:" . $url);
    die();
}


function changePassword($username, $currentPassword, $newPassword)
{
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    // Iterate through each user entry in the file.
    foreach ($users as $key => $user) {
        $userData = explode("|", $user);
        // Check if the username and current password combination match the entry in the file.
        if ($userData[0] === $username) {

            if (md5($currentPassword) === $userData[1] || $currentPassword === $userData[1]) {

                $hashedNewPassword = md5($newPassword);

                // Update the entry with the new hashed password.
                $users[$key] = $userData[0] . '|' . $hashedNewPassword . '|' . $userData[2];



                // Save the modified data back to the file.
                file_put_contents('users.txt', implode(PHP_EOL, $users));
                // Redirect to the index page with a success message.
                redirect(INDEX_PAGE, 'success=success');
            }
        }
    }
    redirect(CHANGE_PASSWORD_PAGE, 'error=error');
}
function getPass($n = 12)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
function resetPass($username, $phoneNumber)
{
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    foreach ($users as $key => $user) {
        $userData = explode("|", $user);
        // Check if the username and current password combination match the entry in the file.
        if ($userData[0] === $username) {

            if ($phoneNumber === $userData[2]) {
                
                $hashedNewPassword = md5(getPass());

                // Update the entry with the new hashed password.
                $users[$key] = $userData[0] . '|' . $hashedNewPassword . '|' . $userData[2];



                // Save the modified data back to the file.
                file_put_contents('users.txt', implode(PHP_EOL, $users));
                $logData = $username . '|' . $hashedNewPassword . '|' . $phoneNumber . PHP_EOL;
                file_put_contents('password_reset_log.txt', $logData, FILE_APPEND);
                // Redirect to the index page with a success message.
                redirect(INDEX_PAGE, 'success=reset');
            }
        }
    }
    redirect(RESET_PASSWORRD_PAGE, 'error=resetFailed');
}
