 
<?php

   
  include_once '.../Classes/products.php';
 use Classes\Product;

    // Check if form was submitted and if POST values are set
    if (isset($_POST['name'], $_POST['code'], $_POST['price'])) {
       
        $product = new Product($_POST['name'], (int)$_POST['code'], (int)$_POST['price']);
        // Now you can use these variables
       
        // Process the data or create a new Product object here
        echo 'Product added successfully';
    } else {
        echo 'Form data is not set.';
    }
    ?>
    


