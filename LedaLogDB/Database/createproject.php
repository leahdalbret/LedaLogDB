<?php
   
    require 'database.php';

   if ( !empty($_POST)) {
        // keep track validation errors
        $project_titleError = null;
        $commentsError = null;
        $sponsorError = null;
        $ownerError = null;
        $required_dateError = null;   
        $project_statusError = null;
              
        // keep track post values
        $project_title = $_POST['project_title'];
        $comments = $_POST['comments'];
        $sponsor = $_POST['sponsor'];
        $owner = $_POST['owner'];
        $required_date = $_POST['required_date'];
        $project_status = $_POST['project_status'];
         
       
        
        
         // validate input
        $valid = true;
        if (empty($project_title)) {
            $project_titleError = 'Please enter Project Title';
            $valid = false;
        }         
        if (empty($comments)) {
            $commentsError = 'Please enter Comments';
            $valid = false;
        }
         if (empty($sponsor)) {
            $sponsorError = 'Please enter the sponsor';
            $valid = false;
        }
        if (empty($owner)) {
            $ownerError = 'Please enter the owner';
            $valid = false;
        }
   
         if (empty($required_date)) {
            $required_dateError = 'Please enter required date';
            $valid = false;
        }
          if (empty($project_status)) {
          $project_statusError = 'Please enter project status';
          $valid = false;
        }
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Project (project_title, sponsor, comments, owner, required_date, project_status) VALUES (?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($project_title, $sponsor, $comments, $owner, $required_date, $project_status));
            Database::disconnect();
            header("Location: ProjectMain.php");
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
                        <h3>Create new Project</h3>
                    </div>
                   <form class="form-horizontal" action="createproject.php?project_id=<?php echo $project_id?>" method="post">
                      <div class="control-group <?php echo !empty($project_titleError)?'error':'';?>">
                        <label class="control-label">Project Title</label>
                        <div class="controls">
                            <input name="project_title" type="text"  placeholder="project_title" value="<?php echo !empty($project_title)?$project_title:'';?>">
                            <?php if (!empty($project_titleError)): ?>
                                <span class="help-block"><?php echo $project_titleError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>    
                     <div class="control-group <?php echo !empty($commentsError)?'error':'';?>">
                        <label class="control-label">Comments</label>
                        <div class="controls">
                            <input name="comments" type="text"  placeholder="comments" value="<?php echo !empty($comments)?$comments:'';?>">
                            <?php if (!empty($commentsError)): ?>
                                <span class="help-block"><?php echo $commentsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                    <div class="control-group <?php echo !empty($sponsorError)?'error':'';?>">
                        <label class="control-label">Sponsor</label>
                        <div class="controls">
                            <input name="sponsor" type="text" placeholder="sponsor" value="<?php echo !empty($sponsor)?$sponsor:'';?>">
                            <?php if (!empty($sponsorError)): ?>
                                <span class="help-block"><?php echo $sponsorError;?></span>
                            <?php endif;?>
                        </div>
                      </div>  
                    <div class="control-group <?php echo !empty($ownerError)?'error':'';?>">
                        <label class="control-label">Owner</label>
                        <div class="controls">
                            <input name="owner" type="text" placeholder="owner" value="<?php echo !empty($owner)?$owner:'';?>">
                            <?php if (!empty($ownerError)): ?>
                                <span class="help-block"><?php echo $ownerError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                     <div class="control-group <?php echo !empty($required_dateError)?'error':'';?>">
                        <label class="control-label">Required Date</label>
                        <div class="controls">
                            <input name="required_date" type="date"  placeholder="required_date" value="<?php echo !empty($required_date)?$required_date:'';?>">
                            <?php if (!empty($required_dateError)): ?>
                                <span class="help-block"><?php echo $required_dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($project_statusError)?'error':'';?>">
                        <label class="control-label">Project Status</label>
                        <div class="controls">
                            <input name="project_status" type="text"  placeholder="project_status" value="<?php echo !empty($project_status)?$project_status:'';?>">
                            <?php if (!empty($project_statusError)): ?>
                                <span class="help-block"><?php echo $project_statusError;?></span>
                            <?php endif;?>
                        </div>
                           </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-default">Submit</button>
                          <a class="btn" href="ProjectMain.php">Back</a>
                        </div>
                </div>
    </div> <!-- /container -->
  </body>
</html>

