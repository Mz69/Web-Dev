<?php
    require_once "includes/header.php";
    require_once "db/db.php";
?>

<div id="product-nav">
    <ul>
        <li><a><img></a></li>
        <li><a href="#product_intro_img">Overview</a></li>
        <li><a href="#product-features">Features</a></li>
        <li><a href="#product-specs">Specs</a></li>
        <li><a href="#reviews">Reviews</a></li>
        <li><a>Cart</a></li>
    </ul>
</div>

<div id="product-intro-img">
<?php
    $product_id = 1;
    $sql = "SELECT * FROM iron_product WHERE i_product_id = $product_id;";

    $result = $dbconn -> query($sql);
    while($row=$result->fetch_assoc()) {
        echo "<h1>" . $row['i_product_name'] . "</h1>";
    }

    $sql = "SELECT * FROM iron_product_imgs WHERE i_product_id = $product_id;";
    $result = $dbconn -> query($sql);
    while($row=$result->fetch_assoc()) {
        echo "<img src='img/" . $row['i_img_path'] . "' id='big-img'>";
        break;
    }
?>
</div>

<div id="product-imgs">
    <ul>
        <?php
            $product_id = 1;
            $sql = "SELECT * FROM iron_product_imgs WHERE i_product_id = $product_id;";
            $result = $dbconn -> query($sql);
            while($row=$result->fetch_assoc()) {
                echo "<li><img src='img/" . $row['i_img_path'] . "' class='samll-img'></li>";
            }
        ?>
    </ul>

    <button id="left"><</button>
    <button id="right">></button>
</div>

<div id="product-features">
    <?php
        $product_id = 1;
        $sql = "SELECT * FROM iron_product WHERE i_product_id = $product_id;";
        $result = $dbconn -> query($sql);

        while($row=$result->fetch_assoc()) {
            echo "<p>" . $row['i_product_desc'] . "</p>";
        }
    ?>
</div>

<div id="product-specs">

</div>

<div id="reviews">
    
</div>

<?php
    require_once "includes/footer.php";
?>