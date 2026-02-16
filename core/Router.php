<?php

$url = $_GET['url'] ?? 'dashboard';

$url = explode('/', trim($url, '/'));

$controllerName = ucfirst($url[0]) . 'Controller';
$method = $url[1] ?? 'index';

$controllerFile = CONTROLLERS . '/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
    die('Controller introuvable');
}

require $controllerFile;

$controller = new $controllerName();

if (!method_exists($controller, $method)) {
    die('Méthode introuvable');
}

call_user_func_array([$controller, $method], array_slice($url, 2));
