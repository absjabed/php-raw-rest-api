 <?php 
 require_once('../dbConnect.php');
   $info = json_decode(file_get_contents("php://input"));
 if(count($info) > 0) {  
       $teacherId = $info->teacherId;  
      $query = "SELECT * from teachers_campus_db WHERE teacherId = '$teacherId'";  
      $result =  mysqli_query($con, $query);

      if(mysqli_num_rows($result) > 0 ){
    		
      	echo '1';
		}else{
			echo '0';
			
		} 
 }