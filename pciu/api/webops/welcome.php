<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>PCIU-App</title>
<!-- css -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<!-- <script
              src="https://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script> -->
<style type="text/css">

</style>          
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>

<body ng-app="myApp">
    <?php
    
        if(isset($_SESSION['status']) && $_SESSION['status']=="logged_in" && isset($_SESSION['timestamp'])){
            
            $tm = $_SESSION['timestamp'];
            
            if((time() - $tm) > 600) 
           {  

                echo "<script>window.location='logout.php'</script>";
 
           }  
           else  
           {  
                $_SESSION['timestamp'] = time();  
            
            ?>
<!-- <h2>Welcome to Angularjs dashboard.</h2> -->
<div class="container-fluid" ng-controller="dashboardCtrl" ng-init="" >

<div class="row">
        <div class="col-md-12">


        <!-- To upload all files, then test, implement enquery reply, with extra div -->

        <div class="navbar-header">
    <a href="#" class="navbar-left" >
    <img src="pciu_logo.png" alt="Smiley face" height="55" width="42"></a>
      <a class="navbar-brand" href="#">~~ PCIU ~~</a>
    </div>
            <ul class="nav nav-tabs" style="margin-top: 5px">
                <li  class="active"><a href="welcome.php"><b>Home</b></a></li>
                <li><a href="students.php"><b>Students</b></a></li>
                <li><a href="teachers.php"><b>Teachers</b></a></li>
                <li><a href="enqueries.php"><b>Enqueries</b></a></li>
                <li><a href="enqReplies.php"><b>Enquery Replies</b></a></li>
                <li><a href="sendNotification.php"><b>Send Notice</b></a></li>
                <li><a href="notifications.php"><b>All Notices</b></a></li>
                <li><a href="regApproval.php"><b>Registration Approval</b></a></li>
                <li class="nav navbar-nav navbar-right"><a href="logout.php">
            <span class="glyphicon glyphicon-log-out"></span><b> Logout</b></a></li>      
            </ul>
        </div>
    </div>
<div >

  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-4">
      
  <img style="margin-bottom: 20px; margin-left: 150px" src="pciu_logo.png" alt="Smiley face" height="150" width="110">
    </div>
      <div class="col-md-4"></div>
  </div>

<div class="row">
	<div class="col-md-3"></div>
	<div class=" col-md-6">
		
    <div class="container-fluid">
    <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-bookmark"></span> Dashboard Shortcuts</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <a href="students.php" style="width: 130px" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Students</a>
                          <a href="teachers.php" style="margin-left: 5px; width: 140px" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Teachers</a>
                          
                          <a href="regApproval.php" style="margin-top: 15px; width: 280px" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-check"></span> <br/>Registration Approval</a>
                          
                        </div>
                        <div class="col-xs-6 col-md-6">
                        <a href="enqueries.php" style="width: 140px" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Enquery</a>
                          <a href="sendNotification.php" style="margin-left: 5px; width: 140" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-send"></span> <br/>Post Notice</a>
                          <a href="notifications.php" style="margin-top: 15px; width: 280px" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-envelope"></span> <br/>Notice</a>
                        </div>
                    </div>
                    <a href="enqReplies.php" style="margin-top: 20px; width: 280px" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-ok"></span>  Enquery Replies</a>
                    <a href="logout.php" style="margin-left: 40px; margin-top: 20px; width: 280px" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-log-out"></span>  Logout</a>
                    <a href="http://www.portcity.edu.bd/" style="margin-top: 10px" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span>  PCIU Website</a>
                </div>
            </div>
    </div>
</div>
	</div>
	<div class="col-md-3"></div>
  </div>

  <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
<div class="well well-lg">
     <b> PCIU Notice Board and Student Assistance System web dashboard.</b>
    </div>

  </div>

  <div class="col-md-3"></div>

</div>
</div>

 
</div>
<script>
    var app = angular.module("myApp", []);
    app.controller("dashboardCtrl", function($scope, $http) {

    
    });
</script>
<?php }
        } 
        else{
            echo "<h1 style='color:red;' align='center'>! # !</h1>";
            echo "<h2 style='color:red;' align='center'>You are not an authorized user!</h2>";
            echo "<br><a style='display:block;text-align:center; color:green;' align='center' href='../../../index.php'><b>Try to Login here.</b></a>";
        }
        ?>
</body>
</html>



