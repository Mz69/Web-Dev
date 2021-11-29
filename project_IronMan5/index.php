<?php
    require "includes/header.php";
?> 
<?php
    echo "Session Array: <br>";
    print_r($_SESSION);
    if(!isset($_SESSION['email'])) {
        if(isset($_GET["create"])) {
            include "includes/createAccount.php";
        }
        else {
            include "includes/login.php";
        }
    }
?>
 <?php
    require "includes/footer.php";
?>