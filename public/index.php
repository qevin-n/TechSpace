<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\View;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\CourseController;

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'home':

    View::render('pages/home', [], 'guest');

        break;

    case 'register':

        $errors = [];
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $controller = new AuthController();

            $result = $controller->register($_POST);

            if ($result['success']) {

                $success = $result['message'];

                header("Refresh:2; url=?page=login");

            } else {

                $errors = $result['errors'];

            }
        }

        View::render(
    'auth/register',
    compact('errors', 'success'),
    'auth'
);

        break;

    case 'login':

        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $controller = new AuthController();

            $result = $controller->login(
                trim($_POST['email']),
                $_POST['password']
            );

            if ($result['success']) {

                header("Location: ?page=dashboard");
                exit;

            }

            $error = $result['message'];

        }

        View::render(
    'auth/login',
    compact('error'),
    'auth'
);

        break;

    case 'dashboard':

        $controller = new DashboardController();

        $data = $controller->index();

        View::render(
    'dashboard/dashboard',
    $data,
    'app'
);

        break;

    case 'courses':

        $controller = new CourseController();

        $data = $controller->index();

        View::render(
    'courses/index',
    $data,
    'app'
);

        break;

    case 'logout':

        $controller = new AuthController();

        $controller->logout();

        break;
        case 'course':

    $controller = new CourseController();

    $data = $controller->show((int)($_GET['id'] ?? 0));

    View::render(
        'courses/show',
        $data,
        'app'
    );

    break;

    default:

        http_response_code(404);

        echo "<h1>404 - Page Not Found</h1>";

        break;
}