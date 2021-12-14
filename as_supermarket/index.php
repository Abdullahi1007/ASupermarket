<?php
session_start();
include_once("./php/autoload.php");
$title = "A's Supermerket";
include_once('./includes/header.php');
// unset($_SESSION['cart_items'])
$select = $db->runquery("SELECT * FROM `products`");
echo $db->err;
?>

<div class="wrap_products">
    <div class="container-fluid">
        <div class="row_products_grid">
            <?php
            while ($row = $select->fetch_assoc()) :
            ?>
            <div class="product_box">
                <img src="./Images/<?= $row['product_image'] ?>" class="product_img" alt="<?= $row['product_name'] ?>">
                <div class="product_body">
                    <h5 class="product_title mt-2 mb-3"><?= $row['product_name'] ?></h5>
                    <p class="product_p"><?= $row['product_description'] ?></p>
                    <p><b>Price :</b> £<?= $row['product_price'] ?></p>
                    <form action="./cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                        <input type="hidden" name="add_cart" value="1">
                        <button class="btn btn_product">Add to cart</button>
                    </form>
                </div>
            </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php
include_once('./includes/footer.php');
?>