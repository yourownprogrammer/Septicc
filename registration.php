
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST["submit"])){
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT); // encryption of password
            $errors = array();

            if (empty($fullname)) {
                array_push($errors, "Full name is required");
            } elseif (!preg_match("/\s/", $fullname)) {
                array_push($errors, "Full name must include both first and last name<br>");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors,"Email not valid, must be in the form <i>abc12@example.com</i>");
            }

            if(strlen($password) < 8){
                array_push($errors, "Password must be at least 8 characters long<br>");
            } 
            if($password!==$passwordRepeat){
                array_push($errors,"Password doesn't match<br>");
            }
            require_once "database.php";
            $sql= "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount>0){
                array_push($errors, "Email already exists!");
            }
            if(count($errors) > 0){
                foreach ($errors as $error){
                    echo "$error";
                }
            } else {
                
               $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ?)";
               $stmt = mysqli_stmt_init($conn);
               $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
               if($prepareStmt){
                mysqli_stmt_bind_param($stmt,"sss",$fullname, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo"you are registered successfully";
               }
               else{
                die("something went wrong");
               }
            }
        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" name="fullname" placeholder="Enter full name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <input type="password" name="repeat_password" placeholder="Confirm password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register" name="submit">
            </div>
        </form>
    <div>
    <p> Already Registered <a href="login.php"> login here </a></p></div>
    </div>
    <script>
        
    </script>
</body>
</html>
