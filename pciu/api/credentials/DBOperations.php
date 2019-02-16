<?php
header('Access-Control-Allow-Origin: *');
class DBOperations{

	 /*private $host = '127.0.0.1';
	 private $user = 'root';
	 private $db = 'learn2crack-login-register';
	 private $pass = '';
	 private $conn;

public function __construct() {

	$this -> conn = new PDO("mysql:host=".$this -> host.";dbname=".$this -> db, $this -> user, $this -> pass);

}*/
     private $host = 'localhost';
     private $user = 'id4057816_pciu_notice';
     private $db = 'id4057816_pciu_notice_db';
     private $pass = 'pciu_notice';
     private $conn;

public function __construct() {

    $this -> conn = new PDO("mysql:host=".$this -> host.";dbname=".$this -> db/*.";"."charset=utf8"*/, $this -> user, $this -> pass);

}

/*($studentName, $studentAddress, $studentEmail, $studentPhone, $deptCode, $batchId,
                                                      $studentId, $password)*/

public function insertQuery($studentName, $studentEnqueryTopic, 
                                          $studentEnqueryDescription,
                                          $studentPhone,
                                          $deptCode,
                                          $studentId){//working

  /*INSERT INTO `enquiry_db_tbl`(`id`, `studentName`, `studentId`, `studentEnqueryTopic`, `studentEnqueryDescription`, `studentPhone`, `deptCode`, `date_time_stmp`, `status`)*/

    $sql = 'INSERT INTO enquiry_db_tbl SET studentName = :studentName, studentId = :studentId, studentEnqueryTopic = :studentEnqueryTopic, studentEnqueryDescription = :studentEnqueryDescription, studentPhone = :studentPhone, deptCode = :deptCode';


  $query = $this ->conn ->prepare($sql);
  $query->execute(array(':studentName' => $studentName, ':studentId' => $studentId,
         ':studentEnqueryTopic' => $studentEnqueryTopic, ':studentEnqueryDescription' => $studentEnqueryDescription, 
         ':studentPhone' => $studentPhone, ':deptCode' => $deptCode));

    if ($query) {
        
        return true;

    } else {

        return false;

    }



}

public function updateProfileDB($studentId, $studentName, 
                          $studentAddress, $studentPhone, $studentEmail){//working

                //update student profile
      $sql = 'UPDATE student_db_tbl SET studentName =:studentName,
                        studentAddress =:studentAddress,studentEmail = :studentEmail,
                        studentPhone = :studentPhone WHERE studentId = :studentId';

    $query = $this -> conn -> prepare($sql);
    
    $query->execute(array(':studentName' => $studentName, ':studentAddress' => $studentAddress,
         ':studentEmail' => $studentEmail, ':studentPhone' => $studentPhone,
         ':studentId' => $studentId));

    if ($query) {
        
        return true;

    } else {

        return false;

    }


}


public function updateTeacherProfileDB($teacherId, $teacherName, $teacherAddress, $teacherPhone, $teacherEmail){//working

                //update teacher profile
      $sql = 'UPDATE teachers_db_tbl SET teacherName =:teacherName,
                        teacherAddress =:teacherAddress,teacherPhone = :teacherPhone,
                        teacherEmail = :teacherEmail WHERE teacherId = :teacherId';

    $query = $this -> conn -> prepare($sql);
    
    $query->execute(array(':teacherName' => $teacherName, ':teacherAddress' => $teacherAddress,
         ':teacherPhone' => $teacherPhone, ':teacherEmail' => $teacherEmail,
         ':teacherId' => $teacherId));

    if ($query) {
        
        return true;

    } else {

        return false;

    }


}

 public function insertData($studentName, $studentAddress, $studentEmail, $studentPhone, $deptCode, $batchId,
                              $studentId, $password){//working
//insert student registration data

/*SELECT `id`, `studentName`, `uniqueId`, `studentAddress`, `studentEmail`, `studentPhone`, `deptCode`, `batchId`, `studentId`, `password`, `salt`, `dateTime`, `status` FROM `student_db_tbl` WHERE 1*/

 	  $uniqueId = uniqid('', true);
    $hash = $this->getHash($password);
    $encrypted_password = $hash["encrypted"];
	  $salt = $hash["salt"];

 	$sql = 'INSERT INTO student_db_tbl SET uniqueId =:uniqueId,studentName =:studentName,
    studentAddress =:studentAddress,studentEmail = :studentEmail,studentPhone = :studentPhone,deptCode = :deptCode,batchId = :batchId,studentId = :studentId,password =:encrypted_password,salt =:salt';

 	$query = $this ->conn ->prepare($sql);
 	$query->execute(array(':uniqueId' => $uniqueId, ':studentName' => $studentName, ':studentAddress' => $studentAddress,
         ':studentEmail' => $studentEmail, ':studentPhone' => $studentPhone, ':deptCode' => $deptCode,
          ':batchId' => $batchId, ':studentId' => $studentId, ':encrypted_password' => $encrypted_password, ':salt' => $salt));

    if ($query) {
        
        return true;

    } else {

        return false;

    }
 }

 public function insertNoticeDataDb($notice_ref_no, $notice_from, $notice_to, $notice_date, $notice_title,
                                    $notice_sort_title,$notice_body){//working
//insert notice data

/*INSERT INTO `notice_db_tbl`(`id`, `notice_ref_no`, `notice_from`, `notice_to`, `notice_date`, `notice_title`, `notice_sort_title`, `notice_body`, `date_time_stmp`, `notice_fb_id`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])*/

    $sql = 'INSERT INTO notice_db_tbl SET notice_ref_no =:notice_ref_no, notice_from =:notice_from,
    notice_to =:notice_to,notice_date = :notice_date,notice_title = :notice_title,notice_sort_title = :notice_sort_title,notice_body = :notice_body';

    $query = $this ->conn ->prepare($sql);
    $query->execute(array(':notice_ref_no' => $notice_ref_no, ':notice_from' => $notice_from, ':notice_to' => $notice_to,
         ':notice_date' => $notice_date, ':notice_title' => $notice_title, ':notice_sort_title' => $notice_sort_title,
          ':notice_body' => $notice_body));

    if ($query) {
        
        return true;

    } else {

        return false;

    }
 }

 /*insertData($teacherName, $teacherAddress, $teacherEmail, $teacherPhone, $deptCode, $designation, $teacherId, $password)*/
 public function insertTeacherData($teacherName, $teacherAddress, $teacherEmail, $teacherPhone, $deptCode, $designation, $teacherId, $password){//working

      $uniqueId = uniqid('', true);
    $hash = $this->getHash($password);
    $encrypted_password = $hash["encrypted"];
      $salt = $hash["salt"];

    $sql = 'INSERT INTO teachers_db_tbl SET uniqueId =:uniqueId,teacherName =:teacherName,
    teacherAddress =:teacherAddress,teacherEmail = :teacherEmail,teacherPhone = :teacherPhone,deptCode = :deptCode,designation = :designation,teacherId = :teacherId,password =:encrypted_password,salt =:salt';

    $query = $this ->conn ->prepare($sql);
    $query->execute(array(':uniqueId' => $uniqueId, ':teacherName' => $teacherName, ':teacherAddress' => $teacherAddress,
         ':teacherEmail' => $teacherEmail, ':teacherPhone' => $teacherPhone, ':deptCode' => $deptCode,
          ':designation' => $designation, ':teacherId' => $teacherId, ':encrypted_password' => $encrypted_password, ':salt' => $salt));

    if ($query) {
        
        return true;

    } else {

        return false;

    }
 }

  public function passwordResetRequest($email){//working

    $random_string = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 6);
    $hash = $this->getHash($random_string);
    $encrypted_temp_password = $hash["encrypted"];
    $salt = $hash["salt"];

    $sql = 'SELECT COUNT(*) from password_reset_request WHERE email =:email';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array('email' => $email));
//$no_of_times = $data -> no_of_requests;

    $sqlx = 'SELECT * FROM password_reset_request WHERE email = :email';
    $queryx = $this -> conn -> prepare($sqlx);
    $queryx -> execute(array(':email' => $email));
    $datax = $queryx -> fetchObject();
    $no_of_times = $datax -> no_of_requests;
    $no_of_times = $no_of_times+1;

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){


            $insert_sql = 'INSERT INTO password_reset_request SET email =:email,encrypted_temp_password =:encrypted_temp_password,
                    salt =:salt, created_at = :created_at';
            $insert_query = $this ->conn ->prepare($insert_sql);
            $insert_query->execute(array(':email' => $email, ':encrypted_temp_password' => $encrypted_temp_password, 
            ':salt' => $salt, ':created_at' => date("Y-m-d H:i:s")));

            if ($insert_query) {

                $user["email"] = $email;
                $user["temp_password"] = $random_string;

                return $user;

            } else {

                return false;

            }


        } else {

            $update_sql = 'UPDATE password_reset_request SET encrypted_temp_password =:encrypted_temp_password,
                    salt =:salt, no_of_requests =:no_of_requests, created_at = :created_at WHERE email =:email';
            $update_query = $this -> conn -> prepare($update_sql);
            $update_query -> execute(array(':encrypted_temp_password' => $encrypted_temp_password, 
            ':salt' => $salt, ':no_of_requests' => $no_of_times, ':created_at' => date("Y-m-d H:i:s"), ':email' => $email));

            if ($update_query) {
        
                $user["email"] = $email;
                $user["temp_password"] = $random_string;
                return $user;

            } else {

                return false;

            }

        }
    } else {

        return false;
    }


 }

  public function resetPasswordTeacherDB($email,$code,$password){//working


    $sql = 'SELECT * FROM password_reset_request WHERE email = :email';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':email' => $email));
    $data = $query -> fetchObject();
    $salt = $data -> salt;
    $db_encrypted_temp_password = $data -> encrypted_temp_password;

    if ($this -> verifyHash($code.$salt,$db_encrypted_temp_password) ) {

        $old = new DateTime($data -> created_at);
        $now = new DateTime(date("Y-m-d H:i:s"));
        $diff = $now->getTimestamp() - $old->getTimestamp();
        
        if($diff < 300) {

            return $this -> changePasswordTeacher($email, $password);

        } else {

            false;
        }
        

    } else {

        return false;
    }

 }

 public function resetPasswordStudentDB($email,$code,$password){//working


    $sql = 'SELECT * FROM password_reset_request WHERE email = :email';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':email' => $email));
    $data = $query -> fetchObject();
    $salt = $data -> salt;
    $db_encrypted_temp_password = $data -> encrypted_temp_password;


    if ($this -> verifyHash($code.$salt,$db_encrypted_temp_password) ) {

        $old = new DateTime($data -> created_at);
        $now = new DateTime(date("Y-m-d H:i:s"));
        $diff = $now->getTimestamp() - $old->getTimestamp();
        
        if($diff < 300) {

            return $this -> changePasswordStudent($email, $password);

        } else {

            false;
        }
        

    } else {

        return false;
    }

 }

 public function checkTeacherLogin($teacherId, $password) {//working

    $sql = 'SELECT * FROM teachers_db_tbl WHERE teacherId = :teacherId';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':teacherId' => $teacherId));
    $data = $query -> fetchObject();
    $salt = $data -> salt;
    $db_encrypted_password = $data -> password;

    if ($this -> verifyHash($password.$salt,$db_encrypted_password) ) {

/*
            @Field("operation") String operation,
            @Field("studentName") String studentName, //teacherName
            @Field("studentAddress") String studentAddress, //teacherAddress
            @Field("studentPhone") String studentPhone, //teacherPhone
            @Field("studentEmail") String studentEmail, //teacherEmail
            @Field("deptCode") String deptCode, //deptCode
            @Field("batchId") String batchId, //designation
            @Field("studentId") String studentId, //teacherId*/
        $student["studentName"] = $data -> teacherName;
        $student["studentAddress"] = $data -> teacherAddress;
        $student["studentPhone"] = $data -> teacherPhone;
        $student["studentEmail"] = $data -> teacherEmail;
        $student["deptCode"] = $data -> deptCode;
        $student["batchId"] = $data -> designation;
        $student["studentId"] = $data -> teacherId;
        $student["uniqueId"] = $data -> uniqueId;
        $student["dateTime"] = $data -> dateTime;
        $student["status"] = $data -> status;

        return /*true*/ $student;

    } else {

        return false;
    }

 }

 public function checkLogin($studentId, $password) {//working

    $sql = 'SELECT * FROM student_db_tbl WHERE studentId = :studentId';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':studentId' => $studentId));
    $data = $query -> fetchObject();
    $salt = $data -> salt;
    $db_encrypted_password = $data -> password;

    if ($this -> verifyHash($password.$salt,$db_encrypted_password) ) {


        $student["studentName"] = $data -> studentName;
        $student["studentAddress"] = $data -> studentAddress;
        $student["studentPhone"] = $data -> studentPhone;
        $student["studentEmail"] = $data -> studentEmail;
        $student["deptCode"] = $data -> deptCode;
        $student["batchId"] = $data -> batchId;
        $student["studentId"] = $data -> studentId;
        $student["uniqueId"] = $data -> uniqueId;
        $student["dateTime"] = $data -> dateTime;
        $student["status"] = $data -> status;

        return /*true*/ $student;

    } else {

        return false;
    }

 }

public function changePasswordTeacher($email, $password){//working


    $hash = $this -> getHash($password);
    $encrypted_password = $hash["encrypted"];
    $salt = $hash["salt"];

    $sql = 'UPDATE teachers_db_tbl SET password = :encrypted_password, salt = :salt, last_pass_change = :last_pass_change    WHERE teacherEmail = :teacherEmail';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':encrypted_password' => $encrypted_password, ':salt' => $salt, ':last_pass_change' => date("Y-m-d H:i:s"), ':teacherEmail' => $email));

    if ($query) {
        
        return true;

    } else {

        return false;

    }

 }


 public function changePasswordStudent($email, $password){//working


    $hash = $this -> getHash($password);
    $encrypted_password = $hash["encrypted"];
    $salt = $hash["salt"];

    $sql = 'UPDATE student_db_tbl SET password = :encrypted_password, salt = :salt, last_pass_change = :last_pass_change 
    WHERE  studentEmail = :studentEmail';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':encrypted_password' => $encrypted_password, ':salt' => $salt,':last_pass_change' => date("Y-m-d H:i:s"),  ':studentEmail' => $email));

    if ($query) {
        
        return true;

    } else {

        return false;

    }

 }

 public function checkTeacherLoginExist($teacherId){//working

    $sql = 'SELECT COUNT(*) from teachers_db_tbl WHERE teacherId =:teacherId and status =:status';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':teacherId' => $teacherId, ':status' => 1 ));

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){

            return false;

        } else {

            return true;

        }
    } else {

        return false;
    }
 }

 public function checkUserLoginExist($studentId){//working

    $sql = 'SELECT COUNT(*) from student_db_tbl WHERE studentId =:studentId and status =:status';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':studentId' => $studentId, ':status' => 1 ));

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){

            return false;

        } else {

            return true;

        }
    } else {

        return false;
    }
 }

public function checkIfTeacherExist($email){//working

    $sql = 'SELECT COUNT(*) from teachers_db_tbl WHERE teacherEmail =:email';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':email' => $email));

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){

            return false;

        } else {

            return true;

        }
    } else {

        return false;
    }
 }

public function checkTeacherExist($email){

    $sql = 'SELECT COUNT(*) from teachers_db_tbl WHERE teacherEmail =:email';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':email' => $email));

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){

            return false;

        } else {

            return true;

        }
    } else {

        return false;
    }
 }


public function checkStudentExist($email){//working

    $sql = 'SELECT COUNT(*) from student_db_tbl WHERE studentEmail =:email';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':email' => $email));

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){

            return false;

        } else {

            return true;

        }
    } else {

        return false;
    }
 }

 public function checkUserExist($email,$studentId){//working

    $sql = 'SELECT COUNT(*) from student_db_tbl WHERE studentEmail =:email and studentId =:studentId';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':email' => $email, ':studentId' => $studentId));

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){

            return false;

        } else {

            return true;

        }
    } else {

        return false;
    }
 }

  public function checkTeacherRegExist($teacherEmail,$teacherId){//working

    $sql = 'SELECT COUNT(*) from teachers_db_tbl WHERE teacherEmail =:email and teacherId =:teacherId';
    $query = $this -> conn -> prepare($sql);
    $query -> execute(array(':email' => $teacherEmail, ':teacherId' => $teacherId));

    if($query){

        $row_count = $query -> fetchColumn();

        if ($row_count == 0){

            return false;

        } else {

            return true;

        }
    } else {

        return false;
    }
 }

 public function getHash($password) {//working

     $salt = sha1(rand());
     $salt = substr($salt, 0, 10);
     $encrypted = password_hash($password.$salt, PASSWORD_DEFAULT);
     $hash = array("salt" => $salt, "encrypted" => $encrypted);

     return $hash;

}



public function verifyHash($password, $hash) {//working

    return password_verify ($password, $hash);
}
}




