<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid Email or Password.";
        }
    } else {
        $error = "Please try again or create a new account.";
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
        <h2 class="h2col" >Login</h2>
        <form method="post" action="login.php">
            <input class="em" type="email" name="email" placeholder="Email" required>
            <input class="em" type="password" name="password" placeholder="Password" required>
            <button Class="form-container" type="submit">Login</button>
        </form> 
        <div class="regcol"> 
      [CAUTION]</a>
        <div class="registration-text">
      Don't have an account yet?<a class="rega" href="register.php"> Register</a>
    </div>
    </div>
</body>
</html>

