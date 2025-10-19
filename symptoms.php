<?php include 'includes/header.php'; ?>

<div class="container-fluid">
    <div class="text-center mb-4">
        <h2 class="h3 fw-bold">Symptom Analyzer</h2>
        <p class="text-muted">Describe your symptoms below. e.g., "I have a headache, fever, and a runny nose for 2 days."</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form id="symptoms-form">
                        <div class="mb-3">
                            <textarea id="symptoms-input" class="form-control" rows="5" placeholder="Enter your symptoms here..." required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-search me-2"></i>Analyze Symptoms
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Results Section -->
            <div id="results-section" class="mt-5 d-none">
                <h3 class="text-center fw-bold mb-4">Analysis Results</h3>
                
                <!-- Critical Alert Example -->
                <div class="alert alert-danger d-flex align-items-center shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-3 me-3"></i>
                    <div>
                        <h5 class="alert-heading fw-bold">Critical Urgency Detected</h5>
                        <p>Based on your symptoms, immediate medical attention is highly recommended. Please contact emergency services.</p>
                    </div>
                </div>

                <!-- Result Cards -->
                <div class="vstack gap-3 mt-4">
                    <div class="card shadow-sm border-start border-danger border-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title fw-bold">Dengue Fever</h5>
                                <span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Critical</span>
                            </div>
                            <p class="card-text"><strong>Likelihood:</strong> 75%</p>
                            <p class="card-text small"><strong>Recommended Specialist:</strong> General Physician</p>
                        </div>
                    </div>
                    <div class="card shadow-sm border-start border-primary border-4">
                         <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title fw-bold">Viral Fever</h5>
                                <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">Normal</span>
                            </div>
                            <p class="card-text"><strong>Likelihood:</strong> 20%</p>
                            <p class="card-text small"><strong>Recommended Specialist:</strong> General Physician</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

