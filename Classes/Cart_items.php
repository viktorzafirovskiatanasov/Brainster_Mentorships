<?php
namespace Classes;
 include_once '../connection/connection.php';

 use Database\Connection;
class CartItem {
    private $product;
    private $amount;
    private $cart;

    public function __construct($product,$amount,$cart)
    {
        $this->product=$product;
        $this->amount=$amount;
        $this->cart = $cart;
        $this->addItem();
    }
    public function addItem(){
        
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        
        $statement = $connection->prepare('INSERT INTO cart_items (product_id,cart_id,product_amount) VALUES (:product,:cart,:amount)');

        $product = [
           'product' => $this->product,
           'cart' => $this->cart,
           'amount' => $this->amount
        ];
        $statement->execute($product);

        $connectionObj->destroy();
    }
}