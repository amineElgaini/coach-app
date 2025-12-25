<?php
$currentPage = $_GET['page'] ?? '';
$currentAction = $_GET['action'] ?? '';
?>

<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-blue-600">Coach Panel</div>
        <ul class="flex space-x-6">
            <li>
                <a href="index.php?page=coach&action=dashboard"
                   class="font-semibold <?= ($currentPage === 'coach' && $currentAction === 'dashboard') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?>">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="index.php?page=coach&action=profile"
                   class="font-semibold <?= ($currentPage === 'coach' && $currentAction === 'profile') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?>">
                    Profile
                </a>
            </li>
            <li>
                <a href="index.php?page=coach&action=reservation"
                   class="font-semibold <?= ($currentPage === 'coach' && $currentAction === 'reservation') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?>">
                    Reservations
                </a>
            </li>
            <li>
                <a href="index.php?page=auth&action=logout" class="font-semibold text-red-600 hover:text-red-800">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
