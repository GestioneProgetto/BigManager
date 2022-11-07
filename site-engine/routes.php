<?php
ini_set('display_errors', '1');
set_include_path("/spesa2.0/");

$request = $_SERVER['REQUEST_URI'];

$param = explode('?', $request);

switch ($param[0]) {
    case '/':
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
    case '/dashboard':
        require __DIR__ . '/pages/dashboard.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/errors/404.php';
        break;
}

//  https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database