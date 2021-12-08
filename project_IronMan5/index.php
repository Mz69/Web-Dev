<?php
    require "includes/header.php";
?> 
<?php
        if(isset($_GET["order"])) {
            echo "<h2 class='text-center'>Thank you for your order!</h2>";
            include "includes/landing.php";
        }
        else if(isset($_GET["create"])) {
            include "includes/createAccount.php";
        }
        else if(isset($_GET["login"])) {
            include "includes/login.php";
        }
        else if(isset($_GET["checkout"])) {
            include "includes/checkout.php";
        }
        else if(isset($_GET["products"])) {
            include "includes/products.php";
        }
        else {
            include "includes/landing.php";
        }
     
?>
 
 <?php
    require "includes/footer.php";
?>