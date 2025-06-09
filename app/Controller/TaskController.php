
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../Model/Task.php';

class TaskController {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&method=login");
            exit();
        }

        $taskModel = new Task();
        $tasks = $taskModel->getAllByUser($_SESSION['user']['id']);
        include 'view/tasks/index.php';
    }

    public function create() {
        include 'view/tasks/create.php';
    }

    public function store() {
        session_start();
        $task = new Task();
        $task->create(
            $_SESSION['user']['id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['due_date'],
            $_POST['priority']
        );
        header("Location: index.php?controller=task&method=index");
    }
    public function markDone()
{
    $id = $_GET['id'];
    $taskModel = new Task();
    $taskModel->markDone($id);
    header("Location: index.php?controller=task&method=index");
}

public function delete()
{
    $id = $_GET['id'];
    $taskModel = new Task();
    $taskModel->delete($id);
    header("Location: index.php?controller=task&method=index");
}

public function edit()
{
    $id = $_GET['id'];
    $taskModel = new Task();
    $task = $taskModel->getById($id);
    include 'view/tasks/edit.php';
}

public function update()
{
    $taskModel = new Task();
    $taskModel->update($_POST);
    header("Location: index.php?controller=task&method=index");
}
public function history()
{
    $taskModel = new Task();
    $userId = $_SESSION['user']['id'];
    $history = $taskModel->getHistory($userId);
    include 'view/tasks/history.php';
}

public function deleteHistory()
{
    $id = $_GET['id'];
    $taskModel = new Task();
    $taskModel->deleteHistory($id);
    header("Location: index.php?controller=task&method=history");
}


}
