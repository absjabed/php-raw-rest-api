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
<body ng-app="myAppn">
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
<div class="container-fluid" ng-controller="noticeCtrl" ng-init="getAllDataFromDb()" >

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
                <li><a href="teachers.php"><b>Teachers</b></a></li>
                <li><a href="enqueries.php"><b>Enqueries</b></a></li>
                <li><a href="enqReplies.php"><b>Enquery Replies</b></a></li>
                <li><a href="sendNotification.php"><b>Send Notice</b></a></li>
                <li  class="active"><a href="notifications.php"><b>All Notices</b></a></li>
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
                    
                    <div class="panel-heading"><b>All posted notices</b></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Search By Name" ng-model="txt_student_edit"/>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">

<!-- [{"id":"8","notice_ref_no":"FCM Notice","notice_from":"md nur hossain bhuiyan raihan","notice_to":"cse","notice_date":"Mar 11, 2018","notice_title":"about ct","notice_sort_title":"Click to see full notice!","notice_body":"tomorrow will held ct","date_time_stmp":"2018-03-11 09:42:52","notice_fb_id":null,"status":"1"},{"id":"7","notice_ref_no":"FCM Notice","notice_from":"md raihan","notice_to":"cse","notice_date":"Mar 1, 2018","notice_title":"about xm","notice_sort_title":"Click to see full notice!","notice_body":"04 march will be held final xm\n\nthanks\n","date_time_stmp":"2018-03-01 17:28:26","notice_fb_id":null,"status":"1"}, -->
                                <thead>
                                <tr>
                                    <td>
                                        <b>Ref. No</b>
                                    </td>
                                    <td>
                                        <b>Title</b>
                                    </td>
                                    <!-- <td>
                                        <b>Short Title</b>
                                    </td> -->
                                    <td>
                                        <b>Notice Body</b>
                                    </td>
                                    <td style="align-content: center;">
                                        <b>Date</b>
                                    </td>
                                    <td>
                                        <b>Sent By</b>
                                    </td>
                                    <td>
                                        <b>Sent to</b>
                                    </td>
                                    <td >
                                        <b>Datetime</b>
                                    </td>
                                    <!-- <td>
                                        <b>Notice id</b>
                                    </td>
                                    <td>
                                        <b>Status</b>
                                    </td> -->
                                </tr>
                                </thead>

                                <tr ng-repeat="noticeData in showData | filter:txt_student_edit">

                                    <!-- <td>
                                        {{noticeData.id}}
                                    </td> -->
                                    <td>
                                        {{noticeData.notice_ref_no}}
                                    </td>
                                    <td>
                                        {{noticeData.notice_title}}
                                    </td>
                                    <!-- <td>
                                        {{noticeData.notice_sort_title}}
                                    </td> -->
                                    <td>
                                        {{noticeData.notice_body}}
                                    </td>
                                    <td>
                                        {{noticeData.notice_date}}
                                    </td>
                                    <td>
                                        {{noticeData.notice_from}}
                                    </td>
                                    <td>
                                        {{noticeData.notice_to}}
                                    </td>
                                    <td>
                                        {{noticeData.date_time_stmp}}
                                    </td>
                                    <!-- <td>
                                        {{noticeData.notice_fb_id}}
                                    </td>
                                    <td>
                                        {{noticeData.status}}
                                    </td> -->
                                    <!-- <td>
                                        <input type="button" class="btn btn-info" value="Update" ng-click="UpdatePabx(pabxData)"/>
                                    </td> -->
                                    <td>
                                        <input type="button" class="btn btn-danger" value="Remove" ng-click="noticeRemove(noticeData.id)"/>
                                    </td>
                                </tr>
                                
                            </table>

                        </div>

                    </div>

                </div>
        </div>
        <div class="col-md-1"></div>


            </div>
        </div>
</div>

 
</div>

<script>
    var app = angular.module("myAppn", []);
    app.controller("noticeCtrl", function($scope, $http) {


    $scope.getAllDataFromDb = function () {
        $http.get("../getNoticeData.php")
        .then(function (response) {
            $scope.showData = response.data;
        });

    };

$scope.noticeRemove = function(id){
            //alert(id); "../stdStatus.php"
            if (confirm("Are you sure you want to Remove this Notice?")) {
                $http.post("noticeStatus.php", {
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



