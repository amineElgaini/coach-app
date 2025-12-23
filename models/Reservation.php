<?php
require_once __DIR__ . '/../config/Database.php';

class Reservation
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function create(int $sessionId, int $athleteId): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO reservations (session_id, athlete_id)
            VALUES (:session_id, :athlete_id)
        ");
        return $stmt->execute([
            'session_id' => $sessionId,
            'athlete_id' => $athleteId
        ]);
    }

    public function getByAthlete(int $athleteId)
    {
        $stmt = $this->pdo->prepare("
            SELECT r.*, s.session_date, s.session_time, u.first_name AS coach_first, u.last_name AS coach_last
            FROM reservations r
            JOIN sessions s ON r.session_id = s.id
            JOIN users u ON s.coach_id = u.id
            WHERE r.athlete_id = :athlete_id
        ");
        $stmt->execute(['athlete_id' => $athleteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
