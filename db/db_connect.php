<?php
// Database connection details
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // Your DB password, if you have one
define('DB_NAME', 'medilyze_db');
define('DB_PORT', 3307);

// Attempt to connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Start the session if it's not already started
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

