 <?php 
 require_once('../dbConnect.php');
 //$conn = mysqli_connect("localhost", "id4057816_pciu_notice", "pciu_notice", "id4057816_pciu_notice_db");  
 $info = json_decode(file_get_contents("php://input"));
 if(count($info) > 0) {  

 	/*

						'operation': "noticeInsert",
                        'notice_ref_no': "FCM PCIU Web",
                        'notice_from': "PCIU Web-admin",
                        'notice_to': topic,
                        'notice_date': fcmData_date,
                        'notice_title': $scope.title,
                        'notice_sort_title': "Click to see full notice!",
                        'notice_body': $scope.message,
                        'studentPhone': "web",
                        'studentEmail': "web",
                        'studentId': "web",
                        'batchId': "web",

 	$sql = 'INSERT INTO notice_db_tbl SET notice_ref_no =:notice_ref_no, notice_from =:notice_from,
    notice_to =:notice_to,notice_date = :notice_date,notice_title = :notice_title,notice_sort_title = :notice_sort_title,notice_body = :notice_body';

$query = $this ->conn ->prepare($sql);
    $query->execute(array(':notice_ref_no' => $notice_ref_no, ':notice_from' => $notice_from, ':notice_to' => $notice_to,
         ':notice_date' => $notice_date, ':notice_title' => $notice_title, ':notice_sort_title' => $notice_sort_title,
          ':notice_body' => $notice_body));

          ($notice_ref_no, $notice_from, $notice_to, $notice_date, $notice_title,
                                    $notice_sort_title,$notice_body)
    */
      //$id = $info->id;

      $notice_ref_no = $info->notice_ref_no;
      $notice_from = $info->notice_from;
      $notice_to = $info->notice_to;
      $notice_date = $info->notice_date;
      $notice_title = $info->notice_title;
      $notice_sort_title = $info->notice_sort_title;
      $notice_body = $info->notice_body;


      //$query = "UPDATE student_db_tbl SET status = 0 WHERE id='$id'";
      $query = "INSERT INTO notice_db_tbl SET notice_ref_no ='$notice_ref_no', notice_from ='$notice_from',
    notice_to ='$notice_to',notice_date = '$notice_date',notice_title = '$notice_title',notice_sort_title = '$notice_sort_title',notice_body = '$notice_body'";  
      if(mysqli_query($con, $query)) {  
           echo 'Notice Posted successfully!';  
      } else {  
           echo 'Failed';  
      }  
 }