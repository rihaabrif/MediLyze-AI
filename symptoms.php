<?php include 'includes/header.php'; ?>
<div class="space-y-6">
    <h2 class="text-2xl font-bold text-center">Symptom Analyzer</h2>
    <p class="text-center text-gray-600 dark:text-gray-400">Describe your symptoms below. e.g., "I have a headache, fever, and a runny nose for 2 days."</p>
    <form id="symptoms-form" class="space-y-4">
        <textarea id="symptoms-input" class="w-full h-32 p-3 border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none dark:bg-dark-card" placeholder="Enter your symptoms here..."></textarea>
        <div id="symptoms-error" class="text-critical text-sm hidden">Please enter your symptoms.</div>
        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 rounded-lg flex items-center justify-center">Analyze Symptoms</button>
    </form>
    <div id="results-section" class="hidden space-y-4 pt-4">
        <h3 class="text-xl font-bold text-center">Analysis Results</h3>
        <div id="critical-alert" class="hidden bg-red-100 border-l-4 border-critical text-red-700 p-4 rounded-md">
            <h3 class="font-bold">Critical Urgency Detected</h3>
            <p class="mt-2">Immediate medical attention is recommended.</p>
        </div>
        <div class="space-y-4">
            <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-4 border-l-4 border-critical">
                <h3 class="text-lg font-bold">Dengue Fever</h3>
                <p>Likelihood: <span class="font-semibold">75%</span></p>
                <p class="mt-2 text-sm">Recommended Specialist: <span class="font-semibold">General Physician</span></p>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

