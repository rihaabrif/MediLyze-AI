<?php
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['id'];

    // Sanitize and prepare variables from POST data
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $city = trim($_POST['city']);
    $age = trim($_POST['age']);
    $height_cm = trim($_POST['height_cm']);
    $weight_kg = trim($_POST['weight_kg']);
    $existing_diseases = trim($_POST['existing_diseases']);
    $allergies = trim($_POST['allergies']);

    // SQL UPDATE statement
    $sql = "UPDATE users SET 
                full_name = ?, 
                email = ?, 
                phone_number = ?, 
                city = ?, 
                age = ?, 
                height_cm = ?, 
                weight_kg = ?, 
                existing_diseases = ?, 
                allergies = ? 
            WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssiiissi", 
            $full_name, 
            $email, 
            $phone_number, 
            $city, 
            $age, 
            $height_cm, 
            $weight_kg, 
            $existing_diseases, 
            $allergies, 
            $user_id
        );

        if (mysqli_stmt_execute($stmt)) {
            // Update session name in case it changed
            $_SESSION['user_name'] = $full_name;
            // Set a success message and redirect
            $_SESSION['update_success'] = "Profile updated successfully!";
        } else {
            $_SESSION['update_error'] = "Oops! Something went wrong. Please try again.";
        }
        mysqli_stmt_close($stmt);
    }
    
    // Redirect back to profile page
    header("location: ../profile.php");
    exit();
}
?>
