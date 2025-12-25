<?php
require_once __DIR__ . '/../config/Database.php';

class Session
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getByCoach(int $coachId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM sessions WHERE coach_id = :coach_id");
        $stmt->execute(['coach_id' => $coachId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isReserved(int $sessionId): bool
    {
        $stmt = $this->pdo->prepare("
        SELECT COUNT(*) 
        FROM reservations 
        WHERE session_id = :session_id
    ");
        $stmt->execute(['session_id' => $sessionId]);
        $count = $stmt->fetchColumn();

        return $count > 0;
    }


    public function getAvailable($coachId)
    {
        $stmt = $this->pdo->prepare("
            SELECT s.*, u.first_name, u.last_name
            FROM sessions s
            JOIN users u ON s.coach_id = u.id
            WHERE s.status = 'available' AND s.coach_id = :coach_id
            ORDER BY s.session_date, s.session_time
        ");
        $stmt->execute(['coach_id' => $coachId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO sessions (coach_id, session_date, session_time, duration_minutes, status)
            VALUES (:coach_id, :session_date, :session_time, :duration_minutes, 'available')
        ");

        return $stmt->execute([
            'coach_id'        => $data['coach_id'],
            'session_date'    => $data['session_date'],
            'session_time'    => $data['session_time'],
            'duration_minutes' => $data['duration_minutes']
        ]);
    }

    public function updateStatus(int $id, string $status): bool
    {
        $stmt = $this->pdo->prepare("UPDATE sessions SET status = :status WHERE id = :id");
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }

    public function findById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM sessions WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
