<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: Products.html');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="../script/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

</head>

<body class="loggedin">
    <div class="container-fluid">
        <header>
            <div class="logo"> <a href="">A's Supermarket</a></div>
            <input type="checkbox" id="res-menu">
            <label for="res-menu">
                <i class="fa fa-bars" id="sign-one"></i>
                <i class="fa fa-times" id="sign-two"></i>
            </label>
            <nav>
                <ul class="navbar">
                    <li class="item"><a href="../index.php">Products</a></li>
                    <li class="item"><a href="../ContactUs.php">Contact Us</a></li>
                    <li class="item button secondary"><a href="../script/Profile.php">Profile</a></li>
                    <li class="item button"><a href="../script/Logout.php">Logout</a></li>
                    <li class="item" style="font-size:24px"><a href="cartlist.php"><i
                                class="fa fa-shopping-cart">(<?= isset($_SESSION['cart_items']) ? count($_SESSION['cart_items']) : "0" ?>)</i></a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <p>Welcome back, <?= $_SESSION['name'] ?>!</p>
        </div>
</body>

</html>