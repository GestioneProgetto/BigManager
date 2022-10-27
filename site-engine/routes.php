<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require __DIR__ . '/pages/index.html';
        break;
    case '':
        require __DIR__ . '/pages/index.html';
        break;
    default:
        require __DIR__ . '/errors/404.php';
        break;
}

//  https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database