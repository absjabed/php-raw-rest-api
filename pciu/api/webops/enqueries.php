<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>PCIU-App</title>
<!-- css -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
  /*  margin: 5px 0 22px 0;*/
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #ffffff;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>         
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

</head>
<body ng-app="myAppEnq">
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
<div class="container-fluid" ng-controller="enqCtrl" ng-init="getAllDataFromDb()" >

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
                <li class="active"><a href="enqueries.php"><b>Enqueries</b></a></li>
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

    <div class="col-md-1">

        </div>
        <div class="col-md-10">
                    <div class="panel panel-info">
                    
                    <div class="panel-heading"><b>Students enqueries</b></div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <input class="form-control" placeholder="Search By Name" ng-model="txt_enquery_edit"/>
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
                                        <b>Student Id</b>
                                    </td>
                                    <td style="align-content: center;">
                                        <b>Enquery Topic</b>
                                    </td>
                                    <td>
                                        <b>Enquery Description</b>
                                    </td>
                                    <td>
                                        <b>Student Phone</b>
                                    </td>
                                    <td>
                                        <b>Department</b>
                                    </td>
                                    <td >
                                        <b>Time</b>
                                    </td>
                                    <!-- <td>
                                        <b>Status</b>
                                    </td> -->
                                    <td>
                                        <b>Reply</b>
                                    </td>
                                    <td>
                                        <b>Remove</b>
                                    </td>
                                </tr>
                                </thead>

                                <tr ng-repeat="enqueryData in showData | filter:txt_enquery_edit">


                                    <td>
                                        {{enqueryData.studentName}}
                                    </td>
                                    <!-- <td>
                                        {{enqueryData.uniqueId}}
                                    </td> -->
                                    <td>
                                        {{enqueryData.studentId}}
                                    </td>
                                    <td>
                                        {{enqueryData.studentEnqueryTopic}}
                                    </td>
                                    <td>
                                        {{enqueryData.studentEnqueryDescription}}
                                    </td>
                                    <td>
                                        {{enqueryData.studentPhone}}
                                    </td>
                                    <td>
                                        {{enqueryData.deptCode}}
                                    </td>
                                    <td>
                                        {{enqueryData.date_time_stmp}}
                                    </td>
                                    <!-- <td>
                                        {{enqueryData.status}}


                                    </td> -->
                                    <td>
                                        <input type="button" class="btn btn-info" value="Reply" ng-click="replyEnq(enqueryData.id, enqueryData.studentId,enqueryData.studentName,enqueryData.studentEnqueryTopic,enqueryData.studentEnqueryDescription)"/>
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-warning" value="Remove" ng-click="enqRemove(enqueryData.id)"/>
                                    </td>
                                </tr>
                                
                            </table>

                        </div>

                    </div>
                    </div>

                        

                   <!--  </div>

                </div> -->


            <!-- </div> -->
            
        </div>
            <div class="col-md-1">
        </div>
        </div>
</div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content">
    <div class="container-fluid">
      <h1>Enquery Reply</h1>
      <p>Please fill the message title and message.</p>
      <hr>
      <label for="stdID"><b>Student ID</b></label>
      <input ng-model="stdID" type="text" disabled="disabled" placeholder="Enter student ID" name="stdID" required>
      
      <label for="msgtitle"><b>Title</b></label>
      <input ng-model="msgtitle" type="text" placeholder="Enter Message Title" name="msgtitle" required>

      <label for="msg"><b>Message</b></label>
      <input ng-model="msg" style="height: 80px" type="text" placeholder="Enter Message" name="msg" required>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button ng-click="sendRep()" type="submit" class="signupbtn">Send Reply</button>
      </div>
    </div>
  </form>
</div>
 
</div>
<script>

    var app = angular.module("myAppEnq", []);
    app.controller("enqCtrl", function($scope, $http) {
        var enqueryIDx; 
        var studentIDx;
        var studentNamex;
        var topic_txtx;
        var query_txtx;

    $scope.getAllDataFromDb = function () {
        
        $http.get("../getEnqueryData.php")
        .then(function (response) {
            $scope.showData = response.data;
        });

    };

$scope.enqRemove = function(id){
            //alert(id); "../stdStatus.php"
            if (confirm("Are you sure you want to Remove this Enquery?")) {
                $http.post("enqStatus.php", {
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

    $scope.replyEnq = function(id,studentId,studentName,studentEnqueryTopic,studentEnqueryDescription){
        document.getElementById('id01').style.display='block';
        $scope.stdID = studentId;
        enqueryIDx = id; 
        studentIDx = studentId;
        studentNamex = studentName;
        topic_txtx = studentEnqueryTopic;
        query_txtx = studentEnqueryDescription;
        //alert(id+studentId+studentName+studentEnqueryTopic+studentEnqueryDescription);
        //alert("Reply yet to be worked!");replyEnq(enqueryData.id, enqueryData.studentId,enqueryData.studentName,enqueryData.studentEnqueryTopic,enqueryData.studentEnqueryDescription)
    };

    $scope.sendRep = function(){
            var fcm_server_key = "AIzaSyA57xRQ9VHCpLcm0BEIo9GJwAmOAhco4eE";
            /*alert(enqueryIDx + 
        studentIDx +
        studentNamex +
        topic_txtx +
        query_txtx +" working");*/

        $http({
          method: "POST",
          dataType: 'jsonp',
          headers: {'Content-Type': 'application/json', 'Authorization': 'key=' + fcm_server_key},
          url: "https://fcm.googleapis.com/fcm/send",
          data: JSON.stringify(
              {
                "to": "/topics/"+$scope.stdID,
              
                "data": {
                   "title": $scope.msgtitle,
                   "text": "Click to see full notice!",
                   "extra_information": $scope.msg,
                   "click_action": "NOTIFICATION"
                }
            } 

            )
        }).success(function(data){
          fcm_ref = JSON.stringify(data);
          alert("Success");
          $scope.send2DB();

          document.getElementById('id01').style.display='none';
        }).error(function(data){
          alert("Error: " + JSON.stringify(data));
        });  

    };

    $scope.send2DB = function() {


                $http.post("insertReplyDB.php", {
                        'enqueryID': enqueryIDx,
                        'studentID': studentIDx,
                        'studentName': studentNamex,
                        'topic_txt': topic_txtx,
                        'query_txt': query_txtx,
                        'reply_txt': $scope.msg,
                    })
                    .success(function(data) {
                        alert("Success: "+JSON.stringify(data));
                        
                    }).error(function(data){
                        alert("Error: " + JSON.stringify(data));
                          
                    });
        }
     

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



