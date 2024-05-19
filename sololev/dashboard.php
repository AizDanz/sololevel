<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$email = $_SESSION['email'];

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: login.php");
    exit();
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    
}

$result = $conn->query("SELECT id, email, password FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="nav">
        <a href="login.php">Logout</a>
    </div>
    <div class="content">
        <h2>Welcome, Users!</h2>
        <h3>DATABASE</h3>
        <div>
      Add New User?<a class="ucol" href="register.php"> Register</a>
    </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>*********</td> 
                <td>
                    <a class="tdcol1" href="dashboard.php?delete=<?php echo $row['id']; ?>">Delete</a>
                    <a class="tdcol2" href="update.php?id=<?php echo $row['id']; ?>">Update</a> 
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
