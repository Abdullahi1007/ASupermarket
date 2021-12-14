<?php
session_start();
include_once("./php/autoload.php");
$title = "Your cart";
include_once('./includes/header.php');
// unset($_SESSION['cart_items'])
if (!isset($_SESSION['loggedin'])) {
    header('location:./Login.php');
}
?>

<section class="sec_cartlist">
    <div class="container-fluid">
        <div class="wrap_box">
            <div class="cartlist_left">
                <p>Your cart list</p>
                <div class="wrap_cartlist">
                <?php
                    $total = 0;
                    if (!empty($_SESSION['cart_items'])) {
                        $count = count($_SESSION['cart_items']);
                        foreach ($_SESSION['cart_items'] as $key => $value) {
                            $item_id = $value['item'];
                            $qty =  $value['quantity'];
                            $select = $db->runquery("SELECT * FROM `products` WHERE `product_id`='$item_id'");
                            $stock = 0;
                            if (mysqli_num_rows($select) > 0) {
                                $item = mysqli_fetch_array($select, MYSQLI_ASSOC);
                                // $stock = $stock + $item['Qty_On_Hand'];

                                $prc = $item['product_price'] * $qty;
                                $total = $total + $prc;

                    ?>
                    <div class="cartlist">
                        <div class="cartlist_img">
                            <img class="img-fluid" src="./Images/<?= $item['product_image'] ?>" alt="<?= $item['product_name'] ?>">
                        </div>
                        <div class="cartlist_name">
                            <p class="mb-0"><?= $item['product_name'] ?></p>
                        </div>
                        <div class="cartlist_input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text updateQty btn-primary btn" data-action="pls"
                                        data-item_id="<?= $item_id ?>"><i class="fa fa-plus"></i></span>
                                </div>
                                <input type="number" class="form-control input_num" data-item_id="<?= $item_id ?>" id="qty"
                                    min="1" max="" value="<?= $qty ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text btn-primary updateQty btn" data-action="min"
                                        data-item_id="<?= $item_id ?>"><i class="fa fa-minus"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="cartlist_action">
                            <p class="mb-1">Price: £<?= $prc ?></p>
                            <a class="btn btn-outline-danger" href="cart.php?delete_item=<?= $item_id ?>">Remove</a>
                        </div>
                    </div>
                    <?php
                            }
                        }
                        ?>

                    <?php
                    } else {
                        if (isset($_SESSION['status'], $_SESSION['message'])) {
                        ?>
                    <div class="alert alert-<?= $_SESSION['status'] ?>"><?= $_SESSION['message'] ?></div>
                    <?php
                            unset($_SESSION['status']);
                            unset($_SESSION['message']);
                        }
                        ?>

                    <h4 class="text-center">Your cart is empty</h4>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="cartlist_right">
                <h6 class="heading mb-0">Subtotal</h6>
                <table class="table table-borderless table_cart mt-3">
                    <tr>
                        <th>Item(s) :</th>
                        <td><?= isset($count) ? $count : '0' ?></td>
                    </tr>
                    <tr>
                        <td>Sub Total :</td>
                        <td>£<?= $total ?></td>
                    </tr>
                    <tr>
                        <td>Total :</td>
                        <td>£<?= $total ?></td>
                    </tr>
                </table>
                <?php
                if (isset($_SESSION['cart_items'])) {
                ?>
                <form action="checkout.php" class="payform mt-2" method="post">
                    <div class="input-group mb-3">
                        
                    </div>

                    <input type="hidden" value="<?= $total ?>" name="price">
                    <button type="submit" class="btn btn-block mt-2 btn_check_out">Check out</button>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
$('.updateQty').click(function(e) {
    e.preventDefault();
    var item_id = $(this).data('item_id');
    var action = $(this).data('action');
    $.post("cart.php", {
            'action': action,
            'item_id': item_id
        },
        function(data, textStatus, jqXHR) {
            console.log(textStatus);
            location.reload();
        }
    );
});

$('input#qty').change(function(e) {
    e.preventDefault();
    var item_id = $(this).data('item_id');
    var qty = $(this).val();
    $.post("cart.php", {
            'action': 'multiply',
            'item_id': item_id,
            'qty': qty
        },
        function(data, textStatus, jqXHR) {
            location.reload();
        }
    );
});
</script>
<?php
include_once('./includes/footer.php');
?>