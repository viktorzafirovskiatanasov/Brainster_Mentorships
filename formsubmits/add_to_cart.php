 
<?php


if (!defined('CONNECTION_INCLUDED')) {
    require_once '../connection/connection.php';
}

require_once '../Classes/Cart_items.php';
require_once '../Classes/Shopping_cart.php';
require_once '../Classes/products.php';
use Classes\Product;
use Database\Connection;
use Classes\CartItem;
use Classes\ShoppingCart;

if (isset($_POST['code'], $_POST['quantity'])) {
    $connectionDB = new Connection();
    $connection = $connectionDB->getConnection();
    $statement = $connection->prepare('SELECT * FROM products WHERE product_code = :code');
    $statement->bindParam(':code', $_POST['code'], PDO::PARAM_INT);
    $statement->execute();

    $productDB = $statement->fetch(PDO::FETCH_ASSOC);
    if (!empty($productDB)) {
        $product = [
            'price' => $productDB['unit_price'],
            'name' => $productDB['product_name'],
            'quantity' => $_POST['quantity'],
            'total' => $productDB['unit_price'] * $_POST['quantity'],
            'code' => $productDB['product_code']
        ];
        session_start();
        if (!isset($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = new ShoppingCart();
        }

        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = $product;
        }


        $productIndex = -1;
        foreach ($_SESSION['products'] as $index => $existingProduct) {
            if ($existingProduct['code'] == $_POST['code']) {
                $productIndex = $index;
                break;
            }
        }

        if ($productIndex !== -1) {

            $_SESSION['products'][$productIndex]['quantity'] += $_POST['quantity'];
        } else {

            $_SESSION['products'][] = $product;
        }
        foreach ($_SESSION['products'] as $Product) {

            $item = new CartItem(Product::findProduct($Product['code']), $Product['quantity'], $_SESSION['shopping_cart']->getId());
        }
        header('Location: ../homepage.php');
    }
} else {
    header('Location: ../homepage.php');
}

?>
  
