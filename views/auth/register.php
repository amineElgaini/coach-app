<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
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

        <input type="text" name="last_name" placeholder="Last name"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="text" name="first_name" placeholder="First name"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="email" name="email" placeholder="Email address"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded" required>

        <select name="role"
            class="w-full mb-4 p-2 border rounded">
            <option value="athlete">Athlete</option>
            <option value="coach">Coach</option>
        </select>

        <div id="coach-form" style="display: none;">
            <input type="text" name="specialty" placeholder="Specialty"
                class="w-full mb-3 p-2 border rounded">

            <input type="number" name="experience_years" placeholder="Experience (years)"
                class="w-full mb-3 p-2 border rounded">

            <textarea name="bio" placeholder="Short bio"
                class="w-full mb-3 p-2 border rounded"></textarea>
        </div>

        <button class="w-full bg-green-600 text-white py-2 rounded">
            Register
        </button>
    </form>

    <script>
        const roleSelect = document.querySelector('select[name="role"]');
        const coachForm = document.getElementById('coach-form');
        const coachInputs = coachForm.querySelectorAll('input, textarea');

        function toggleCoachForm() {
            const isCoach = roleSelect.value === 'coach';
            coachForm.style.display = isCoach ? 'block' : 'none';

            coachInputs.forEach(input => {
                input.required = isCoach;
            });
        }

        roleSelect.addEventListener('change', toggleCoachForm);
        toggleCoachForm(); // run once on page load
    </script>

</body>
</html>
