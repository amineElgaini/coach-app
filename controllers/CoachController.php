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

    public function update(int $id)
    {
        $this->user->update($id, $_POST);
        header('Location: index.php?page=coach&action=profile');
        exit;
    }
}
