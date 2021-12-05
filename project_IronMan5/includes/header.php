<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

        <!-- Boostrap CSS CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Boostrap Login CSS -->
        <link href="css/main.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
<body class="container">
    <?php
        session_start();
        if(!isset($_SESSION["cart"])) {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart']["1"] = 2;
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                    if(isset($_SESSION["email"])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php">Logout</a>
                </li>
                <?php
                    }
                    else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?login">Login</a>
                </li>
                <?php
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?checkout">Checkout</a>
                </li>
            </ul>
        </div>
    </nav>
<main id="pg-main">