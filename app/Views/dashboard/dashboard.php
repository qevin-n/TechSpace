<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link rel="stylesheet"
href="/TechSpace/public/assets/css/style.css">

<link rel="stylesheet"
href="/TechSpace/public/assets/css/components.css">

</head>

<body>

<?php require 'sidebar.php'; ?>

<div class="main-content">

    <?php require 'topbar.php'; ?>

    <section>

        <h2>

            Dashboard

        </h2>

        <p>

            Welcome to TechSpace!

        </p>

<div>

    <h3>Platform Statistics</h3>

    <ul>

        <li>
            Students:
            <strong><?= $students ?></strong>
        </li>

        <li>
            Admins:
            <strong><?= $admins ?></strong>
        </li>

        <li>
            Courses:
            <strong><?= $courses ?></strong>
        </li>

        <li>
            Logged in as:
            <strong><?= htmlspecialchars($user['role']) ?></strong>
        </li>

    </ul>

</div>

    </section>

    <?php require 'footer.php'; ?>

</div>

</body>

</html>