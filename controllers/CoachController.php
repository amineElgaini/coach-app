<?php
require_once __DIR__ . '/../models/User.php';

class CoachController
{
    private User $user;
    private Coach $coach;

    public function __construct()
    {
        $this->user = new User();
        $this->coach = new Coach();
    }

    public function index()
    {
        $coaches = $this->coach->getAllCoaches();
        include 'views/athlete/coachs.php';
    }

    public function edit(int $id)
    {
        $coach = $this->user->findById($id);
        include 'views/coach/profile.php';
    }

    public function getCoachInfo()
    {
        $coach = $this->coach->getCoachInfo($_SESSION['user']['id']);
        include 'views/coach/profile.php';
    }

    public function update(int $id)
    {
        $result = $this->coach->update($id, $_POST);
        if ($result) {
            $_SESSION['success'] = 'Profile Updated Succesfuly';
        }
        header('Location: index.php?page=coach&action=profile');
        exit;
    }
}
