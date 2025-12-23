<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athlete Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <?php include 'views/layout/navbar_athlete.php'; ?>

    <main class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Welcome, <?= $_SESSION['user']['email'] ?? 'Athlete' ?>!</h1>
        <p class="text-gray-700">Use the menu above to view coaches and make reservations.</p>
    </main>

</body>
</html>
