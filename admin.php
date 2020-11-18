<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] == 2){
            header('location: public.php');
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
    <h1>Welcome to the Administrator Home Page!</h1>
    <a href="dataview.php"> <div class="myDiv" id="view">View Student Data</div></a>
    <a href="editdata.php"> <div class="myDiv" id="edit">Edit Student Data</div></a>
    <div class="myDiv" id="" onclick="divFunction()">Change Preferences</div>
    <div class="myDiv" id="" onclick="divFunction()">View Fixed Queries,</div>
    <div class="myDiv" id="" onclick="divFunction()">Manage Users</div>
    <div class="myDiv" id="" onclick="divFunction()">Log out</div>
    
</body>
</html>
