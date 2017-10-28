<?php
// DIC configuration

use App\Controllers\TaskController;
use App\Controllers\ReminderController;
use App\Controllers\CategoryController;

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('templates');

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['TaskController'] = function($c) {
    return new App\Controllers\TaskController($c);
};

$container['ReminderController'] = function($c) {
    return new App\Controllers\ReminderController($c);
};

$container['CategoryController'] = function($c) {
    return new App\Controllers\CategoryController($c);
};