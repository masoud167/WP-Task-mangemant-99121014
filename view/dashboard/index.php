<?php include 'view/layout/header.php'; ?>
<?php include 'view/layout/navbar.php'; ?>

<h1>Welcome <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h1>

<p>This is a taskmanagement website.</p>

<!-- <a href="index.php?controller=auth&method=logout">Logout</a> -->

<?php include 'view/layout/footer.php'; ?>
