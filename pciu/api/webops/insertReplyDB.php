 <?php 
 require_once('../dbConnect.php');

 $info = json_decode(file_get_contents("php://input"));
 if(count($info) > 0) {  

      $enqueryID = $info->enqueryID;
      $studentID = $info->studentID;
      $studentName = $info->studentName;
      $topic_txt = $info->topic_txt;
      $query_txt = $info->query_txt;
      $reply_txt = $info->reply_txt;

      $query = "INSERT INTO enquery_reply_db_tbl SET enqueryID = '$enqueryID', studentID = '$studentID', studentName = '$studentName',  topic_txt = '$topic_txt', query_txt = '$query_txt', reply_txt ='$reply_txt'";  
      if(mysqli_query($con, $query)) {  
           echo 'Reply sent successfully!';  
      } else {  
           echo 'Failed';  
      }  
 }