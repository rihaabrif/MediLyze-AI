<?php include 'includes/header.php'; ?>

<div class="container-fluid">
    <h2 class="h4 fw-bold mb-4 text-center">Settings</h2>

    <div class="list-group list-group-flush shadow-sm rounded-3">
        <a href="profile.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
            <div>
                <i class="bi bi-person-fill me-3 fs-5"></i>
                <span class="fw-bold">Edit Profile</span>
            </div>
            <i class="bi bi-chevron-right"></i>
        </a>
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
            <div>
                <i class="bi bi-moon-stars-fill me-3 fs-5"></i>
                <span class="fw-bold">Dark Mode</span>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="theme-switch" <?= ($_SESSION['theme'] == 'dark') ? 'checked' : '' ?>>
            </div>
        </div>
        <a href="terms.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
             <div>
                <i class="bi bi-file-text-fill me-3 fs-5"></i>
                <span class="fw-bold">Terms of Service</span>
            </div>
            <i class="bi bi-chevron-right"></i>
        </a>
        <a href="privacy.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
             <div>
                <i class="bi bi-shield-lock-fill me-3 fs-5"></i>
                <span class="fw-bold">Privacy Policy</span>
            </div>
            <i class="bi bi-chevron-right"></i>
        </a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

