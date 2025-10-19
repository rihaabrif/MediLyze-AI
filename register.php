<?php
require_once 'db/db_connect.php';
// Register logic remains the same...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - MediLyze AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
     <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                 <div class="text-center mb-4">
                    <h1 class="h2 fw-bold text-success"><i class="bi bi-heart-pulse-fill me-2"></i>MediLyze AI</h1>
                </div>
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="card-title text-center fw-bold mb-4">Create Account</h2>
                        <!-- Error display -->
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3"><input type="text" name="full_name" class="form-control" placeholder="Full Name" required></div>
                            <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                            <div class="mb-3"><input type="tel" name="phone_number" class="form-control" placeholder="Phone Number" required></div>
                            <div class="mb-3"><input type="text" name="city" class="form-control" placeholder="City" required></div>
                            <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="terms" required><label class="form-check-label small" for="terms">I agree to the <a href="terms.php">Terms</a></label></div>
                            <div class="d-grid"><button type="submit" class="btn btn-success btn-lg">Sign Up</button></div>
                        </form>
                        <p class="text-center mt-4 text-muted small">Already have an account? <a href="login.php" class="fw-bold">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

