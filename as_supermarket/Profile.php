<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: Products.html');
    exit;
}
$servername = "localhost";
$email = "root";
$password = '';
$dbname = "20168107";
$con = new mysqli($servername, $email, $password, $dbname);
if ($con->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stat = $con->prepare('SELECT password, FirstName, LastName, PhoneNumber, Address, PostCode, State FROM customers WHERE Customer_Id = ?');
// In this case we can use the account ID to get the account info.
$stat->bind_param('i', $_SESSION['id']);
$stat->execute();
$stat->bind_result($password, $FirstName, $LastName, $PhoneNumber, $Address, $PostCode, $State);
$stat->fetch();
$stat->close();
include_once("./includes/header2.php");
?>
    <section class="sec_profile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto profile_heading">
                    <h2 class="mb-0">Profile</h2>
                </div>
                <div class="col-md-8 mx-auto profile_desc">
                    <p>View your account details below:</p>
                    <table class="table table-borderless profile_table">
                        <tr>
                            <td class="td_first">Email<strong>:</strong></td>
                            <td><?= $_SESSION['name'] ?></td>
                        </tr>
                        <tr>
                            <td class="td_first">Password<strong>:</strong></td>
                            <td><?= $password ?></td>
                        </tr>
                        <tr>
                            <td class="td_first">First Name<strong>:</strong></td>
                            <td><?= $FirstName ?></td>
                        </tr>
                        <tr>
                            <td class="td_first">Last Name<strong>:</strong></td>
                            <td><?= $LastName ?></td>
                        </tr>
                        <tr>
                            <td class="td_first">Phone Number<strong>:</strong></td>
                            <td><?= $PhoneNumber ?></td>
                        </tr>
                        <tr>
                            <td class="td_first">Address<strong>:</strong></td>
                            <td><?= $Address ?></td>
                        </tr>
                        <tr>
                            <td class="td_first">Post code<strong>:</strong></td>
                            <td><?= $PostCode ?></td>
                        </tr>
                        <tr>
                            <td class="td_first">State<strong>:</strong></td>
                            <td><?= $State ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php
include_once('./includes/footer.php');
?>