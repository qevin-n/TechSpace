<?php

$user = $_SESSION['user'] ?? null;

?>

<header class="topbar">

    <div>

        <h2>

            Welcome,

            <?= $user ? htmlspecialchars($user['first_name']) : 'Guest' ?>

        </h2>

    </div>

    <div>

        <span>🔔</span>

        <span>👤</span>

        <?= $user ? htmlspecialchars($user['username']) : '' ?>

    </div>

</header>