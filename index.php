<?php
require_once 'config/config.php';
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'core/View.php';

// Initialize the router
$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);
?>
