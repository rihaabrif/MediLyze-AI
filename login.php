<?php
require_once 'db/db_connect.php';

// Redirect if already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

$email = $password = "";
$email_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic validation
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Proceed if no validation errors
    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT id, full_name, email, password, profile_picture_path FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $full_name, $email, $hashed_password, $pfp_path);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["user_name"] = $full_name;
                            $_SESSION["user_picture"] = $pfp_path; // Set the profile picture path

                            // Redirect user to home page
                            header("location: index.php");
                        } else {
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - MediLyze AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <h1 class="h2 fw-bold text-success"><i class="bi bi-heart-pulse-fill me-2"></i>MediLyze AI</h1>
                </div>
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="card-title text-center fw-bold mb-4">Welcome Back</h2>
                        <?php 
                        if(!empty($login_err)){
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }        
                        ?>
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required value="<?= $email; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">Login</button>
                            </div>
                        </form>
                        <p class="text-center mt-4 text-muted small">
                            Don't have an account? <a href="register.php" class="fw-bold">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

