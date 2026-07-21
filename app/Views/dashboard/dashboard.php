<?php

$user = $_SESSION['user'];

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Dashboard</title>

</head>

<body>

<h1>

Welcome,

<?= htmlspecialchars($user['first_name']) ?>

🎉

</h1>

<p>

You have successfully logged in.

</p>

<p>

Role:

<strong>

<?= htmlspecialchars($user['role']) ?>

</strong>

</p>

<a href="?page=logout">

Logout

</a>

</body>

</html>