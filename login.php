<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

		// Check connection
		if (mysqli_connect_errno()) {
		  die("Failed to connect to MySQL: " . mysqli_connect_error());
		}

		// escape variables for security
		$myusername = mysqli_real_escape_string($con, $_POST['username']);
		$mypassword = mysqli_real_escape_string($con, $_POST['password']);

		$sql = "SELECT * FROM usuarios WHERE nome = '$myusername' and senha = '$mypassword'";
		$result = mysqli_query($con,$sql);
		if (!$result) {
		  die('Error: ' . mysqli_error($con));
		}
		
		$count = mysqli_num_rows($result);
      
		// If result matched $myusername and $mypassword, table row must be 1 row
		
		  if($count == 1) {
			 $_SESSION['login_user'] = $myusername;
			 echo "user valid";
			 header("location: welcome.php");
		  }else {
			 $error = "Your Login Name or Password is invalid";
			 echo $error;
			 header("location: login.html");
		  }

		mysqli_close($con);

   }
?>