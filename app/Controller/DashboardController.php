<?php

require_once __DIR__ . '/../Model/User.php';

class DashboardController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&method=login");
            exit();
        }

        // Show a simple dashboard
        include 'view/dashboard/index.php';
    }
}
