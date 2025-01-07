<?php
session_start();
?>

 

 <?php
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "database.php";

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            if ($user['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $user['name'];
                header("Location: Admindash.php");
            } else if ($user['user_type'] == 'user') {
                // $_SESSION['user_name'] = $user['name'];
                $_SESSION['user'] = $user['email'];
                header("Location:reserve.php");
            }
            exit();
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Email not found!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="loginn.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter email"  value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" value="Login" name="login"> <!-- Ensure the name matches PHP logic -->
            </div>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p> <!-- Display error messages -->
        <?php endif; ?>
         <p>Go back to <a href="index.php">Homepage</a></p> 
    </div>
</body>
</html>
