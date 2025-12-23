<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <?php include 'views/layout/navbar_coach.php'; ?>

    <!-- Profile Form -->
    <main class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Update Profile</h1>

        <form action="index.php?page=coach&action=update" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">First Name</label>
                <input type="text" name="first_name" class="w-full border border-gray-300 p-2 rounded" value="<?= $_SESSION['user']['first_name'] ?? '' ?>" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Last Name</label>
                <input type="text" name="last_name" class="w-full border border-gray-300 p-2 rounded" value="<?= $_SESSION['user']['last_name'] ?? '' ?>" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Specialty</label>
                <input type="text" name="specialty" class="w-full border border-gray-300 p-2 rounded" value="<?= $_SESSION['user']['specialty'] ?? '' ?>">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Experience (years)</label>
                <input type="number" name="experience_years" class="w-full border border-gray-300 p-2 rounded" value="<?= $_SESSION['user']['experience_years'] ?? '' ?>">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Bio</label>
                <textarea name="bio" class="w-full border border-gray-300 p-2 rounded" rows="4"><?= $_SESSION['user']['bio'] ?? '' ?></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Profile</button>
        </form>
    </main>

</body>
</html>