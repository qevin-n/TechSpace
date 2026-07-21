<section class="course-details">

    <h1><?= htmlspecialchars($course['title']) ?></h1>

    <p>

        <?= htmlspecialchars($course['description']) ?>

    </p>

    <hr>

    <p>

        <strong>Category:</strong>

        <?= htmlspecialchars($course['category']) ?>

    </p>

    <p>

        <strong>Level:</strong>

        <?= htmlspecialchars($course['level']) ?>

    </p>

    <br>

    <a href="?page=enroll&id=<?= $course['id'] ?>" class="btn">

        Enroll Now

    </a>

</section>