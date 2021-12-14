<?php
session_start();
if (isset($_POST['add_cart'], $_POST['product_id'])) {

    $item = $_POST['product_id'];

    if (isset($_SESSION['cart_items'])) {
        $arra_column = array_column($_SESSION['cart_items'], 'item');
        if (!in_array($item, $arra_column)) {
            $count = count($_SESSION['cart_items']);
            $cart = array(
                'item'    => $item,
                'quantity' => 1,
            );
            $_SESSION['cart_items'][$count] = $cart;
        }
    } else {
        $cartItems = [];
        $cart['item'] = $item;
        $cart['quantity'] = 1;
        $cartItems[] = $cart;
        $_SESSION['cart_items'] = $cartItems;
    }
?>
    <script>
        window.history.back();
    </script>
<?php
}

if (isset($_POST['action']) && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $action = $_POST['action'];
    $response['data'] = $_POST;
    echo 'okay';
    if (isset($_SESSION['cart_items'])) {
        foreach ($_SESSION['cart_items'] as $key => $value) {
            if ($item_id == $value['item']) {
                $qty = $value['quantity'];
                $upQty = $qty;
                if ($action == 'pls') {
                    $upQty =  $upQty + 1;
                } elseif ($action == 'min') {
                    if ($qty != 1) {
                        $upQty = $upQty - 1;
                    }
                } elseif ($action == 'multiply') {
                    if ($_POST['qty'] > 1) {
                        $upQty = $_POST['qty'];
                    }
                }
                $item = array(
                    'item'    => $item_id,
                    'quantity' => $upQty,
                );
                $_SESSION['cart_items'][$key] = $item;
            }
        }
    }
}
if (isset($_GET['delete_item'])) {
    $getid = $_GET['delete_item'];
    foreach ($_SESSION['cart_items'] as $key => $value) {
        if ($value['item'] == $getid) {
            unset($_SESSION['cart_items'][$key]);
            $response['delete_item'] = $getid;
        }
        $_SESSION['cart_items'] = array_values($_SESSION['cart_items']);
    }
?>
    <script>
        window.history.back();
    </script>
<?php
}
