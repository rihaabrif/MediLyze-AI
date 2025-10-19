<?php
include 'includes/header.php';

// Fetch user data from the database
$user_id = $_SESSION['id'];
$sql = "SELECT full_name, email, phone_number, city, profile_picture_path, age, height_cm, weight_kg, existing_diseases, allergies FROM users WHERE id = ?";
$user_data = [];

if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    if (mysqli_stmt_execute($stmt)) {
        $user_data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    }
    mysqli_stmt_close($stmt);
}

// BMI Calculation
function calculateBMI($weight_kg, $height_cm) {
    if (!$weight_kg || !$height_cm) return ['bmi' => 'N/A', 'status' => 'Add data', 'class' => 'text-muted'];
    $bmi = $weight_kg / (($height_cm / 100) ** 2);
    $bmi_f = number_format($bmi, 1);
    if ($bmi < 18.5) return ['bmi' => $bmi_f, 'status' => 'Underweight', 'class' => 'text-info'];
    if ($bmi < 25) return ['bmi' => $bmi_f, 'status' => 'Normal', 'class' => 'text-success'];
    if ($bmi < 30) return ['bmi' => $bmi_f, 'status' => 'Overweight', 'class' => 'text-warning'];
    return ['bmi' => $bmi_f, 'status' => 'Obese', 'class' => 'text-danger'];
}
$bmi_info = calculateBMI($user_data['weight_kg'] ?? null, $user_data['height_cm'] ?? null);
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-bold mb-0">My Profile</h2>
        <div>
            <button id="edit-profile-button" class="btn btn-success"><i class="bi bi-pencil-square me-1"></i>Edit</button>
            <button type="submit" form="profile-edit-form" id="save-profile-button" class="btn btn-primary d-none"><i class="bi bi-save me-1"></i>Save</button>
            <button id="cancel-edit-button" class="btn btn-secondary d-none">Cancel</button>
        </div>
    </div>
    
    <?php
    if (isset($_SESSION['update_success'])) {
        echo '<div class="alert alert-success">' . $_SESSION['update_success'] . '</div>';
        unset($_SESSION['update_success']);
    }
    if (isset($_SESSION['update_error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['update_error'] . '</div>';
        unset($_SESSION['update_error']);
    }
    ?>

    <!-- Profile Header -->
    <div class="card shadow-sm mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div id="profile-picture-container" class="col-md-auto text-center mb-3 mb-md-0 profile-picture-container">
                    <img id="profile-picture-img" src="<?= htmlspecialchars($user_data['profile_picture_path']) ?>" alt="Profile" class="rounded-circle" width="120" height="120" style="object-fit: cover;">
                    <div class="overlay"><i class="bi bi-camera-fill fs-3"></i></div>
                </div>
                <div class="col-md">
                    <h3 class="fw-bold mb-1"><?= htmlspecialchars($user_data['full_name']) ?></h3>
                    <p class="text-muted mb-0"><?= htmlspecialchars($user_data['email']) ?></p>
                </div>
                <div class="col-md-auto text-center mt-3 mt-md-0 border-md-start ps-md-4">
                    <h6 class="text-muted small mb-1">BODY MASS INDEX</h6>
                    <p class="display-5 fw-bold <?= $bmi_info['class'] ?> mb-0"><?= $bmi_info['bmi'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <input type="file" id="profile-picture-input" class="d-none" accept="image/*">

    <!-- Personal Info -->
    <div class="card shadow-sm mb-4">
        <div class="card-header"><h5 class="mb-0 fw-bold"><i class="bi bi-person-lines-fill me-2"></i>Personal Information</h5></div>
        <div class="card-body p-4">
            <!-- VIEW MODE: Display user data -->
            <div id="profile-view-mode">
                <div class="row g-3">
                    <div class="col-md-6"><strong>Full Name:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['full_name'] ?? 'N/A') ?></p></div>
                    <div class="col-md-6"><strong>Email:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['email'] ?? 'N/A') ?></p></div>
                    <div class="col-md-6"><strong>Phone:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['phone_number'] ?? 'N/A') ?></p></div>
                    <div class="col-md-6"><strong>City:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['city'] ?? 'N/A') ?></p></div>
                    <div class="col-md-6"><strong>Age:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['age'] ?? 'N/A') ?></p></div>
                    <div class="col-md-6"><strong>Height:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['height_cm'] ? $user_data['height_cm'] . ' cm' : 'N/A') ?></p></div>
                    <div class="col-md-6"><strong>Weight:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['weight_kg'] ? $user_data['weight_kg'] . ' kg' : 'N/A') ?></p></div>
                    <div class="col-md-6"><strong>Existing Diseases:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['existing_diseases'] ?: 'None') ?></p></div>
                    <div class="col-12"><strong>Allergies:</strong><p class="text-muted mb-0"><?= htmlspecialchars($user_data['allergies'] ?: 'None') ?></p></div>
                </div>
            </div>
            <!-- EDIT MODE: Form with pre-filled values -->
            <form id="profile-edit-form" action="db/update_profile.php" method="POST" class="d-none">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Full Name</label><input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($user_data['full_name'] ?? '') ?>"></div>
                    <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user_data['email'] ?? '') ?>"></div>
                    <div class="col-md-6"><label class="form-label">Phone</label><input type="tel" name="phone_number" class="form-control" value="<?= htmlspecialchars($user_data['phone_number'] ?? '') ?>"></div>
                    <div class="col-md-6"><label class="form-label">City</label><input type="text" name="city" class="form-control" value="<?= htmlspecialchars($user_data['city'] ?? '') ?>"></div>
                    <div class="col-md-6"><label class="form-label">Age</label><input type="number" name="age" class="form-control" value="<?= htmlspecialchars($user_data['age'] ?? '') ?>"></div>
                    <div class="col-md-6"><label class="form-label">Height (cm)</label><input type="number" name="height_cm" class="form-control" value="<?= htmlspecialchars($user_data['height_cm'] ?? '') ?>"></div>
                    <div class="col-md-6"><label class="form-label">Weight (kg)</label><input type="number" name="weight_kg" class="form-control" value="<?= htmlspecialchars($user_data['weight_kg'] ?? '') ?>"></div>
                    <div class="col-md-6"><label class="form-label">Existing Diseases (comma-separated)</label><input type="text" name="existing_diseases" class="form-control" value="<?= htmlspecialchars($user_data['existing_diseases'] ?? '') ?>"></div>
                    <div class="col-12"><label class="form-label">Allergies (comma-separated)</label><input type="text" name="allergies" class="form-control" value="<?= htmlspecialchars($user_data['allergies'] ?? '') ?>"></div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Symptom History -->
    <div class="card shadow-sm">
        <div class="card-header"><h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2"></i>Symptom History</h5></div>
        <div class="list-group list-group-flush">
            <!-- Mock Data -->
            <div class="list-group-item"><p class="text-muted text-center p-3">No history found.</p></div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

