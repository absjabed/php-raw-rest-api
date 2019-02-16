<?php 
header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'GET')
    {

		require_once('dbConnect.php');

		$sql = "SELECT * FROM notice_db_tbl WHERE status = 1 ORDER BY id DESC";

		$r = mysqli_query($con,$sql);

		$result = array();

//`id`, `notice_ref_no`, `notice_from`, `notice_to`, `notice_date`, `notice_title`, `notice_sort_title`, `notice_body`, `date_time_stmp`, `notice_fb_id`, `status`
			while($res = mysqli_fetch_array($r)){
		array_push($result,array(

			"id"=>$res['id'],

			"notice_ref_no"=>$res['notice_ref_no'],

			"notice_from"=>$res['notice_from'],

			"notice_to"=>$res['notice_to'],

			"notice_date"=>$res['notice_date'],

			"notice_title"=>$res['notice_title'],

			"notice_sort_title"=>$res['notice_sort_title'],

			"notice_body"=>$res['notice_body'],

			"date_time_stmp"=>$res['date_time_stmp'],

			"notice_fb_id"=>$res['notice_fb_id'],

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