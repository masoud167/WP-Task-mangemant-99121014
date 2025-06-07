<?php
require_once 'app/Model/User.php';

class AuthController {
    public function register() {
        require 'view/auth/register.php';
    }

    public function registerPost() {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new User();
        $user->create($username, $password);

        header("Location: index.php?controller=auth&method=login");
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

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}
