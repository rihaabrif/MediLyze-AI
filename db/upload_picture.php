<?php
require_once 'db_connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo json_encode(['success' => false, 'error' => 'User not logged in.']);
    exit;
}

if (isset($_FILES['profile_picture'])) {
    $user_id = $_SESSION['id'];
    $user_name = preg_replace("/[^a-zA-Z0-9]/", "", $_SESSION['user_name']);

    $file = $_FILES['profile_picture'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // 5MB limit
                
                // Delete old picture
                $sql = "SELECT profile_picture_path FROM users WHERE id = ?";
                if($stmt = mysqli_prepare($link, $sql)) {
                    mysqli_stmt_bind_param($stmt, "i", $user_id);
                    mysqli_stmt_execute($stmt);
                    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
                    $oldPath = $row['profile_picture_path'];

                    // Don't delete if it's the default placeholder URL
                    if (strpos($oldPath, 'placehold.co') === false && file_exists('../' . $oldPath)) {
                        unlink('../' . $oldPath);
                    }
                    mysqli_stmt_close($stmt);
                }

                // Upload new picture
                $newFileName = $user_id . '-' . $user_name . '.' . $fileExt;
                $uploadDir = '../uploads/profile_pictures/';
                if (!is_dir($uploadDir)) { mkdir($uploadDir, 0777, true); }
                $fileDestination = $uploadDir . $newFileName;
                $dbPath = 'uploads/profile_pictures/' . $newFileName;

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $sql = "UPDATE users SET profile_picture_path = ? WHERE id = ?";
                    if($stmt = mysqli_prepare($link, $sql)) {
                        mysqli_stmt_bind_param($stmt, "si", $dbPath, $user_id);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);

                        $_SESSION['user_picture'] = $dbPath; // CRITICAL: Update session
                        echo json_encode(['success' => true, 'filePath' => $dbPath]);
                        exit;
                    }
                }
                echo json_encode(['success' => false, 'error' => 'Failed to move uploaded file.']);
            } else {
                echo json_encode(['success' => false, 'error' => 'File is too large (Max 5MB).']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Error uploading file.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid file type (JPG, JPEG, PNG only).']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No file uploaded.']);
}
?>

