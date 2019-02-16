<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>PCIU-App</title>
<!-- css -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8"/>
<style type="text/css">
/* required style*/ 
.none{display: none;}

/* optional styles */
table tr th, table tr td{font-size: 1.2rem;}
.row{ margin:20px 20px 20px 20px;width: 100%;}
.glyphicon{font-size: 20px;}
.glyphicon-plus{float: right;}
a.glyphicon{text-decoration: none;cursor: pointer;}
.glyphicon-trash{margin-left: 10px;}
.alert{
    width: 50%;
    border-radius: 0;
    margin-top: 10px;
    margin-left: 10px;
}
</style>

<!-- javaScripts -->
<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<!-- <script
              src="https://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>
<body ng-app="myApp">
<div class="container" ng-controller="loginCtrl" ng-init="postForm()" >
    <div class="container">
  <div class="jumbotron">
    <h1>Port City International University</h1>      
    <p>Notice Board and Student Assistance System (PCIU - NBSAS) with Android App and Web backend.</p>
  </div>      
</div>
                               
<div id="loginbox" style="margin-top:5px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                    </div>     
                    <div style="{{sty}}" class="alert alert-{{typ}} alert-dismissible "><strong>{{errorMsg}}</strong></div> 
                    <div class="panel-body">
                    <form accept-charset="UTF-8" role="form">
                    <fieldset>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" placeholder="Username" name="username" ng-model="tempUserData.username" type="text">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" placeholder="Password" name="password" ng-model="tempUserData.password" type="password" value="">
                        </div>

                        <input class="btn btn-lg btn-primary btn-block" ng-click="userLogin()" type="submit" value="Login">
                        <input class="btn btn-lg btn-info btn-block" ng-click="postForm()" value="Reset">
                        
                    </fieldset>
                    </form>
                    
                </div>                  
            </div> 
        </div>

</div>
<script>
    var app = angular.module("myApp", []);
    app.controller("loginCtrl", function($scope, $http) {

    $scope.postForm = function() {
                $scope.sty = "display: none;";
                $scope.tempUserData.username = "";
                $scope.tempUserData.password = "";
            }

    $scope.userLogin = function(){
        //alert($scope.tempUserData.username+" "+$scope.tempUserData.password);
        var encodedString = 'username=' +
                    encodeURIComponent(this.tempUserData.username) +
                    '&password=' +
                    encodeURIComponent(this.tempUserData.password);
 
                $http({
                    method: 'POST',
                    url: 'userauth.php',
                    data: encodedString,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                })
                
                .success(function(data) {
                        //console.log(data);
                        if ( data.trim() === 'correct') {
                            window.location.href = '../pciu/api/webops/welcome.php';
                        } else {
                            $scope.sty = "";
                            $scope.errorMsg = "Username and password do not match.";
                            $scope.typ = "danger";
                        }
                }) 
    };
    });
</script>
</body>
</html>