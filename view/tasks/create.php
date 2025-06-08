<?php include 'view/layout/header.php'; ?>
<?php include 'view/layout/navbar.php'; ?>

<h2>Create New Task</h2>

<form action="index.php?controller=task&method=store" method="POST">
    Title: <input type="text" name="title" required><br>
    Description: <textarea name="description"></textarea><br>
    Due Date: <input type="date" name="due_date"><br>
    Priority:
    <select name="priority">
        <option value="low">Low</option>
        <option value="medium" selected>Medium</option>
        <option value="high">High</option>
    </select><br>
    <button type="submit">Add Task</button>
</form>

<?php include 'view/layout/footer.php'; ?>
