<?php require "../../StudentDatabase/studentdata_connection.php";

if(isset($_POST["login"])){
	
	$email=$_POST["email"];
	$password=$_POST["password"];
	$table="USER";
	$query = "SELECT ID_USER, USERNAME, EMAIL, PASSCODE FROM ".$table." where EMAIL = '".$email."' and PASSCODE = '".$password."'";
	$result=mysqli_query($std_db_connection,$query);
	if (mysqli_num_rows($result) > 0){
		session_start();
		$_SESSION["username"]=mysqli_fetch_assoc($result)["USERNAME"];

		$role = mysqli_fetch_assoc($result)["ROLE_ID"];
		if($role == "admin"){
			$_SESSION["rol"] = 1;
			header("Location:http://cpsc.roanoke.edu/~paquevedo/studentPage/admin.php");
		}else{
			$_SESSION["rol"] = 2;
			header("Location:http://cpsc.roanoke.edu/~paquevedo/studentPage/public.php");
		}
		
	}
	else{
	    echo "Login information is incorrect";
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

		
