<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "4lCat3iA";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Receber o sequencial enviado via POST
$sequencial = $_POST['sequencial'];

// Inserir o sequencial no banco de dados
$sql = "INSERT INTO ger_campanha (num_arquivo) VALUES ('$sequencial')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Sequencial inserido com sucesso."));
} else {
    echo json_encode(array("error" => "Erro ao inserir o sequencial: " . $conn->error));
}

$conn->close();
?>
