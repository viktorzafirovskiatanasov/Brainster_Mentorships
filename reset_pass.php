<?php

include 'functions.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                checkAndPrintSuccessMessage();
                checkAndPrintErrorMessage();
                ?>
            </div>
            <div class="col-md-6">
                <h1>Reset Password</h1>
                <form method="POST" action="./reset_pass_op.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="USEROT TI E DENIS SIGURNO" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Phone Number</label>
                        <input type="text" class="form-control" placeholder="OJ TI DAJ TELJEFON" name="phone_number" />
                    </div>
                   

                    <button type="submit" class="btn btn-secondary" name="new_pass">Reset Password</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>