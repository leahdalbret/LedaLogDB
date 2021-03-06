<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body> 
    <div class ="container">
         <img src="img/logo.png" alt="Logo">
    </div>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your Logs database.</h1>
    </div>
    <P>
        <a href="LogMain.php" class="btn btn-primary">Logs</a>  
    </P>
     <p>
        <a href="ProjectMain.php" class="btn btn-primary">Projects</a>
    </p>
    <p>
        <a href="reset_password.php" class="btn btn-primary">Reset Password</a>
    </p>
    
    <p>
        <a href="logout.php" class="btn btn-primary">Sign Out</a>
    </p>
</body>
</html>