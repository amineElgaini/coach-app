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

    public function availability($coachId)
    {
        $sessions = $this->sessionModel->getAvailable($coachId);
        include 'views/athlete/availability.php';
    }

    public function reservations()
    {
        
        $reservations = $this->reservationModel->getByAthlete();

        require __DIR__ . '/../views/athlete/reservations.php';
    }

    public function reserve($sessionId)
    {
        $isReserved = $this->sessionModel->isReserved($sessionId);

        if ($isReserved) {
            $this->reservationModel->remove($sessionId);
            $this->sessionModel->updateStatus($sessionId, 'available');
            $_SESSION['success'] = 'Reservation canceled successfully';
            header('Location: index.php?page=athlete&action=reservations');
        } else {
            $this->reservationModel->create($sessionId);
            $this->sessionModel->updateStatus($sessionId, 'booked');
            $_SESSION['success'] = 'Session booked successfully';
            header('Location: index.php?page=athlete&action=coaches');
        }

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
