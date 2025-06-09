<?php include 'view/layout/header.php'; ?>
<?php include 'view/layout/navbar.php'; ?>




<div class="container">
<form action="index.php?controller=auth&method=loginPost" method="POST">
    <h2>Login</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
</div>

<?php include 'view/layout/footer.php'; ?>