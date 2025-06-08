<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>

<h2>Your Tasks</h2>
<a href="index.php?controller=task&method=create">+ Add Task</a>

<table>
    <tr>
        <th>Title</th>
        <th>Due Date</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['due_date']) ?></td>
            <td><?= htmlspecialchars($task['priority']) ?></td>
            <td><?= htmlspecialchars($task['status']) ?></td>
            <td>
                <?php if ($task['status'] !== 'done'): ?>
                    <a href="index.php?controller=task&method=markDone&id=<?= $task['id'] ?>">✅ Done</a>
                <?php endif; ?>
                |
                <a href="index.php?controller=task&method=edit&id=<?= $task['id'] ?>">✏️ Edit</a> |
                <a href="index.php?controller=task&method=delete&id=<?= $task['id'] ?>" onclick="return confirm('Delete this task?');">🗑️ Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include __DIR__ . '/../layout/footer.php'; ?>
