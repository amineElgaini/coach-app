<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <?php include 'views/layout/navbar_coach.php'; ?>

    <main class="container mx-auto my-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Update Profile</h1>

        <form action="index.php?page=coach&action=profile" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg mx-auto space-y-4">

            <!-- First Name & Last Name Inline -->
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block text-gray-700 font-semibold mb-1">First Name</label>
                    <input type="text" name="first_name" class="w-full border border-gray-300 p-2 rounded"
                        value="<?= htmlspecialchars($coach['first_name'] ?? '') ?>" required>
                </div>
                <div class="flex-1">
                    <label class="block text-gray-700 font-semibold mb-1">Last Name</label>
                    <input type="text" name="last_name" class="w-full border border-gray-300 p-2 rounded"
                        value="<?= htmlspecialchars($coach['last_name'] ?? '') ?>" required>
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded"
                    value="<?= htmlspecialchars($coach['email'] ?? '') ?>" required>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded" placeholder="Leave blank to keep current password">
            </div>

            <!-- Specialty & Experience Inline -->
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block text-gray-700 font-semibold mb-1">Specialty</label>
                    <input type="text" name="specialty" class="w-full border border-gray-300 p-2 rounded"
                        value="<?= htmlspecialchars($coach['specialty'] ?? '') ?>">
                </div>
                <div class="flex-1">
                    <label class="block text-gray-700 font-semibold mb-1">Experience (years)</label>
                    <input type="number" name="experience_years" class="w-full border border-gray-300 p-2 rounded"
                        value="<?= htmlspecialchars($coach['experience_years'] ?? '') ?>" min="0">
                </div>
            </div>

            <!-- Bio -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Bio</label>
                <textarea name="bio" class="w-full border border-gray-300 p-2 rounded" rows="4"><?= htmlspecialchars($coach['bio'] ?? '') ?></textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                Update Profile
            </button>
        </form>
    </main>

</body>

</html>
