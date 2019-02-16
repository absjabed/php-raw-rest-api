<?php 
 session_start();
/**
 * Description: User authentication
 * @author absjabed
 */
  //$conn = mysqli_connect("localhost", "id4057816_pciu_notice", "pciu_notice", "id4057816_pciu_notice_db");
//include database connection file
require_once 'config.php';
 
//define database object
global $dbc;
 
$stmt = $dbc->prepare("SELECT username,password from web_users WHERE 
username='".$_POST['username']."' && password='".$_POST['password']."'");
 
$stmt->execute();
 
$row = $stmt->rowCount();


     

if ($row > 0){
    if(empty($_SESSION['status'])){
         $_SESSION['status'] ="logged_in";
         $_SESSION['timestamp'] = time();
     }
    echo 'correct';
} else{ 
    echo 'wrong';
}
 
?>