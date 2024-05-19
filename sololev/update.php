<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id']; // Get user ID from URL parameter
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET email='$email', password='$password' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully!";
        // Redirect to dashboard.php after successful update
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
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
        <h2 class="h2col">Update User</h2>
        <form method="post" action="edit.php?id=<?php echo $_GET['id']; ?>">
            <input class="em" type="email" name="email" placeholder="New email" required>
            <input class="em" type="password" name="password" placeholder="New Password" required>
            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>

