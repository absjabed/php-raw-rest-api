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
                <li class="active"><a href="enqReplies.php"><b>Enquery Replies</b></a></li>
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
                    
                    <div class="panel-heading"><b>All posted notices</b></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Search By Name" ng-model="txt_student_edit"/>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">

                                <thead>
                                <tr>
                                    <td>
                                        <b>Enquery ID</b>
                                    </td>
                                    <td>
                                        <b>Student ID</b>
                                    </td>
                                    <!-- <td style="align-content: center;">
                                        <b>Short Title</b>
                                    </td> -->
                                    <td>
                                        <b>Student Name</b>
                                    </td>
                                    <td>
                                        <b>Enquery Topic</b>
                                    </td>
                                    <td>
                                        <b>Enquery Message</b>
                                    </td>
                                    <td>
                                        <b>Enquery Reply</b>
                                    </td>
                                    <td >
                                        <b>Datetime</b>
                                    </td>
                                </tr>
                                </thead>

                                <tr ng-repeat="noticeData in showData | filter:txt_student_edit">

<!-- [{"id":"4","enqueryID":"9","studentID":"cse00405137","studentName":"md nur hossain bhuiyan\n","topic_txt":"about exam","query_txt":"dear sir\nwhen will start our final xm?\n\nthanks\n","reply_txt":"your xm will start at 30 april.","datetime_stmp":"2018-04-25 20:25:10","status":"1"},
{"id":"3","enqueryID":"9","studentID":"cse00405137","studentName":"md nur hossain bhuiyan\n","topic_txt":"about exam","query_txt":"dear sir\nwhen will start our final xm?\n\nthanks\n","reply_txt":"your xm will start at 30 april.","datetime_stmp":"2018-04-25 20:25:10","status":"1"},
{"id":"2","enqueryID":"3","studentID":"bba004123","studentName":"ahmed reza","topic_txt":"About class schedule","query_txt":"when our classes will get start?\nqwerty\nqwertyuiop\nasdfghjkl\nzxcvbnm","reply_txt":"","datetime_stmp":"2018-04-25 20:21:31","status":"1"},
{"id":"1","enqueryID":"4","studentID":"bba004123","studentName":"Ahmed reza","topic_txt":"Exam routine","query_txt":"When final exam routine will be published?","reply_txt":"tomorrow 9 am","datetime_stmp":"2018-04-25 19:46:32","status":"1"}] -->
                                    <!-- <td>
                                        {{noticeData.id}}
                                    </td> -->
                                    <td>
                                        {{noticeData.enqueryID}}
                                    </td>
                                    <td>
                                        {{noticeData.studentID}}
                                    </td>
                                    <!-- <td>
                                        {{noticeData.notice_sort_title}}
                                    </td> -->
                                    <td>
                                        {{noticeData.studentName}}
                                    </td>
                                    <td>
                                        {{noticeData.topic_txt}}
                                    </td>
                                    <td>
                                        {{noticeData.query_txt}}
                                    </td>
                                    <td>
                                        {{noticeData.reply_txt}}
                                    </td>
                                    <td>
                                        {{noticeData.datetime_stmp}}
                                    </td>
                                    
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
        $http.get("../getReplyData.php")
        .then(function (response) {
            $scope.showData = response.data;
        });

    };

$scope.noticeRemove = function(id){
            //alert(id); "../stdStatus.php"
            if (confirm("Are you sure you want to Remove this reply?")) {
                $http.post("replyStatus.php", {
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



