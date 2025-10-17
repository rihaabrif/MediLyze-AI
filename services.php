<?php include 'includes/header.php'; ?>
<div class="space-y-6">
    <h2 class="text-2xl font-bold text-center">Services</h2>
    <div class="space-y-4 md:grid md:grid-cols-2 md:gap-6 md:space-y-0">
        <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md md:col-span-2">
            <h3 class="font-bold text-lg">Seasonal Health Tip</h3>
            <p class="text-sm mt-1">Stay hydrated and avoid mosquito bites to prevent Dengue fever.</p>
        </div>
        <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md">
            <h3 class="font-bold text-lg mb-2">Hospitals Near Me</h3>
            <div id="hospitals-list" class="space-y-3">
                <p class="text-sm text-gray-500">Fetching your location...</p>
            </div>
        </div>
        <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md">
            <h3 class="font-bold text-lg mb-2">Spreading Diseases</h3>
            <div class="p-2 rounded-md bg-red-100"><p>Dengue Fever - Western Province</p></div>
        </div>
        <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md md:col-span-2">
            <h3 class="font-bold text-lg mb-2">Emergency Numbers</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <a href="tel:1990" class="p-3 bg-green-50 rounded-lg"><p class="font-semibold">Ambulance</p><p>1990</p></a>
                <a href="tel:119" class="p-3 bg-green-50 rounded-lg"><p class="font-semibold">Police</p><p>119</p></a>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

