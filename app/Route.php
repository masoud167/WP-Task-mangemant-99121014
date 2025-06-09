<?php

class Route
{
    public function handleRequest()
    {
        // 1. Read query-string, supply SAFE defaults
        $controllerName = $_GET['controller'] ?? 'auth';   // default controller
        $methodName     = $_GET['method']     ?? 'login';  // default method

        // 2. Build class/file names
        $controllerClass = ucfirst($controllerName) . 'Controller';
        $controllerPath  = 'app/Controller/' . $controllerClass . '.php';

        // 3. Controller file must exist
        if (!file_exists($controllerPath)) {
            echo "Controller not found.";
            return;
        }

        require_once $controllerPath;
        $controllerInstance = new $controllerClass();

        // 4. Method must exist
        if (!method_exists($controllerInstance, $methodName)) {
            echo "Method not found.";
            return;
        }

        // 5. Call the controller method
        $controllerInstance->$methodName();
    }
}
