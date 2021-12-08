<?php
    require_once("../db/db.php");
    session_start();
    
    //Manipulating a user's cart
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product-id']) && isset($_POST['num-products'])) {
        
        //Clean user input
        $numItems = cleanUserInput($_POST["num-products"]);
        $id = cleanUserInput($_POST["product-id"]);

        //Remove item from cart if requested
        if(isset($_POST['delete'])) {
            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] -= $numItems;
            }
            else {
                $_SESSION['cart'][$id] = 0;
            }
        }
        //Add item to cart
        else {
            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += $numItems;
            }
            else {
                $_SESSION['cart'][$id] = $numItems;
            }
        } 
    }
    //Display cart items
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        //Query database for all product specs
        $cartSQL = "SELECT * FROM `iron_product` WHERE `i_product_id` = ?";
        $cartQuery = $dbconn->prepare($cartSQL);

        //Keep track of total cart price
        $totalPrice = 0;

        //Cart container
        echo <<<CARTHEADER
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="">Cart</span>
        </h4>
        <ul id="cart-list" class='list-group mb-3'>
        CARTHEADER;
        //Print product into cart
        foreach($_SESSION['cart'] as $key => $value) {
            $cartQuery->bind_param("i", $key);
            $cartQuery->execute();
            $cartResult = $cartQuery->get_result()->fetch_assoc();

            $title = $cartResult['i_product_name'];
            $desc = $cartResult['i_product_desc'];

            //Limit on description length
            if(strlen($desc) > 50) {
                $desc = substr($desc, 0, 50) . "...";
            }
            $price = $cartResult['i_product_price'];

            //If more than one instance of product in cart, loop
            for($i = 0; $i < $value; $i++) {
                $totalPrice += $price;

                echo <<<ITEM
                <li class="list-group-item d-flex justify-content-between lh-condensed cart-item">
                <div class='mr-3'>
                    <h6 class="my-0">$title</h6>
                    <small class="text-muted">$desc</small>
                </div>
                <div class="d-flex flex-column">
                    <span class="text-muted text-right">$$price</span>
                    <a id="$key" class="remove-link">Remove</a>
                </li>
                ITEM;
            }
        }

        //Close cart container
        echo <<<CARTFOOTER
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (CAD)</span>
            <strong>$$totalPrice</strong>
        </li>
        </ul>
        CARTFOOTER;
    }
?>
