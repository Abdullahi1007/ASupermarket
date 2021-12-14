<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sign in</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/Login.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="./script/verify.php" method="post">
            <h1 class="mb-4">A's Supermarket</h1>
            <h2 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="email" name="email" placeholder="name@example.com" id="email" required>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" placeholder="Password" id="password" required>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="signin" type="submit">Sign in</button>
        </form>
        <form method="POST" action="Signup.php">
        <button class="register" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
     </form>
    </main>
</body>

</html>