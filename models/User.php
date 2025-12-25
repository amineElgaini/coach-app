<?php
require_once __DIR__ . '/../config/Database.php';

class User
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO users
            (last_name, first_name, email, password, role)
            VALUES
            (:last_name, :first_name, :email, :password, :role)
        ");

        $success = $stmt->execute([
            'last_name'        => $data['last_name'],
            'first_name'       => $data['first_name'],
            'email'            => $data['email'],
            'password'         => password_hash($data['password'], PASSWORD_DEFAULT),
            'role'             => $data['role'],
        ]);

        if (!$success) {
            return false;
        }

        return (int) $this->pdo->lastInsertId();
    }


}
