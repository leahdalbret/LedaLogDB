<?php

 require 'database.php';
    $log_no = null; 
  if(!empty($_GET['log_no'])){
      $log_no =$_REQUEST['log_no'];
  }
 {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT log.log_no, log.log_title, customer.customer, log.raised_date, staff.staff_name, log.status, log.requested_by_date FROM log 
                           INNER JOIN customer ON log.client_id = customer.client_id 
                           INNER JOIN staff ON log.requested_by = staff.staff_id
                           where log_no = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($log_no));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                        <h3>View Log</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Log Number</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['log_no'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Log Title</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['log_title'];?>
                            </label>
                        </div>
                      </div>
                                <div class="control-group">
                        <label class="control-label">Customer</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['customer'];?>
                            </label>
                        </div>
                      </div>
                              <div class="control-group">
                        <label class="control-label">Requested By</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['staff_name'];?>
                            </label>
                        </div>
                      </div>
                         <div class="control-group">
                        <label class="control-label">Raised Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['raised_date'];?>
                            </label>
                             </div>
                         </div>
                    <div class="control-group">
                        <label class="control-label">Requested By Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['requested_by_date'];?>
                            </label>
                        </div>
                      </div>
                        <div class="control-group">
                        <label class="control-label">Status</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['status'];?>
                            </label>
                        <div class="form-actions">
                          <a class="btn" href="logmain.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

