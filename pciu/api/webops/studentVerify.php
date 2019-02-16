 <?php 
 require_once('../dbConnect.php'); 
 $info = json_decode(file_get_contents("php://input"));
 if(count($info) > 0) {  
      $studentId = $info->studentId;  
      $query = "SELECT * from student_campus_db WHERE studentId = '$studentId'";  
      $result =  mysqli_query($con, $query);

      if(mysqli_num_rows($result) > 0 ){
    		
      	echo "1";
		}else{
			echo "0";
			
		}
      
 }