<?php
header('Access-Control-Allow-Origin: *');
require_once 'Functions.php';

$fun = new Functions();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['operation']))
{ 

   $operation = $_POST['operation'];

                                        //*****Students related functions*****

                if($operation == 'register'){
                      // student registration
                      //Getting post data 
                                            $studentName = $_POST['studentName'];
                                            $studentAddress = $_POST['studentAddress'];
                                            $studentPhone = $_POST['studentPhone'];
                                            $studentEmail = $_POST['studentEmail'];

                                            $deptCode = $_POST['deptCode'];
                                            $batchId = $_POST['batchId'];
                                            $studentId = $_POST['studentId'];
                                            $password = $_POST['password'];

                                                  if ($fun -> isEmailValid($studentEmail)) {
                                                    
                                                    echo $fun -> registerUser($studentName, $studentAddress, $studentEmail, $studentPhone, $deptCode, $batchId,
                                                      $studentId, $password);

                                                  } else {

                                                    echo $fun -> getMsgInvalidEmail();
                                                  }
                  } 

                  if ($operation == 'login') {
                                            // student login
                                            $studentId = $_POST['studentId'];
                                            $password = $_POST['password'];

                                            echo $fun -> loginUser($studentId, $password);
                  }

                      if($operation == 'query'){

                          $studentName = $_POST['studentName'];
                          $studentEnqueryTopic = $_POST['studentEnqueryTopic'];
                          $studentEnqueryDescription = $_POST['studentEnqueryDescription'];
                          $studentPhone = $_POST['studentPhone'];
                          $deptCode = $_POST['deptCode'];
                          $studentId = $_POST['studentId'];

                          echo $fun -> submitQuery($studentName, $studentEnqueryTopic, 
                                                      $studentEnqueryDescription,
                                                      $studentPhone,
                                                      $deptCode,
                                                      $studentId);

                        }

                              if($operation == 'editProfile'){
                                  //edit or update students profile
                                  $studentId = $_POST['studentId'];
                                  $studentName = $_POST['studentName'];
                                  $studentAddress = $_POST['studentAddress'];
                                  $studentPhone = $_POST['studentPhone'];
                                  $studentEmail = $_POST['studentEmail'];

                                  echo $fun -> updateProfile($studentId, $studentName, $studentAddress,
                                                              $studentPhone, $studentEmail);

                      /*studentName,
                studentAddress,
                studentPhone,
                studentEmail*/

                                }

                                    //*****Teachers related functions*****


                  //teachers_db_tbl
                  if($operation == 'registerTeacher'){
                        //teachers registration
                      //Getting post data 
                                            $teacherName = $_POST['studentName'];
                                            $teacherAddress = $_POST['studentAddress'];
                                            $teacherPhone = $_POST['studentPhone'];
                                            $teacherEmail = $_POST['studentEmail'];
                                            $deptCode = $_POST['deptCode'];
                                            $designation = $_POST['batchId'];
                                            $teacherId = $_POST['studentId'];
                                            $password = $_POST['password'];

                                                  if ($fun -> isEmailValid($teacherEmail)) {
                                                    
                                                    echo $fun -> registerTeacher($teacherName, $teacherAddress, $teacherEmail, $teacherPhone, $deptCode, $designation,
                                                      $teacherId, $password);

                                                  } else {

                                                    echo $fun -> getMsgInvalidEmail();
                                                  }
                            } 

                              
                              if ($operation == 'loginTeacher') {
                                //teachers login
                                            $teacherId = $_POST['studentId'];
                                            $password = $_POST['password'];

                                            echo $fun -> loginTeacher($teacherId, $password);
                                          }


                                          if($operation == 'noticeInsert'){
                      // teachers -> to insert notice to db along with sending push notification
                      //Getting post data 
                                            $notice_ref_no = $_POST['notice_ref_no'];
                                            $notice_from = $_POST['notice_from'];
                                            $notice_to = $_POST['notice_to'];
                                            $notice_date = $_POST['notice_date'];
                                            $notice_title = $_POST['notice_title'];
                                            $notice_sort_title = $_POST['notice_sort_title'];
                                            $notice_body = $_POST['notice_body'];
                                                    
                                                    echo $fun -> insertNoticeData($notice_ref_no, $notice_from, $notice_to, $notice_date, $notice_title, $notice_sort_title,
                                                      $notice_body);
                  }


                  if($operation == 'editProfileTeacher'){
                                  //edit or update teachers profile

                                  $teacherId = $_POST['studentId'];
                                  $teacherName = $_POST['studentName'];
                                  $teacherAddress = $_POST['studentAddress'];
                                  $teacherPhone = $_POST['studentPhone'];
                                  $teacherEmail = $_POST['studentEmail'];

                                  echo $fun -> updateTeacherProfile($teacherId, $teacherName, $teacherAddress,
                                                              $teacherPhone, $teacherEmail);

                      /*studentName,
                studentAddress,
                studentPhone,
                studentEmail*/

                                }
                    


                                    //*****Functions for everyone****

                    if ($operation == 'resPassReq') { //Code should be changed...forget password

                      /*if(isset($data -> user) && !empty($data -> user) &&isset($data -> user -> email)){

                        $user = $data -> user;
                        $email = $user -> email;*/

                        $rEmail = $_POST['studentEmail']; // key word 

                        echo $fun -> resetPasswordRequest($rEmail);

                      /*} else {

                        echo $fun -> getMsgInvalidParam();

                      }*/
                      }

                  if ($operation == 'resPass') {  //Code should be changed...forget password

                      /*if(isset($data -> user) && !empty($data -> user) && isset($data -> user -> email) && isset($data -> user -> password) 
                        && isset($data -> user -> code)){

                        $user = $data -> user;
                        $email = $user -> email;
                        $code = $user -> code;
                        $password = $user -> password;*/

                        $email = $_POST['studentEmail'];;
                        $code = $_POST['code'];;
                        $password = $_POST['password'];;
                        
                        echo $fun -> resetPasswordStudent($email,$code,$password);

                      /*} else {

                        echo $fun -> getMsgInvalidParam();

                      }*/
                      }



                    if ($operation == 'resPassReq_t') { //Code should be changed...forget password

                      /*if(isset($data -> user) && !empty($data -> user) &&isset($data -> user -> email)){

                        $user = $data -> user;
                        $email = $user -> email;*/

                        $rEmail = $_POST['studentEmail']; // key word 

                        echo $fun -> resetTeacherPasswordRequest($rEmail);//teacher

                      /*} else {

                        echo $fun -> getMsgInvalidParam();

                      }*/
                      }

                  if ($operation == 'resPass_t') {  //Code should be changed...forget password

                      /*if(isset($data -> user) && !empty($data -> user) && isset($data -> user -> email) && isset($data -> user -> password) 
                        && isset($data -> user -> code)){

                        $user = $data -> user;
                        $email = $user -> email;
                        $code = $user -> code;
                        $password = $user -> password;*/

                        $email = $_POST['studentEmail'];;
                        $code = $_POST['code'];;
                        $password = $_POST['password'];;
                        
                        echo $fun -> resetTeachersPassword($email,$code,$password);//teacher

                      /*} else {

                        echo $fun -> getMsgInvalidParam();

                      }*/
                      }
                  }
}else if($_SERVER['REQUEST_METHOD'] == 'GET'){

  echo "This will be showed if, it's a GET Request";

}