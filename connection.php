<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>direction</title>
    <style>
        
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } 
        body {
            
            background-color: lightblue;
            min-height: 100vh;
        width: 100%;
        background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)), url('images/this.jpg');
        background-position: center;
     background-size: cover;
        position: relative;
            display: flex; 
             justify-content: center ;  
             align-items: center;  
            height: 100vh; 
            margin: 0;
            padding: 0;
            
        
        }

        .container {
            display: flex; 
            gap: 20px; 
        }

        .first, .second {
            background-color: lightgreen;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 300px;
        }

        a {
            color: #007BFF;
             text-decoration: none; 
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="first">
            Have you already created an account? Not yet <a href="registrationn.php">Create here</a>
        </div> 
        <div class="second">
            Already have an account? <a href="loginn.php"><br>Login here</a>
        </div>
    </div>
</body>
</html>
