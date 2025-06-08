<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>

<h2>Edit Task</h2>

<form method="post" action="index.php?controller=task&method=update">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    
    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required><br><br>

    <label>Due Date:</label>
    <input type="date" name="due_date" value="<?= $task['due_date'] ?>" required><br><br>

    <label>Priority:</label>
    <select name="priority">
        <option value="low" <?= $task['priority'] === 'low' ? 'selected' : '' ?>>Low</option>
        <option value="medium" <?= $task['priority'] === 'medium' ? 'selected' : '' ?>>Medium</option>
        <option value="high" <?= $task['priority'] === 'high' ? 'selected' : '' ?>>High</option>
    </select><br><br>

    <label>Status:</label>
    <select name="status">
        <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="in progress" <?= $task['status'] === 'in progress' ? 'selected' : '' ?>>In Progress</option>
        <option value="done" <?= $task['status'] === 'done' ? 'selected' : '' ?>>Done</option>
    </select><br><br>

    <button type="submit">Save Changes</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
