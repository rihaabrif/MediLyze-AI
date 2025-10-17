<?php
// This is a front-end replica. PHP logic is for demonstration.
session_start();

// Set a default page if not specified
$current_page = basename($_SERVER['PHP_SELF']);

// Mock user data for demonstration purposes
$user = [
    'name' => 'Jane Doe',
    'profilePictureUrl' => 'https://i.pravatar.cc/100?u=jane',
];

// Mock notifications
$notifications = [
    ['id' => 1, 'message' => 'Your symptom analysis showed a critical warning.', 'timestamp' => '2025-10-17 19:45:00', 'read' => false, 'page' => 'symptoms.php'],
    ['id' => 2, 'message' => 'Welcome to MediLyze AI!', 'timestamp' => '2025-10-16 12:00:00', 'read' => true, 'page' => 'index.php'],
];
$has_unread_notifications = !empty(array_filter($notifications, fn($n) => !$n['read']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MediLyze AI</title>
    <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      // Tailwind CSS Configuration
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              primary: { light: '#22c55e', DEFAULT: '#16a34a', dark: '#15803d' },
              secondary: '#f1f5f9',
              dark: { bg: '#1e293b', card: '#334155', text: '#f1f5f9' },
              critical: '#ef4444',
              normal: '#3b82f6',
            }
          }
        }
      }
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-secondary dark:bg-dark-bg font-sans text-gray-800 dark:text-dark-text">

    <!-- Top Bar Navigation -->
    <header class="fixed top-0 left-0 right-0 z-30 bg-white dark:bg-dark-card shadow-md h-16 flex items-center justify-between px-4 md:px-6">
        <div class="flex items-center space-x-3">
            <img src="<?= htmlspecialchars($user['profilePictureUrl']) ?>" alt="Profile" class="w-10 h-10 rounded-full object-cover" />
            <div>
                <h1 class="text-sm text-gray-500 dark:text-gray-400">Welcome back,</h1>
                <p class="font-bold text-lg text-primary-dark dark:text-white"><?= htmlspecialchars(explode(' ', $user['name'])[0]) ?></p>
            </div>
        </div>

        <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
            <a href="index.php" class="font-semibold transition-colors text-sm <?= $current_page == 'index.php' ? 'text-primary' : 'text-gray-600 hover:text-primary' ?> dark:text-gray-300 dark:hover:text-primary-light">Home</a>
            <a href="symptoms.php" class="font-semibold transition-colors text-sm <?= $current_page == 'symptoms.php' ? 'text-primary' : 'text-gray-600 hover:text-primary' ?> dark:text-gray-300 dark:hover:text-primary-light">Symptoms</a>
            <a href="services.php" class="font-semibold transition-colors text-sm <?= $current_page == 'services.php' ? 'text-primary' : 'text-gray-600 hover:text-primary' ?> dark:text-gray-300 dark:hover:text-primary-light">Services</a>
            <a href="profile.php" class="font-semibold transition-colors text-sm <?= $current_page == 'profile.php' ? 'text-primary' : 'text-gray-600 hover:text-primary' ?> dark:text-gray-300 dark:hover:text-primary-light">Profile</a>
        </nav>

        <div class="flex items-center space-x-4">
            <button id="notification-button" class="relative text-gray-600 dark:text-gray-300 hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4a2 2 0 01-3.2 0L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                <?php if ($has_unread_notifications): ?>
                <span id="notification-dot" class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white dark:ring-dark-card"></span>
                <?php endif; ?>
            </button>
            <button id="logout-button-desktop" class="text-gray-600 dark:text-gray-300 hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
            </button>
        </div>
    </header>

    <!-- Notification Dropdown -->
    <div id="notification-dropdown" class="hidden fixed inset-0 z-20" aria-hidden="true">
        <div class="absolute right-4 top-[72px] bg-white dark:bg-dark-card rounded-lg shadow-2xl w-80 max-w-sm border dark:border-gray-700">
            <div class="p-3 border-b dark:border-gray-700"><h3 class="font-bold">Notifications</h3></div>
            <div class="max-h-96 overflow-y-auto">
                <?php foreach ($notifications as $notif): ?>
                <a href="<?= $notif['page'] ?>" class="w-full text-left p-3 flex items-start space-x-3 hover:bg-gray-50 dark:hover:bg-slate-600 border-b dark:border-gray-700">
                    <div class="w-2 h-2 rounded-full mt-2 <?= !$notif['read'] ? 'bg-blue-500' : 'bg-transparent' ?>"></div>
                    <div>
                        <p class="text-sm"><?= $notif['message'] ?></p>
                        <p class="text-xs text-gray-500 mt-1"><?= $notif['timestamp'] ?></p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <main class="pt-20 pb-24 px-4 md:max-w-5xl lg:max-w-6xl md:mx-auto">

