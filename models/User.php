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

    public function getAllCoaches()
    {
        $stmt = $this->pdo->query("
            SELECT id, first_name, last_name, specialty, experience_years, bio
            FROM users
            WHERE role = 'coach'
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function update(int $id, array $data): bool
    {
        $fields = [];
        $params = ['id' => $id];

        if (isset($data['last_name'])) $fields[] = 'last_name = :last_name';
        $params['last_name'] = $data['last_name'];
        if (isset($data['first_name'])) $fields[] = 'first_name = :first_name';
        $params['first_name'] = $data['first_name'];
        if (isset($data['email'])) $fields[] = 'email = :email';
        $params['email'] = $data['email'];
        if (isset($data['password'])) $fields[] = 'password = :password';
        $params['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if (isset($data['specialty'])) $fields[] = 'specialty = :specialty';
        $params['specialty'] = $data['specialty'];
        if (isset($data['experience_years'])) $fields[] = 'experience_years = :experience_years';
        $params['experience_years'] = $data['experience_years'];
        if (isset($data['bio'])) $fields[] = 'bio = :bio';
        $params['bio'] = $data['bio'];

        if (empty($fields)) return false;

        $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
}
