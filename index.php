<?php
$gender = ['Male', 'Female', 'Male', 'Female', 'Male', 'Female'];
$discount = [50, 0, 10, 20, 30, 0];
$stock = ['yes', 'yes', 'no', 'yes', 'no', 'yes'];
$price = [630.99, 422.99, 349.99, 199.99, 219.99, 99.99];
$shipping = [30, 29.99, 20, 7.99, 9.99, 7.2];
$name = ['VM', 'Baume', 'Titan', 'Quartz', 'Lauriel', 'Shengke'];
$imgArray = ['https://images.pexels.com/photos/277390/pexels-photo-277390.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', "https://images.pexels.com/photos/277390/pexels-photo-277390.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/277390/pexels-photo-277390.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/277390/pexels-photo-277390.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/277390/pexels-photo-277390.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "https://images.pexels.com/photos/277390/pexels-photo-277390.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"];
$rating = [4.6, 4.3, 5, 5, 2.3, 2.3];
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
    <h1 class=" w-75 px-3 mx-auto">PRODUCTS</h1>
    <div class="row w-75 mx-auto">
        <?php
        for ($i = 0; $i < count($name); $i++) {
            // Background color based on gender
            $cardBgColor = ($gender[$i] === 'Male') ? '#f7f7f7' : '#ffe6ee';

            // Discount information
            $discountInfo = ($discount[$i] > 0) ? $discount[$i] . '% OFF!' : '';

            // Price calculation
            $priceInfo = ($discount[$i] > 0) ?  number_format(($price[$i] - ($price[$i] * ($discount[$i] / 100))), 2) :  $price[$i];

            // Stock information
            $stockInfo = ($stock[$i] === 'yes') ? 'In Stock' : 'Out Of Stock';

            // Total price calculation
            $totalPrice = ($discount[$i] > 0) ? number_format(($price[$i] * ($discount[$i] / 100)) + $shipping[$i],2) : number_format($price[$i] + $shipping[$i],2);

            $img = $imgArray[$i];
            // Output the product card
            echo ' 
        <div class="col-4 mb-5">
        <div class="card ">
        <img src="' . $img . '" class="card-img-top " alt="' . $name[$i] . '">
       <div class="card-body px-5 "style="background-color: ' . $cardBgColor . ';">
            <h5 class="card-title">' . $name[$i] . ' ' . $discountInfo . '</h5>
            <p class="card-text">This is a watch. A brand new watch from ' . $name[$i] . '. Waterproof, stainless steel</p>
            <ul class="list-unstyled">';
            if ($discount[$i] > 0) {
                echo '<li class="mb-3"><span><del>US $' . $price[$i] .  '</del></span><span class="ml-2"><strong>US $' . $priceInfo .  '</strong></span></li>';
            } else {
                echo '<li class="mb-3"><span>US $' . $price[$i] . '</span></li>';
            }
            echo ' <li class="mb-3">Shipping: $' . $shipping[$i] . '</li>
               <li class="mb-3">Rating: ' . $rating[$i] . '</li>
               <li class="mb-3">' . $stockInfo . '</li>
               <li class="mb-3">Total: $' . $totalPrice . '</li>
           </ul>';

            if ($stockInfo == 'In Stock')
                echo '<button class="w-100 py-3 rounded border-0" style="background-color: #008000; color: #FFFFFF;">Order</button>';
            else
                echo '<button class="w-100 py-3 rounded border-0" style="background-color: #FF0000; color: #FFFFFF;">N/A</button>';

            echo '  </div>
      </div>
      </div>';
        } ?>
    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>