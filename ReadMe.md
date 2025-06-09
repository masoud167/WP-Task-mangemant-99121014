# Task Management Web App

A simple PHP-based task management system built using custom MVC structure (no framework).


## Features

- User registration with email & password confirmation
- User login/logout
- Add, update, and mark tasks as done
- Automatically move completed tasks to a `history` table
- Failed tasks marked based on due date
- Delete tasks from history
- Navigation bar for users
- Basic styling for improved UI


## Folder Structure

taskmanagement/
  - app/
    - Controller/ # Handles logic (AuthController, TaskController, etc.)
    - Model/ # Database interaction (User.php, Task.php, etc.)
    - Route.php # Core router
  - view/ # View files (HTML + PHP)
    - layout/ # View filse
    - pages # Page views like login, register, dashboard, etc.
  - index.php # Entery point
  - .gitignore
  - README.md


## Requirements

- PHP 8.x
- MySQL (or MariaDB)
- Apache (XAMPP recommended)

