<h1>Welcome to your Dashboard, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h1>

<p>This is the home page after logging in.</p>

<a href="index.php?controller=auth&method=logout">Logout</a>
