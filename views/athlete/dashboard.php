<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athlete Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen">

    <!-- Navbar -->
    <?php include 'views/layout/navbar_athlete.php'; ?>

    <!-- Main Content -->
    <main class="container mx-auto mt-10">

        <!-- Greeting -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-800">
                Welcome, <?= $_SESSION['user']['name'] ?? $_SESSION['user']['email'] ?? 'Athlete' ?>!
            </h1>
            <p class="text-gray-600 mt-2">Here’s a quick overview of your upcoming sessions and activity.</p>
        </div>

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition flex items-center space-x-4">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i data-feather="calendar" class="text-blue-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Upcoming Sessions</p>
                    <h2 class="text-2xl font-bold text-gray-800">3</h2>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition flex items-center space-x-4">
                <div class="p-3 bg-green-100 rounded-full">
                    <i data-feather="user-check" class="text-green-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Active Coaches</p>
                    <h2 class="text-2xl font-bold text-gray-800">5</h2>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition flex items-center space-x-4">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i data-feather="check-circle" class="text-yellow-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Completed Sessions</p>
                    <h2 class="text-2xl font-bold text-gray-800">8</h2>
                </div>
            </div>
        </div>

        <!-- Quick Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Browse Coaches</h2>
                <p class="text-gray-600 mb-4">View available coaches and find the right one for your training goals.</p>
                <a href="index.php?page=athlete&action=coaches" class="mt-2 inline-block text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-semibold transition">View Coaches</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">My Reservations</h2>
                <p class="text-gray-600 mb-4">Check your upcoming sessions, reschedule, or cancel reservations.</p>
                <a href="index.php?page=athlete&action=reservations" class="mt-2 inline-block text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg font-semibold transition">Manage Reservations</a>
            </div>
        </div>

    </main>

    <script>
        feather.replace(); // Initialize feather icons
    </script>

</body>
</html>
