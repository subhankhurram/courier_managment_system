<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Not logged in → redirect to login page
    header("Location: ../auth/login.php");
    exit();
}

/**
 * Function to check access by role
 * @param array|string $allowed_roles - single role as string or multiple roles as array
 */
function check_access($allowed_roles) {
    if (!isset($_SESSION['role'])) {
        die("Access Denied: Role not set.");
    }

    if (is_array($allowed_roles)) {
        if (!in_array($_SESSION['role'], $allowed_roles)) {
            die("Access Denied: Insufficient Permissions.");
        }
    } else {
        if ($_SESSION['role'] !== $allowed_roles) {
            die("Access Denied: Insufficient Permissions.");
        }
    }
}
