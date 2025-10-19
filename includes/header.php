<?php
require_once 'db/db_connect.php';

// --- Page Access Control ---
$public_pages = ['login.php', 'register.php'];
$current_page = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    if (!in_array($current_page, $public_pages)) {
        header("location: login.php");
        exit;
    }
} else {
    // Set default theme if not set
    if (!isset($_SESSION['theme'])) {
        $_SESSION['theme'] = 'light';
    }
}

// --- Navigation Items ---
$nav_items = [
    'index.php' => ['icon' => 'bi-house-fill', 'text' => 'Home'],
    'symptoms.php' => ['icon' => 'bi-clipboard2-pulse-fill', 'text' => 'Symptoms'],
    'services.php' => ['icon' => 'bi-hospital-fill', 'text' => 'Services'],
    'profile.php' => ['icon' => 'bi-person-fill', 'text' => 'Profile'],
    'settings.php' => ['icon' => 'bi-gear-fill', 'text' => 'Settings'],
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MediLyze AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body data-bs-theme="<?= htmlspecialchars($_SESSION['theme'] ?? 'light') ?>">

    <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
    <!-- Top Navigation Bar -->
    <header class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-success" href="index.php">
                <i class="bi bi-heart-pulse-fill me-2"></i>MediLyze AI
            </a>
            
            <!-- Desktop Navigation Links -->
            <div class="collapse navbar-collapse d-none d-lg-flex justify-content-center">
                <ul class="navbar-nav">
                    <?php foreach ($nav_items as $url => $item): ?>
                        <li class="nav-item">
                            <a class="nav-link px-3 mx-1 <?= ($current_page == $url) ? 'active' : '' ?>" href="<?= $url ?>"><?= $item['text'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn rounded-circle position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell-fill fs-5"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end p-2 shadow border-0" style="width: 300px;">
                       <p class="text-center text-muted small my-2">No new notifications.</p>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle ms-2" data-bs-toggle="dropdown">
                        <img src="<?= htmlspecialchars($_SESSION['user_picture'] ?? 'assets/images/default_avatar.png') ?>" alt="User" width="40" height="40" class="rounded-circle" style="object-fit:cover;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-small shadow border-0">
                        <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="settings.php"><i class="bi bi-gear-fill me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>
    
    <main class="container py-5 mt-5">

