<?php 
header('Access-Control-Allow-Origin: *');
if($_SERVER['REQUEST_METHOD'] === 'GET')
    {

		require_once('dbConnect.php');

		$studentId  = $_GET['studentId'];
/*
		$sql = "SELECT * FROM notice_db_tbl WHERE status = 1 ORDER BY id DESC";*/

		$sql = "SELECT id,studentName, uniqueId, studentAddress, studentEmail, studentPhone, deptCode, batchId, studentId, dateTime, status FROM student_db_tbl WHERE studentId ='".$studentId."'";

		$requestQuery = mysqli_query($con,$sql);

		$result = array();
		
			while($row = mysqli_fetch_array($requestQuery)){
		array_push($result,array(

			"id"=>$row['id'],

			"studentName"=>$row['studentName'],

			"uniqueId"=>$row['uniqueId'],

			"studentAddress"=>$row['studentAddress'],

			"studentEmail"=>$row['studentEmail'],

			"studentPhone"=>$row['studentPhone'],

			"deptCode"=>$row['deptCode'],

			"batchId"=>$row['batchId'],

			"studentId"=>$row['studentId'],

			"dateTime"=>$row['dateTime'],

			"status"=>$row['status']

			)

		);
	}

		echo json_encode($result);
		mysqli_close($con);


	}else if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
    	echo "post method";
    	 /*$data = file_get_contents('php://input');
        $json_data = json_decode($data , true);
    
        //code to process data
        if ($data == "" || empty($json_data['user_id']) || empty($json_data['password']))
        {
            $response = array('status' => false, 'message' => 'Invalid Values');
        }
        else
        {
            if($json_data['user_id']=='hasan' && $json_data['password']==123)
                $response = array('status' => true, 'message' => 'Wow! You are a valid user!');
            else
                $response = array('status' => false, 'message' => 'User ID or password is not valid');
        }
    
        echo json_encode($response);*/
    }