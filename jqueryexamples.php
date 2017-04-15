<?php
	include('session.php');
	include("config.php");

	if ($con->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

$sql = "SELECT nome, email FROM Usuarios";
$result = $con->query($sql);

$con->close();
?>

<html>
   <head>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	  <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	</head>
	<body
	<div id='form-right'>
		<form onSubmit="handleValues()" action="/cadastro.php" method="POST">
			<p>First Name</p>
			<input type="text" id="fname" name="firstname" placeholder="Informe seu nome...">

			<p>Last Name</p>
			<input type="text" id="lname" name="lastname" placeholder="">
			
			<p>Salário</p>
			<input type="text" id="salario" name="salario" />
			
		  
			<input type="submit" value="Submit">
		</form>
		<table id="myTable" class="compact order-column hover">
			<thead>
				<th>Nome</th>
				<th>Email</th>
			</thead>
			<tbody>
		<?php

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["nome"]. "</td><td>" . $row["email"]."</td>";
				echo "</tr>";
			}
		} else {
			echo "0 results";
		}
	  
		?>
			</tbody>
		</table>
	  <h2><a href = "logout.php">Sign Out</a></h2>
	</body>
	<script type="text/javascript">
	  $(function() {
		$("#salario").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: true});
	  })
	  
	  function returnSalary(){
		  return $('#salario').maskMoney('unmasked')[0]; 
	  }
	  
	  function handleValues(){
		  document.getElementById("salario").value = returnSalary();
	  }
	  
	  $(document).ready(function(){
			$('#myTable').DataTable();
	 });
	</script>
</html>