<?php
class staffClass
{
	 /* User Login */
     public function userLogin($usernameEmail,$password)
     {

          $db = getDB();
          $hash_password= hash('sha256', $password);
          $stmt = $db->prepare("SELECT staff_id FROM staff WHERE  (username=:usernameEmail or email=:usernameEmail) AND  password=:hash_password");  
          $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->execute();
          $count=$stmt->rowCount();
          $data=$stmt->fetch(PDO::FETCH_OBJ);
          $db = null;
          if($count)
          {
                $_SESSION['staff_id']=$data->staff_id;
                return true;
          }
          else
          {
               return false;
          }    
     }




}
?>