<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once 'controllers/AuthController.php';
require_once 'controllers/CoachController.php';
require_once 'controllers/ReservationController.php';

$page   = $_GET['page']   ?? 'home';
$action = $_GET['action'] ?? 'index';
$id     = isset($_GET['id']) ? (int) $_GET['id'] : null;

$isAuthenticated = isset($_SESSION['user']);
$role = $isAuthenticated ? $_SESSION['user']['role'] : null;

function redirectToLogin() {
    header('Location: index.php?page=auth&action=login');
    exit;
}

try {
    switch ($page) {

        case 'auth':
            $auth = new AuthController();
            if ($action === 'login') {
                $_SERVER['REQUEST_METHOD'] === 'POST'
                    ? $auth->login()
                    : $auth->showLoginForm();
            } elseif ($action === 'register') {
                $_SERVER['REQUEST_METHOD'] === 'POST'
                    ? $auth->register()
                    : $auth->showRegisterForm();
            } elseif ($action === 'logout') {
                $auth->logout();
            } else {
                $auth->showLoginForm();
            }
            break;

        case 'athlete':
            if (!$isAuthenticated || $role !== 'athlete') redirectToLogin();

            switch ($action) {
                case 'dashboard':
                    include 'views/athlete/dashboard.php';
                    break;

                case 'coachs':
                    $coachController = new CoachController();
                    $coachController->index();
                    break;

                case 'reservation':
                    $reservationController = new ReservationController();
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $reservationController->reserve($id);
                    } else {
                        $reservationController->available($id);
                    }
                    break;

                default:
                    include 'views/athlete/dashboard.php';
            }
            break;

        case 'coach':
            if (!$isAuthenticated || $role !== 'coach') redirectToLogin();

            switch ($action) {
                case 'dashboard':
                    include 'views/coach/dashboard.php';
                    break;

                case 'profile':
                    include 'views/coach/profile.php';
                    break;

                case 'reservation':
                    $reservationController = new ReservationController();
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $reservationController->storeAvailability($_POST);
                    } else {
                        $reservationController->manageAvailability();
                    }
                    break;

                default:
                    include 'views/coach/dashboard.php';
            }
            break;

        case 'home':
            if (!$isAuthenticated) redirectToLogin();

            if ($role === 'athlete') {
                header('Location: index.php?page=athlete&action=dashboard');
            } elseif ($role === 'coach') {
                header('Location: index.php?page=coach&action=dashboard');
            } else {
                redirectToLogin();
            }
            exit;

        default:
            http_response_code(404);
            include 'views/404.php';
            break;
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo "<h1>500 Internal Server Error</h1>";
    echo "<p>Something went wrong. Please try again later.</p>";
    if ($_SERVER['SERVER_NAME'] === 'localhost') {
        echo "<pre>{$e->getMessage()}</pre>";
    }
}
