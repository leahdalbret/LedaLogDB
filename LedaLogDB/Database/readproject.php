 <?php

 require 'database.php';
    $project_id = null; 
  if(!empty($_GET['project_id'])){
      $project_id =$_REQUEST['project_id'];
  }
 {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT project.project_id, project.project_title, project.sponsor, staff.staff_name, project.required_date, project.project_status 
                           FROM Project
                           INNER JOIN Staff ON project.owner = staff.staff_id
                           WHERE project_id =?';
        $q = $pdo->prepare($sql);
        $q->execute(array($project_id));
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
                        <h3>View Project</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Project ID</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['project_id'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Project Title</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['project_title'];?>
                            </label>
                        </div>
                      </div>
                                <div class="control-group">
                        <label class="control-label">Required Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['required_date'];?>
                            </label>
                        </div>
                      </div>
                              <div class="control-group">
                        <label class="control-label">Owner</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['staff_name'];?>
                            </label>
                        </div>
                      </div>
                    
                    <div class="control-group">
                        <label class="control-label">Project Status</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['project_status'];?>
                            </label>
                        </div>
                      </div>
                  
                        <div class="form-actions">
                          <a class="btn" href="projectmain.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

