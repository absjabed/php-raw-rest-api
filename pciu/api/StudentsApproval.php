<?php 

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'GET')
    {

		require_once('dbConnect.php');

		$sql = "SELECT * FROM student_db_tbl WHERE status = 0 ORDER BY id DESC";

		$r = mysqli_query($con,$sql);

		$result = array();

//id,studentName, uniqueId, studentAddress, studentEmail, studentPhone, deptCode, batchId, studentId, dateTime, status FROM student_db_tbl WHERE studentId ='".$studentId."'";
			while($res = mysqli_fetch_array($r)){
		array_push($result,array(

			"id"=>$res['id'],

			"studentName"=>$res['studentName'],

			"uniqueId"=>$res['uniqueId'],

			"studentAddress"=>$res['studentAddress'],

			"studentEmail"=>$res['studentEmail'],

			"studentPhone"=>$res['studentPhone'],

			"deptCode"=>$res['deptCode'],

			"batchId"=>$res['batchId'],

			"studentId"=>$res['studentId'],

			"dateTime"=>$res['dateTime'],

			"status"=>$res['status']

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