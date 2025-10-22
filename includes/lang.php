<?php
// This file is included AFTER session_start() in header.php

// 1. Set default language if not in session
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en'; // Default to English
}

// 2. Define allowed languages
$allowed_langs = ['en', 'si', 'ta'];
$current_lang = $_SESSION['lang'];

// 3. Check if user is logged in and their DB lang is different
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // This assumes 'language' is fetched on login and stored in session.
    // If not, we fetch it.
    if (!isset($_SESSION['db_lang_loaded'])) {
        $user_id = $_SESSION['id'];
        $sql = "SELECT language FROM users WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    if (in_array($row['language'], $allowed_langs)) {
                        $_SESSION['lang'] = $row['language'];
                        $current_lang = $row['language'];
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
        $_SESSION['db_lang_loaded'] = true; // Mark as loaded for this session
    }
}

// 4. Load the language file
$lang_file = 'lang/' . $current_lang . '.php';
if (file_exists($lang_file)) {
    require_once $lang_file;
} else {
    // Fallback to English if file is missing
    require_once 'lang/en.php';
}
?>
