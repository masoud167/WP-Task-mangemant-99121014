<h2>Your Tasks</h2>
<a href="index.php?controller=task&method=create">+ Add Task</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Title</th>
        <th>Due Date</th>
        <th>Priority</th>
        <th>Status</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['due_date']) ?></td>
            <td><?= htmlspecialchars($task['priority']) ?></td>
            <td><?= htmlspecialchars($task['status']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
