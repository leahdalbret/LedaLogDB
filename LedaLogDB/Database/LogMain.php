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
            <h2>All Open Logs</h2>
                 
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                     <th>Log Number</th>
                     <th>Log Title</th>
                      <th>Customer</th>
                      <th>Raised Date</th>
                      <th>Requested By</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
 
              <?php
       
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT log.log_title, customer.customer, log.raised_date, staff.staff_name, log.log_no, log.status FROM log 
                           INNER JOIN customer ON log.client_id = customer.client_id 
                           INNER JOIN staff ON log.requested_by = staff.staff_id
                           ORDER BY log.log_no asc';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['log_no'] . '</td>';
                            echo '<td>'. $row['log_title'] . '</td>';
                            echo '<td>'. $row['customer'] . '</td>';
                            echo '<td>'. $row['raised_date'] . '</td>';
                            echo '<td>'. $row['staff_name'] . '</td>';
                            echo '<td>'. $row['status'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn" href="read.php?log_no='.$row['log_no'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?log_no='.$row['log_no'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?log_no='.$row['log_no'].'"disabled>Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
                </table>  
                      
                 <p>   <a href="create.php" class="btn btn-success">Create a new Log</a>
                <a href="welcome.php" class="btn btn-default">Back</a>
                  <a href="logout.php" class="btn btn-default">Log Out</a></p>    
        </div>

    </div> <!-- /container -->
  </body>
</html>



