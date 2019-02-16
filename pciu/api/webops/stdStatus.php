 <?php 
 require_once('../dbConnect.php'); 
 $info = json_decode(file_get_contents("php://input"));
 if(count($info) > 0) {  
      $id = $info->id;  
      $query = "UPDATE student_db_tbl SET status = 0 WHERE id='$id'";  
      if(mysqli_query($con, $query)) {  
           echo 'Student successfully deactivated!';  
      } else {  
           echo 'Failed';  
      }  
 }