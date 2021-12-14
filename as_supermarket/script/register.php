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
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['email'], $_POST['password'], $_POST['FirstName'], $_POST['LastName'], $_POST['PhoneNumber'], $_POST['Address'], $_POST['PostCode'], $_POST['State'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['FirstName']) || empty($_POST['LastName']) || empty($_POST['PhoneNumber']) || empty($_POST['Address']) || empty($_POST['PostCode']) || empty($_POST['State'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}
// We need to check if the account with that username exists.
if ($stat = $con->prepare('SELECT Customer_Id, password FROM customers WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stat->bind_param('s', $_POST['email']);
	$stat->execute();
	$stat->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stat->num_rows > 0) {
		// Username already exists
		echo 'Email exists, please choose another!';
	} else {
		// Username doesnt exists, insert new account
		if ($stat = $con->prepare('INSERT INTO customers (email, password, FirstName, LastName, PhoneNumber, Address, PostCode, State) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$stat->bind_param('ssssssss', $_POST['email'], $_POST['password'], $_POST['FirstName'], $_POST['LastName'], $_POST['PhoneNumber'], $_POST['Address'], $_POST['PostCode'], $_POST['State']);
			$stat->execute();
			echo 'You have successfully registered, you can now login!';
		} else {
			// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			echo 'Could not prepare statement!';
		}
	}
	$stat->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../script/css/register.css">
    <title>Register</title>
</head>

<body>
    <form action="../Login.php" method="post">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</body>

</html>