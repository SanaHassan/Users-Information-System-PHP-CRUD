<?php
session_start();
error_reporting(0);
require_once('config.php');

$con=mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBNAME);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit;
    }
   
if($_POST['submit'])
{
   
    $email=$_POST['email'];
    $pass=$_POST['your_pass'];

   
    if(!empty($email) && !empty($pass) )
    { 
       session_start();
        $_SESSION["userSession"] = $email;
        $_SESSION["userSession1"] = $pass;
      $sql = "SELECT userEmail,userPass FROM user_details WHERE userEmail = '$email' and userPass = '$pass'";
      $result = mysqli_query($con,$sql);

      $row = mysqli_fetch_array($result);
      // $active = $row['active'];
      
      // $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
		if($row["userEmail"]==$email && $row["userPass"]==$pass)
		{
		  header("Location:dashboard.html");
		}
  
		else
		{
		    echo "Sorry, your credentials are not valid, Please try again.";
		    header("Location:signin.html");

		}

	}

}
   //    if($count == 1) {
   //       session_register("email");
   //       $_SESSION['login_user'] = $email;
         
   //       header("location: template.php");
   //    }
   //    else {
   //       $error = "Your Login Name or Password is invalid";
   //    }
   // }

 ?>


