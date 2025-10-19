<?php
require_once 'db/db_connect.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = trim($_POST['age']);
    $height = trim($_POST['height_cm']);
    $weight = trim($_POST['weight_kg']);
    $diseases = trim($_POST['existing_diseases']);
    $allergies = trim($_POST['allergies']);
    
    $sql = "UPDATE users SET age = ?, height_cm = ?, weight_kg = ?, existing_diseases = ?, allergies = ? WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "iisssi", $age, $height, $weight, $diseases, $allergies, $_SESSION['id']);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: index.php");
            exit;
        } else {
            echo "Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Onboarding - MediLyze AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                 <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="card-title text-center fw-bold mb-2">Just a few more details</h2>
                        <p class="text-center text-muted mb-4">This helps us provide a more accurate analysis.</p>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3"><input type="number" name="age" class="form-control" placeholder="Age" required></div>
                            <div class="mb-3"><input type="number" name="height_cm" class="form-control" placeholder="Height (cm)" required></div>
                            <div class="mb-3"><input type="number" name="weight_kg" class="form-control" placeholder="Weight (kg)" required></div>
                            <div class="mb-3"><textarea name="existing_diseases" class="form-control" placeholder="Existing Diseases (comma separated)"></textarea></div>
                            <div class="mb-3"><textarea name="allergies" class="form-control" placeholder="Allergies (comma separated)"></textarea></div>
                            <div class="d-grid"><button type="submit" class="btn btn-success btn-lg">Complete Profile</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

