<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'home':
        require_once __DIR__ . '/../app/Views/pages/home.php';
        break;

    case 'register':

    $errors = [];
    $success = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $controller = new App\Controllers\AuthController();

        $result = $controller->register($_POST);

        if ($result['success']) {

            $success = $result['message'];

            header("Refresh:2; url=?page=login");

        } else {

            $errors = $result['errors'];

        }
    }

    require_once __DIR__ . '/../app/Views/auth/register.php';

    break;

    case 'login':
        require_once __DIR__ . '/../app/Views/auth/login.php';
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
        break;
}