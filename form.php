<?php require "../../StudentDatabase/studentdata_connection.php";
//checks to see if form was submited
if(isset($_POST["submit_edit"])){
    $studentid= $_POST["STUDENT_ID"];
    //initialization of an assiciative array
    $error=array();
    //takes input value from the form and updates the STUDENT table
    foreach($_POST as $name=>$value){
        $query="UPDATE STUDENT SET $name=$value WHERE STUDENT_ID=$studentid";
        if(!mysqli_query($std_db_connection,$query)){
            $error[$name]=>mysqli_error($std_db_connection);
        }
        
    }
    //if there are error, echo those error
    if(sizeof($error) > 0){
        foreach($error as $name=>$value){
            echo $name." ".$value;
            
        }
        include "editdata.php";
    }else{
        header("Location:editdata.php");
    }
    
}
elseif(isset($_POST["queries"])){
    $myqueries=$_POST["queries"];    
}
elseif(isset($_POST["pending"])){
    if($_POST["pending"] == "Approve"){
        $approveQuery = "INSERT INTO USER SELECT * FROM PENDING_USERS WHERE USERNAME=$_POST['USERNAME']";
        $removePending = "DELETE FROM PENDING_USERS WHERE USERNAME=$_POST['USERNAME']" ;
        if(mysqli_query($std_db_connection,$approveQuery)){
            if(mysqli_query($std_db_connection,$removePending)){
                header("Location:manageuser.php");
            }
        }
    }
    else{
        $removePending = "DELETE FROM PENDING_USERS WHERE USERNAME=$_POST['USERNAME']" ;
        if(mysqli_query($std_db_connection,$removePending)){
            header("Location:manageuser.php");
        }
    }

}
elseif(isset($_POST["submit_request"])){
    $id_user= $_POST["ID_USER"];
    //initialization of an assiciative array
    $error=array();
    //takes input value from the form and updates the STUDENT table
    foreach($_POST as $name=>$value){
        $query="UPDATE USER SET $name=$value WHERE ID_USER=$id_user";
        if(!mysqli_query($std_db_connection,$query)){
            $error[$name]=>mysqli_error($std_db_connection);
        }
        
    }
    //if there are error, echo those error
    if(sizeof($error) > 0){
        foreach($error as $name=>$value){
            echo $name." ".$value;
            
        }
        include "manageuser.php";
    }else{
        header("Location:manageuser.php");
    }
}

//if not submited. Takes user back to edit page
else{
    header("Location:editdata.php");
}
   
?>