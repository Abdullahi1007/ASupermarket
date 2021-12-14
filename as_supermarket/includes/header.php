<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "A's Supermarket" ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/Products.css">
    <link rel="stylesheet" href="./script/css/main.css">
    <link rel="stylesheet" href="./script/css/Profile.css">
    <script src="./js/jquery.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark nav_custom">
            <a class="navbar-brand logo" href="#">A's Supermarket</a>
            <button class="navbar-toggler navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar_nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ContactUs.php">Contact Us</a>
                    </li>
                    <?php if (isset($_SESSION['loggedin'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./Profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./script/Logout.php">Logout</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Signup.php">Sign Up</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cartlist.php"><i class="fa fa-shopping-cart cart_icon"> (<?= isset($_SESSION['cart_items']) ? count($_SESSION['cart_items']) : "0" ?>)</i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="hero">
            <h2>Shop Today</h2>
            <h1>GROCERIES</h1>
        </div>
    </header>
