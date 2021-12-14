<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/Signup.css" rel="stylesheet">
    <title>Signup</title>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="./script/register.php" method="post">
            <h1 class="mb-4">A's Supermarket</h1>
            <h2 class="h3 mb-3 fw-normal">Please sign Up</h1>

                <div class="form-floating">
                    <input type="email" name="email" placeholder="name@example.com" id="email" required>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" placeholder="Password" id="password" required>
                </div>
                <div class="form-floating">
                    <input type="FirstName" name="FirstName" placeholder="First Name" id="FirstName" required>
                </div>
                <div class="form-floating">
                    <input type="LastName" name="LastName" placeholder="Last Name" id="LastName" required>
                </div>
                <div class="form-floating">
                    <input type="PhoneNumber" name="PhoneNumber" placeholder="Phone number" id="PhoneNumber" required>
                </div>
                <div class="form-floating">
                    <input type="Address" name="Address" placeholder="Address" id="Address" required>
                </div>
                <div class="form-floating">
                    <input type="PostCode" name="PostCode" placeholder="Post code" id="PostCode" required>
                </div>
                <div class="form-floating">
                    <input type="State" name="State" placeholder="State" id="State" required>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>



</body>

</html>