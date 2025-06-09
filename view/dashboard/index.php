<?php include 'view/layout/header.php'; ?>
<?php include 'view/layout/navbar.php'; ?>

<!-- <a href="index.php?controller=auth&method=logout">Logout</a> -->

<div class="container">
<h1>Welcome <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h1>

<p>This is a taskmanagement website.</p>
</div>

<?php include 'view/layout/footer.php'; ?>