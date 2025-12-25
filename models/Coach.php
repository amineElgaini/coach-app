<?php
require_once __DIR__ . '/../config/Database.php';

class Coach extends User
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllCoaches()
    {
        $stmt = $this->pdo->query("
            SELECT u.id, u.first_name, u.last_name, c.specialty, c.experience_years, c.bio
            FROM users u
            INNER JOIN coaches c ON u.id = c.user_id
            WHERE u.role = 'coach'
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create(array $data)
    {
        $userId = parent::create($data);

        if ($userId === false) {
            return false;
        }

        $stmt = $this->pdo->prepare("
            INSERT INTO coaches
            (user_id, specialty, experience_years, bio)
            VALUES
            (:user_id, :specialty, :experience_years, :bio)
        ");

        $success = $stmt->execute([
            'user_id'        => $userId,
            'specialty'        => $data['specialty'] ?? null,
            'experience_years' => $data['experience_years'] ?? null,
            'bio'              => $data['bio'] ?? null
        ]);

        if (!$success) {
            return false;
        }

        return (int) $this->pdo->lastInsertId();
    }
}
