<?php 

require('vendor/autoload.php');

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$route = (isset($_GET['route'])) ? $_GET['route'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : null;

echo (new Dispatcher(new Router, $route, $action))->output();
