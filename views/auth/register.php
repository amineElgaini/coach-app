<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-green-400 to-teal-500 flex items-center justify-center min-h-screen">

    <form method="POST"
        action="index.php?page=auth&action=register"
        class="bg-white p-8 rounded-2xl shadow-xl w-96 space-y-4">

        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Create Account</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="text-red-500 text-sm text-center">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </p>
        <?php endif; ?>

        <input type="text" name="first_name" placeholder="First Name"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            required>
        <input type="text" name="last_name" placeholder="Last Name"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            required>

        <input type="email" name="email" placeholder="Email"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            required>

        <input type="password" name="password" placeholder="Password"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            required>

        <select name="role"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="athlete">Athlete</option>
            <option value="coach">Coach</option>
        </select>

        <div id="coach-form" class="space-y-3 hidden">
            <input type="text" name="specialty" placeholder="Specialty"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="number" name="experience_years" placeholder="Experience (years)"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <textarea name="bio" placeholder="Short bio" rows="3"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
        </div>

        <button type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold transition">
            Register
        </button>

        <p class="text-sm text-center text-gray-600">
            Already have an account?
            <a href="index.php?page=auth&action=login" class="text-green-600 hover:underline">Login</a>
        </p>
    </form>

    <script>
        const roleSelect = document.querySelector('select[name="role"]');
        const coachForm = document.getElementById('coach-form');
        const coachInputs = coachForm.querySelectorAll('input, textarea');

        function toggleCoachForm() {
            const isCoach = roleSelect.value === 'coach';
            coachForm.classList.toggle('hidden', !isCoach);

            coachInputs.forEach(input => {
                input.required = isCoach;
            });
        }

        roleSelect.addEventListener('change', toggleCoachForm);
        toggleCoachForm();
    </script>

</body>

</html>