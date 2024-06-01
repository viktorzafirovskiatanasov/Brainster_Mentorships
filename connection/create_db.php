<?php

try {
    $host = "127.0.0.1";
    $dbname = "supermarket";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $sql = " CREATE TABLE `products` (
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`product_name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`product_code` VarChar( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`unit_price` Decimal( 10, 2 ) UNSIGNED NOT NULL,
	 PRIMARY KEY ( `id` )
	)
	CHARACTER SET = utf8
	COLLATE = utf8_general_ci
	COMMENT 'Table for products'
	ENGINE = InnoDB
	AUTO_INCREMENT = 1;
	CREATE TABLE `shopping_cart` (
		`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
		`date_and_time` Date DEFAULT NULL,
		`payment_type` TinyInt( 255 ) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Payment Type: 1 - Cash, 2 - Credit Card',
		`paid` TinyInt( 1 ) UNSIGNED NOT NULL DEFAULT '0',
		PRIMARY KEY ( `id` )
	)
	CHARACTER SET = utf8
	COLLATE = utf8_general_ci
	COMMENT 'Represents Customers shopping cart'
	ENGINE = InnoDB
	AUTO_INCREMENT = 1;
	CREATE TABLE `cart_items` (
		`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL,
		`product_id` Int( 255 ) NOT NULL,
		`cart_id` Int( 255 ) NOT NULL,
		`product_amount` Decimal( 10, 3 ) UNSIGNED NOT NULL,
		PRIMARY KEY ( `id` )
	)
	CHARACTER SET = utf8
	COLLATE = utf8_general_ci
	COMMENT 'The products in a cart'
	ENGINE = InnoDB
	AUTO_INCREMENT = 1;


	ALTER TABLE `cart_items` ADD CONSTRAINT `lnk_shopping_cart_cart_items` FOREIGN KEY ( `cart_id` ) REFERENCES `shopping_cart`( `id` ) ON DELETE Cascade ON UPDATE Cascade;

	ALTER TABLE `cart_items` ADD CONSTRAINT `lnk_products_cart_items` FOREIGN KEY ( `product_id` ) REFERENCES `products`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
	";

		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		var_dump($q);

	} catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}

?>