<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <?php include 'views/layout/navbar_coach.php'; ?>

    <main class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Manage Sessions & Reservations</h1>

        <div class="bg-white p-6 rounded shadow-md mb-8 max-w-lg">
            <h2 class="text-xl font-semibold mb-4">Create Availability</h2>
            <form action="index.php?page=coach&action=reservation" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Date</label>
                    <input type="date" name="session_date" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Time</label>
                    <input type="time" name="session_time" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Duration (minutes)</label>
                    <input type="number" name="duration_minutes" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Session</button>
            </form>
        </div>

        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Existing Sessions</h2>
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">Date</th>
                        <th class="border border-gray-300 px-4 py-2">Time</th>
                        <th class="border border-gray-300 px-4 py-2">Duration</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessions ?? [] as $session): ?>
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2"><?= $session['session_date'] ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $session['session_time'] ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $session['duration_minutes'] ?> min</td>
                        <td class="border border-gray-300 px-4 py-2"><?= ucfirst($session['status']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($sessions ?? [])): ?>
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-gray-500">No sessions yet</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </main>
</body>
</html>
