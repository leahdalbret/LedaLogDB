<?php
    require 'database.php';

 
    if ( !empty($_POST)) {
        // keep track post values

        $log_no = $_POST['log_no'];
        
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Delete from log where log_no =?";
        $q = $pdo->prepare($sql);
        $q->execute(array($log_no));
        Database::disconnect();
        header("Location: LogMain.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Contact System Administrator</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                     
                      <p class="alert alert-error">Please contact your System Administrator to delete this Project, thank you </p>
                      <div class="form-actions">
                      
                          <a class="btn" href="projectmain.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

