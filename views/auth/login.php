<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-indigo-500 flex items-center justify-center min-h-screen">

    <form method="POST"
          action="index.php?page=auth&action=login"
          class="bg-white p-8 rounded-2xl shadow-xl w-96 space-y-6">

        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Welcome Back</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="text-red-500 text-sm text-center">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </p>
        <?php endif; ?>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-medium mb-1" for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="you@example.com"
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700 font-medium mb-1" for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="********"
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
            Login
        </button>

        <p class="text-sm text-center text-gray-600">
            Don't have an account?
            <a href="index.php?page=auth&action=register" class="text-blue-600 hover:underline">Register</a>
        </p>

    </form>

</body>
</html>
