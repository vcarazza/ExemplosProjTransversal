<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enesec";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Usuarios (nome, email, senha,idade)
VALUES ('Aluno4', 'outroemail@hotmail.com', 'senhaisoi', 78)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>