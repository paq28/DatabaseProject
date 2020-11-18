
<?php require "../../StudentDatabase/studentdata_connection.php"?>
//handle for the connection is std_db_connection
<!DOCTYPE html>
<html>
<head>
    
    <title></title> 
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="userStyles.css">
	
</head>  
<body>
   <form class="form" action="handle.php" method="post"> 
    
    <h1>User Login</h1>
     <div class="container">    
         
         <div class="input-container">
         <i class="fas fa-envelope icon"></i>
         <input type="text" name="email" placeholder="Email"  >
         
         </div>
         
         <div class="input-container">
        <i class="fas fa-key icon"></i>
         <input type="password" name="password" placeholder="Password" >
         
         </div>
         <input type="submit" name="login" value="Login" class="button">

         <p> Not Registered Yet? <a class="link" href="registration.php">Register </a></p>
     </div>
    </form>
</body>
</html>
