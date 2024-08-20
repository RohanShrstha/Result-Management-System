<?php
class Router {
    protected $whitelistedRoutes = [
        'home/index',
        'auth/login',
        'user/login',
    ];

    public function dispatch($uri) {
        // Start the session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Remove leading/trailing slashes and any query strings
        $uri = trim(parse_url($uri, PHP_URL_PATH), '/');
        $segments = explode('/', $uri);

        $baseFolder = 'rms';

        // Remove the base folder segment if present
        if (isset($segments[0]) && $segments[0] === $baseFolder) {
            array_shift($segments);
        }

        // Determine the controller name, default to 'HomeController' if not provided
        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
        // Determine the method name, default to 'index' if not provided
        $methodName = isset($segments[1]) && !empty($segments[1]) ? $segments[1] : 'index';

        // Capture any additional segments as parameters
        $parameters = array_slice($segments, 2);

        // Check if the route requires authentication
        $route = implode('/', $segments);
        $redirectPath = 'home/index'; // Simplified path without base folder

        if (!$this->isWhitelisted($route) && !$this->isLoggedIn() && $route !== $redirectPath) {
            header('Location: /rms/' . $redirectPath);
            exit();
        }

        // Path to the controller file
        $controllerPath = 'app/Controllers/' . $controllerName . '.php';

        // Check if the controller file exists
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            // Check if the class exists in the file
            if (class_exists($controllerName)) {
                $controller = new $controllerName;

                // Check if the method exists in the controller
                if (method_exists($controller, $methodName)) {
                    call_user_func_array([$controller, $methodName], $parameters);
//                    $controller->$methodName();
                } else {
                    echo "Method '$methodName' not found in controller '$controllerName'.";
                }
            } else {
                echo "Class '$controllerName' not found in '$controllerPath'.";
            }
        } else {
            echo "Controller '$controllerName' not found.";
        }
    }

    protected function isWhitelisted($route) {
        // Check if the current route is in the whitelist
        return in_array($route, $this->whitelistedRoutes);
    }

    protected function isLoggedIn() {
        // Check if the user is logged in (i.e., session has user_id)
        return isset($_SESSION['user']);
    }
}
?>
