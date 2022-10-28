<?php

$request = $_SERVER['REQUEST_URI'];

$param = explode('?', $request);

switch ($param[0]) {
    case '/':
        require __DIR__ . '/pages/index.html';
        break;
    case '':
        require __DIR__ . '/pages/index.html';
        break;
    case '/login':
        require __DIR__ . '/registration/login.php';
        break;
    case '/register':
        require __DIR__ . '/registration/register.php';
        break;
    case '/logged':
        require __DIR__ . '/registration/index.php';
        break;
    default:
        require __DIR__ . '/errors/404.php';
        break;
}

//  https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database