<?php
$currentPage = $_GET['page'] ?? '';
$currentAction = $_GET['action'] ?? '';
?>

<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-green-600">Athlete Panel</div>
        <ul class="flex space-x-6">
            <li>
                <a href="index.php?page=athlete&action=dashboard"
                   class="font-semibold <?= ($currentPage === 'athlete' && $currentAction === 'dashboard') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' ?>">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="index.php?page=athlete&action=coaches"
                   class="font-semibold <?= ($currentPage === 'athlete' && $currentAction === 'coaches') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' ?>">
                    Coaches
                </a>
            </li>
            <li>
                <a href="index.php?page=athlete&action=reservations"
                   class="font-semibold <?= ($currentPage === 'athlete' && $currentAction === 'reservations') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' ?>">
                    Reservations
                </a>
            </li>
            <li>
                <a href="index.php?page=auth&action=logout"
                   class="font-semibold text-red-600 hover:text-red-800">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
