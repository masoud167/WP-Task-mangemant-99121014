<?php

class Route {
    public function handleRequest() {
        $controller = $_GET['controller'] ?? 'Front';
        $method = $_GET['method'] ?? 'index';

        $controllerClass = ucfirst($controller) . 'Controller';
        $controllerPath = 'app/Controller/' . $controllerClass . '.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $method)) {
                $controllerInstance->$method();
            } else {
                echo "Method not found.";
            }
        } else {
            echo "Controller not found.";
        }
    }
}
