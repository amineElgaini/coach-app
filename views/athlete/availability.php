<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Availability</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <?php include 'views/layout/navbar_athlete.php'; ?>

    <main class="container mx-auto mt-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Available Sessions</h1>

        <?php if (!empty($sessions)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($sessions as $session): ?>
            <div class="bg-white p-6 rounded shadow-md hover:shadow-lg transition-shadow">
                <h2 class="text-xl font-bold text-gray-800 mb-2">
                    Coach: <?= htmlspecialchars($session['first_name'] . ' ' . $session['last_name']) ?>
                </h2>
                <p class="text-gray-600 mb-1"><strong>Date:</strong> <?= htmlspecialchars($session['session_date']) ?></p>
                <p class="text-gray-600 mb-1"><strong>Time:</strong> <?= htmlspecialchars($session['session_time']) ?></p>
                <p class="text-gray-600 mb-4"><strong>Duration:</strong> <?= htmlspecialchars($session['duration_minutes']) ?> minutes</p>
                
                <a href="index.php?page=athlete&action=reserve&id=<?= $session['id'] ?>" 
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                   Book Session
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p class="text-gray-500 text-center mt-6">No available sessions for this coach.</p>
        <?php endif; ?>
    </main>

</body>
</html>
