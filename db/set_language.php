<?php
require_once 'db_connect.php'; // Includes session_start()

header('Content-Type: application/json');

$response = ['success' => false];
$allowed_langs = ['en', 'si', 'ta'];

if (isset($_POST['lang']) && in_array($_POST['lang'], $allowed_langs)) {
    $new_lang = $_POST['lang'];
    
    // Update session
    $_SESSION['lang'] = $new_lang;

    // If user is logged in, update their database preference
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $user_id = $_SESSION['id'];
        $sql = "UPDATE users SET language = ? WHERE id = ?";
        
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $new_lang, $user_id);
            if (mysqli_stmt_execute($stmt)) {
                $response['success'] = true;
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        // For non-logged-in users, just updating session is success
        $response['success'] = true;
    }
}

echo json_encode($response);
?>
