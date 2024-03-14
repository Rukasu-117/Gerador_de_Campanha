<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "4lCat3iA";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>