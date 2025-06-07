# Task Management Web App

A simple PHP-based task management system built using custom MVC structure (no framework).

## Features

- User registration with email and password confirmation
- Secure login/logout system
- Task creation with due date, priority, and status
- Admin panel (optional)
- Dashboard for managing personal tasks

## Folder Structure

taskmanagement/
  ├── app/
  │   ├── Controller/
  │   ├── Model/
  │   └── Route.php
  ├── view/
  ├── index.php
  ├── .gitignore
  ├── README.md


## Requirements

- PHP 8.x
- MySQL (or MariaDB)
- Apache (XAMPP recommended)

## Setup

1. Place the project folder in `htdocs/` if using XAMPP.
2. Create the database:

```sql
CREATE DATABASE task_manager;
