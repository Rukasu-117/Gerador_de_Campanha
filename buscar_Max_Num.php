<?php
        require_once 'connect_DB.php';

// Consulta para obter o maior número da coluna num_arquivo
$sql = "SELECT MAX(num_Arquivo) AS max_num FROM ger_campanha";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $max_num = $row["max_num"];

    // Verificar se há algum registro na tabela
    if ($max_num !== null) {
        // Se houver, incrementar o máximo encontrado em 1
        $sequencial_arquivo = $max_num + 1;
    } else {
        // Se não houver, iniciar com 1
        $sequencial_arquivo = 1;
    }
} else {
    // Se ocorrer algum erro na consulta, definir o sequencial como 1
    $sequencial_arquivo = 1;
}

// Fechar conexão com o banco de dados
$conn->close();

// Retornar o valor do sequencial
echo $sequencial_arquivo;
?>