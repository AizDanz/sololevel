<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        <h2 class="h2col">Register</h2>
        <form method="post" action="register.php">
            <input class="em" type="email" name="email" placeholder="Email" required>
            <input class="em" type="password" name="password" placeholder="Password" required>
            <button Class="form-container"type="submit" href="register.php">Register</button>
            <div class="registration-text">
      Please login if you have already account<a class="rega" href="login.php"> login</a>
    </div>
        </form>
    </div>
</body>
</html>
