<?php
class User {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "task_manager");
    }

    public function create($username, $password) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }

    public function findByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
