<?php
$errors = $errors ?? [];
$success = $success ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | TechSpace</title>

    <link rel="stylesheet" href="/TechSpace/public/assets/css/style.css">
    <link rel="stylesheet" href="/TechSpace/public/assets/css/components.css">

</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <h1>Create Account</h1>

        <p>Join TechSpace today.</p>

        <?php if (!empty($errors)): ?>

            <div class="alert alert-danger">

                <?php foreach ($errors as $error): ?>

                    <p><?= htmlspecialchars($error) ?></p>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <?php if (!empty($success)): ?>

            <div class="alert alert-success">

                <?= htmlspecialchars($success) ?>

            </div>

        <?php endif; ?>
        <?php if (!empty($errors)): ?>

<div class="alert alert-danger">

    <?php foreach ($errors as $error): ?>

        <p><?= htmlspecialchars($error) ?></p>

    <?php endforeach; ?>

</div>

<?php endif; ?>

<?php if (!empty($success)): ?>

<div class="alert alert-success">

    <p><?= htmlspecialchars($success) ?></p>

</div>

<?php endif; ?>

        <form method="POST" action="?page=register">

            <input
                type="text"
                name="first_name"
                placeholder="First Name"
                required
            >

            <input
                type="text"
                name="last_name"
                placeholder="Last Name"
                required
            >

            <input
                type="text"
                name="username"
                placeholder="Username"
                required
            >

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

            <button
                type="submit"
                class="btn btn-primary">

                Create Account

            </button>

        </form>

        <p>

            Already have an account?

            <a href="/TechSpace/public/login">

                Login

            </a>

        </p>

    </div>

</div>

</body>

</html>
