<?php
ini_set('display_errors', '1');
set_include_path(__DIR__);

$request = $_SERVER['REQUEST_URI'];

$param = explode('?', $request);

switch ($param[0]) {
    case '/':
    case '':
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
    case '/supermarket':
        require __DIR__ . '/pages/supermarket.php';
        break;
    case '/visualizza':
        require __DIR__ . '/pages/visualizza.php';
        break;
    case '/aggiungi':
        require __DIR__ . '/core/functions/aggiungiCarrello.php';
        break;
    case '/carrello':
        require __DIR__ . '/pages/carrello.php';
        break;
    case '/about-us':
        require __DIR__ . '/pages/about-us.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/errors/404.php';
        break;
}

//  https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database