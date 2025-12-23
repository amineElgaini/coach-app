<?php
require_once __DIR__ . '/../models/Session.php';
require_once __DIR__ . '/../models/Reservation.php';

class ReservationController
{
    private Session $sessionModel;
    private Reservation $reservationModel;

    public function __construct()
    {
        $this->sessionModel = new Session();
        $this->reservationModel = new Reservation();
    }

    public function available($coachId = null)
    {
        $sessions = $this->sessionModel->getAvailable();
        include 'views/athlete/reservation.php';
    }

    public function reserve($sessionId)
    {
        $athleteId = $_SESSION['user']['id'];
        $this->reservationModel->create($sessionId, $athleteId);
        $this->sessionModel->updateStatus($sessionId, 'booked');
        header('Location: index.php?page=athlete&action=reservation');
        exit;
    }

    public function manageAvailability()
    {
        $coachId = $_SESSION['user']['id'];
        $sessions = $this->sessionModel->getByCoach($coachId);
        include 'views/coach/reservation.php';
    }

    public function storeAvailability(array $data)
    {
        $data['coach_id'] = $_SESSION['user']['id'];
        $this->sessionModel->create($data);
        header('Location: index.php?page=coach&action=reservation');
        exit;
    }
}
