<?php require "../../StudentDatabase/studentdata_connection.php";

if(isset($_POST["login"])){
	
	$email=$_POST["email"];
	$password=$_POST["password"];
	$table="USER";
	$query = "SELECT ID_USER, USERNAME, EMAIL, PASSCODE,ROLE_ID FROM ".$table." where EMAIL = '".$email."' and PASSCODE = '".$password."'";
	$result=mysqli_query($std_db_connection,$query);
	if (mysqli_num_rows($result) > 0){
		session_start();
		$fetch=mysqli_fetch_assoc($result);
		$_SESSION["username"]=$fetch["USERNAME"];
		$_SESSION["rol"] = $fetch["ROLE_ID"];
		if($_SESSION["rol"] == 1){
			header("Location:http://cpsc.roanoke.edu/~paquevedo/studentPage/admin.php");
		}else{
			header("Location:http://cpsc.roanoke.edu/~paquevedo/studentPage/public.php");
		}
		
	}
	else{
	    echo " <p>Login information is incorrect</p>";
	    include "login.php";
	}

}
else if(isset($_POST["register"])){

	$username=$_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$querySelect= "INSERT INTO PENDING_USERS(USERNAME,EMAIL,PASSCODE) VALUES('".$username."','".$email."','".$password."')";
	echo $querySelect;
	if(mysqli_query($std_db_connection,$querySelect)){
		echo"<p>Your request is pending approval</p>";
	}
	else{
		echo mysqli_error($std_db_connection);
		include "registration.php";
	}
}

mysqli_close($std_db_connection);		

		

