CREATE DATABASE IF NOT EXISTS coach_app;
USE coach_app;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('coach', 'athlete') NOT NULL
);

CREATE TABLE IF NOT EXISTS coaches (
    user_id INT PRIMARY KEY,
    specialty VARCHAR(100),
    experience_years INT,
    bio TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coach_id INT NOT NULL,
    session_date DATE NOT NULL,
    session_time TIME NOT NULL,
    duration_minutes INT NOT NULL,
    status ENUM('available', 'booked') DEFAULT 'available',
    FOREIGN KEY (coach_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id INT NOT NULL,
    athlete_id INT NOT NULL,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    FOREIGN KEY (athlete_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users
(last_name, first_name, email, password, role)
VALUES 
('Dupont', 'Jean', 'jean.dupont@example.com', '$2y$10$OP4YB1AiKHeSf41Kn.SEYez/onOzQwN5hxnG5dazfro7PWuQGs1zi', 'coach'),
('Martin', 'Claire', 'claire.martin@example.com', '$2y$10$OP4YB1AiKHeSf41Kn.SEYez/onOzQwN5hxnG5dazfro7PWuQGs1zi', 'coach');

INSERT INTO coaches
(user_id, specialty, experience_years, bio)
VALUES 
(1,'Fitness', 5, 'Motivating and dynamic coach'),
(2, 'Yoga', 8, 'Hatha Yoga specialist');

INSERT INTO users
(last_name, first_name, email, password, role)
VALUES 
('Leblanc', 'Alice', 'alice.leblanc@example.com', '$2y$10$OP4YB1AiKHeSf41Kn.SEYez/onOzQwN5hxnG5dazfro7PWuQGs1zi', 'athlete'),
('Durand', 'Paul', 'paul.durand@example.com', '$2y$10$OP4YB1AiKHeSf41Kn.SEYez/onOzQwN5hxnG5dazfro7PWuQGs1zi', 'athlete');

INSERT INTO sessions
(coach_id, session_date, session_time, duration_minutes, status)
VALUES
(1, '2025-12-23', '10:00:00', 60, 'available'),
(1, '2025-12-24', '14:00:00', 45, 'available'),
(2, '2025-12-23', '09:00:00', 60, 'available');

INSERT INTO reservations
(session_id, athlete_id)
VALUES
(1, 3),
(3, 4);
