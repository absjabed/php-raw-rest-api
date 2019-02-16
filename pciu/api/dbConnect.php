<?php
/**
 * Description: User authentication
 * @author absjabed
 */
 define('HOST','localhost');
 define('USER','id4057816_pciu_notice');
 define('PASS','pciu_notice');
 define('DB','id4057816_pciu_notice_db');
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 mysqli_query($con,'SET CHARACTER SET utf8'); 
 mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");