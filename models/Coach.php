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

    public function getCoachInfo(int $coachId)
    {
        $stmt = $this->pdo->prepare("
        SELECT u.id, u.first_name, u.last_name, u.email, c.specialty, c.experience_years, c.bio
        FROM users u
        LEFT JOIN coaches c ON u.id = c.user_id
        WHERE u.id = :id AND u.role = 'coach'
        LIMIT 1
    ");
        $stmt->execute(['id' => $coachId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    public function update(int $id, array $data): bool
    {
        $userFields = [];
        $userParams = ['id' => $id];
        $coachFields = [];
        $coachParams = ['user_id' => $id];

        if (isset($data['last_name'])) {
            $userFields[] = 'last_name = :last_name';
            $userParams['last_name'] = $data['last_name'];
        }
        if (isset($data['first_name'])) {
            $userFields[] = 'first_name = :first_name';
            $userParams['first_name'] = $data['first_name'];
        }
        if (isset($data['email'])) {
            $userFields[] = 'email = :email';
            $userParams['email'] = $data['email'];
        }
        if (isset($data['password'])) {
            $userFields[] = 'password = :password';
            $userParams['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        if (isset($data['specialty'])) {
            $coachFields[] = 'specialty = :specialty';
            $coachParams['specialty'] = $data['specialty'];
        }
        if (isset($data['experience_years'])) {
            $coachFields[] = 'experience_years = :experience_years';
            $coachParams['experience_years'] = $data['experience_years'];
        }
        if (isset($data['bio'])) {
            $coachFields[] = 'bio = :bio';
            $coachParams['bio'] = $data['bio'];
        }

        try {
            $this->pdo->beginTransaction();

            if (!empty($userFields)) {
                $sql = "UPDATE users SET " . implode(', ', $userFields) . " WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($userParams);
            }

            if (!empty($coachFields)) {
                $sql = "UPDATE coaches SET " . implode(', ', $coachFields) . " WHERE user_id = :user_id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($coachParams);
            }

            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}
