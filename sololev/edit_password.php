<?php
// edit_password.php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id']; // Get user ID from URL parameter
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password='$password' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully!";
        // Redirect to dashboard.php after successful update
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating password: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Password</h2>
        <form method="post" action="edit_password.php?id=<?php echo $_GET['id']; ?>">
            <input type="email" name="email" placeholder="New email" required>
            <button type="submit">Update Password</button>
            <input type="password" name="password" placeholder="New Password" required>
            <button type="submit">Update Password</button>
        </form>
    </div>
</body>
</html>
