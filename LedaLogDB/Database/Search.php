   <?php        
   $search_keyword = '';
   if(!empty($_POST['search']['keyword'])) {
   $search_keyword = $_POST['search']['keyword'];
    }
   $sql = 'SELECT log_no, log_title, customer, raised_date, staff_name, status FROM log where log_title like "%query%" ORDER BY log_no asc';
                           
   $pdo_statement = $pdo_conn->prepare($query);
   $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
   $pdo_statement->execute();
  ?>
