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
   <div class="container">
   <form action="./formsubmits/add_to_cart.php" method="post">
      <!-- Product Code Input -->
      <div class="mb-3">
        <label for="code" class="form-label">Product Code</label>
        <input type="text" class="form-control" id="code" name="code" placeholder="Enter product code">
      </div>

      <!-- Product Quantity Input -->
      <div class="mb-3">
        <label for="quantity" class="form-label">Product Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter product quantity">
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   <form action="./formsubmits/paymentSubmit.php" method="post">
   <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Product Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="productTableBody">
            <?php
            session_start();
            $total = 0;
            if (isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $product) {
                    $total += $product['total'];
                    echo "<tr>";
                    echo "<td>{$product['name']}</td>";
                    echo "<td>{$product['quantity']}</td>";
                    echo "<td>{$product['price']}</td>";
                    echo "<td>{$product['total']}</td>";
                    echo "</tr>";
                }
               
            }
            ?>
        </tbody>
    </table>
    <div class="total">
        <?php 
          echo 'Total cost: '.$total.'<br><br>';
        ?> 
    </div>
   
    <button type="submit"name="paymentMethod"  class="btn btn-primary"  value="cash">Pay with cash</button>
    <button type="submit" name="paymentMethod"  class="btn btn-primary" value="card" >Pay with card</button>
   </form>
   </div>
  </div>
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>