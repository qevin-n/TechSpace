<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | TechSpace</title>

    <link rel="stylesheet" href="/TechSpace/public/assets/css/style.css">
    <link rel="stylesheet" href="/TechSpace/public/assets/css/components.css">

</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <h1>Welcome Back</h1>

        <p>Login to your TechSpace account.</p>

        <form method="POST">

            <input
                type="email"
                name="email"
                placeholder="Email Address"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <button class="btn btn-primary">

                Login

            </button>

        </form>

        <p>

            Don't have an account?

            <a href="?page=register">

                Register

            </a>

        </p>

    </div>

</div>

</body>

</html>