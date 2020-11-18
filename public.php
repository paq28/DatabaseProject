<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] == 1){
            header('location: admin.php');
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Public</title>
    <style>
    .myDiv {
        border: 5px outset black;
        background-color: lightblue;
        text-align: center;
        top: 50%;
        left: 50%;
        height: 40px;
        width: 50%;
      }
      </style>
</head>
<body>
    <h1>Welcome to the Public User Home Page!</h1>
    <div class="myDiv" id="view" onclick="divFunction()">View Student Data</div>
    <div class="myDiv" id="view" onclick="divFunction()">Change Preferences</div>
    <div class="myDiv" id="view" onclick="divFunction()">View Fixed Queries,</div>
    <div class="myDiv" id="view" onclick="divFunction()">Log out</div>
    
</body>
</html>
