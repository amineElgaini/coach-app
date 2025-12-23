<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <?php include 'views/layout/navbar_athlete.php'; ?>

    <main class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Available Coaches</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($coaches ?? [] as $coach): ?>
            <div class="bg-white p-6 rounded shadow-md">
                <h2 class="text-xl font-bold text-gray-800"><?= $coach['first_name'] ?> <?= $coach['last_name'] ?></h2>
                <p class="text-gray-600">Specialty: <?= $coach['specialty'] ?? '-' ?></p>
                <p class="text-gray-600">Experience: <?= $coach['experience_years'] ?? '-' ?> years</p>
                <p class="text-gray-600">Bio: <?= $coach['bio'] ?? '-' ?></p>
                <a href="index.php?page=athlete&action=reservation&id=<?= $coach['id'] ?>" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Book Session</a>
            </div>
            <?php endforeach; ?>

            <?php if (empty($coaches ?? [])): ?>
            <p class="text-gray-500 col-span-full">No coaches available at the moment.</p>
            <?php endif; ?>
        </div>
    </main>

</body>
</html>
