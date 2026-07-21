<!DOCTYPE html>
<html lang="en">

<head>

<title>

<?= $title ?? 'TechSpace' ?>

</title>

<?php require __DIR__ . '/../partials/head.php'; ?>

</head>

<body>

<?php require __DIR__ . '/../partials/sidebar.php'; ?>

<div class="main-content">

<?php require __DIR__ . '/../partials/topbar.php'; ?>

<main>

<?= $content ?>

</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>

</div>

</body>

</html>