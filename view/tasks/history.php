<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>


<div class="container">
<h2>Task History</h2>

<table>
    <tr>
        <th>Title</th>
        <th>Due Date</th>
        <th>Completed At</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($history as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['due_date']) ?></td>
            <td><?= htmlspecialchars($task['completed_at']) ?></td>
            <td><?= htmlspecialchars($task['priority']) ?></td>
            <td><?= $task['status'] === 'done' ? '✅ Done' : '❌ Failed' ?></td>
            <td>
                <a href="index.php?controller=task&method=deleteHistory&id=<?= $task['id'] ?>" onclick="return confirm('Delete from history?');">🗑️ Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</div>

<?php include 'view/layout/footer.php'; ?>