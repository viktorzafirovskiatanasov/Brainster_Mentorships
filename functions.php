<?php 

function ValidateFirstName(string $firstName){
       if(empty($firstName)){
        return "First Name is required";
       }
       else return "";
}
function ValidateLastName(string $lastName){
    if(empty($lastName)){
        return "Last Name is required";
    }
    else return "";
}
function ValidateEmail(string $email){
    if(empty($email)){
        return "Email is required";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid Email Address";
    } 
    else return "";
}
function ValidateDate($month , $day , $year){
    if(($month) == 0 || ($day)==0 || ($year)==0){
        return "Your Age is required";
    }
    
    else{
        $input_date = $year . '-' . $month . '-' . $day;
        $now = date('Y-m-d');
        $age = date_diff(date_create($input_date), date_create($now))->y;

        if ($age < 18) {
            return "You are not over 18 years old";
        }
        else return "";
    }
}
function ValidateGender($gender){
    if (!isset($gender)){
        return "This field is required";
    }
    else return "";
}

function CheckDaysInMonth($month){
    $days = 0;
    switch ($month){
        case 1 :
        case 3 :
        case 5 :
        case 7 :
        case 8 :
        case 10 :
        case 12 :
             $days = 31;   
             return $days; 
        case  4:
        case  6:
        case  9:
        case  11:
            $days = 30;
            return $days;    
            
        case 2: $days = 28;
          return $days;  
          
    }
}
function redirect($url, $queryString = '') {
    if($queryString != '') {
        $url .= "?$queryString";
    }

    header("Location:". $url);
    die();
}

function calculator($expression)
{
    $clean_expression = preg_replace('[^0-9+/\s-]', '', $expression);

    if (empty(trim($expression))) {
        return "Error: Please enter an arithmetic expression.";
    }

    if ($expression !== $clean_expression) {
        return "Error: Invalid characters in the expression.";
    }

    $parts = explode(' ', trim($expression));

    if (count($parts) !== 3) {
        return "Error: Invalid input. The expression should be in the format: number operator number";
    }

    $operand1 = intval($parts[0]);
    $operator = $parts[1];
    $operand2 = intval($parts[2]);

    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '':
            return $operand1 * $operand2;
        case '/':
            if ($operand2 == 0) {
                return "Error: Division by zero is not allowed.";
            }
            return $operand1 / $operand2;
        default:
            return "Error: Invalid operator. Supported operators are +, -, *, and /.";
    }
}