<?php
session_start();
$servername = "localhost";
$email = "root";
$password = "";
$dbname = "20168107";

$con = new mysqli($servername, $email, $password, $dbname);
if ($con->connect_error) {
    exit("Connection failed: " . $con->connect_error);
}

if (!isset($_POST['email'], $_POST['password'])) {
    exit('Please fill both the email and password fields!');
}

if ($stat = $con->prepare('SELECT Customer_Id, password FROM customers WHERE email = ?')) {
    $stat->bind_param('s', $_POST['email']);
    $stat->execute();
    $stat->store_result();

    if ($stat->num_rows > 0) {
        $stat->bind_result($Customer_Id, $password);
        $stat->fetch();
        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] =  $_POST['email'];
            $_SESSION['id'] = $Customer_Id;
            header('Location: ../Profile.php');
        } else {
            echo 'Incorrect email and/or password!';
        }
    } else {
        echo 'Incorrect email and/or password!';
    }

    $stat->close();
}