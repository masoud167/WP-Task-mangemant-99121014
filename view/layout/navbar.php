<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<nav>
    <a href="index.php?controller=dashboard&method=index">Home</a>
    <?php if (isset($_SESSION['user'])): ?>
        <a href="index.php?controller=task&method=index">Tasks</a>
        <a href="index.php?controller=task&method=history">History</a>
        <a href="index.php?controller=auth&method=logout">Logout (<?= htmlspecialchars($_SESSION['user']['username']) ?>)</a>
    <?php else: ?>
        <a href="index.php?controller=auth&method=login">Login</a>
        <a href="index.php?controller=auth&method=register">Register</a>
    <?php endif; ?>
</nav>
