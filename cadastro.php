<?php
	include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   echo $_POST['salario'];
   }

?>