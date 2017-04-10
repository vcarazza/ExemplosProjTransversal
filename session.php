<?php
   session_start();
   
	if (!isset($_SESSION['login_user'])) {
		 echo "not logged!";
		 header("Location: login.html");
	}
?>