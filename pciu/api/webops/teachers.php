<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>PCIU-App</title>
<!-- css -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8"/>
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
<body ng-app="myAppt">
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
<div class="container-fluid" ng-controller="teacherCtrl" ng-init="getAllDataFromDb()" >

<div class="row">
        <div class="col-md-12">

        <div class="navbar-header">
    <a href="#" class="navbar-left" >
    <img src="pciu_logo.png" alt="Smiley face" height="55" width="42"></a>
      <a class="navbar-brand" href="#">~~ PCIU ~~</a>
    </div>
            <ul class="nav nav-tabs" style="margin-top: 5px">
                <li><a href="welcome.php"><b>Home</b></a></li>
                <li><a href="students.php"><b>Students</b></a></li>
                <li class="active"><a href="teachers.php"><b>Teachers</b></a></li>
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
<div style="margin-top: 40px">
	<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            
                    <div class="panel panel-info">
                    
                    <div class="panel-heading"><b>All Active Registered Teachers</b></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Search By Name" ng-model="txt_teacher_edit"/>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">

                                <thead>
                                <tr>
                                    <td>
                                        <b>Teacher Name</b>
                                    </td>
                                    <!-- <td>
                                        <b>Unique ID</b>
                                    </td> -->
                                    <td>
                                        <b>Address</b>
                                    </td>
                                    <td style="align-content: center;">
                                        <b>Email</b>
                                    </td>
                                    <td>
                                        <b>Phone No</b>
                                    </td>
                                    <td>
                                        <b>Department</b>
                                    </td>
                                    <td>
                                        <b>Designation</b>
                                    </td>
                                    <td >
                                        <b>Teacher ID</b>
                                    </td>
                                    <td>
                                        <b>DateTime</b>
                                    </td>
                                    <!-- <td>
                                        <b>Status</b>
                                    </td> -->
                                </tr>
                                </thead>

                                <tr ng-repeat="teacherData in showData | filter:txt_teacher_edit">


                                    <!-- <td>
                                        {{teacherData.id}}
                                    </td> -->
                                    <td>
                                        {{teacherData.teacherName}}
                                    </td>
                                    <!-- <td>
                                        {{teacherData.uniqueId}}
                                    </td> -->
                                    <td>
                                        {{teacherData.teacherAddress}}
                                    </td>
                                    <td>
                                        {{teacherData.teacherEmail}}
                                    </td>
                                    <td>
                                        {{teacherData.teacherPhone}}
                                    </td>
                                    <td>
                                        {{teacherData.deptCode}}
                                    </td>
                                    <td>
                                        {{teacherData.designation}}
                                    </td>
                                    <td>
                                        {{teacherData.teacherId}}
                                    </td>
                                    <td>
                                        {{teacherData.dateTime}}
                                    </td>
                                    <!-- <td>
                                        {{teacherData.status}}
                                    </td> -->
                                    <!-- <td>
                                        <input type="button" class="btn btn-info" value="Update" ng-click="UpdatePabx(pabxData)"/>
                                    </td> -->
                                    <td>
                                        <input type="button" class="btn btn-danger" value="De-Activate" ng-click="deActivateTec(teacherData.id)"/>
                                    </td>
                                </tr>
                                
                            </table>

                        </div>

                    </div>

                </div>


        </div>
        <div class="col-md-1"></div>
            <!-- <div class="col-lg-12"> -->

                

            </div>
        </div>
</div>

 
</div>
<script>
    var app = angular.module("myAppt", []);
    app.controller("teacherCtrl", function($scope, $http) {

    /*Statistical Data will be shown here*/
    $scope.homePage = function() {
                 window.location.href = 'welcome.php';
            }

    $scope.getAllDataFromDb = function () {
//$http.get("../getAllStudentsData.php")https://pciunotice.000webhostapp.com/pciu/api/getTeacherData.php
        $http.get("../getTeacherData.php")
        .then(function (response) {
                
            $scope.showData = response.data;
        });

    };

    $scope.deActivateTec = function(id){
            //alert(id); "../stdStatus.php"
            if (confirm("Are you sure you want to De-Activate this Teacher?")) {
                $http.post("tecStatus.php", {
                        'id': id
                    })
                    .success(function(data) {
                        alert(data);
                        $scope.getAllDataFromDb();
                    });
            } else {
                return false;
            }
        
    };

    });
</script>



<?php   }
            } 
        else    {
            echo "<h1 style='color:red;' align='center'>! # !</h1>";
            echo "<h2 style='color:red;' align='center'>You are not an authorized user!</h2>";
            echo "<br><a style='display:block;text-align:center; color:green;' align='center' href='../../../index.php'><b>Try to Login here.</b></a>";
        }
        ?>
</body>
</html>



