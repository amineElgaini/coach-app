<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Session</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <?php include 'views/layout/navbar_athlete.php'; ?>

    <main class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Available Sessions</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($sessions ?? [] as $session): ?>
            <div class="bg-white p-6 rounded shadow-md">
                <p class="text-gray-800 font-semibold">Date: <?= $session['session_date'] ?></p>
                <p class="text-gray-800 font-semibold">Time: <?= $session['session_time'] ?></p>
                <p class="text-gray-600">Duration: <?= $session['duration_minutes'] ?> minutes</p>
                <p class="text-gray-600">Status: <?= ucfirst($session['status']) ?></p>
                <?php if ($session['status'] === 'available'): ?>
                <form action="index.php?page=athlete&action=reservation&id=<?= $session['id'] ?>" method="POST" class="mt-4">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Reserve</button>
                </form>
                <?php else: ?>
                <span class="text-red-600 font-semibold mt-2 inline-block">Already booked</span>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>

            <?php if (empty($sessions ?? [])): ?>
            <p class="text-gray-500 col-span-full">No sessions available for this coach.</p>
            <?php endif; ?>
        </div>
    </main>

</body>
</html>
