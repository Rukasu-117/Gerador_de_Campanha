<?php
include '../PHP/connect_DB.php';

$cpf = $_GET['cpf'];
$nome = $_GET['nome'];

$sql = "SELECT * FROM campanha WHERE cpf LIKE '%$cpf%' OR nome LIKE '%$nome%'";

// Verifica se tanto o CPF quanto o nome foram preenchidos
if (!empty($cpf) && !empty($nome)) {
    $sql = "SELECT * FROM campanha WHERE cpf LIKE '%$cpf%' AND nome LIKE '%$nome%'";
} elseif (!empty($cpf)) {
    $sql = "SELECT * FROM campanha WHERE cpf LIKE '%$cpf%'";
} elseif (!empty($nome)) {
    $sql = "SELECT * FROM campanha WHERE nome LIKE '%$nome%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - CPF: " . $row["cpf"]. " ";
        echo "<a href='../PHP/editar_cliente.php?id=" . $row["id"] . "'>Editar</a><br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}
$conn->close();
?>
