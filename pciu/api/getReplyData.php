<?php 
header('Access-Control-Allow-Origin: *');
if($_SERVER['REQUEST_METHOD'] === 'GET')
    {

		require_once('dbConnect.php');

		$sql = "SELECT * FROM enquery_reply_db_tbl WHERE status = 1 ORDER BY id DESC";

		$r = mysqli_query($con,$sql);

		$result = array();

//SELECT `id`, `enqueryID`, `studentID`, `studentName`, `topic_txt`, `query_txt`, `reply_txt`, `datetime_stmp`, `status` FROM `enquery_reply_db_tbl` WHERE 1

			while($res = mysqli_fetch_array($r)){
		array_push($result,array(

			"id"=>$res['id'],

			"enqueryID"=>$res['enqueryID'],

			"studentID"=>$res['studentID'],

			"studentName"=>$res['studentName'],

			"topic_txt"=>$res['topic_txt'],

			"query_txt"=>$res['query_txt'],

			"reply_txt"=>$res['reply_txt'],

			"datetime_stmp"=>$res['datetime_stmp'],

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