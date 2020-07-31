<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
        <div class="row">
            <img src="img/logo.png" alt="Logo">
                <h2>All Projects</h2>
                  <div class="row">
                 
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                     <th>Project ID</th>
                     <th>Project Title</th>
                      <th>Sponsor</th>
                      <th>Owner</th>
                      <th>Required Date</th>
                      <th>Project Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT project.project_id, project.project_title, staff.staff_name, project.required_date, project.project_status 
                           FROM Project
                           INNER JOIN Staff ON project.owner = staff.staff_id
                           ORDER BY project_id asc';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['project_id'] . '</td>';
                            echo '<td>'. $row['project_title'] . '</td>';
                            echo '<td>'. $row['staff_name'] . '</td>';
                            echo '<td>'. $row['staff_name'] . '</td>';
                            echo '<td>'. $row['required_date'] . '</td>';
                            echo '<td>'. $row['project_status'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn" href="readproject.php?project_id='.$row['project_id'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="updateproject.php?project_id='.$row['project_id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="deleteproject.php?project_id='.$row['project_id'].'"disabled>Delete</a>';
                            echo '</td>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
                </table>  
                          <p> 
                              <a href="createproject.php" class="btn btn-success">Create a new Project</a>
                <a href="welcome.php" class="btn btn-default">Back</a>
                      
                            
        <a href="logout.php" class="btn btn-default">Log Out</a>
                            </p>
        </div>
    </div> <!-- /container -->
  </body>
</html>



