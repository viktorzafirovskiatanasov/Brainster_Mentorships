<?php
namespace Classes;
 include_once '../connection/connection.php';
 use Database\Connection;
class ShoppingCart{
    private $date;
    private $payment_type;
    private $paid;
    
    public function __construct()
    {
        $this->date=date('Y-d-m');
        $this->addCart();
       
        
    }
    public function setPayment(string $payment){
        $this->payment_type = $payment;
    }
    public function setPaid(bool $paid){
        $this->paid = $paid;
    }
    public function getId() {
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        $statement = $connection->prepare('SELECT id FROM shopping_cart WHERE paid = 0');
        $statement->execute();
    
        $result = $statement->fetchColumn(); // Fetch the ID from the database
    
        $connectionObj->destroy();
    
        return $result; // Return the fetched ID
    }
    
    public function addCart(){
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        $statement = $connection->prepare('INSERT INTO shopping_cart (date_and_time) VALUES (:date)');
        $product = [
           'date' => $this->date
           
        ];
        $statement->execute($product);

        $connectionObj->destroy();
    }
    public function closeCart($payment,$paid){
        $this->payment_type = $payment;
        $this->paid = $paid;
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        
        $statement = $connection->prepare('UPDATE shopping_cart SET payment_type = :payment, paid = :paid WHERE paid = 0');

        $product = [
           'payment' => $this->payment_type  ,
           'paid'=>$this->paid
        ];
        $statement->execute($product);

        $connectionObj->destroy();
    }
    


}