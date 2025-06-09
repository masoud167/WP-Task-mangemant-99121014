<?php
require_once 'app/Model/User.php';

class AuthController {
    public function register() {
        require 'view/auth/register.php';
    }

public function registerPost() {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $user = new User();
    $result = $user->create($username, $email, $hashedPassword);

    if ($result) {
        header("Location: index.php?controller=auth&method=login");
    } else {
        echo "Failed to register. Username or email might already be taken.";
    }
}


    public function login() {
        require 'view/auth/login.php';
    }

    public function loginPost() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();
        $found = $user->findByUsername($username);

        if ($found && password_verify($password, $found['password'])) {
            session_start();
            $_SESSION['user'] = $found;
            header("Location: index.php?controller=dashboard&method=index");
        } else {
            echo "Invalid login!";
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();
        header('Location: index.php?controller=auth&method=login');
        exit();
    }

}
