<?php
include("functions.php");

$flag = '';

$inputValues = [
    'firstName' => '',
    'lastName' => '',
    'email' => '',
    'month' => '0',
    'day' => '0',
    'year' => '0',
    'gender' => ''
];

$errors = [
    'firstName' => '',
    'lastName' => '',
    'email' => '',
    'age' => '',
    'gender' => ''
];

if ($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_POST['expression'])) {
    // Process form submission and validate inputs
    $errors = [
        'name' => ValidateFirstName($_POST['firstName']),
        'lastName' => ValidateLastName($_POST['lastName']),
        'email' => ValidateEmail($_POST['email']),
        'age' => ValidateDate($_POST['month'], $_POST['day'], $_POST['year']),
        'gender' => ValidateGender($_POST['gender'])
    ];
    $flag = false;

    foreach ($errors as $field => $error) {
        if (!empty($error)) {
            $flag = true;
            break;
        }
    }

    $inputValues = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'month' => $_POST['month'],
        'day' => $_POST['day'],
        'year' => $_POST['year'],
        'gender' => $_POST['gender']
    ];
}

$calculatorResults = [
    'result' => isset($_POST['expression']) ? calculator($_POST['expression']) : ''
];


?>


<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/0e37b883f4.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="index.php" method="POST" class="ml-5 mt-5">
        <p class="text-success "><?php if ($flag) echo 'REGISTRATION SUCCESS'; ?> </p>
        <label for="firstName"><b>First Name</b></label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $inputValues['firstName']; ?>"> </input>
        <span class="text-danger"><?php if ($flag) echo $errors['firstName']; ?></span>
        <br />
        <label for="lastName"><b>Last Name</b></label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $inputValues['lastName']; ?>"></input>
        <span class="text-danger"><?php if ($flag) echo $errors['lastName']; ?></span>
        <br />
        <label for="email"><b>Email</b></label>
        <input type="email" id="email" name="email" value="<?php echo $inputValues['email']; ?>"></input>
        <span class="text-danger"><?php if ($flag) echo $errors['email']; ?></span>
        <br />
        <label for="month"><b>Birthday</b></label>
        <span class="text-danger"><?php if ($flag) echo $errors['age']; ?></span>
        <br />
        <select name="month" id="month" onchange="updateDays()">
            <option value="0" class="d-none" <?php if ($inputValues['month'] == '0') echo 'selected'; ?>>Please choose a month</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <select name="day" id="day">
            <option value="0" class="d-none" <?php if ($inputValues['day'] == '0') echo 'selected'; ?>>Please choose a day</option>
        </select>

        <select name="year" id="year">
            <option value="0" class="d-none" <?php if ($inputValues['year'] == '0') echo 'selected'; ?>>Please choose a year</option>
            <?php
            for ($i = 1930; $i <= date("Y"); $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
        <br /><br />
        <label><b>Gender</b></label>
        <span class="text-danger"><?php if ($flag) echo $errors['gender']; ?></span>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="male" name="gender" value="Male" <?php if ($inputValues['gender'] === 'Male') echo 'checked'; ?>>
            <label class="form-check-label" for="male">Male</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="female" name="gender" value="Female" <?php if ($inputValues['gender'] === 'Female') echo 'checked'; ?>>
            <label class="form-check-label" for="female">Female</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="denis" name="gender" value="Denis" <?php if ($inputValues['gender'] === 'Denis') echo 'checked'; ?>>
            <label class="form-check-label" for="denis">Denis</label>
        </div>
        <br /><br />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="mt-5 p-5">
        <h1>Calculator</h1>
        <form action="index.php" method="POST">
            </br>
            </br>
            <span class="text-success"><?php if (is_numeric($calculatorResults['result'])) echo 'Result is: ' . $calculatorResults['result']; ?></span>
            </br>
            </br>
            <label for="expression">Enter an arithmetic expression:</label>
            <input type="text" name="expression" id="expression">
            <span class="text-danger"><?php if (is_string($calculatorResults['result'])) echo $calculatorResults['result']; ?></span>

            <br>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>

    <script>
        //si cepkav za da ne mi bide dosadno :) 
        function updateDays() {
            const monthSelect = document.getElementById('month');
            const daySelect = document.getElementById('day');
            const selectedMonth = parseInt(monthSelect.value);

            // Clear all previous options
            daySelect.innerHTML = '<option value="0" class="d-none">Please choose a day</option>';

            if (selectedMonth === 0) {
                // If "Please choose a month" option is selected, no need to add days
                return;
            }

            // Get the number of days in the selected month
            const daysInMonth = new Date(2023, selectedMonth, 0).getDate();

            // Add options for each day in the selected month
            for (let i = 1; i <= daysInMonth; i++) {
                daySelect.innerHTML += '<option value="' + i + '">' + i + '</option>';
            }
        }
    </script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>