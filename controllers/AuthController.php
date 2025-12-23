<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
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

        if ($this->user->findByEmail($data['email'])) {
            $_SESSION['error'] = 'Email already exists';
            header('Location: index.php?page=auth&action=register');
            exit;
        }

        $this->user->create($data);

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
