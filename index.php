<?php include 'includes/header.php'; ?>

<div class="space-y-6">
    <div class="bg-gradient-to-r from-primary to-green-400 text-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold">Hello, <?= htmlspecialchars(explode(' ', $user['name'])[0]) ?>!</h2>
        <p class="mt-2 text-green-50">How are you feeling today? Ready to take control of your health.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="symptoms.php" class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md flex items-center space-x-4 w-full text-left hover:bg-gray-50 dark:hover:bg-slate-600">
                    <div class="bg-primary-light text-white p-3 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg></div>
                    <div>
                        <h3 class="font-bold">Symptom Analyzer</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Get an AI-powered analysis.</p>
                    </div>
                </a>
                <a href="services.php" class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md flex items-center space-x-4 w-full text-left hover:bg-gray-50 dark:hover:bg-slate-600">
                    <div class="bg-primary-light text-white p-3 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h6m-3 3v6" /></svg></div>
                    <div>
                        <h3 class="font-bold">Nearby Hospitals</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Find healthcare near you.</p>
                    </div>
                </a>
            </div>
            <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md">
                <h3 class="text-md font-bold mb-3">Recent Activity</h3>
                <div class="space-y-3">
                    <div class="p-3 bg-gray-50 dark:bg-slate-600 rounded-md">
                        <p class="font-semibold truncate">"Headache, fever, runny nose"</p>
                        <div class="flex justify-between items-center text-sm mt-1">
                            <span class="text-gray-500">10/17/2025</span>
                            <span class="font-semibold text-critical">Dengue Fever</span>
                        </div>
                    </div>
                    <a href="profile.php" class="text-sm font-semibold text-primary hover:underline">View full history</a>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md text-center">
                <h3 class="text-md font-bold">Health Vitals</h3>
                <p class="text-2xl font-bold text-green-500">22.5 <span class="text-sm font-semibold">Normal</span></p>
                <p class="text-xs text-gray-500">Body Mass Index (BMI)</p>
            </div>
            <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md">
                <h3 class="text-md font-bold mb-2">Today's Tip</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Stay hydrated during the hot season to prevent heatstroke.</p>
            </div>
            <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md">
                 <h3 class="text-md font-bold mb-2">Local Health Alert</h3>
                 <div class="flex justify-between items-center p-2 rounded-md text-sm bg-red-100 dark:bg-red-900/40">
                    <p class="font-semibold">Dengue Fever</p><span class="text-xs">Western Province</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

