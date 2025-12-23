<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <!-- Navbar -->
    <?php include 'views/layout/navbar_coach.php'; ?>

    <!-- Main Content -->
    <main class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Welcome, Coach!</h1>
        <p class="text-gray-700 mb-6">Use the cards below to quickly access your profile and manage session availability.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold mb-2">Profile</h2>
                <p>Update your personal information, specialties, and experience.</p>
                <a href="index.php?page=coach&action=profile" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">Go to Profile</a>
            </div>

            <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold mb-2">Reservations</h2>
                <p>Create session availability and manage your athlete bookings.</p>
                <a href="index.php?page=coach&action=reservation" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">Manage Reservations</a>
            </div>
        </div>
    </main>

</body>
</html>
