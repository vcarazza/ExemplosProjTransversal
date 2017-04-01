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

$sql = "SELECT id, nome, email, senha, idade FROM Usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " - email: " . $row["email"]. " - idade: ". $row["idade"]." <br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>