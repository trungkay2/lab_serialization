<?php
include 'user.php';
// Start the session
session_start();

// Function to handle the login process
function login($username, $password) {
    // Hardcoded username and password for demonstration purposes
    // $validUsername = 'admin';
    // $validPassword = 'password123';

    $user = new User($username, $password);
    $serializedData = base64_encode(urlencode(serialize($user)));
    print($serializedData);
    // Set the admin_logged_in cookie to 'true' with a validity of 1 hour
    setcookie('session', $serializedData, time() + 3600, '/');

    // Redirect to the admin page
    header('Location: admin.php');
    exit();
    
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $error = login($username, $password);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="index.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
