<?php include 'includes/header.php'; ?>

<div class="container-fluid">
    <div class="text-center mb-5">
        <h2 class="h3 fw-bold">Health Services & Information</h2>
        <p class="text-muted">Find local health services and stay informed about health trends in your area.</p>
    </div>

    <div class="row g-4">
        <!-- Hospitals Near Me -->
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header"><h5 class="mb-0 fw-bold"><i class="bi bi-hospital me-2"></i>Hospitals Near Me</h5></div>
                <div class="card-body">
                    <p class="card-text small text-muted">Showing results for Colombo. Location services would provide more accurate results.</p>
                    <div class="list-group">
                        <div class="list-group-item">
                            <h6 class="mb-1">Asiri Central Hospital <span class="badge bg-secondary">Private</span></h6>
                            <a href="tel:0114665500" class="text-decoration-none">011-466-5500</a>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1">Nawaloka Hospital <span class="badge bg-secondary">Private</span></h6>
                            <a href="tel:0115577111" class="text-decoration-none">011-557-7111</a>
                        </div>
                         <div class="list-group-item">
                            <h6 class="mb-1">National Hospital of Sri Lanka <span class="badge bg-info">State</span></h6>
                            <a href="tel:0112691111" class="text-decoration-none">011-269-1111</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Health Information Column -->
        <div class="col-lg-6">
            <div class="vstack gap-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                         <h5 class="card-title fw-bold mb-2"><i class="bi bi-lightbulb me-2"></i>Seasonal Health Tip</h5>
                         <p class="card-text text-muted">Remember to stay hydrated during the hot season and protect yourself from mosquito bites to prevent Dengue fever.</p>
                    </div>
                </div>
                 <div class="card shadow-sm">
                    <div class="card-body">
                         <h5 class="card-title fw-bold mb-2"><i class="bi bi-graph-up-arrow me-2"></i>Spreading Diseases</h5>
                         <div class="alert alert-danger p-2 mb-0">Dengue Fever - Western Province</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency Numbers -->
        <div class="col-12">
            <div class="card shadow-sm">
                 <div class="card-header"><h5 class="mb-0 fw-bold"><i class="bi bi-telephone-fill me-2"></i>Emergency Numbers</h5></div>
                 <div class="card-body">
                     <div class="row text-center g-3">
                         <div class="col-6 col-md-3"><a href="tel:1990" class="btn btn-outline-success w-100 p-3"><i class="bi bi-car-front-fill fs-4 d-block mb-1"></i>Ambulance<br><strong>1990</strong></a></div>
                         <div class="col-6 col-md-3"><a href="tel:119" class="btn btn-outline-success w-100 p-3"><i class="bi bi-shield-fill-exclamation fs-4 d-block mb-1"></i>Police<br><strong>119</strong></a></div>
                         <div class="col-6 col-md-3"><a href="tel:110" class="btn btn-outline-success w-100 p-3"><i class="bi bi-fire fs-4 d-block mb-1"></i>Fire<br><strong>110</strong></a></div>
                         <div class="col-6 col-md-3"><a href="tel:1929" class="btn btn-outline-success w-100 p-3"><i class="bi bi-shield-fill-check fs-4 d-block mb-1"></i>Child Helpline<br><strong>1929</strong></a></div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

