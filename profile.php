<?php include 'includes/header.php'; ?>
<div class="space-y-6">
    <div class="flex justify-between items-center">
         <h2 class="text-2xl font-bold">My Profile</h2>
         <button id="edit-profile-button" class="bg-primary text-white font-bold py-2 px-4 rounded-lg text-sm">Edit</button>
    </div>
    <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md">
        <div class="flex items-center space-x-4">
            <img src="https://i.pravatar.cc/100?u=jane" class="w-24 h-24 rounded-full">
            <div>
                <h3 class="text-xl font-bold">Jane Doe</h3>
                <p class="text-gray-500">jane.doe@example.com</p>
            </div>
        </div>
    </div>
     <div class="bg-white dark:bg-dark-card p-4 rounded-lg shadow-md">
        <h3 class="font-bold text-lg mb-2">Personal Information</h3>
        <div id="profile-view-mode" class="space-y-2">
            <p><strong>Phone:</strong> 077-123-4567</p>
            <p><strong>Age:</strong> 28</p>
        </div>
        <div id="profile-edit-mode" class="hidden space-y-2">
             <p><strong>Phone:</strong> <input type="text" value="077-123-4567" class="border rounded px-2"></p>
             <p><strong>Age:</strong> <input type="number" value="28" class="border rounded px-2"></p>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

