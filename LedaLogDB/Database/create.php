<?php

    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $client_idError = null;
        $activity_idError = null;
        $raised_date =null;
        $requested_byError = null;
        $requested_by_dateError = null;
        $log_titleeError = null;
        $detailsError = null;   
              
        // keep track post values
        $client_id = $_POST['customer'];
        $activity_id = $_POST['activity'];
        $raised_date = $_POST['raised_date'];
        $requested_by = $_POST['requested_by'];
        $requested_by_date = $_POST['requested_by_date'];
        $log_title = $_POST['log_title'];
        $details = $_POST['details'];
       
        
        
        // validate input
        $valid = true;
        if (empty($client_id)) {
            $client_idError = 'Please enter Customer';
            $valid = false;
        }         
        if (empty($activity_id)) {
            $activity_idError = 'Please select Activity';
            $valid = false;
        }
        if (empty($raised_date)) {
            $raised_dateError = 'Please select Raised Date';
            $valid = false;
        }
        if (empty($requested_by_date)) {
            $requested_by_dateError = 'Please enter resquested by date';
            $valid = false;
        }
        if (empty($requested_by)) {
            $requested_byError = 'Please enter resquested by';
            $valid = false;
        }
         if (empty($log_title)) {
            $log_titleError = 'Please enter log title';
            $valid = false;
        }
         if (empty($details)) {
            $detailsError = 'Please enter details';
            $valid = false;
        }
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Log (client_id,activity_id,requested_by_date,requested_by,log_title,details, raised_date) values(?, ?, ?, ?, ?, ?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($client_id,$activity_id,$requested_by_date,$requested_by,$log_title,$details,$raised_date));
            Database::disconnect();
            header("Location: LogMain.php");
        }
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
                           <img src="img/logo.png" alt="Logo">
                        <h3>Create New Log</h3>
                    </div>
                    <form class="form-horizontal" action="create.php" method="post">
                        <div class="col-xs-3">
                      <div class="control-group <?php echo !empty($client_idError)?'error':'';?>">
                        <label class="control-label">Customer</label>
                        <div class="controls">
                            <input name="customer" type="text"  placeholder="customer" value="<?php echo !empty($client_id)?$customer_id:'';?>">
                            <?php if (!empty($client_idError)): ?>
                                <span class="help-block"><?php echo $client_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        </div>
                     <div class="control-group <?php echo !empty($activity_idError)?'error':'';?>">
                        <label class="control-label">Activity</label>
                        <div class="controls">
                            <input name="activity" type="text"  placeholder="activity" value="<?php echo !empty($activity_id)?$activity_id:'';?>">
                            <?php if (!empty($activity_idError)): ?>
                                <span class="help-block"><?php echo $activity_idError;?></span>
                            <?php endif;?>         
                        </div>
                      </div>     
                        <div class="control-group <?php echo !empty($activity_idError)?'error':'';?>">
                        <label class="control-label">Raised Date</label>
                        <div class="controls">
                            <input name="raised_date" type="date"  placeholder="raised_date" value="<?php echo !empty($raised_date)?$raised_date:'';?>">
                            <?php if (!empty($raised_dateError)): ?>
                                <span class="help-block"><?php echo $raised_dateError;?></span>
                            <?php endif;?>         
                        </div>
                      </div> 
                    <div class="control-group <?php echo !empty($requested_byError)?'error':'';?>">
                        <label class="control-label">Requested By</label>
                        <div class="controls">
                            <input name="requested_by" type="text" placeholder="requested_by" value="<?php echo !empty($requested_by)?$requested_by:'';?>">
                            <?php if (!empty($requested_byError)): ?>
                                <span class="help-block"><?php echo $requested_byError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                     <div class="control-group <?php echo !empty($log_titleError)?'error':'';?>">
                        <label class="control-label">Log Title</label>
                        <div class="controls">
                            <input name="log_title" type="text"  placeholder="log_title" value="<?php echo !empty($log_title)?$log_title:'';?>">
                            <?php if (!empty($log_titleError)): ?>
                                <span class="help-block"><?php echo $log_titleError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                           <div class="control-group <?php echo !empty($detailsError)?'error':'';?>">
                               <label class="control-label">Details</label>
                        <div class="controls">
                           <input name="details" type="text"  placeholder="details" value="<?php echo !empty($details)?$details:'';?>">
                            <?php if (!empty($detailsError)): ?>
                                <span class="help-block"><?php echo $detailsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                     <div class="control-group <?php echo !empty($requested_by_dateError)?'error':'';?>">
                        <label class="control-label">Requested By Date</label>
                        <div class="controls">
                            <input name="requested_by_date"type="date" value="<?php echo !empty($requested_by_date)?$requested_by_date:'';?>">
                            <?php if (!empty($requested_by_dateError)): ?>
                                <span class="help-block"><?php echo $requested_by_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>  
                      <div class="form-actions">
                          <button type="submit" class="btn btn-default">Submit</button>
                          <a class="btn" href="LogMain.php">Back</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
  </body>
</html>

