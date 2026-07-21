<section class="dashboard">

    <div class="dashboard-hero">

        <div>

            <h1>
                Welcome back,
                <?= htmlspecialchars($user['first_name']) ?> 👋
            </h1>

            <p>
                Continue learning ICT & Multimedia with TechSpace.
            </p>

        </div>

        <div class="hero-date">

            <h3>

                <?= date('l') ?>

            </h3>

            <p>

                <?= date('F j, Y') ?>

            </p>

        </div>

    </div>

    <div class="stats-grid">

<?php

$icon = "👨‍🎓";
$title = "Students";
$value = $students;
require __DIR__ . '/../components/stat-card.php';

$icon = "👨‍💼";
$title = "Admins";
$value = $admins;
require __DIR__ . '/../components/stat-card.php';

$icon = "📚";
$title = "Courses";
$value = $courses;
require __DIR__ . '/../components/stat-card.php';

$icon = "👤";
$title = "Role";
$value = ucfirst($user['role']);
require __DIR__ . '/../components/stat-card.php';

?>

</div>

    <div class="dashboard-section">

        <h2>Quick Actions</h2>

        <div class="actions">

            <a href="?page=courses" class="btn">
                Browse Courses
            </a>

            <a href="?page=resources" class="btn">
                Learning Resources
            </a>

            <a href="?page=projects" class="btn">
                Student Projects
            </a>

        </div>

    </div>
    <div class="dashboard-section">

    <h2>Recent Courses</h2>

    <div class="course-list">

        <?php foreach ($courseList ?? [] as $course): ?>

            <div class="course-item">

                <h3>

                    <?= htmlspecialchars($course['title']) ?>

                </h3>

                <p>

                    <?= htmlspecialchars($course['category']) ?>

                </p>

            </div>

        <?php endforeach; ?>

    </div>

</div>

</section>