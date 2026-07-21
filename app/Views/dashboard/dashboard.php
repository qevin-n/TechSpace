<section class="dashboard">

    <div class="dashboard-header">

        <h1>Dashboard</h1>

        <p>
            Welcome back,
            <strong><?= htmlspecialchars($user['first_name']) ?></strong> 👋
        </p>

        <p>
            Continue your ICT & Multimedia learning journey.
        </p>

    </div>

    <div class="stats-grid">

        <div class="stat-card">

            <h3>👨‍🎓 Students</h3>

            <h2><?= $students ?></h2>

        </div>

        <div class="stat-card">

            <h3>👨‍💼 Admins</h3>

            <h2><?= $admins ?></h2>

        </div>

        <div class="stat-card">

            <h3>📚 Courses</h3>

            <h2><?= $courses ?></h2>

        </div>

        <div class="stat-card">

            <h3>👤 Role</h3>

            <h2><?= htmlspecialchars($user['role']) ?></h2>

        </div>

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

</section>