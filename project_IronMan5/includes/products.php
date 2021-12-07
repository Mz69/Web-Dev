<link href="css/main.css" rel="stylesheet">

<h1>All Products</h1>

<div>
    <?php
        include "db/db.php";
        $sql = "SELECT * FROM iron_product;";
        $result = $dbconn -> query($sql);

        while ($row=$result->fetch_assoc()) {
            echo 
                "<div class='product'>
                    <h3>" . $row['i_product_name'] . "</h3>
                    <p>" . $row['i_product_desc'] . "</p>
                    <a href='product.php?id=" . $row['i_product_id'] . "'>Click for more info</a>
                </div>";
        }
    ?>
</div>