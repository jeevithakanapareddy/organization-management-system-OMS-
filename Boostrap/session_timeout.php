<?php
// Set initial inactivity timeout
if (!isset($_SESSION['LAST_ACTIVITY'])) {
    $_SESSION['LAST_ACTIVITY'] = time();
}

// Check for inactivity and log out if necessary 300
if (time() - $_SESSION['LAST_ACTIVITY'] > 30) {
    session_unset();
    session_destroy();
    header('Location: logout.php'); // Redirect to logout page
    exit();
}

// Update inactivity timestamp
$_SESSION['LAST_ACTIVITY'] = time();
?>
