<?php
// The header includes the session start and login check.
include 'includes/header.php';
?>

<div class="container-fluid">
    <!-- Hero Section -->
    <div class="p-4 p-md-5 mb-4 text-white rounded hero-gradient shadow">
        <div class="col-md-8 px-0">
            <h1 class="display-5 fw-bold">Hello, <?= htmlspecialchars(explode(' ', $_SESSION['user_name'])[0]) ?>!</h1>
            <p class="lead my-3">How are you feeling today? Ready to take control of your health.</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Content Column -->
        <div class="col-lg-8">
            <div class="vstack gap-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <a href="symptoms.php" class="card text-decoration-none shadow-sm h-100 lift">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-success-subtle text-success p-3 rounded-circle me-3"><i class="bi bi-clipboard2-pulse fs-3"></i></div>
                                <div>
                                    <h5 class="card-title fw-bold mb-1">Symptom Analyzer</h5>
                                    <p class="card-text small text-muted">Get an AI-powered analysis.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="services.php" class="card text-decoration-none shadow-sm h-100 lift">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-success-subtle text-success p-3 rounded-circle me-3"><i class="bi bi-hospital fs-3"></i></div>
                                <div>
                                    <h5 class="card-title fw-bold mb-1">Nearby Hospitals</h5>
                                    <p class="card-text small text-muted">Find healthcare near you.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header"><h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2"></i>Recent Activity</h5></div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <p class="fw-semibold mb-1">"Headache, fever, runny nose"</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">10/17/2025</small>
                                <span class="fw-bold text-danger">Dengue Fever</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"><a href="profile.php" class="btn btn-link btn-sm">View full history</a></div>
                </div>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="col-lg-4">
            <div class="vstack gap-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h6 class="text-muted small mb-1">BODY MASS INDEX</h6>
                        <p class="display-5 fw-bold text-success mb-0">22.5</p>
                        <p class="fw-semibold text-success">Normal</p>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-2"><i class="bi bi-lightbulb me-2"></i>Today's Tip</h5>
                        <p class="card-text small text-muted">Stay hydrated during the hot season to prevent heatstroke.</p>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-2"><i class="bi bi-exclamation-triangle me-2"></i>Local Health Alert</h5>
                        <div class="alert alert-danger p-2 mb-0">Dengue Fever - Western Province</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

