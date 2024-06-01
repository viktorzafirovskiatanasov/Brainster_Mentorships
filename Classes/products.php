<?php
namespace Classes;
 include './connection/connection.php';
 use Database\Connection;
class Product {
   
    private $name;
    private $code;
    private $price;

    public function __construct(string $name , int $code , int $price)
    {
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
        $this->addProduct($this->name,$this->code,$this->price);
    }

    public function getPrice(){
        return $this->price;
    }
    public function getCode(){
        return $this->code;
    }
    public function getName(){
        return $this->name;
    }

    public function addProduct($name, $code, $price)
    {
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
    
        
        $existingProductId = $this->findProduct($code);
    
        if ($existingProductId) {
           
            echo 'Product with the same code already exists.';
        } else {
            
            $statement = $connection->prepare('INSERT INTO products (product_name, product_code, unit_price) VALUES (:name, :code, :price)');
            $product = [
                'name' => $name,
                'code' => $code,
                'price' => $price
            ];
            $statement->execute($product);
            echo 'Product added successfully.';
        }
    
        $connectionObj->destroy();
    }
    
    
     public static function findProduct($code){
        
         $connectionDB = new Connection();
         $connection = $connectionDB->getConnection();
         $statement = $connection->prepare('SELECT id FROM products WHERE product_code = :code');
         $statement->bindParam(':code', $code, \PDO::PARAM_INT);
         $statement->execute();
         $result = $statement->fetchColumn();
         return $result;
     }
}