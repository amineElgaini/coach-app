<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script> <!-- For icons -->
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <!-- Navbar -->
    <?php include 'views/layout/navbar_coach.php'; ?>

    <!-- Main Content -->
    <main class="container mx-auto mt-10">

        <!-- Greeting -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Welcome, Coach!</h1>
            <p class="text-gray-600 mt-2">Here’s a quick overview of your profile and session activities.</p>
        </div>

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition flex items-center space-x-4">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i data-feather="user" class="text-blue-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Profile Completion</p>
                    <h2 class="text-2xl font-bold text-gray-800">100%</h2>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition flex items-center space-x-4">
                <div class="p-3 bg-green-100 rounded-full">
                    <i data-feather="calendar" class="text-green-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Upcoming Sessions</p>
                    <h2 class="text-2xl font-bold text-gray-800">5</h2>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition flex items-center space-x-4">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i data-feather="users" class="text-yellow-600"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Athletes</p>
                    <h2 class="text-2xl font-bold text-gray-800">23</h2>
                </div>
            </div>
        </div>

        <!-- Quick Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Profile</h2>
                <p class="text-gray-600 mb-4">Update your personal information, specialties, and experience.</p>
                <a href="index.php?page=coach&action=profile" class="mt-2 inline-block text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-semibold transition">Go to Profile</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Reservations</h2>
                <p class="text-gray-600 mb-4">Create session availability and manage your athlete bookings.</p>
                <a href="index.php?page=coach&action=reservation" class="mt-2 inline-block text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg font-semibold transition">Manage Reservations</a>
            </div>
        </div>

    </main>

    <script>
        feather.replace(); // Initialize feather icons
    </script>

</body>
</html>
