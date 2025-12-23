<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form method="POST"
      action="index.php?page=auth&action=register"
      class="bg-white p-6 rounded shadow w-96">

    <h2 class="text-xl font-bold mb-4 text-center">Register</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <p class="text-red-500 mb-2">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </p>
    <?php endif; ?>

    <input type="text" name="nom" placeholder="Last name"
           class="w-full mb-3 p-2 border rounded" required>

    <input type="text" name="prenom" placeholder="First name"
           class="w-full mb-3 p-2 border rounded" required>

    <input type="email" name="email" placeholder="Email"
           class="w-full mb-3 p-2 border rounded" required>

    <input type="password" name="mot_de_passe" placeholder="Password"
           class="w-full mb-3 p-2 border rounded" required>

    <select name="role"
            class="w-full mb-4 p-2 border rounded">
        <option value="sportif">Athlete</option>
        <option value="coach">Coach</option>
    </select>

    <button class="w-full bg-green-600 text-white py-2 rounded">
        Register
    </button>
</form>

</body>
</html>
