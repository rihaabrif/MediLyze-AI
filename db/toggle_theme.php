<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // If not logged in, do nothing.
    exit;
}

// Toggle the theme
if (isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark') {
    $_SESSION['theme'] = 'light';
} else {
    $_SESSION['theme'] = 'dark';
}

// Send a success response
header('Content-Type: application/json');
echo json_encode(['success' => true, 'newTheme' => $_SESSION['theme']]);
?>
