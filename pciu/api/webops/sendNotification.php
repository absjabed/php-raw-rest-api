<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

	<script type="text/javascript">

                 $(document).ready(function () {
                    
                    $('#id_radio_std').click(function () {
                       $('#departmentDDL').hide('slow');
                       $('#batchDDL').hide('slow');
                       $('#studentDDL').show('slow');
                });
                
                $('#id_radio_dept').click(function () {
                      $('#studentDDL').hide('slow');
                      $('#batchDDL').hide('slow');
                      $('#departmentDDL').show('slow');
                 });
                
                $('#id_radio_batch').click(function () {
                      $('#studentDDL').hide('slow');
                      $('#departmentDDL').hide('slow');
                      $('#batchDDL').show('slow');
                 });
               });
</script>

  </head>
  <body ng-app="myAppNotification">
      
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

    <div class="container-fluid" ng-controller="notificationCtrl" ng-init="getAllDataFromDb()">
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
		        <li class="active"><a href="sendNotification.php"><b>Send Notice</b></a></li>
		        <li><a href="notifications.php"><b>All Notices</b></a></li>
		        <li><a href="regApproval.php"><b>Registration Approval</b></a></li>
		        <li class="nav navbar-nav navbar-right"><a href="logout.php">
            <span class="glyphicon glyphicon-log-out"></span><b> Logout</b></a></li>		
			</ul>
		</div>
	</div>
	<div class="row" style="margin-top: 40px">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						Send Notice - Web Panel
					</h3>
				</div>
				<div class="panel-body">
					
					<div style="margin-left: 135px">
					    <label class="radio-inline">
					      <input class="" id="id_radio_std" type="radio" name="optradio">Individual Student
					    </label>
					    <label class="radio-inline">
					      <input class="" id="id_radio_dept" type="radio" name="optradio">Department Wise
					    </label>
					    <label class="radio-inline">
					      <input class="" id="id_radio_batch" type="radio" name="optradio">Batch Wise
					    </label>
					</div>

					<div id="departmentDDL" class="form-group">
                            <span><b>Departments</b></span>
                            <select class="form-control" ng-change="newValue(selectedDepartment)" id="departmentDDL" ng-model="selectedDepartment" required data-error="Select a Department!" tabindex="1">
                                <option value="" selected>--- Select a Department! ---</option>
                                <option value="PCIU" >All PCIU students</option>
                                <option value="{{dept.deptCode}}" ng-repeat="dept in deptlstD">{{dept.deptCode}}</option>
                            </select>
                        </div>

                        <div id="batchDDL" class="form-group" style="display: none;">
                            <span><b>Batches</b></span>
                            <select class="form-control" ng-change="newValue(selectedBatch)" id="batchDDL" ng-model="selectedBatch" required data-error="Select a batch!" tabindex="1">
                                <option value="" selected>--- Select a Student Batch! ---</option>
                                <option value="PCIU" >All PCIU students</option>
                                <option value="{{dept.batchId}}" ng-repeat="dept in deptlstB">{{dept.batchId}}</option>
                                
                            </select>
                        </div>

					<div id="studentDDL" class="form-group" style="display: none;">
                            <span><b>Students</b></span>
                            <select class="form-control" ng-change="newValue(selectedStudent)" id="studentDDL" ng-model="selectedStudent" required data-error="Select a Student ID!" tabindex="1">
                                <option value="" selected>--- Select a Student! ---</option>
                                <option value="PCIU" >All PCIU students</option>
                                <option value="{{dept.studentId}}" ng-repeat="dept in deptlst">{{dept.studentId}}</option>
                            </select>
                        </div>



			<form role="form">
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Notice Title
					</label>
					<input class="form-control" id="FCMtitle" ng-model="title" type="text" required>
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Notice Body
					</label>
					<textarea class="form-control" id="FCMmessage" ng-model="message" type="text" required></textarea>
				</div>
				
				<button type="submit" class="btn btn-primary btn-block" ng-click="sendNotificationClick()">
					Send Notice
				</button>
			</form>


				</div>
				<div class="panel-footer">
					<b>@ PCIU-Notice-Board-System @</b>
				</div>
			</div>
			
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>
<script>
    var app = angular.module("myAppNotification", []);
    app.controller("notificationCtrl", function($scope, $http, $filter,$window/* $timeout*/) {


    var fcmData_date = $filter('date')(new Date(), 'yyyy-MM-dd HH:mm:ss');
	var fcm_ref;
	var topic;

    $scope.getAllDataFromDb = function () {
      document.getElementById("id_radio_dept").checked = true;

        $http.get("../getAllStudentsData.php")
        .then(function (response) {
            $scope.deptlst = response.data;
            
            $http.get("../getAllStudentsDataDpt.php")
        .then(function (response) {
            $scope.deptlstD = response.data;


            $http.get("../getAllStudentsDataBat.php")
        .then(function (response) {
            $scope.deptlstB = response.data;
        });


        });

            });

        

        

    };


    $scope.newValue = function(value){

    	topic = value;
    };


    $scope.sendNotificationClick = function(){
    	$scope.send2FCM();

    	/*$timeout( function(){
            
        }, 3000 );

        //time
        var time = 0;
        
        //timer callback
        var timer = function() {
            if( time < 3000 ) {
                time += 1000;
                $timeout(timer, 1000);
            }
        }
        
        //run!!
        $timeout(timer, 1000); */ 
    	
    };

$scope.send2DB = function() {


				$http.post("insertNoticeDB.php", {
                        'notice_ref_no': fcm_ref,
                        'notice_from': "PCIU Web-admin",
                        'notice_to': topic,
                        'notice_date': fcmData_date,
                        'notice_title': $scope.title,
                        'notice_sort_title': "Click to see full notice!",
                        'notice_body': $scope.message,
                        'studentPhone': "web",
                        'studentEmail': "web",
                        'studentId': "web",
                        'batchId': "web",
                    })
                    .success(function(data) {
                        alert("Success: "+JSON.stringify(data));
                        
                    }).error(function(data){
      					alert("Error: " + JSON.stringify(data));
					      
    				});
        }


$scope.send2FCM = function(){

    var fcm_server_key = "AIzaSyA57xRQ9VHCpLcm0BEIo9GJwAmOAhco4eE";

    $http({
      method: "POST",
      dataType: 'jsonp',
      headers: {'Content-Type': 'application/json', 'Authorization': 'key=' + fcm_server_key},
      url: "https://fcm.googleapis.com/fcm/send",
      data: JSON.stringify(
          {
		  	"to": "/topics/"+topic,
		  
		    "data": {
		       "title": $scope.title,
		       "text": "Click to see full notice!",
		       "extra_information": $scope.message,
		       "click_action": "NOTIFICATION"
   			}
		} 

        )
    }).success(function(data){
      fcm_ref = JSON.stringify(data);
      alert("Success");

//	if(document.getElementById("id_radio_std").checked == false){
		$scope.send2DB();
//		}

      $scope.title = "";
	  $scope.message = "";
    }).error(function(data){
      alert("Error: " + JSON.stringify(data));
      $scope.title = "";
	  $scope.message = "";
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