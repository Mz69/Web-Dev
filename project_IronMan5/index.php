<?php
    require "includes/header.php";
?> 
<?php
        if(isset($_GET["order"])) {
            echo "<h2 class='text-center'>Thank you for your order</h2>";
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
        else {
        echo "<h2 class='text-center'>Landing Page</h2>";
        }
?>
 <?php
    require "includes/footer.php";
?>