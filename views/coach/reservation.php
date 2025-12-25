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

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Manage Sessions & Reservations</h1>

        <!-- Inline Form -->
        <form action="index.php?page=coach&action=reservation" method="POST" class="flex items-center space-x-2 bg-white p-2 rounded shadow">
            <input type="date" name="session_date" class="border border-gray-300 p-2 rounded focus:ring-1 focus:ring-blue-500" required>
            <input type="time" name="session_time" class="border border-gray-300 p-2 rounded focus:ring-1 focus:ring-blue-500" required>
            <input type="number" name="duration_minutes" placeholder="Duration" class="w-24 border border-gray-300 p-2 rounded focus:ring-1 focus:ring-blue-500" required>
            <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700 transition">Add</button>
        </form>
    </div>

    <!-- Existing Sessions Table -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Existing Sessions</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Date</th>
                        <th class="border px-4 py-2 text-left">Time</th>
                        <th class="border px-4 py-2 text-left">Duration</th>
                        <th class="border px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sessions ?? [])): ?>
                        <?php foreach ($sessions as $session): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border px-4 py-2"><?= htmlspecialchars($session['session_date']) ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($session['session_time']) ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($session['duration_minutes']) ?> min</td>
                            <td class="border px-4 py-2">
                                <span class="px-2 py-1 rounded-full text-sm font-semibold 
                                    <?= $session['status'] === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' ?>">
                                    <?= ucfirst($session['status']) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="border px-4 py-4 text-center text-gray-500">No sessions yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

</body>
</html>
