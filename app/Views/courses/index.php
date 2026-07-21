<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Courses | TechSpace</title>

<link rel="stylesheet"
href="/TechSpace/public/assets/css/style.css">

</head>

<body>

<h1>Available Courses</h1>

<hr>

<?php if(empty($courses)): ?>

<p>No courses available.</p>

<?php else: ?>

<?php foreach($courses as $course): ?>

<div>

<h2>

<a href="?page=course&id=<?= $course['id'] ?>">

    <?= htmlspecialchars($course['title']) ?>

</a>

</h2>

<p>

<?= htmlspecialchars($course['description']) ?>

</p>

<p>

<strong>Category:</strong>

<?= htmlspecialchars($course['category']) ?>

</p>

<p>

<strong>Level:</strong>

<?= htmlspecialchars($course['level']) ?>

</p>

<hr>

</div>

<?php endforeach; ?>

<?php endif; ?>

</body>

</html>