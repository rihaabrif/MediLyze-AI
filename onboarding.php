<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Onboarding - MediLyze AI</title>
    <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = { darkMode: 'class', theme: { extend: { colors: { primary: { DEFAULT: '#16a34a', dark: '#15803d' }, secondary: '#f1f5f9', dark: { bg: '#1e293b', card: '#334155' } } } } }
    </script>
</head>
<body class="bg-secondary dark:bg-dark-bg">
    <div class="min-h-screen flex flex-col items-center justify-center p-4 font-sans">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-dark-card rounded-xl shadow-2xl p-8">
                <h2 class="text-2xl font-bold text-center mb-2">Just a few more details</h2>
                <p class="text-center text-gray-600 mb-6 text-sm">This helps us provide a more accurate analysis.</p>
                <form action="index.php" method="GET" class="space-y-4">
                    <input type="number" placeholder="Age" class="w-full px-4 py-2 border rounded-lg bg-gray-50 dark:bg-slate-800" required>
                    <input type="number" placeholder="Height (cm)" class="w-full px-4 py-2 border rounded-lg bg-gray-50 dark:bg-slate-800" required>
                    <input type="number" placeholder="Weight (kg)" class="w-full px-4 py-2 border rounded-lg bg-gray-50 dark:bg-slate-800" required>
                    <textarea placeholder="Existing Diseases (comma separated)" class="w-full h-20 px-4 py-2 border rounded-lg bg-gray-50 dark:bg-slate-800"></textarea>
                    <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 px-4 rounded-lg">Complete Profile</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

