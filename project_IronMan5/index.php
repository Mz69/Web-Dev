<?php
    require "includes/header.php";
?> 
<?php
    if(!isset($_SESSION['email'])) {
        if(isset($_GET["create"])) {
            include "includes/createAccount.php";
        }
        else if(isset($_GET["checkout"])) {
            include "includes/checkout.php";
        }
        else {
            include "includes/login.php";
        }
    }
?>
 <?php
    require "includes/footer.php";
?>