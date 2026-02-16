<?php

session_start();

// Chemins
define('ROOT', dirname(__DIR__, 2));
define('APP', ROOT . '/app');
define('CONFIG', APP . '/config');
define('CONTROLLERS', APP . '/controllers');
define('MODELS', APP . '/models');
define('CORE', ROOT . '/core');
define('VIEWS', APP . '/views');

// Autoload classes
spl_autoload_register(function ($class) {
    if (file_exists(CONTROLLERS . '/' . $class . '.php')) {
        require CONTROLLERS . '/' . $class . '.php';
    } elseif (file_exists(MODELS . '/' . $class . '.php')) {
        require MODELS . '/' . $class . '.php';
    } elseif (file_exists(CONFIG . '/' . $class . '.php')) {
        require CONFIG . '/' . $class . '.php';
    } elseif (file_exists(CORE . '/' . $class . '.php')) {
        require CORE . '/' . $class . '.php';
    }
});

// Connexion DB disponible partout
require CONFIG . '/Database.php';

// Router
require CORE . '/Router.php';
