<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form method="POST"
      action="index.php?page=auth&action=login"
      class="bg-white p-6 rounded shadow w-80">

    <h2 class="text-xl font-bold mb-4 text-center">Login</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <p class="text-red-500 mb-2">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </p>
    <?php endif; ?>

    <input type="email" name="email" placeholder="Email"
           class="w-full mb-3 p-2 border rounded" required>

    <input type="password" name="password" placeholder="Password"
           class="w-full mb-3 p-2 border rounded" required>

    <button class="w-full bg-blue-600 text-white py-2 rounded">
        Login
    </button>

    <p class="text-sm text-center mt-3">
        No account?
        <a href="index.php?page=auth&action=register"
           class="text-blue-600">Register</a>
    </p>
</form>

</body>
</html>
