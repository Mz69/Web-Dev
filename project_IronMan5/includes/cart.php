<?php
    require_once("../db/db.php");
    session_start();
    //Manipulate user Cart
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product-id'])) {
        $id = cleanUserInput($_POST["product-id"]);
        //Remove item from cart
        if(isset($_POST['delete'])) {
            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] -= 1;
            }
            else {
                $_SESSION['cart'][$id] = 0;
            }
        }
        //Add item to cart
        else {
            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += 1;
            }
            else {
                $_SESSION['cart'][$id] = 1;
            }
        } 
    }
    //Display cart items
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $cartSQL = "SELECT * FROM `iron_product` WHERE `i_product_id` = ?";
        $cartQuery = $dbconn->prepare($cartSQL);
        $totalPrice = 0;
        echo <<<CARTHEADER
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class='list-group mb-3'>
        CARTHEADER;
        foreach($_SESSION['cart'] as $key => $value) {
            $cartQuery->bind_param("i", $key);
            $cartQuery->execute();
            $cartResult = $cartQuery->get_result()->fetch_assoc();

            $title = $cartResult['i_product_name'];
            $desc = $cartResult['i_product_desc'];
            if(strlen($desc) > 50) {
                $desc = substr($desc, 0, 50) . "...";
            }
            $price = $cartResult['i_price'];

            for($i = 0; $i < $value; $i++) {
                $totalPrice += $price;

                echo <<<ITEM
                <li class="list-group-item d-flex justify-content-between lh-condensed cart-item">
                <div>
                    <h6 class="my-0">$title</h6>
                    <small class="text-muted">$desc</small>
                </div>
                <div class="d-flex flex-column">
                    <span class="text-muted text-right">$$price</span>
                    <p id="$key" class="remove-link">Remove</p>
                </li>
                ITEM;
            }
        }
        echo <<<CARTFOOTER
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (CAD)</span>
            <strong>$$totalPrice</strong>
        </li>
        </ul>
        CARTFOOTER;
    }
?>
