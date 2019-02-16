<?php
header('Access-Control-Allow-Origin: *');
require_once 'DBOperations.php';
require 'PHPMailer/PHPMailerAutoload.php';

class Functions{

private $db;
private $mail;

public function __construct() {

      $this -> db = new DBOperations();
      $this -> mail = new PHPMailer;

}

public function registerUser($studentName, $studentAddress, $studentEmail, $studentPhone, $deptCode, $batchId,
                              $studentId, $password){//working
//student registration...
	$db = $this -> db;

	if (!empty($studentName) && !empty($studentAddress) && !empty($studentEmail) && !empty($studentPhone) && !empty($deptCode) && !empty($batchId) && !empty($studentId) && !empty($password)) {

  		if ($db -> checkUserExist($studentEmail,$studentId)) {

  			$response["result"] = "failure";
  			$response["message"] = "This Email or User Already Registered !";
  			return json_encode($response);

  		} else {

  			$result = $db -> insertData($studentName, $studentAddress, $studentEmail, $studentPhone, $deptCode, $batchId,
          $studentId, $password);

  			if ($result) {

				  $response["result"] = "success";
  				$response["message"] = "Student Registered Successfully !";
  				return json_encode($response);
  						
  			} else {

  				$response["result"] = "failure";
  				$response["message"] = "Registration Failure";
  				return json_encode($response);

  			}
  		}					
  	} else {

  		return $this -> getMsgParamNotEmpty();

  	}
}

public function registerTeacher($teacherName, $teacherAddress, $teacherEmail, $teacherPhone, $deptCode, $designation,
                                                      $teacherId, $password){//working
// registration teacher
  $db = $this -> db;

  if (!empty($teacherName) && !empty($teacherAddress) && !empty($teacherEmail) && !empty($teacherPhone) && !empty($deptCode) && !empty($designation) && !empty($teacherId) && !empty($password)) {

      if ($db -> checkTeacherRegExist($teacherEmail,$teacherId)) {

        $response["result"] = "failure";
        $response["message"] = "This Email or User Already Registered !";
        return json_encode($response);

      } else {

        $result = $db -> insertTeacherData($teacherName, $teacherAddress, $teacherEmail, $teacherPhone, $deptCode, $designation, $teacherId, $password);

        if ($result) {

          $response["result"] = "success";
          $response["message"] = "Teacher Registered Successfully!";
          return json_encode($response);
              
        } else {

          $response["result"] = "failure";
          $response["message"] = "Registration Failure!";
          return json_encode($response);

        }
      }         
    } else {

      return $this -> getMsgParamNotEmpty();

    }
}

public function insertNoticeData($notice_ref_no, $notice_from, $notice_to, $notice_date, $notice_title,
                                    $notice_sort_title,$notice_body){//working
//notice insert...
  $db = $this -> db;

  if (!empty($notice_ref_no) && !empty($notice_from) && !empty($notice_to) && !empty($notice_date) && !empty($notice_title) && !empty($notice_sort_title) && !empty($notice_body)) {

        $result = $db -> insertNoticeDataDb($notice_ref_no, $notice_from, $notice_to, $notice_date, $notice_title,
                                    $notice_sort_title,$notice_body);

        if ($result) {

          $response["result"] = "success";
          $response["message"] = "Notice posted successfully!";
          return json_encode($response);
              
        } else {

          $response["result"] = "failure";
          $response["message"] = "Failed to post notice!";
          return json_encode($response);

        }         
    } else {

      return $this -> getMsgParamNotEmpty();

    }
}

public function resetTeacherPasswordRequest($email){//working

  $db = $this -> db;

  if ($db -> checkIfTeacherExist($email)) {

    $result =  $db -> passwordResetRequest($email);

    if(!$result){

      $response["result"] = "failure";
      $response["message"] = "Reset Password Failure";
      return json_encode($response);

    } else {

      $mail_result = $this -> sendPHPMail($result["email"],$result["temp_password"]);

      if($mail_result){

        $response["result"] = "success";
        $response["message"] = "Check your mail for reset password code.";
        return json_encode($response);

      } else {

        $response["result"] = "failure";
        $response["message"] = "Reset Password Failure";
        return json_encode($response);
      }
    }


  } else {

    $response["result"] = "failure";
    $response["message"] = "Email does not exist";
    return json_encode($response);

  }

}


public function resetPasswordRequest($email){//working

  $db = $this -> db;

  if ($db -> checkStudentExist($email)) {

    $result =  $db -> passwordResetRequest($email);

    if(!$result){

      $response["result"] = "failure";
      $response["message"] = "Reset Password Failure";
      return json_encode($response);

    } else {

      $mail_result = $this -> sendPHPMail($result["email"],$result["temp_password"]);

      if($mail_result){

        $response["result"] = "success";
        $response["message"] = "Check your mail for reset password code.";
        return json_encode($response);

      } else {

        $response["result"] = "failure";
        $response["message"] = "Reset Password Failure";
        return json_encode($response);
      }
    }


  } else {

    $response["result"] = "failure";
    $response["message"] = "Email does not exist";
    return json_encode($response);

  }

}

public function resetTeachersPassword($email,$code,$password){//working

  $db = $this -> db;

  if ($db -> checkIfTeacherExist($email)) {

    $result =  $db -> resetPasswordTeacherDB($email,$code,$password);

    if(!$result){

      $response["result"] = "failure";
      $response["message"] = "Reset Password Failure";
      return json_encode($response);

    } else {

      $response["result"] = "success";
      $response["message"] = "Password Changed Successfully";
      return json_encode($response);

    }


  } else {

    $response["result"] = "failure";
    $response["message"] = "Email does not exist";
    return json_encode($response);

  }

}


public function resetPasswordStudent($email,$code,$password){//working

  $db = $this -> db;

  if ($db -> checkStudentExist($email)) {

    $result =  $db -> resetPasswordStudentDB($email,$code,$password);

    if(!$result){

      $response["result"] = "failure";
      $response["message"] = "Reset Password Failure";
      return json_encode($response);

    } else {

      $response["result"] = "success";
      $response["message"] = "Password Changed Successfully";
      return json_encode($response);

    }


  } else {

    $response["result"] = "failure";
    $response["message"] = "Email does not exist";
    return json_encode($response);

  }

}

public function sendEmail($email,$temp_password){

  $mail = $this -> mail;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'your.email@gmail.com';
  $mail->Password = 'Your Password';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
 
  $mail->From = 'your.email@gmail.com';
  $mail->FromName = 'Your Name';
  $mail->addAddress($email, 'Your Name');
 
  $mail->addReplyTo('your.email@gmail.com', 'Your Name');
 
  $mail->WordWrap = 50;
  $mail->isHTML(true);
 
  $mail->Subject = 'Password Reset Request';
  $mail->Body    = 'Hi,<br><br> Your password reset code is <b>'.$temp_password.'</b> . This code expires in (5 minutes) 300 seconds. Enter this code within 120 seconds to reset your password.<br><br>Thanks,<br>PCIU Notice Board Application.';

  if(!$mail->send()) {

   return $mail->ErrorInfo;

  } else {

    return true;

  }

}

public function sendPHPMail($email,$temp_password){//working

  $subject = 'Password Reset Request';
  $message = 'Hi, Your password reset code is '.$temp_password.'  . This code expires in (5 minutes) 300 seconds. Enter this code within 120 seconds to reset your password. Thanks,PCIU Notice Board Application. NB: DON\'T REPLY THIS EMAIL.';
  $from = "pciu.notice@example.com";
  $headers = "From:" . $from;

  return mail($email,$subject,$message,$headers);

}


public function submitQuery($studentName, $studentEnqueryTopic, 
                                          $studentEnqueryDescription,
                                          $studentPhone,
                                          $deptCode,
                                          $studentId){//working
              // insert students enquery....
  $db = $this -> db;

    $result = $db -> insertQuery($studentName, $studentEnqueryTopic, 
                                          $studentEnqueryDescription,
                                          $studentPhone,
                                          $deptCode,
                                          $studentId);

        if ($result) {

          $response["result"] = "success";
          $response["message"] = "Your query submitted Successfully !";
          return json_encode($response);
              
        } else {

          $response["result"] = "failure";
          $response["message"] = "Query submission Failed";
          return json_encode($response);

        }



}

public function updateProfile($studentId, $studentName, $studentAddress, $studentPhone, $studentEmail){//working

        //update students profile
        $db = $this -> db;

    $result = $db -> updateProfileDB($studentId, $studentName, 
                          $studentAddress, $studentPhone, $studentEmail);

        if ($result) {

          $response["result"] = "success";
          $response["message"] = "Profile successfully updated!";
          return json_encode($response);
              
        } else {

          $response["result"] = "failure";
          $response["message"] = "Updating your profile failed!";
          return json_encode($response);

        }

}

public function updateTeacherProfile($teacherId, $teacherName, $teacherAddress,
                                                              $teacherPhone, $teacherEmail){//working

        //update teachers profile
        $db = $this -> db;

    $result = $db -> updateTeacherProfileDB($teacherId, $teacherName, $teacherAddress, $teacherPhone, $teacherEmail);

        if ($result) {

          $response["result"] = "success";
          $response["message"] = "Profile successfully updated!";
          return json_encode($response);
              
        } else {

          $response["result"] = "failure";
          $response["message"] = "Updating your profile failed!";
          return json_encode($response);

        }

}

public function loginTeacher($teacherId, $password) {//working

                    //teachers login
  $db = $this -> db;

  if (!empty($teacherId) && !empty($password)) {

    if ($db -> checkTeacherLoginExist($teacherId)) {

       $result =  $db -> checkTeacherLogin($teacherId, $password);


       if(!$result) {

        $response["result"] = "failure";
        $response["message"] = "Invaild Login Credentials";
        return json_encode($response);

       } else {
                //youtube.com/1wKOvRFstLl
        $response["result"] = "success";
        $response["message"] = "Login Successful";
        $response["student"] = $result;
        return json_encode($response);

       }

    } else {

      $response["result"] = "failure";
      $response["message"] = "Inactive account or Invaild Login Credentials";
      return json_encode($response);

    }
  } else {

      return $this -> getMsgParamNotEmpty();
    }

}

public function loginUser($studentId, $password) {//working

                      //students login

  $db = $this -> db;

  if (!empty($studentId) && !empty($password)) {

    if ($db -> checkUserLoginExist($studentId)) {

       $result =  $db -> checkLogin($studentId, $password);


       if(!$result) {

        $response["result"] = "failure";
        $response["message"] = "Invaild Login Credentials";
        return json_encode($response);

       } else {
                //youtube.com/1wKOvRFstLl
        $response["result"] = "success";
        $response["message"] = "Login Successful";
        $response["student"] = $result;
        return json_encode($response);

       }

    } else {

      $response["result"] = "failure";
      $response["message"] = "Inactive account or Invaild Login Credentials";
      return json_encode($response);

    }
  } else {

      return $this -> getMsgParamNotEmpty();
    }

}


public function changePassword($email, $old_password, $new_password) {
                      //changing password....
  $db = $this -> db;

  if (!empty($email) && !empty($old_password) && !empty($new_password)) {

    if(!$db -> checkLogin($email, $old_password)){

      $response["result"] = "failure";
      $response["message"] = 'Invalid Old Password';
      return json_encode($response);

    } else {


    $result = $db -> changePassword($email, $new_password);

      if($result) {

        $response["result"] = "success";
        $response["message"] = "Password Changed Successfully";
        return json_encode($response);

      } else {

        $response["result"] = "failure";
        $response["message"] = 'Error Updating Password';
        return json_encode($response);

      }

    } 
  } else {

      return $this -> getMsgParamNotEmpty();
  }

}

public function isEmailValid($email){//working

  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

public function getMsgParamNotEmpty(){//working


  $response["result"] = "failure";
  $response["message"] = "Parameters should not be empty !";
  return json_encode($response);

}

public function getMsgInvalidParam(){

  $response["result"] = "failure";
  $response["message"] = "Invalid Parameters";
  return json_encode($response);

}

public function getMsgInvalidEmail(){//working

  $response["result"] = "failure";
  $response["message"] = "Invalid Email";
  return json_encode($response);

}

}
