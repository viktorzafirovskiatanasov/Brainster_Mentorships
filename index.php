<?php

echo "<h1>PHP arrays & loopas Mentor-session</h1>";
echo "<h2>----EXERCISE 01----</h2>";

$n = 5;
$m = 10;

if ($n < $m) {
    $sum = $n + $m;
    echo "<h3>$sum</h3>";
} else echo "<h2>Wrong numbers are provided!</h2>";

echo "<h2>----EXERCISE 02----</h2>";

$array = [1, 54, 11, 44, 4, 4, 4];
$element = 4;
$count = 0;

foreach ($array as $num) {
    if ($num == $element) {
        $count++;
    }
}
echo "The element $element occurs $count times in the array.";

echo "<h2>----EXERCISE 03----</h2>";

$mixed_array = [3, 5, 'Hello', 2,];
$j = 0;

for ($i = count($mixed_array) - 1; $i >= 0; $i--) {

    $temp[$j] = array_pop($mixed_array);
    $j++;
}

// $reversed_Array = array_reverse($mixed_Array); print_r($reversed_Array);

echo "</br>";
echo 'Your arrray in reversed is: [' . implode(',', $temp) . ']';

echo "<h2>----EXERCISE 04----</h2>";

$input_number = 2345;
$array_of_digits = [];
$temp_number = (string)$input_number; 
for ($i = 0; $i < strlen((string)$input_number); $i++) {
    $array_of_digits[$i] =  $temp_number[$i];
}

 echo 'Your number in array is: [' . implode(',', $array_of_digits) . ']';

 /* for($i = 0; $i < strlen((string)$input_number); $i++){
    $array_of_digits[$i] = ($temp_number %10);
    $temp_number = (int)($temp_number /10);
 }
 $array_of_digits = array_reverse($array_of_digits);*/

echo "<h2>----EXERCISE 05----</h2>";

$number5 = 11;
$array5 = [11, 23, 45, 23, 48, 65, 11];
$assArray5 = []; 

for ($i = 0; $i < count($array5); $i++) {
    if ($array5[$i] == $number5) {
        $assArray5[] = $i;
    }
}
print_r($assArray5);


echo "<h2>----EXERCISE 06----</h2>";

$number6 = [1, 2, 3, 4];
$number6[] = array_shift($number6);
$number6[] = array_shift($number6);
echo "Original array: " . implode(',', $number6) . "</br>";


/*
$array_of_numbers2 = [1,2,3,4,5,6,7,8,9,10];
$temp_array = $array_of_numbers2;
$array_length = count($array_of_numbers2);
$k = 1; //random number user input
for($i = 0 ; $i < $k ; $i++)
{
    $temp = array_shift($temp_array);
    $temp_array[$array_length-1] = $temp;  
}
 echo 'Your array shifted by '.$k.' to the left is: ['.implode(',',$temp_array).']';

//this example slices the array by the given number and merges it to a new array on the last position

$array_of_numbers2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$temp_array = $array_of_numbers2;
$k = 4;
$left_array = array_splice($temp_array, 0, $k);
$result_array =  array_merge($temp_array, $left_array);
echo 'Your array shifted by ' . $k . ' to the left is: [' . implode(',', $result_array) . ']';
echo $empty_space;
*/
echo "<h2>----EXERCISE 07----</h2>";

$input_number = 23444233;
$transformations = 0;

while ($input_number > 9) {
    $sum = 0;
    $temp_number = $input_number; 
    while ($temp_number > 0) {
        $digit = $temp_number % 10;
        $sum += $digit;
        $temp_number = (int) ($temp_number / 10);
    }
    
    $input_number = $sum;
    $transformations++;
}

echo "Total $transformations transformations are done and the result is $sum.";


echo "<h2>----EXERCISE 08----</h2>";

$entry_number = [123, 234, 125, 138];
$array_entry = [];
$type_of_visitor = "";

$gateway = "";

foreach ($entry_number as $number) {
    $temp_number = (string)$number;
    $last_digits = (int)substr($temp_number, 1);


    if ($temp_number[0] === '1') {
        $type_of_visitor = "VIP visitor";
    } else {
        $type_of_visitor = "Infidel";
    }

    if ($last_digits % 3 === 0) {
        $gateway = "First Gateway";
    } elseif ($last_digits % 3 === 1) {
        $gateway = "Second Gateway";
    } else {
        $gateway = "Third Gateway";
    }

    echo "Visitor Number: $number<br>";
    echo "Visitor Type: $type_of_visitor<br>";
    echo "Gateway: $gateway<br><br>";
}

/*
$entry_number = 123;
$array_entry = [];
$temp_number = (string)$entry_number;
$type_of_visitor = "";
$gateway = "";
for ($i = 0; $i < strlen((string)$entry_number); $i++) {
    $array_entry[$i] =  $temp_number[$i];
}
 $last_digits = (int)substr($temp_number, 1);
if($array_entry[0] == 1){
   $type_of_visitor = "VIP visitor";

}
else $type_of_visitor = "Infedel";
if($last_digits % 3 == 0){
     $gateway = "First Gateway";
}
else if($last_digits % 3 == 1)
{
    $gateway = "Second Gateway";
}
else $gateway = "Third Gateway";
echo "Visitor Number: $entry_number";
echo "</br>";
echo "Visitor Type: $type_of_visitor";
echo "</br>";
echo "Gateway: $gateway";/