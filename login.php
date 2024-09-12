
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
if(isset($_POST["login"])) {

    $email = $_POST["email"];
    $password =$_POST["password"];
    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email ='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($user) {
        if(password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: dashboard.php");
            exit();
        }
        else{
            echo "Password does not match!";
        }
    }else{
            echo"Email does not match";
        }
    }

        ?>
        <form action = "login.php" method="post">
            <div class="form-group">
                <input type = "email" name="email" placeholder ="Enter email" required>
            </div>
            <div class="form-group">
                <input type = "password" name="password" placeholder ="password" required>
            </div>
            <div class="form_group">
                <input type = "submit" value ="login" name="login" >
            </div> 
</form> 
    <div>
    <p>Not Registered yet? <a href ="registration.php"> Register here </a></p></div>
    </div>
</body> 
</html> 