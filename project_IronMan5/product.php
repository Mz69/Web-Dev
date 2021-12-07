<?php
    require_once "includes/header.php";
    require_once "db/db.php";
?>
<html>
    <link rel="stylesheet" href="css/productPg.css">

    <div id="product-nav">
        <a><img></a>
        <a href="#product_intro_img">Overview</a>
        <a href="#product-features">Features</a>
        <a href="#product-specs">Specs</a>
        <a href="#reviews">Reviews</a>
        <a>Cart</a>
    </div>

    <body>
        <div id="content">
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

            <div id="img-slider">
                <div>
                    <div id="product-imgs">
                        <?php
                            $product_id = 1;
                            $sql = "SELECT * FROM iron_product_imgs WHERE i_product_id = $product_id;";
                            $result = $dbconn -> query($sql);
                            $main = true;
                            while($row=$result->fetch_assoc()) {
                                if ($main) {
                                    echo "<img src='img/" . $row['i_img_path'] . "' class='small-img' id='main-img'>";
                                    $main = false;
                                } else {
                                    echo "<img src='img/" . $row['i_img_path'] . "' class='small-img'>";
                                }
                            }
                        ?>
                    </div>

                    <div id="slider-nav-btn">
                        <button id="left" value="0" onclick="slideImg(this.value, -1)">&#10094</button>
                        <button id="right" value="0" onclick="slideImg(this.value, 1)">&#10095</button>
                    </div>
                </div>
            </div>

            <div id="product-features">
                <h1>Features</h1>
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

                <h1>Specs</h1>

                <table>

                    <?php
                        $product_id = 1;
                        $sql = "SELECT * FROM iron_product_spec WHERE i_product_id = $product_id;";
                        $result = $dbconn -> query($sql);

                        while($row=$result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td class='spec-name'>" . $row['i_product_spec_name'] . "</td>
                                    <td>" . $row['i_product_spec_content'] . "</td>
                                </tr>";
                        }
                    ?>

                </table>

            </div>

            <div id="add2cart">

                <div id="num-control">
                    <button onclick="numChange(-1)">-</button>
                    <input id="num-purchase" value="1">
                    <button onclick="numChange(1)">+</button>
                </div>
                
                <button id="btn-add2cart" onclick="postNumPurchase()">Add to Cart</button>

            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>

</html>

<?php
    require_once "includes/footer.php";
?>