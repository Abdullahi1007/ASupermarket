<?php
session_start();
include_once('./php/autoload.php');
if (isset($_POST['pay'])) {
    $price = $_POST['price'];
    $user = $_POST['user'];
    $name_on_card = $_POST['name_on_card'];
    $card_number = $_POST['card_number'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $security_code = $_POST['security_code'];
    if (empty($price) || empty($name_on_card) || empty($card_number) || empty($month) || empty($year) || empty($security_code)) {
        $error = "Fileds are required";
    } elseif (strlen($card_number) < 16) {
        $error = "Card number should be more than 16 character";
    } elseif (strlen($security_code) < 3) {
        $error = "Security code should be 3 character";
    } else {
        $sql = "INSERT INTO `orders`(`customer_id`,`name_on_card`, `card_number`, `month`, `year`, `security_code`, `total_price`) VALUES ('$user','$name_on_card','$card_number','$month','$year','$security_code','$price')";

        if ($db->runquery($sql)) {
            $order_id = $db->lastid();

            foreach ($_SESSION['cart_items'] as $key => $value) {
                $item_id = $value['item'];
                $select = $db->runquery("SELECT * FROM `products` WHERE `product_id`='$item_id'");
                $item = mysqli_fetch_assoc($select);
                $quantity = $value['quantity'];
                $sub_total = $item['product_price'] * $quantity;
                $sql1 = "INSERT INTO `order_items`(`order_id`, `product_id`, `quantity`, `sub_total`) VALUES ('$order_id','$item_id','$quantity','$sub_total')";
                $db->runquery($sql1);
            }
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Your Order has been processed';
            unset($_SESSION['cart_items']);
            header('location:cartlist.php');
        } else {
            $_SESSION['status'] = 'danger';
            $_SESSION['message'] = 'Something is wrong';
            header('location:cartlist.php');
        }
    }
?>
<?php
}
?>
<?php
$title = "Check out";
include_once('./includes/header.php');
// unset($_SESSION['cart_items'])
if (!isset($_POST['price'])) {
    header('location:cartlist.php');
}
?>

<div class="container pb-5">
    <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto">
            <div class="">
                <?php if (isset($error)) : ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <h4 class="heading mb-0 my-3">Add Credit/Debit card</h4>
                <h6 class="my-3">Payment amount : £<?= $_POST['price'] ?? "" ?></h6>
                <form action="" class="payemnt" method="POST">
                    <input type="text" name="name_on_card" class="form-control my-2" placeholder="NAME ON CARD"
                        required>
                    <input type="number" name="card_number" minlength="16" class="form-control my-2" placeholder="CARD NUMBER" required>
                    <select name="month" class="form-control my-2" required>
                        <option value="">MONTH</option>
                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <select name="year" class="form-control my-2" required>
                        <option value="">YEAR</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                    </select>
                    <input type="text" name="security_code" maxlength="3" class="form-control my-2"
                        placeholder="SECURITY CODE">
                    <input type="hidden" name="price" value="<?= $_POST['price'] ?>">
                    <input type="hidden" class="form-control" name="user"
                        value="<?= isset($_SESSION['loggedin']) ? $_SESSION['id'] : "" ?>">
                    <button class="btn btn-primary" name="pay" type="submit">Make Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>
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