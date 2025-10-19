<?php include 'includes/header.php'; ?>

<div class="container-fluid">
    <div class="text-center mb-5">
        <h2 class="h3 fw-bold">Settings</h2>
        <p class="text-muted">Manage your app preferences and account details.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="list-group shadow-sm">
                <a href="profile.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-person-fill me-3"></i>
                        <span class="fw-semibold">Edit Profile</span>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-moon-stars-fill me-3"></i>
                        <span class="fw-semibold">Dark Mode</span>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="darkModeSwitch">
                    </div>
                </div>
                <a href="terms.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-file-text-fill me-3"></i>
                        <span class="fw-semibold">Terms of Service</span>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>
                <a href="privacy.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-shield-lock-fill me-3"></i>
                        <span class="fw-semibold">Privacy Policy</span>
                    </div>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

