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
    $stmt = $this->conn->prepare("UPDATE tasks SET status='done' WHERE id=?");
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

}
