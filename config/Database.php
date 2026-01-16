<?php

class Database
{
    private static ?Database $instance = null;
    private PDO $pdo;

    private string $host = 'localhost';
    private string $dbName = 'coach_app';
    private string $username = 'postgres'; // default postgres user
    private string $password = 'root';     // your postgres password
    private int $port = 5432;              // default PostgreSQL port

    private function __construct()
    {
        try {
            $this->pdo = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->dbName}",
                $this->username,
                $this->password
            );

            // Set error mode and fetch mode
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
