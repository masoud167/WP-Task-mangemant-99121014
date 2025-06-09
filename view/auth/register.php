<?php include 'view/layout/header.php'; ?>
<?php include 'view/layout/navbar.php'; ?>



<div class="container">
<form action="index.php?controller=auth&method=registerPost" method="POST">
    <h2>Register</h2>
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    Confirm Password: <input type="password" name="confirm_password" required><br>
    <button type="submit">Register</button>
</form>
</div>

<?php include 'view/layout/footer.php'; ?>
