<?php include 'includes/header.php'; ?>
<div class="space-y-6">
    <h2 class="text-2xl font-bold text-center">Settings</h2>
    <div class="space-y-4">
        <div class="flex items-center justify-between p-4 bg-white dark:bg-dark-card rounded-lg shadow-md">
            <span class="font-semibold">Dark Mode</span>
            <button id="theme-toggle-button" class="relative inline-flex items-center h-6 rounded-full w-11 bg-gray-300"><span id="theme-toggle-indicator" class="inline-block w-4 h-4 transform bg-white rounded-full translate-x-1"></span></button>
        </div>
        <a href="terms.php" class="block p-4 bg-white dark:bg-dark-card rounded-lg shadow-md">Terms of Service</a>
        <a href="privacy.php" class="block p-4 bg-white dark:bg-dark-card rounded-lg shadow-md">Privacy Policy</a>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

