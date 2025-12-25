<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <?php include 'views/layout/navbar_athlete.php'; ?>

    <main class="container mx-auto mt-10">

        <h1 class="text-2xl font-bold mb-6">My Reservations</h1>

        <?php if (empty($reservations)): ?>
            <p class="text-gray-600">You have no reservations yet.</p>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded shadow">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3 text-left">Coach</th>
                            <th class="p-3 text-left">Date</th>
                            <th class="p-3 text-left">Time</th>
                            <th class="p-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $r): ?>
                            <tr class="border-t">
                                <td class="p-3">
                                    <?= htmlspecialchars($r['coach_first'] . ' ' . $r['coach_last']) ?>
                                </td>
                                <td class="p-3">
                                    <?= htmlspecialchars($r['session_date']) ?>
                                </td>
                                <td class="p-3">
                                    <?= htmlspecialchars($r['session_time']) ?>
                                </td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded text-sm bg-green-100 text-green-700">
                                        Booked
                                    </span>
                                    <a href="index.php?page=athlete&action=reserve&id=<?= $r['session_id'] ?>"
                                        class="ml-2 px-2 py-1 rounded text-sm bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                        <?= $r['session_id'] ?> Cancel
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>

</body>

</html>