<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Coach.php';

class AuthController
{
    private User $user;
    private Coach $coach;

    public function __construct()
    {
        $this->user = new User();
        $this->coach = new Coach();
    }

    public function showLoginForm()
    {
        include 'views/auth/login.php';
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->user->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Invalid credentials';
            header('Location: index.php?page=auth&action=login');
            exit;
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'role' => $user['role'],
            'email' => $user['email']
        ];

        header('Location: index.php');
        exit;
    }

    public function showRegisterForm()
    {
        include 'views/auth/register.php';
    }

    public function register()
    {
        $data = [
            'last_name' => $_POST['last_name'] ?? '',
            'first_name' => $_POST['first_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'role' => $_POST['role'] ?? 'athlete',
            'specialty' => $_POST['specialty'] ?? null,
            'experience_years' => $_POST['experience_years'] ?? null,
            'bio' => $_POST['bio'] ?? null
        ];

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email format';
            header('Location: index.php?page=auth&action=register');
            exit;
        }

        if ($this->user->findByEmail($data['email'])) {
            $_SESSION['error'] = 'Email already exists';
            header('Location: index.php?page=auth&action=register');
            exit;
        }

        if ($data['role'] === 'coach') {
            $userId = $this->coach->create($data);
        } else {
            $userId = $this->user->create($data);
        }

        if ($userId === false) {
            $_SESSION['error'] = 'Registration failed. Please try again.';
            header('Location: index.php?page=auth&action=register');
            exit;
        }

        header('Location: index.php?page=auth&action=login');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?page=auth&action=login');
        exit;
    }
}
