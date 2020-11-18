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
    <h1>Welcome to the Queries Page</h1>
    <form action="form.php" method="post">
        <input type="submit" value="Average Advisees for Advisors" name="queries"/>
        <input type="submit" value="Percent Score Less Than GPA" name="queries"/>
        <input type="submit" value="Student GPA For Each Semester" name="queries"/>
        <input type="submit" value="GPA For Males and Females" name="queries"/>
    </form>
    
  

    
</body>
</html>