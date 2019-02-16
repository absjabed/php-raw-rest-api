<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>PCIU-App</title>
<!-- css -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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
<div class="container-fluid" ng-controller="studentCtrl" ng-init="getAllDataFromDb()" >

<div class="row">
        <div class="col-md-12">

        <div class="navbar-header">
    <a href="#" class="navbar-left" >
    <img src="pciu_logo.png" alt="Smiley face" height="55" width="42"></a>
      <a class="navbar-brand" href="#">~~ PCIU ~~</a>
    </div>
            <ul class="nav nav-tabs" style="margin-top: 5px">
                <li><a href="welcome.php"><b>Home</b></a></li>
                <li class="active"><a href="students.php"><b>Students</b></a></li>
                <li><a href="teachers.php"><b>Teachers</b></a></li>
                <li><a href="enqueries.php"><b>Enqueries</b></a></li>
                <li><a href="enqReplies.php"><b>Enquery Replies</b></a></li>
                <li ><a href="sendNotification.php"><b>Send Notice</b></a></li>
                <li><a href="notifications.php"><b>All Notices</b></a></li>
                <li><a href="regApproval.php"><b>Registration Approval</b></a></li>
                <li class="nav navbar-nav navbar-right"><a href="logout.php">
                <span class="glyphicon glyphicon-log-out"></span><b> Logout</b></a></li>        
            </ul>
        </div>
    </div>
<div style="margin-top: 40px">
    <div class="row">
    <div class="col-md-1">

        </div>
        <div class="col-md-10">
        <div class="panel panel-info">
                    
                    <div class="panel-heading"><b>All Active Registered Students</b></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Search By Name" ng-model="txt_student_edit"/>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">

                                <thead>
                                <tr>
                                    <td>
                                        <b>Student Name</b>
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
                                        <b>Batch ID</b>
                                    </td>
                                    <td >
                                        <b>Student ID</b>
                                    </td>
                                    <td>
                                        <b>DateTime</b>
                                    </td>
                                    <!-- <td>
                                        <b>Status</b>
                                    </td> -->
                                </tr>
                                </thead>

                                <tr ng-repeat="studentData in showData | filter:txt_student_edit">


                                    <!-- <td>
                                        {{studentData.id}}
                                    </td> -->
                                    <td>
                                        {{studentData.studentName}}
                                    </td>
                                    <!-- <td>
                                        {{studentData.uniqueId}}
                                    </td> -->
                                    <td>
                                        {{studentData.studentAddress}}
                                    </td>
                                    <td>
                                        {{studentData.studentEmail}}
                                    </td>
                                    <td>
                                        {{studentData.studentPhone}}
                                    </td>
                                    <td>
                                        {{studentData.deptCode}}
                                    </td>
                                    <td>
                                        {{studentData.batchId}}
                                    </td>
                                    <td>
                                        {{studentData.studentId}}
                                    </td>
                                    <td>
                                        {{studentData.dateTime}}
                                    </td>
                                    <!-- <td>
                                        {{studentData.status}}
                                    </td> -->
                                    <!-- <td>
                                        <input type="button" class="btn btn-info" value="Update" ng-click="UpdatePabx(pabxData)"/>
                                    </td> -->
                                    <td>
                                        <input type="button" class="btn btn-danger" value="De-Activate" ng-click="deActivateStd(studentData.id)"/>
                                    </td>
                                </tr>
                                
                            </table>

                        </div>
                         </div>

                </div>


            </div>
</div>
                <div class="col-md-1">
        </div>

        </div>
</div>

 
</div>
<script>
    var app = angular.module("myApp", []);
    app.controller("studentCtrl", function($scope, $http) {

    $scope.getAllDataFromDb = function () {//
        $http.get("../getAllStudentsData.php")
        //$http.get("https://pciunotice.000webhostapp.com/pciu/api/getAllStudentsData.php")
        .then(function (response) {
            $scope.showData = response.data;
        });

    };


    $scope.deActivateStd = function(id){
            if (confirm("Are you sure you want to De-Activate this Student?")) {
                $http.post("stdStatus.php", {
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



<?php 
        }
            }
            
        else{
            echo "<h1 style='color:red;' align='center'>! # !</h1>";
            echo "<h2 style='color:red;' align='center'>You are not an authorized user!</h2>";
            echo "<br><a style='display:block;text-align:center; color:green;' align='center' href='../../../index.php'><b>Try to Login here.</b></a>";
        }
        ?>
</body>
</html>



