<?php include 'includes/header.php'; ?>

<div class="container-fluid">
    <!-- Hero Section -->
    <div class="p-5 mb-4 rounded-3 text-white hero-gradient">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Hello, <?= htmlspecialchars(explode(' ', $_SESSION['user_name'])[0]) ?>!</h1>
            <p class="col-md-8 fs-5">How are you feeling today? Ready to take control of your health.</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Left Column: Actions & History -->
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 p-3 text-center lift">
                       <div class="icon-circle mx-auto mb-3">
                           <i class="bi bi-clipboard2-pulse-fill"></i>
                       </div>
                        <h4 class="card-title">Symptom Analyzer</h4>
                        <p class="card-text text-muted small">Get an AI-powered analysis of your symptoms.</p>
                        <a href="symptoms.php" class="btn btn-success mt-auto">Start Analysis</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 p-3 text-center lift">
                        <div class="icon-circle mx-auto mb-3">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                        <h4 class="card-title">Nearby Hospitals</h4>
                        <p class="card-text text-muted small">Find healthcare centers and hospitals near you.</p>
                        <a href="services.php" class="btn btn-success mt-auto">Find Hospitals</a>
                    </div>
                </div>
                <div class="col-12">
                     <div class="card">
                        <div class="card-header"><h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Recent Activity</h5></div>
                        <div class="card-body text-center text-muted p-5">
                            <p>No recent activity to show.</p>
                            <a href="profile.php">View full history</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Column: Vitals & Alerts -->
        <div class="col-lg-4">
            <div class="d-flex flex-column gap-4">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><i class="bi bi-heart-pulse me-2"></i>Health Vitals</h5></div>
                    <div class="card-body text-center">
                        <p class="text-muted small mb-1">Your BMI is currently</p>
                        <p class="h1 fw-bold text-success">22.5</p>
                        <p class="fw-bold text-success">Normal</p>
                        <a href="profile.php" class="btn btn-sm btn-outline-success">Update Profile</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i>Today's Tip</h5></div>
                    <div class="card-body">
                        <p class="text-muted">Remember to stay hydrated during the hot season and protect yourself from mosquito bites to prevent Dengue fever.</p>
                    </div>
                </div>
                 <div class="card">
                    <div class="card-header"><h5 class="mb-0"><i class="bi bi-exclamation-triangle-fill me-2"></i>Local Health Alert</h5></div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Dengue Fever
                            <span class="badge bg-danger rounded-pill">High</span>
                        </div>
                         <div class="list-group-item d-flex justify-content-between align-items-center">
                            Influenza
                            <span class="badge bg-warning rounded-pill">Medium</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

