<?php

class Task {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "task_mangement_db");
    }

    public function getAllByUser($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function create($userId, $title, $description, $due_date, $priority) {
        $stmt = $this->conn->prepare("INSERT INTO tasks (user_id, title, description, due_date, priority) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $userId, $title, $description, $due_date, $priority);
        return $stmt->execute();
    }
    public function markDone($id)
    {
        // 1. Get the task data
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $task = $stmt->get_result()->fetch_assoc();

        if (!$task) return;

        // 2. Check if it's late
        $now = date('Y-m-d H:i:s');
        $dueDate = $task['due_date'] . ' 23:59:59';
        $status = ($now <= $dueDate) ? 'done' : 'failed';

        // 3. Insert into history
        $stmt = $this->conn->prepare("INSERT INTO task_history (user_id, title, due_date, completed_at, priority, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $task['user_id'], $task['title'], $task['due_date'], $now, $task['priority'], $status);
        $stmt->execute();

        // 4. Delete from tasks table
        $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }


public function delete($id)
{
    $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

public function getById($id)
{
    $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function update($data)
{
    $stmt = $this->conn->prepare("UPDATE tasks SET title=?, due_date=?, priority=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi", $data['title'], $data['due_date'], $data['priority'], $data['status'], $data['id']);
    $stmt->execute();
}
public function getHistory($userId)
{
    $stmt = $this->conn->prepare("SELECT * FROM task_history WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

public function deleteHistory($id)
{
    $stmt = $this->conn->prepare("DELETE FROM task_history WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}


}
