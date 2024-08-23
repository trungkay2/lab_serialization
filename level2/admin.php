<?php
include 'user.php';
// Start the session
session_start();

// Function to check if the admin cookie is set and valid
function checkAdminCookie() {
    if (isset($_COOKIE['session'])) {
        $cookie = unserialize(urldecode(base64_decode($_COOKIE['session'])));

        // Ensure the deserialized object is an instance of User
        if ($cookie && $cookie instanceof User) {
            return $cookie;
        }
    }

    // Cookie is not set or invalid
    return false;
}

// Call the function to check the cookie
$user = checkAdminCookie();

// Check if the user is an admin
if (!$user->isAdmin()) {
    // If the user is not an admin, redirect to the login page
    echo 'You are not admin';
    // header('Location: index.php');
    exit();
}

// Your admin page content goes here
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1>Welcome to the Admin Page</h1>
    <!-- Admin content -->
</body>
</html>
