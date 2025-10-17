<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - MediLyze AI</title>
    <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class', theme: { extend: { colors: { primary: { DEFAULT: '#16a34a', dark: '#15803d' }, secondary: '#f1f5f9', dark: { bg: '#1e293b', card: '#334155' } } } } }
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-secondary dark:bg-dark-bg">
    <div class="min-h-screen flex flex-col items-center justify-center p-4 font-sans">
        <div class="w-full max-w-md">
            <div class="flex justify-center items-center mb-6 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" /></svg>
                <h1 class="text-3xl font-bold text-primary-dark dark:text-white">MediLyze AI</h1>
            </div>
            <div class="bg-white dark:bg-dark-card rounded-xl shadow-2xl p-8">
                <h2 class="text-2xl font-bold text-center mb-6">Create Account</h2>
                <form action="onboarding.php" method="GET" class="space-y-4">
                    <input type="text" placeholder="Full Name" class="w-full px-4 py-2 border rounded-lg bg-gray-50 dark:bg-slate-800" required>
                    <input type="email" placeholder="Email" class="w-full px-4 py-2 border rounded-lg bg-gray-50 dark:bg-slate-800" required>
                    <input type="password" placeholder="Password" class="w-full px-4 py-2 border rounded-lg bg-gray-50 dark:bg-slate-800" required>
                    <div class="flex items-center"><input type="checkbox" id="terms" required><label for="terms" class="ml-2 text-sm">I agree to the <a href="terms.php" class="text-primary hover:underline">Terms</a></label></div>
                    <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-lg">Sign Up</button>
                </form>
                <p class="text-center mt-6 text-sm">Already have an account? <a href="login.php" class="font-semibold text-primary hover:underline">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>

